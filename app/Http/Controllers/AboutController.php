<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBlogPost;
use Illuminate\Http\Request;

class AboutController extends Controller
{
	public function index() {
		// sivun toiminnot
		
		// näytä sivu
        return view('about');
    }
}