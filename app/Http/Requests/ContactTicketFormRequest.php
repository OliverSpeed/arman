<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ContactTicketFormRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'email' => ['required', 'email'],
            'name' => ['required', 'string', 'min:3', 'max:128'],
            'subject' => ['required', 'string', 'min:4', 'max:255'],
            'message' => ['required', 'string', 'min:10', 'max:65000'],
        ];
    }
}
