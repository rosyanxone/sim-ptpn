<?php

namespace Database\Seeders;

use App\Models\FertilizationStock;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FertilizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fertilizers = [
            [
                'name' => 'NPK',
                'amount' => 100,
            ],
            [
                'name' => 'Urea',
                'amount' => 100,
            ],
        ];

        foreach ($fertilizers as $fertilizer) {
            FertilizationStock::create($fertilizer);
        }
    }
}
