<?php

namespace App\Models;

use App\Models\User;
use App\Models\Panen;
use App\Models\DataKandang;
use App\Models\AmoniakSensor;
use App\Models\SuhuKelembabanSensor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Kandang extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'nama_kandang',
        'id_user',
        'alamat_kandang',
        'luas_kandang'
    ];

    protected $guarded = [
        'id_kandang'
    ];

    public function User(): BelongsTo
    {
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

    public function panens()
    {
        return $this->hasMany(Panen::class, 'id_kandang', 'id');
    }
    public function populations()
    {
        return $this->hasMany(Population::class,'id_kandang','id');
    }
    public function RekapDataHarians() {
        return $this->hasMany(RekapDataHarian::class,'id_kandang','id');
    }
    public function RekapDatas() {
        return $this->hasMany(RekapData::class,'id_kandang','id');
    }
}
