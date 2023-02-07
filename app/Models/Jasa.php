<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $table = 'jasa';
    protected $fillable = ['nama','deskripsi','qty','satuan','harga'];

    protected function t_jasa(){
        return $this->hasMany(T_jasa::class, 'jasa_id');
    }
}
