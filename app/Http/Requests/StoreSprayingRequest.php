<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSprayingRequest extends FormRequest
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
            'land_area' => ['required', 'string', 'max:255'],
            'land_location' => ['required', 'string', 'max:255'],
            'planting_year' => ['required', 'digits:4', 'integer', 'min:1900', 'max:' . date('Y')],
            'amount_spraying' => ['required', 'numeric', 'min:0'],
            'spraying_date' => ['required', 'date'],
            'pesticide_stock_id' => ['required', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'land_area.required' => 'Luas lahan wajib diisi.',
            'land_location.required' => 'Lokasi lahan wajib diisi.',
            'planting_year.digits' => 'Tahun tanam harus terdiri dari 4 digit.',
            'amount_spraying.numeric' => 'Jumlah penyemprotan harus berupa angka.',
            'spraying_date.date' => 'Tanggal penyemprotan harus berupa tanggal yang valid.',
        ];
    }
}
