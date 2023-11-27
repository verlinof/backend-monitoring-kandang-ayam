<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapData extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_kandang',
        'time' ,
        'amoniak' ,
        'suhu' ,
        'kelembaban' ,
        'pakan',
        'minum',
        'bobot',
    ];

    public function Kandang() {
        return $this->belongsTo(Kandang::class);
    }
}
