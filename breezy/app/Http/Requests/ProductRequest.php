<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
  

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required',
            'photo' => 'nullable|mimes:png,jpg,jpeg',
            'description' => 'required',
            'price' => 'required|numeric|min:1000', // Harga harus numeric dan tidak boleh kurang dari 0
            'category_id' => 'not_in:""',
            'stock' => 'required|integer|min:0', // Stock harus integer dan tidak boleh kurang dari 0
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Nama tidak boleh kosong',
            'photo.mimes' => 'Foto hanya diperbolehkan png, jpg dan jpeg',
            'description.required' => 'Deskripsi tidak boleh kosong',
            'price.required' => 'Harga tidak boleh kosong',
            'price.numeric' => 'Harga harus berupa angka',
            'price.min' => 'Harga tidak boleh kurang dari :min',
            'category_id.not_in' => 'Kategori tidak boleh kosong',
            'stock.required' => 'Stock tidak boleh kosong',
            'stock.integer' => 'Stock harus berupa angka bulat',
            'stock.min' => 'Stock tidak boleh kurang dari 0',
        ];
    }
}
