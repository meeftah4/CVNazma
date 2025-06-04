<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class hobbies extends Model
{
    use HasFactory;

    protected $fillable = [
        'cvsy_id',
        'hobby',
    ];
}
