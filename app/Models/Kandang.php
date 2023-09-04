<?php

namespace App\Models;

use App\Models\User;
use App\Models\DataSensor;
use App\Models\DataKandang;
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
        return $this->belongsTo(User::class);
    }

    public function DataKandang(){
        return $this->hasMany(DataKandang::class);
    }

    public function DataSensor(){
        return $this->hasMany(DataSensor::class);
    }

}