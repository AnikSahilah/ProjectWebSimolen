<?php

namespace Database\Seeders;

use App\Models\Barang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            Barang::create([
                "bengkel_id" => fake()->randomElement([1, 2, 3]),
                "kode_barang" => "A" . $i,
                "nama_barang" => "Barang " . $i,
                "harga" => 20000,
                "merek" => "Merek" . $i,
                "spesifikasi" => "spesifikasi" . $i,
                "stok" => 50,
            ]);
        }
    }
}
