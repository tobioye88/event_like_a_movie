<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStreamsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'intro' => ['required', 'string', 'max:255'],
            'couples_name' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', 'unique:streams,slug'],
            'quote' => ['nullable', 'string', 'max:1000'],
            'event_date' => ['nullable', 'date'],
            'stream_url' => ['nullable', 'url', 'max:2048'],
            'description' => ['nullable', 'string'],
            'love_story' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'url', 'max:2048'],
            'background_image' => ['nullable', 'url', 'max:2048'],
            'tags' => ['nullable', 'string'],
            'gallery' => ['nullable', 'string'],
            'status' => ['required', 'in:active,inactive'],
        ];
    }
}
