<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kandang;
use App\Models\DataKematian;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKandang extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kandang',
        'hari_ke',
        'kematian',
        'pakan',
        'minum',
        'id_user',
    ];

    protected $guarded = [
        'id_data_kandang'
    ];

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function Kandang(){
        return $this->belongsToMany(Kandang::class, 'id_kandang', 'id_user');
    }

    public function DataKematian(){
        return $this->hasMany(DataKematian::class);
    }
}