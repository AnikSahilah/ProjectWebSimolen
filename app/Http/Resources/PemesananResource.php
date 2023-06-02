<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PemesananResource extends JsonResource
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
            'total' => $this->total,
            'tanggal_pemesanan' => $this->tanggal_pemesanan,
            'status' => $this->status,
            'customer' => [
                'id' => $this->customer->id,
                'nama' => $this->customer->user->name,
                'alamat' => $this->customer->alamat,
                'no_hp' => $this->customer->no_hp,
                'jenis_kelamin' => $this->customer->jenis_kelamin,
            ],
            'montir' => [
                'id' => $this->montir->id,
                'nama' => $this->montir->user->name,
                'alamat' => $this->montir->alamat,
                'no_hp' => $this->montir->no_hp,
                'jenis_kelamin' => $this->montir->jenis_kelamin,
            ]
        ];
    }
}
