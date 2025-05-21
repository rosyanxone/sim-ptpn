<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreFertilizationStockRequest extends FormRequest
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
            'fertilization_name' => 'required|string|max:255',
            'amount' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'fertilization_name.required' => 'Nama wajib diisi.',
            'fertilization_name.string' => 'Nama harus berupa teks.',
            'fertilization_name.max' => 'Nama maksimal 255 karakter.',
            'amount.required' => 'Jumlah stok wajib diisi.',
            'amount.integer' => 'Jumlah stok harus berupa angka.',
            'amount.min' => 'Jumlah stok tidak boleh negatif.',
        ];
    }
}
