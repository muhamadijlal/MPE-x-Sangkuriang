<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subtotal extends Model
{
    use HasFactory;

    protected $table = 'subtotal';
    protected $fillable = ['transaksi_id','total_harga_sparepart','total_harga_jasa','total_harga_consumable','total_harga'];

    protected function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id');
    }
}