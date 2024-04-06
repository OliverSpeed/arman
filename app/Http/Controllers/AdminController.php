<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\AdminLog;
use App\Models\WebsiteTicket;

class AdminController extends Controller
{
	public function index() {
		// loopit yms
		$users = User::latest()->limit(300)->paginate(30);
		$logs = AdminLog::latest()->limit(10)->with('user');

		// näytä sivu
        return view('administration.dashboard', ['users' => $users, 'logs' => $logs]);
    }

	// Kaikki "ota yhteyttä" tier jutut
	public function tickets() {
		// loopit yms
		$users = WebsiteTicket::query()->take(300)->orderByDesc('status')->paginate(30);

		// sivu
		return view('administration.tickets', ['users' => $users]);
	}

	public function viewTicket($id) {
		// sivu
		$ticket = WebsiteTicket::findOrFail($id);

		return view('administration.view-ticket', ['ticket' => $ticket]);
	}

	public function updateTicket($id, Request $request) {
		// ei oo paras tapa händlää tää mut ei oo aikaa tehä parempaa tbh, afterall tää on hallintapaneeli
		WebsiteTicket::where('id', $id)->update([
				"status" => $request->input('status'),
		]);

		// uus sivu
		$users = WebsiteTicket::query()->take(300)->orderByDesc('status')->paginate(30);

		return view('administration.tickets', ['users' => $users]);
	}
}