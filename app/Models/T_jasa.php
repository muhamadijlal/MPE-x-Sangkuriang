<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_jasa extends Model
{
    use HasFactory;

    protected $table = 't_jasa';
    protected $guarded = ['id'];

    protected function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    protected function jasa(){
        return $this->hasMany(Jasa::class, 'jasa_id');
    }
}
