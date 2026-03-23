<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CharacterInfoRequest extends FormRequest
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
            'name' => 'requried|string|max:255|unique:character_info,name',
            'anime' => 'requried|string|max:255',
            'about' => 'requried|string|min:20',
            'goals' => 'requried|string|min:20',
            'icon' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048'
        ];
    }
}
