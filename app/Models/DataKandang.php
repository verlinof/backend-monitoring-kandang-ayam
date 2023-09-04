<?php

namespace App\Models;

use App\Models\User;
use App\Models\Kandang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataKandang extends Model
{
    use HasFactory;

    public function User(){
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    public function Kandang(){
        return $this->belongsToMany(Kandang::class, 'id_kandang', 'id_user');
    }
}