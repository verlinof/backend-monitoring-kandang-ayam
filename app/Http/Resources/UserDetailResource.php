<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserDetailResource extends JsonResource
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
            'nama_lengkap' => $this->nama_lengkap,
            'username' => $this->username,
            'email' => $this->email,
            'status' => $this->status,
            'no_telepon' => $this->no_telepon
        ];
    }
}