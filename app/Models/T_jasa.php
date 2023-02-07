<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_jasa extends Model
{
    use HasFactory;

    protected $table = 't_jasa';
    protected $fillable = ['transaksi_id','jasa_id','qty'];

    protected function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id');
    }

    protected function jasa(){
        return $this->belongsTo(Jasa::class, 'id');
    }
}
