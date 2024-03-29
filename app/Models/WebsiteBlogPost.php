<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class WebsiteBlogPost extends Model
{
    protected $fillable = ['slug', 'image',	'title', 'story', 'author'];
	
	public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'author');
    }
}
