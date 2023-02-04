<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kwitansi extends Model
{
    use HasFactory;

    protected $table = 'kwitansi';
    protected $fillable = ['transaksi_id','filename'];

    protected function transaksi(){
        return $this->hasOne(Transaksi::class, 'transaksi_id');
    }
}
