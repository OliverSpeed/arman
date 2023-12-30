<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstagramController extends Controller
{
	public function index() {

		return view('instagram');
	}
	
    public function show() {
		$profile = \Dymantic\InstagramFeed\Profile::where('username', 'michael')->first();

		return view('instagram', ['instagram_auth_url' => $profile->getInstagramAuthUrl()]);
	}
	
	public function complete() {
		$was_successful = request('result') === 'success';

		return view('instagram', ['was_successful' => $was_successful]);
	}
}
