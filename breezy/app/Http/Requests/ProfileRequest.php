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
        return [
            'name'=>'required',
            'password'=>'nullable|min:8|confirmed',
        ];
    }


    public function messages(): array {
       return [
            'name.required'=>"Kolom nama tidak boleh kosong",
            'password.confirmed'=>'Kolom password tidak sama',
        ];
    }
}
