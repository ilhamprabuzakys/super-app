<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Log;
use App\Models\Karyawan;
use Fouladgar\OTP\Concerns\HasOTPNotify;
use Fouladgar\OTP\Contracts\OTPNotifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements OTPNotifiable
{
    use HasApiTokens, HasFactory, Notifiable, HasOTPNotify;

    protected $guarded = ['id'];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /* public function loggings()
    {
        return $this->belongsToMany(Log::class, 'logging_users', 'user_id', 'log_id');
    } */

    public function loggings()
    {
        return $this->hasMany(Log::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    

}
