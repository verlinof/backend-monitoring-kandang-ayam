<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class KandangDetailResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_kandang' => $this->id_kandang,
            'id_user' => $this->id_user,
            'anak_kandang' => $this->whenLoaded('User'),
            'nama_kandang' => $this->nama_kandang,
            'populasi_awal' => $this->populasi_awal,
            'alamat_kandang' => $this->alamat_kandang
        ];
    }
}