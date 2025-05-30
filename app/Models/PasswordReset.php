<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PasswordReset extends Model
{
    use HasFactory;

    protected $fillable = [
        'userId',
        'token',
        'reset_otp_expires_at'
    ];

    // Define table name
    protected $table = 'password_resets';

    // Disable timestamps if not used
    public $timestamps = false;
}
