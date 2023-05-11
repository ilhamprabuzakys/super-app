<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'karyawan';

    public function kota()
    {
        return $this->belongsTo(Kota::class, 'kota_id', 'id');
    }

    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class, 'kecamatan_id', 'id');
    }

    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class, 'kelurahan_id', 'id');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
    

}
