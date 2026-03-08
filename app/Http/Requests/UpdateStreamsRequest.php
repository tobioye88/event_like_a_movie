<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateStreamsRequest extends FormRequest
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
        $stream = $this->route('stream');

        return [
            'intro' => ['required', 'string', 'max:255'],
            'couples_name' => ['required', 'string', 'max:255'],
            'slug' => [
                'nullable',
                'string',
                'max:255',
                Rule::unique('streams', 'slug')->ignore($stream?->id),
            ],
            'quote' => ['nullable', 'string', 'max:1000'],
            'event_date' => ['nullable', 'date'],
            'stream_url' => ['nullable', 'url', 'max:2048'],
            'description' => ['nullable', 'string'],
            'love_story' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'background_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'tags' => ['nullable', 'string'],
            'gallery' => ['nullable', 'array'],
            'gallery.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:5120'],
            'delete_gallery' => ['nullable', 'array'],
            'delete_gallery.*' => ['string'],
            'status' => ['required', 'in:active,inactive'],
        ];
    }
}
