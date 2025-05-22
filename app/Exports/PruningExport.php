<?php

namespace App\Exports;

use App\Models\Pruning;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class PruningExport implements FromQuery, WithHeadings, WithMapping, WithStyles, ShouldAutoSize
{
    public function query()
    {
        return Pruning::with('land'); // Eager load the relationship
    }

    public function headings(): array
    {
        return [
            'ID',
            'Area Tanah',
            'Lokasi Tanah',
            'Area Pembabatan',
            'Tahun Tanam',
            'Luas Pembabatan',
            'Tanggal Pembabatan',
            'Diubah Oleh',
            'Dibuat Pada',
        ];
    }

    public function map($pruning): array
    {
        return [
            $pruning->id,
            $pruning->land->land_area,
            $pruning->land->land_location,
            $pruning->prunning_area,
            $pruning->land->planting_year,
            $pruning->prunning_amount . ' Ha',
            Carbon::parse($pruning->prunning_date)->format('d F Y'),
            $pruning->user->name,
            Carbon::parse($pruning->created_at)->format('d F Y H:m'),
        ];
    }

    public function styles(Worksheet $sheet)
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
