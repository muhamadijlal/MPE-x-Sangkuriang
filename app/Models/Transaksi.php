<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $fillable = ['nama','penanggung_jawab','lokasi','status_pengerjaan','status_pembayaran','perihal','tanggal'];

    protected function t_jasa(){
        return $this->hasMany(T_jasa::class, 'id');
    }

    protected function t_sparepart(){
        return $this->hasMany(T_sparepart::class, 'id');
    }

    protected function consumable(){
        return $this->hasMany(consumable::class, 'id');
    }

    protected function t_karyawan(){
        return $this->hasMany(T_Karyawan::class, 'id');
    }

    public function subtotal(){
        return $this->hasOne(Subtotal::class, 'id');
    }

    public function kwitansi(){
        return $this->hasOne(Kwitansi::class, 'id');
    }
}
