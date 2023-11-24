<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapData extends Model
{
    use HasFactory;

    public function Kandang() {
        return $this->belongsTo(Kandang::class);
    }
}
