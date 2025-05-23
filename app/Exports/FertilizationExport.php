<?php

namespace App\Exports;

use App\Models\Fertilization;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FertilizationExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    public function query()
    {
        return Fertilization::with('land'); // Eager load the relationship
    }

    public function headings(): array
    {
        return [
            'ID',
            'Area Lahan',
            'Lokasi Lahan',
            'Tahun Tanam',
            'Jenis Pupuk',
            'Jumlah Pemupukan',
            'Tanggal Pemupukan',
            'Diubah Oleh',
            'Dibuat Pada',
        ];
    }

    public function map($fertilization): array
    {
        return [
            $fertilization->id,
            $fertilization->land->land_area,
            $fertilization->land->land_location,
            $fertilization->land->planting_year,
            $fertilization->fertilizer->name,
            $fertilization->amount_fertilized . ' Kg',
            Carbon::parse($fertilization->fertilization_date)->format('d F Y'),
            $fertilization->user->name,
            Carbon::parse($fertilization->created_at)->format('d F Y H:m'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
