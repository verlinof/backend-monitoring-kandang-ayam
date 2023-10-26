<?php

namespace App\Models;

use App\Models\User;
use App\Models\Panen;
use App\Models\DataKandang;
use App\Models\AmoniakSensor;
use App\Models\SuhuKelembabanSensor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kandang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kandang',
        'id_user',
        'populasi_awal',
        'alamat_kandang'
    ];

    protected $guarded = [
        'id_kandang'
    ];

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function DataKandang(){
        return $this->hasMany(DataKandang::class, 'id_kandang', 'id');
    }

    public function AmoniakSensors(){
        return $this->hasMany(AmoniakSensor::class, 'id_kandang', 'id');
    }

    public function SuhuKelembabanSensors(){
        return $this->hasMany(SuhuKelembabanSensor::class, 'id_kandang', 'id');
    }

    public function Panen(){
        return $this->hasMany(Panen::class, 'id_kandang', 'id');
    }
}