<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Occasion extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'theme_color',
        'background_image',
        'side_image',
        'event_at',
        'event_timezone',
        'location',
        'location_country',
        'location_state',
        'location_address',
        'accommodation',
        'dress_code_color_one',
        'dress_code_color_one_name',
        'dress_code_color_two',
        'dress_code_color_two_name',
        'custom_message',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'event_at' => 'datetime',
        ];
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function statusLabel(): string
    {
        return $this->status === 'active' ? 'Published' : 'Draft';
    }

    public function eventAtInTimezone(): string
    {
        return $this->event_at
            ->copy()
            ->setTimezone($this->event_timezone ?: config('app.timezone', 'UTC'))
            ->format('F j, Y g:i A T');
    }

    public function eventAtInputValue(): ?string
    {
        return $this->event_at
            ? $this->event_at->copy()->setTimezone($this->event_timezone ?: config('app.timezone', 'UTC'))->format('Y-m-d\TH:i')
            : null;
    }

    public function fullLocation(): string
    {
        $parts = array_filter([
            $this->location_address,
            $this->location_state,
            $this->location_country,
        ]);

        return $parts === [] ? (string) $this->location : implode(', ', $parts);
    }

    public function rsvps(): HasMany
    {
        return $this->hasMany(OccasionRsvp::class);
    }
}
