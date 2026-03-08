<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Model;

class StreamsRsvp extends Model
{
    /** @use HasFactory<\Database\Factories\StreamsRsvpFactory> */
    use HasFactory;

    protected $fillable = [
        'stream_id',
        'name',
        'email',
        'phone',
        'attendance_type',
        'attending',
        'well_wishes',
        'metadata',
    ];

    protected $casts = [
        'metadata' => 'array',
    ];

    public function stream(): BelongsTo
    {
        return $this->belongsTo(Streams::class, 'stream_id');
    }
}
