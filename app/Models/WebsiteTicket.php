<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteTicket extends Model
{
    protected $fillable = ['name', 'email', 'subject', 'message'];
}
