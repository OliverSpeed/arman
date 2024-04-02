<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class AdminLog extends Model
{
    protected $fillable = ['user_id', 'action'];
	
	public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
