<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewStoreRequest extends FormRequest
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
            'review'=>'required',
            'rating'=>'required|numeric|min:1|max:5',
        ];
    }
    public function messages():array{
        return [
            'review.required'=>'kolom review tidak boleh kosong',
            'rating.required'=>'minimal rating lah',
            'rating.numeric'=>'rating yang anda berikan harus berupa angka',
            'rating.min'=>'minimal rating :min',
            'rating.max'=>'maximal rating :max'
        ];
    }
}
