<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_sparepart extends Model
{
    use HasFactory;

    protected $table = 'T_sparepart';
    protected $guarded = ['id'];

    protected function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    protected function sparepart(){
        return $this->hasMany(Sparepart::class, 'sparepart_id');
    }
}
