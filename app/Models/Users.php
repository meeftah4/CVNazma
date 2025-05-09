<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable; // Gunakan Authenticatable

class Users extends Authenticatable // Warisi Authenticatable
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'username',
        'address',
        'telephone',
        'bio',
        'profile_picture',
        'profile_sampul',
        'role',
        'profile_link',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];
}