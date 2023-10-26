<?php

namespace App\Models;

use App\Models\Kandang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SuhuKelembabanSensor extends Model
{
    use HasFactory;

    //Waktu sudah timestamp
    protected $fillable = [
        'suhu', 'kelembaban'
    ];

    // protected $casts = [
    //     'waktu' => 'timestamp'
    // ];

    public function Kandang(){
        return $this->belongsTo(Kandang::class);
    }
}