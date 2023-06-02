<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MontirResource extends JsonResource
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
            'nama' => $this->user->name,
            'alamat' => $this->alamat,
            'no_hp' => $this->no_hp,
            'jenis_kelamin' => $this->jenis_kelamin,
            'status' => $this->status,
            'photo' => $this->user->photo,
            'bengkel' => [
                'id' => $this->bengkel->id,
                'nama_bengkel' => $this->bengkel->nama_bengkel,
                'alamat' => $this->bengkel->alamat,
                'no_hp' => $this->bengkel->no_hp,
                'photo' => $this->bengkel->photo,
            ]
        ];
    }
}
