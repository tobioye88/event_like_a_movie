<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOccasionRsvpRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:30'],
            'response' => ['required', 'in:yes,no,maybe'],
            'note' => ['nullable', 'string', 'max:2000'],
            'guest_count' => ['nullable', 'integer', 'min:0', 'max:10'],
            'guest_names' => ['nullable', 'array'],
            'guest_names.*' => ['nullable', 'string', 'max:255'],
        ];
    }
}
