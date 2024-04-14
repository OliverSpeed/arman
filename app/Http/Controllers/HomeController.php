<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBlogPost;

class HomeController extends Controller
{
	public function index() {
		// sivun toiminnot
		$blog = WebsiteBlogPost::latest()->with('user')->paginate(2);
		
		// näytä sivu
        return view('welcome', ['blog' => $blog]);
    }

	public function viewPost(WebsiteBlogPost $post) {
		// sivun toiminnot
		$blog = WebsiteBlogPost::orderByDesc('created_at')->with('user')->paginate(2);

		// näytä sivu
        return view('blog', ['blog' => $blog, 'post' => $post]);
    }
}