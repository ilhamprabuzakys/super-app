<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kecamatan extends Model
{
    use HasFactory;
    protected $table = 'kecamatan';
    protected $guarded = ['id'];

    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class, 'kecamatan_id', 'id');
    }

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id', 'id');
    }

    public function karyawans()
    {
        return $this->hasMany(Karyawan::class);
    }
}
