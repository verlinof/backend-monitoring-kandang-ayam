<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DataKandangResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "id_kandang" => $this->id_kandang,
            "pakan" => $this->pakan,
            "minum" => $this->minum,
            "bobot" => $this->date,
        ];
    }
}