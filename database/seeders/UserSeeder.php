<?php

namespace Database\Seeders;

use App\Models\Bengkel;
use App\Models\Customer;
use App\Models\Montir;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 3; $i++) {
            $bengkel = Bengkel::create([
                'nama_bengkel' => 'Tes Bengkel ' . $i,
            ]);
            $user = User::create([
                'name' => "Nama Orang {$i}",
                'email' => "admin" . $i . "@admin.com",
                'password' => bcrypt("password"),
                'role' => "admin",
                'bengkel_id' => $bengkel->id,
            ]);
        }

        for ($i = 1; $i <= 20; $i++) {
            $user = User::create([
                'name' => "montir" . $i,
                'email' => "montir" . $i . "@montir.com",
                'password' => bcrypt("password"),
                'bengkel_id' => fake()->randomElement([1, 2, 3]),
                'role' => 'montir'
            ]);

            Montir::create([
                'alamat' => "alamat montir",
                'no_hp' => "no hp ",
                'jenis_kelamin' => fake()->randomElement(["L", "P"]),
                'bengkel_id' => fake()->randomElement([1, 2, 3]),
                'user_id' => $user->id,
            ]);
        }

        for ($i = 1; $i <= 50; $i++) {
            $user = User::create([
                'name' => "Nama Customer" . $i,
                'email' => "customer" . $i . "@customer.com",
                'password' => bcrypt("password"),
                'role' => "customer",
            ]);

            Customer::create([
                "alamat" => "Alamat" . $i,
                "no_hp" => "no hp" . $i,
                "jenis_kelamin" => fake()->randomElement(['L', 'P']),
                "user_id" => $user->id
            ]);
        }
    }
}
