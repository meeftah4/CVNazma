<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transactions extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'cvsy_id',
        'id_order',
        'gross_amount',
        'payment_method',
        'transaction_status',
        'fraud_status',
        'transaction_id',
        'status_code',
        'signature_key',
        'currency',
        'transaction_time',
        'callback_url',
        'is_subscription',
        'remaining_uses',
    ];

    public $incrementing = false;
    protected $keyType = 'string';

    public function cvsy()
    {
        return $this->belongsTo(\App\Models\Cvs_Users::class, 'cvsy_id');
    }
}
