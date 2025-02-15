<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'published_at'];

    // Convertir published_at en un objeto Carbon automáticamente
    protected $casts = [
        'published_at' => 'datetime',
    ];
}