<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RekapDataResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'id_kandang'=>$this->id_kandang,
            'kandang'=>$this->whenLoaded('Kandang'),
            'avg_amoniak'=>$this->avg_amoniak,
            'avg_kelembaban'=>$this->avg_kelembaban,
            'avg_suhu'=>$this->avg_suhu,
            'pakan'=>$this->pakan,
            'minum'=>$this->minum,
        ]
    ;}
}
