<?php

namespace App\Models;

use App\Models\DataKandang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKematian extends Model
{
    use HasFactory;

    public function DataKandang(){
        return $this->belongsTo(DataKandang::class);
    }
}