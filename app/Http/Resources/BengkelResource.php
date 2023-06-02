<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BengkelResource extends JsonResource
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
            'nama_bengkel' => $this->nama_bengkel,
            'alamat' => $this->alamat ?? null,
            'no_hp' => $this->no_hp ?? null,
            'photo' => $this->photo ?? null,
            'montir' => $this->montir->map(function ($item) {
                return [
                    'id' => $item->id,
                    'name' => $item->user->name,
                    'jenis_kelamin' => $item->jenis_kelamin,
                    'status' => $item->status,
                    'photo' => $item->photo,
                ];
            }),
        ];
    }
}
