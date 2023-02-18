<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawan';
    protected $fillable = ['role_id','nama','alamat','telepon'];

    protected function role(){
        return $this->belongsTo(Role::class, 'role_id');
    }

    protected function t_karyawan(){
        return $this->hasMany(T_Karyawan::class, 'karyawan_id');
    }
}
