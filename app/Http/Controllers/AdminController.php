<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AdminLog;
use App\Models\WebsiteTicket;
use App\Models\WebsiteGallery;

class AdminController extends Controller
{
	public function index() {
		if (!Auth::check()) {
            return view('welcome');
        }

		// loopit yms
		$users = User::latest()->limit(300)->paginate(30);
		$logs = AdminLog::latest()->limit(10)->with('user');

		// näytä sivu
        return view('administration.dashboard', ['users' => $users, 'logs' => $logs]);
    }

	// Kaikki "ota yhteyttä" tier jutut
	public function tickets() {
		if (!Auth::check()) {
            return view('welcome');
        }

		// loopit yms
		$users = WebsiteTicket::query()->take(300)->orderByDesc('status')->paginate(30);

		// sivu
		return view('administration.tickets', ['users' => $users]);
	}

	public function viewTicket($id) {
		if (!Auth::check()) {
            return view('welcome');
        }

		// sivu
		$ticket = WebsiteTicket::findOrFail($id);

		return view('administration.view-ticket', ['ticket' => $ticket]);
	}

	public function updateTicket($id, Request $request) {
		if (!Auth::check()) {
            return view('welcome');
        }

		// ei oo paras tapa händlää tää mut ei oo aikaa tehä parempaa tbh, afterall tää on hallintapaneeli
		WebsiteTicket::where('id', $id)->update([
				"status" => $request->input('status'),
		]);

		// uus sivu
		$users = WebsiteTicket::query()->take(300)->orderByDesc('status')->paginate(30);

		return view('administration.tickets', ['users' => $users]);
	}

	public function galleryIndex() {
		if (!Auth::check()) {
            return view('welcome');
        }

		return view('administration.upload');
	}

	public function newPhoto(Request $request) {
		if (!Auth::check()) {
            return view('welcome');
        }

		// varmista et tiedosto on kuva :3
		$request->validate([
			'photo' => 'required|mimes:png,jpg,jpeg,webp,gif',
			'category' => 'required|string|max:55',
			'title' => 'required|string|max:55',
			'description' => 'sometimes|string|max:255'
		]);
		
		if($request->has('photo')) {
			// kuvan tiedot jne
			$file = $request->file('photo');
			$extension = $file->getClientOriginalExtension();
			$filename = time().'.'.$extension;
			
			// tallenna kuva
			$file->move('uploads/gallery', $filename);
			WebsiteGallery::create(['name' => $filename, 'category' => $request->input('category'), 'title' => $request->input('title'), 'description' => $request->input('description'), 'uploaded_by' => Auth::user()->id]);
		}
	}
}