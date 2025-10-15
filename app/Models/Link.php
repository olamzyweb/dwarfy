<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Link extends Model
{
    // Allow mass assignment for these fields used in Link::create()
    protected $fillable = [
        'original_url',
        'short_code',
        'clicks',
    ];
}
