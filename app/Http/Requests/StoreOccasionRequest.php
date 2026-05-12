<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOccasionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user() !== null;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'theme_color' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'background_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'side_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'event_at' => ['required', 'date'],
            'event_timezone' => ['required', 'timezone'],
            'location_country' => ['required', 'string', 'max:120'],
            'location_state' => ['required', 'string', 'max:120'],
            'location_address' => ['required', 'string', 'max:255'],
            'accommodation' => ['nullable', 'string', 'max:2000'],
            'dress_code_color_one' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'dress_code_color_one_name' => ['required', 'string', 'max:80'],
            'dress_code_color_two' => ['required', 'regex:/^#[0-9A-Fa-f]{6}$/'],
            'dress_code_color_two_name' => ['required', 'string', 'max:80'],
            'custom_message' => ['nullable', 'string', 'max:3000'],
            'status_action' => ['required', 'in:draft,publish'],
        ];
    }
}
