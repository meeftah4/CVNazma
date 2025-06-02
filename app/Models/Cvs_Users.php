<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cvs_Users extends Model
{
    /** @use HasFactory<\Database\Factories\CvsUsersFactory> */
    use HasFactory;

    protected $table = 'cvs_users';

    protected $fillable = [
        'user_id', 'name', 'email', 'phone', 'address',
        'linkedin', 'website', 'description', 'cv_picture'
    ];
}
