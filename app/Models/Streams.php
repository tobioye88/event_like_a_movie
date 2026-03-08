<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Streams extends Model
{
    /** @use HasFactory<\Database\Factories\StreamsFactory> */
    use HasFactory;

    protected $fillable = [
        'intro',
        'couples_name',
        'slug',
        'quote',
        'event_date',
        'stream_url',
        'description',
        'love_story',
        'tags',
        'gallery',
        'thumbnail',
        'metadata',
        'status'
    ];

    protected $casts = [
        'tags' => 'array',
        'gallery' => 'array',
        'metadata' => 'object',
        'event_date' => 'datetime',
    ];

    public function rsvps(): HasMany
    {
        return $this->hasMany(StreamsRsvp::class, 'stream_id');
    }
}
