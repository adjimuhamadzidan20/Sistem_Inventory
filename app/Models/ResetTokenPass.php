<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResetTokenPass extends Model
{
    use HasFactory;

    protected $fillable = ['email', 'token', 'created_at'];
    protected $table = 'password_reset_tokens';
    protected $primaryKey = 'email';

    public $timestamps = false;
}
