<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;

    protected $table = 'jasa';
    protected $guarded = ['id'];

    protected function t_jasa(){
        return $this->hasMany(T_jasa::class, 'id');
    }
}