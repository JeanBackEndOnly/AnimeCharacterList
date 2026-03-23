<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'anime' => 'required|string|max:255',
            'about' => 'required|string|min:20',
            'goals' => 'required|string|min:20',
            'icon' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
        ];
    }
}
