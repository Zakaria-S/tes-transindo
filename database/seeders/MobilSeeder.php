<?php

namespace Database\Seeders;

use App\Models\Mobil;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cars = [
            [
                'merk' => 'Toyota',
                'model' => 'Kijang Innova Zenix Gasoline 2.0 G CVT 2023',
                'nomor_plat' => 'D 1234 ABC',
                'tarif' => 300000
            ],
            [
                'merk' => 'Toyota',
                'model' => 'Kijang Innova Zenix Gasoline 2.0 V CVT 2023',
                'nomor_plat' => 'D 2345 ABC',
                'tarif' => 320000
            ],
            [
                'merk' => 'Honda',
                'model' => 'Honda Brio Satya E M/T 2022',
                'nomor_plat' => 'B 3456 CBA',
                'tarif' => 230000
            ],
            [
                'merk' => 'Honda',
                'model' => '2022 Honda BR-V 1.5 S M/T',
                'nomor_plat' => 'B 4567 CBA',
                'tarif' => 280000
            ],
            [
                'merk' => 'Daihatsu',
                'model' => 'Daihatsu Ayla 1.0L D MT',
                'nomor_plat' => 'D 5678 DEF',
                'tarif' => 200000
            ],
            [
                'merk' => 'Mitsubishi',
                'model' => 'Mitsubishi Xpander GLS CVT 2023',
                'nomor_plat' => 'D 7890 XYZ',
                'tarif' => 310000
            ],
        ];

        foreach ($cars as $car) {
            Mobil::create($car);
        }
    }
}
