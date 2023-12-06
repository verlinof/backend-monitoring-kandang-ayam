<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RekapData extends Model
{
    use HasFactory;

    protected $table='rekap_datas';

    protected $fillable=[
        'id_kandang',
        'avg_amoniak',
        'avg_suhu',
        'avg_kelembaban',
        'pakan',
        'minum',
        'jumlah_kematian'
    ];

    public $timestamps=false;

    public function Kandang() {
        return $this->belongsTo(Kandang::class);
    }
}
