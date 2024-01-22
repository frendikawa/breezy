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
            'name'=>'required',
            'photo'=>'required',
            'description'=>'required',
            'price'=>'required',
            'category_id'=>'required',
            'stock'=>'required',
        ];
    }

    public function messages() : array {
        return [
            'name.required'=>'Nama tidak boleh kosong',
            'photo.required'=>'Kolom foto tidak boleh kosong',
            'description.required'=>'Deskripsi tidak boleh kosong',
            'price.required'=>'Harga tidak boleh kosong',
            'category_id.required'=>'Kategori tidak boleh kosong',
            'stock.required'=>'Stock tidak boleh kosong',
        ];
    }
}
