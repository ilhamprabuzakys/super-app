<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $table = 'kota';
    protected $guarded = ['id'];
    
    public function kecamatans()
    {
        return $this->hasMany(Kecamatan::class);
    }

    // public function negara()
    // {
    //     return $this->belongsTo(Negara::class);
    // }
    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
