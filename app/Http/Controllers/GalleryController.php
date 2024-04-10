<?php

namespace App\Http\Controllers;

use App\Models\WebsiteBlogPost;
use App\Models\WebsiteGallery;

class GalleryController extends Controller
{
	public function index() {
		// sivun toiminnot
		$blog = WebsiteBlogPost::orderByDesc('created_at')->with('user')->paginate(2);
		$gallery = WebsiteGallery::latest()->limit(100)->get();
		
		// näytä sivu
        return view('gallery', ['blog' => $blog, 'gallery' => $gallery]);
    }
}