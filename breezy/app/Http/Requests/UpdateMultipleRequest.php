<?php

namespace App\Http\Requests;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class UpdateMultipleRequest extends FormRequest
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
            'quantities.*' => 'required|numeric|min:1', // Memastikan bahwa setiap kuantitas adalah angka positif
            'proof' => 'required|file|mimes:jpeg,png,pdf|max:2048', // Memastikan bahwa bukti pembayaran adalah file dengan tipe tertentu dan ukuran maksimum
            'address' => 'required|string', // Memastikan bahwa alamat diisi dan bertipe string
        ];
    }
    public function messages(): array
    {
        return [
            'quantities.*.required' => 'Kuantitas diperlukan untuk semua barang.',
            'quantities.*.numeric' => 'Kuantitas harus berupa angka.',
            'quantities.*.min' => 'Kuantitas harus minimal 1.',
            'quantities.*.max'=>'kuantitas yang anda inginkan melebihi stok yang tersedia',
            'proof.required' => 'Bukti pembayaran diperlukan.',
            'proof.file' => 'Bukti pembayaran harus berupa file.',
            'proof.mimes' => 'Bukti pembayaran harus dalam format jpeg, png, atau pdf.',
            'proof.max' => 'Ukuran file bukti pembayaran harus kurang dari 2MB.',
            'address.required' => 'Alamat diperlukan.',
            'address.string' => 'Alamat harus berupa teks.',
        ];
    }
}
