<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OccasionRsvp extends Model
{
    use HasFactory;

    protected $fillable = [
        'occasion_id',
        'name',
        'email',
        'phone',
        'response',
        'note',
        'guest_count',
        'guest_names',
    ];

    protected $casts = [
        'guest_names' => 'array',
    ];

    public function occasion(): BelongsTo
    {
        return $this->belongsTo(Occasion::class);
    }
}
