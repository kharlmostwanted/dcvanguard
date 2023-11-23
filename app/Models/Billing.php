<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;

class Billing extends Model
{
    use HasFactory;
    use SoftDeletes;

    public $fillable = [
        'total_price',
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
        return $this->belongsTo(Client::class)->withTrashed();
    }

    public function getIsPaidAttribute()
    {
        return $this->payments->sum('amount') >= $this->total_price;
    }

    public function getPaymentStatusAttribute()
    {
        $totalPayment = $this->payments->sum('amount');
        if ($totalPayment == $this->total_price) {
            return 'Paid';
        } else if ($totalPayment > 0 && $totalPayment > $this->total_price) {
            return 'Overpaid';
        } else if ($totalPayment > 0 && $totalPayment < $this->total_price) {
            return 'Partial';
        } else {
            return 'Unpaid';
        }
    }

    public function getTotalPaymentAttribute()
    {
        return $this->payments->sum('amount');
    }

    public function getBalanceAttribute()
    {
        return $this->total_price - $this->total_payment;
    }

    public function getPaymentPercentageAttribute()
    {
        return ($this->payments()->sum('amount') / $this->total_price) * 100;
    }

    public function getTotalAmountAttribute()
    {
        return $this->items->sum('pivot.price');
    }

    public function scopePaid($query)
    {
        $query->whereHas('payments');
    }

    public function scopePartiallyPaid($query)
    {
        return $query->select('billings.*')
            ->leftJoin('payments', 'billings.id', '=', 'payments.billing_id')
            ->groupBy('billings.id')
            ->havingRaw('SUM(payments.amount) > 0 AND SUM(payments.amount) < billings.total_price');
    }

    public function scopeFullyPaid($query)
    {
        return $query->whereRaw('(select sum(amount) from payments where payments.billing_id = billings.id) >= billings.total_price');
    }

    public function scopeOverPaid($query)
    {
        return $query->select('billings.*')
            ->leftJoin('payments', 'billings.id', '=', 'payments.billing_id')
            ->groupBy('billings.id')
            ->havingRaw('SUM(payments.amount) > billings.total_price');
    }

    public function scopeUnpaid($query)
    {
        return $query->whereDoesntHave('payments');
    }

    public function scopeSearch($query, $term)
    {
        return $query->whereRelation('client', 'company_name', 'like', '%' . $term . '%')
            ->orWhereHas('client', function ($query) use ($term) {
                $query->whereRelation('representative', 'name', 'like', '%' . $term . '%');
            });
    }
}
