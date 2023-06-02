<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PembelianResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'jumlah' => $this->jumlah,
            'total' => $this->total,
            'status' => $this->status,
            'tanggal_pembelian' => $this->tanggal_pembelian,
            'customer' => [
                'nama' => $this->customer->user->name,
                'alamat' => $this->customer->alamat,
                'no_hp' => $this->customer->no_hp,
                'jenis_kelamin' => $this->customer->jenis_kelamin,
            ],
            'barang' => [
                'id' => $this->barang->id,
                'id_bengkel' => $this->barang->bengkel_id,
                'kode_barang' => $this->barang->kode_barang,
                'nama_barang' => $this->barang->nama_barang,
                'harga' => $this->barang->harga,
                'merek' => $this->barang->merek,
                'spesifikasi' => $this->barang->spesifikasi,
                'stok' => $this->barang->stok,
                'photo' => $this->barang->photo,
            ]
        ];
    }
}
