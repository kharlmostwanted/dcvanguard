<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Client extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function representative()
    {
        return $this->belongsTo(User::class, 'representative_id');
    }

    public function scopeSearch($query, $term)
    {
        $term = "%$term%";

        $query->where(function ($query) use ($term) {
            $query->where('company_name', 'like', $term)
                ->orWhereRelation('representative', 'name', 'like', $term)
                ->orWhereRelation('representative', 'email', 'like', $term);
        });
    }

    public function billings()
    {
        return $this->hasMany(Billing::class);
    }

    public function payments()
    {
        return $this->hasManyThrough(Payment::class, Billing::class);
    }

    public function scopeInGoodStanding($query, $asOf = null)
    {
        $query->whereDoesntHave('billings', function ($query) use ($asOf) {
            $query->unpaid()
                ->where('end_date', '>=', $asOf ?? now());
        });
    }

    public function scopeInBadStanding($query, $asOf = null)
    {
        $query->whereHas('billings', function ($query) use ($asOf) {
            $query->unpaid()
                ->where('end_date', '>=', $asOf ?? now());
        });
    }

    public function scopeWithBalance($query)
    {
        $query->addSelect([
            'balance' => Billing::selectRaw('sum(total_price)')
                ->unpaid()
                ->whereColumn('client_id', 'clients.id'),
        ]);
    }
}
