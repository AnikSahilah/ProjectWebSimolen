<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BarangResource extends JsonResource
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
            'kode_barang' => $this->kode_barang,
            'nama_barang' => $this->nama_barang,
            'harga' => $this->harga,
            'merek' => $this->merek,
            'spesifikasi' => $this->spesifikasi,
            'stok' => $this->stok,
            'photo' => $this->photo,
            'bengkel' => [
                'nama_bengkel' => $this->bengkel->nama_bengkel,
                'alamat' => $this->bengkel->alamat,
                'no_hp' => $this->bengkel->no_hp,
                'photo' => $this->bengkel->photo,
            ],
        ];
    }
}
