<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    use HasFactory;
    protected $table = 'sparepart';
    protected $fillable = ['nama','merek','type','satuan','qty','harga'];

    protected function t_sparepart(){
        return $this->hasMany(T_sparepart::class ,'id');
    }
}
