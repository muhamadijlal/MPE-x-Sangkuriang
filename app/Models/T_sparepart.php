<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_sparepart extends Model
{
    use HasFactory;

    protected $table = 'T_sparepart';
    protected $fillable = ['transaksi_id','sparepart_id','qty'];

    protected function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id');
    }

    protected function sparepart(){
        return $this->belongsTo(Sparepart::class, 'sparepart_id');
    }
}
