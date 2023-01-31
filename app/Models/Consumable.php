<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    protected $table = 'consumable';
    protected $guarded = ['id'];

    protected function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
}