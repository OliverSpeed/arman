<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AdminLog;

class AdminController extends Controller
{
	public function index() {
		// loopit yms
		$users = User::latest()->limit(100)->paginate(10);
		$logs = AdminLog::latest()->limit(10)->with('user');

		// näytä sivu
        return view('administration.dashboard', ['users' => $users, 'logs' => $logs]);
    }
}