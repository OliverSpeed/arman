<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\AdminLog;
use App\Models\WebsiteTicket;
use App\Models\WebsiteGallery;
use App\Models\WebsiteSetting;
use App\Models\WebsiteBlogPost;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Str;

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

	public function blog() {
		if (!Auth::check()) {
            return view('welcome');
        }

		return view('administration.blog');
	}

	public function newBlogPost(Request $request) : RedirectResponse {
		if (!Auth::check()) {
			return redirect()->back();
		}
	
		// Ensure the file is an image
		$request->validate([
			'photo' => 'required|mimes:png,jpg,jpeg,webp,gif',
			'title' => 'required|string|max:55',
			'description' => 'sometimes|string|max:2048'
		]);
		
		if($request->has('photo')) {
			$file = $request->file('photo');
			$extension = $file->getClientOriginalExtension();
			$filename = time().'.'.$extension;
			$randomNumber = Str::random(4);
	
			$slug = $randomNumber . '-' . Str::slug($request->input('title'));
			$file->move('uploads/blog', $filename);
			
			WebsiteBlogPost::create([
				'image' => $filename,
				'slug' => $slug,
				'title' => $request->input('title'),
				'story' => $request->input('description'),
				'author' => Auth::user()->id
			]);
	
			return redirect()->back()->with('success', __('Blogi julkaisu on lisätty ja näkyy verkkosivuilla.'));
		}
	}
	

	public function newPhoto(Request $request) : RedirectResponse {
		if (!Auth::check()) {
            return redirect()->back();
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

			return redirect()->back()->with('success', __('Kuvasi on lisätty ja näkyy verkkosivuilla.'));
		}
	}

	public function settings() {
		if (!Auth::check()) {
            return view('welcome');
        }

		return view('administration.settings');
	}

	public function saveSettings(Request $request): RedirectResponse {
		if (!Auth::check()) {
			return redirect()->back();
		}
	
		$request->validate([
			'motto' => 'required|string|max:255',
			'facebook' => 'nullable|string|max:99',
			'twitter' => 'nullable|string|max:99',
			'instagram' => 'nullable|string|max:99',
			'email' => 'sometimes|email|max:255',
			'verkkokauppa' => 'required|string|max:124',
			'name' => 'required|string|max:99',
		]);
	
		$keys = [
			'motto' => $request->input('motto'),
			'name' => $request->input('name'),
			'facebook' => $request->input('facebook'),
			'twitter' => $request->input('twitter'),
			'instagram' => $request->input('instagram'),
			'email' => $request->input('email'),
			'verkkokauppa' => $request->input('verkkokauppa')
		];
	
		foreach ($keys as $key => $value) {
			$setting = WebsiteSetting::where('key', $key)->first();
			if ($setting) {
				$setting->update(['value' => $value]);
			}
		}
	
		return redirect()->back()->with('success', __('Asetukset tallennettu.'));
	}
	
}