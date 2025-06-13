<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Tambahkan jika Anda menggunakan factory
use Illuminate\Database\Eloquent\Model;

class Package extends Model // Ubah nama kelas ke Package
{
    // use HasFactory; // Aktifkan jika Anda menggunakan factory

    protected $fillable = [
        'name',
        'price',
        'amount',
        'original',
        'bonus',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'packages'; // Secara eksplisit mendefinisikan nama tabel jika diperlukan
}
