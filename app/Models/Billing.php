<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Billing extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $casts = [
        // 'start_date' => 'date',
        // 'end_date' => 'date',
        // 'due_at' => 'date',
    ];

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function items()
    {
        return $this->belongsToMany(Item::class, 'billing_item')->withPivot('price');
    }

    public function client()
    {
        return $this->belongsTo(Client::class);
    }

    public function getIsPaidAttribute()
    {
        return $this->payments()->sum('amount') == $this->items->sum('pivot.price') && $this->payments()->sum('amount') > 0;
    }

    public function getTotalAmountAttribute()
    {
        return $this->items->sum('pivot.price');
    }

    public function scopePaid($query)
    {
        return $query->whereHas('payments');
    }

    public function scopeUnpaid($query)
    {
        return $query->whereDoesntHave('payments');
    }
}
