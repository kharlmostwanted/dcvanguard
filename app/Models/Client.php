<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

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
}
