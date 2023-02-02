<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_Karyawan extends Model
{
    use HasFactory;

    protected $table = 't_karyawan';
    protected $fillable = ['transaksi_id','karyawan_id'];

    protected function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }

    protected function karyawan(){
        return $this->belongsTo(Karyawan::class, 'karyawan_id');
    }
}
