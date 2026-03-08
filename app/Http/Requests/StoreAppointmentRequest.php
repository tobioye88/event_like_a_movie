<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAppointmentRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'message' => ['required', 'string', 'min:10', 'max:2000'],
            'company' => ['nullable', 'size:0'],
            'form_started_at' => ['required', 'integer'],
        ];
    }

    public function withValidator($validator): void
    {
        $validator->after(function ($validator): void {
            $startedAt = (int) $this->input('form_started_at');
            $now = now()->timestamp;

            if ($startedAt <= 0 || $startedAt > $now) {
                $validator->errors()->add('form_started_at', 'Invalid form submission time.');

                return;
            }

            if (($now - $startedAt) < 3) {
                $validator->errors()->add('form_started_at', 'Please take a moment to complete the form.');
            }
        });
    }
}
