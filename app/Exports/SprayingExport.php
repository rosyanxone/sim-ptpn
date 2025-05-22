<?php

namespace App\Exports;

use App\Models\Spraying;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class SprayingExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    public function query()
    {
        return Spraying::with('land'); // Eager load the relationship
    }

    public function headings(): array
    {
        return [
            'ID',
            'Area Tanah',
            'Lokasi Tanah',
            'Tahun Tanam',
            'Jenis Pestisida',
            'Jumlah Penyemprotan',
            'Tanggal Penyemprotan',
            'Diubah Oleh',
            'Dibuat Pada',
        ];
    }

    public function map($spraying): array
    {
        return [
            $spraying->id,
            $spraying->land->land_area,
            $spraying->land->land_location,
            $spraying->land->planting_year,
            $spraying->pesticide->name,
            $spraying->amount_spraying . ' Liter',
            Carbon::parse($spraying->spraying_date)->format('d F Y'),
            $spraying->user->name,
            Carbon::parse($spraying->created_at)->format('d F Y H:m'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
