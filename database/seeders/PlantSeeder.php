<?php

namespace Database\Seeders;

use App\Models\Plant;
use Illuminate\Database\Seeder;

class PlantSeeder extends Seeder
{
    public function run()
    {
        Plant::create([
            'name' => 'Anggrek Bulan',
            'species' => 'Phalaenopsis',
            'description' => 'Tanaman hias dengan bunga indah',
        ]);

        Plant::create([
            'name' => 'Lidah Mertua',
            'species' => 'Sansevieria',
            'description' => 'Tanaman hias pembersih udara',
        ]);
    }
}