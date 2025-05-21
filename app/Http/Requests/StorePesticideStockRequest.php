<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePesticideStockRequest extends FormRequest
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
            'pesticide_name' => 'required|string|max:255',
            'pesticide_stock' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'pesticide_name.required' => 'Nama wajib diisi.',
            'pesticide_name.string' => 'Nama harus berupa teks.',
            'pesticide_name.max' => 'Nama maksimal 255 karakter.',
            'pesticide_stock.required' => 'Jumlah stok wajib diisi.',
            'pesticide_stock.integer' => 'Jumlah stok harus berupa angka.',
            'pesticide_stock.min' => 'Jumlah stok tidak boleh negatif.',
        ];
    }
}
