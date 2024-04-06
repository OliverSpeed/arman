<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactTicketFormRequest;
use App\Models\WebsiteTicket;
use Illuminate\Http\RedirectResponse;

class ContactController extends Controller
{
	public function index() {
		// näytä sivu
        return view('contact');
    }

	public function create(ContactTicketFormRequest $request) : RedirectResponse {
		$validatedData = $request->validated();
	
		WebsiteTicket::create($validatedData);
		
		return redirect()->back()->with('success', __('Viestisi lähetettiin onnistuneesti! Pyrimme vastaamaan mahdollisimman aikaisin.'));
	}
}