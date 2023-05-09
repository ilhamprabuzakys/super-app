<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kota extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    
    public function kecamatans()
    {
        return $this->hasMany(Kecamatan::class);
    }
    public function users()
    {
        return $this->hasMany(Kecamatan::class);
    }
}
