<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = ['id'];

    protected function t_jasa(){
        return $this->hasMany(T_jasa::class, 'id');
    }

    protected function t_sparepart(){
        return $this->hasMany(T_sparepart::class, 'id');
    }

    protected function consumable(){
        return $this->hasMany(consumable::class, 'id');
    }
}
