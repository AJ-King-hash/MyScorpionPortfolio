<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PasswordResetOtp extends Model
{
    protected $fillable = ['email', 'otp', 'expires_at'];
    public function user() {
        return $this->belongsTo(User::class, 'email', 'email');
    }   
}
