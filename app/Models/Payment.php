<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    public $fillable = [
        'billing_id',
        'amount',
        'or_number',
        'received_at',
        'check_number',
        'check_bank',
        'check_date',
    ];

    public function billing()
    {
        return $this->belongsTo(Billing::class);
    }
}
