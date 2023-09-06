<?php

namespace App\Models;

use App\Models\Kandang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Panen extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kandang',
        'tanggal_mulai',
        'jumlah_panen'
    ];

    protected $guarded = [
        'id_panen',
        'tanggal_panen'
    ];

    public function Kandang(){
        return $this->belongsTo(Kandang::class);
    }
}