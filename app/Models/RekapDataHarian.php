<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapDataHarian extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_kandang',
        'time' ,
        'amoniak' ,
        'suhu' ,
        'kelembaban' ,
    ];
    public $timestamps=false;

    public function Kandang(){
        return $this->belongsTo(Kandang::class);
    }
}
