<?php

namespace Database\Seeders;

use App\Models\PesticideStock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SprayingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pesticides = [
            [
                'name' => 'Gawangan',
                'amount' => 100,
            ],
        ];

        foreach ($pesticides as $pesticide) {
            PesticideStock::create($pesticide);
        }
    }
}
