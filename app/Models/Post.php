<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Carbon;
use App\Events\NewPostCreated;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'published_at'];

    // Convertir published_at en un objeto Carbon automáticamente
    protected $casts = [
        'published_at' => 'datetime',
    ];

    // Disparar evento cuando se crea un nuevo post
    protected $dispatchesEvents = [
        'created' => NewPostCreated::class,
    ];
}