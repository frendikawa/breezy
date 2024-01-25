<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
{
    $rules = [
        'name' => 'required',
        'photo' => 'nullable|mimes:png,jpg,jpeg|image',
    ];

    // Only add the password rule if it is provided
    if ($this->filled('password')) {
        $rules['password'] = 'min:8|confirmed';
    }

    return $rules;
}


    public function messages(): array {
       return [
            'name.required'=>"Kolom nama tidak boleh kosong",
            'photo.mimes' => 'Foto hanya diperbolehkan png, jpg dan jpeg',
            'password.confirmed'=>'Kolom password tidak sama',
        ];
    }
}
