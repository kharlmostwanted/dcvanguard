<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->belongsToMany(Item::class, 'billing_item')->withPivot('amount');
    }
}
