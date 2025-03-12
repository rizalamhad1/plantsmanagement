<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        Supplier::create([
            'name' => 'Toko Tanaman Hijau',
            'contact_person' => 'Budi Santoso',
            'phone' => '081234567890',
            'address' => 'Jl. Merdeka No. 123',
        ]);

        Supplier::create([
            'name' => 'Kebun Bunga Indah',
            'contact_person' => 'Siti Aminah',
            'phone' => '081298765432',
            'address' => 'Jl. Kenangan No. 456',
        ]);
    }
}