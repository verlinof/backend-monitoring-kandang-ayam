<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable=[
        'id_kandang',
        'message'
    ];

    public $timestamps=false;

    public function Kandangs() {
        return $this->belongsTo(Kandang::class);
    }
}
