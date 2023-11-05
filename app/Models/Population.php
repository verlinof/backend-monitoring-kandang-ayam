<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Population extends Model
{
    use HasFactory;

    protected $fillable = [
        'populasi',
        'total_kematian'
    ];

    public function Kandang()
    {
        return $this->belongsTo(Kandang::class, 'id_kandang', 'id');
    }
    public function DataKematian()
    {
        return $this->hasMany(DataKematian::class, 'id_population', 'id');
    }
}