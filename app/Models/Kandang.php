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
        'populasi'
    ];

    protected $guarded = [
        'id_kandang'
    ];

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id');
    }

    public function DataKandang(){
        return $this->hasMany(DataKandang::class);
    }

    public function AmoniakSensors(){
        return $this->hasMany(AmoniakSensor::class);
    }

    public function SuhuKelembabanSensors(){
        return $this->hasMany(SuhuKelembabanSensor::class);
    }

    public function Panen(){
        return $this->hasMany(Panen::class);
    }
}