<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Admin extends Auth
{
    use HasFactory;
    protected $fillable = [
        'email', 'phone', 'password',
    ];
}
