<?php

namespace Database\Seeders;

use App\Models\Kendaraan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 50; $i++) {
            Kendaraan::create([
                "plat" => "B" . $i . "KL",
                "tahun_keluaran" => 2022,
                "merek" => fake()->randomElement(['Toyota', 'Honda', 'Suzuki']),
                "warna" => fake()->randomElement(['Merah', 'Kuning', 'Hijau']),
                "jenis" => fake()->randomElement(['roda-2', 'roda-4']),
                "customer_id" => $i
            ]);
        }
    }
}
