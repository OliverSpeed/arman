<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBlogPost;

class HomeController extends Controller
{
	public function index() {
		// sivun toiminnot
		$blog = WebsiteBlogPost::orderByDesc('created_at')->with('user')->paginate(2);
		
		// näytä sivu
        return view('welcome', ['blog' => $blog]);
    }
}