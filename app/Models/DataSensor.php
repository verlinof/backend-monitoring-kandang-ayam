<?php

namespace App\Models;

use App\Models\Kandang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kandang',
        'suhu',
        'kelembaban',
        'amoniak',
    ];

    protected $guarded = [
        'id_data_sensor',
        'classification'
    ];

    protected $cast = [
        'date' => 'datetime'
    ];

    public function Kandang(){
        return $this->belongsToMany(Kandang::class);
    }

}