<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'role' => $this->role,
        ];

        $user = $request->user();
        if ($user && $user->role === 'customer') {
            if ($this->customer) {
                $data['id'] = $this->customer->id;
                $data['alamat'] = $this->customer->alamat;
                $data['no_hp'] = $this->customer->no_hp;
                $data['jenis_kelamin'] = $this->customer->jenis_kelamin;
            }
        }

        if ($user && $user->role === 'montir') {
            if ($this->montir) {
                $data['id'] = $this->montir->id;
                $data['alamat'] = $this->montir->alamat;
                $data['no_hp'] = $this->montir->no_hp;
                $data['jenis_kelamin'] = $this->montir->jenis_kelamin;
            }
        }

        return $data;
    }
}
