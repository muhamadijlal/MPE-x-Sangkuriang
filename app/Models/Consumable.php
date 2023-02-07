<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    protected $table = 'consumable';
    protected $fillable = ['transaksi_id','nama','qty','harga','satuan'];

    protected function transaksi(){
        return $this->belongsTo(Transaksi::class, 'id');
    }
}
