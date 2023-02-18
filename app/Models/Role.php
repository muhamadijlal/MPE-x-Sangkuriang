<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use ReturnTypeWillChange;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $fillable = ['jenis','upah','keterangan'];

    protected function karyawan(){
        return $this->hasMany(Karyawan::class, 'id');
    }
}
