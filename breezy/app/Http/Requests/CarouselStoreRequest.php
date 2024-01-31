<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarouselStoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'judul' => 'required',
            'deskripsi' => 'required|max:100',
            'foto' => 'required|mimes:png,jpg,jpeg'
        ];
    }

    public function messages(): array
    {
        return [
            'judul.required' => 'Judul harus diisi.',
            'deskripsi.required' => 'Deskripsi harus diisi.',
            'deskripsi.max' => 'Deskripsi maksimal :max karakter.',
            'foto.required' => 'Foto harus diisi.',
            'foto.mimes' => 'Foto harus berupa png, jpg, jpeg'
        ];
    }
}
