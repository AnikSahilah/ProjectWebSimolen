<?php

namespace Database\Seeders;

use App\Models\Pembelian;
use App\Models\Pemesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RiwayatTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $riwayatPemesanan = [
            [
                'id' => '1',
                'customer_id' => '1',
                'montir_id' => '1',
                'tanggal_pemesanan' => '2023-05-15',
                'status' => 'menunggu persetujuan'
            ],
            [
                'id' => '2',
                'customer_id' => '2',
                'montir_id' => '2',
                'tanggal_pemesanan' => '2023-05-15',
                'status' => 'menunggu persetujuan'
            ],
        ];

        $riwayatPembelian = [
            [
                'id' => '1',
                'customer_id' => '1',
                'barang_id' => '1',
                'jumlah' => '3',
                'total' => '60000',
                'status' => 'belum diproses',
                'tanggal_pembelian' => '2023-05-15'
            ],
            [
                'id' => '2',
                'customer_id' => '1',
                'barang_id' => '2',
                'jumlah' => '5',
                'total' => '100000',
                'status' => 'dalam pengiriman',
                'tanggal_pembelian' => '2023-05-15'
            ],
        ];

        foreach ($riwayatPemesanan as $riwayat) {
            Pemesanan::create($riwayat);
        }

        foreach ($riwayatPembelian as $riwayat) {
            Pembelian::create($riwayat);
        }
        $this->command->info('Seeder Riwayat Pemesanan dan pembelian berhasil dijalankan!');
    }
}
