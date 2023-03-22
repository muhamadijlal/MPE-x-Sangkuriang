<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operasional extends Model
{
    use HasFactory;

    protected $table = 'operasional';
    protected $guarded = ['id'];

    // Operasional belongsTo Transaksi
    public function transaksi(){
        return $this->belongsTo(Transaksi::class, 'transaksi_id');
    }
}
