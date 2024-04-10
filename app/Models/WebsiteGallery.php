<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebsiteGallery extends Model
{
    use HasFactory;

    public $table = 'website_gallery';
    public $fillable = ['name', 'category', 'title', 'description', 'uploaded_by'];
}
