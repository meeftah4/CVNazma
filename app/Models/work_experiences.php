<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class work_experiences extends Model
{
    /** @use HasFactory<\Database\Factories\WorkExperiencesFactory> */
    use HasFactory;

    protected $fillable = [
        'cvsy_id',
        'company_name',
        'role',
        'location',
        'start_date',
        'end_date',
        'description',
    ];
}
