<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class educations extends Model
{
    use HasFactory;

    protected $fillable = [
        'cvsy_id',
        'institution',
        'degree',
        'start_date',
        'end_date',
        'description',
    ];
}
