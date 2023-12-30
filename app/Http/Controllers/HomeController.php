<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
	public function index() {
		// sivun toiminnot
        $feed = \Dymantic\InstagramFeed\InstagramFeed::for('realolkku');
		
		// näytä sivu
        return view('welcome', ['instagram' => $feed]);
    }
}