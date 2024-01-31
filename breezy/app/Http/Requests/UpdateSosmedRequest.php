<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateSosmedRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'icon' => 'nullable|mimes:png,jpg,jpeg',
            'name' => 'required|max:100',
            'link' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'icon.mimes' => 'Ikon sosial media hanya bisa png, jpg, dan jpeg.',
            'name.required' => 'Nama sosial media tidak boleh kosong.',
            'name.max' => 'Nama sosial media maksimal :max karakter.',
            'link.required' => 'Link sosial media tidak boleh kosong.',
        ];
    }
}
