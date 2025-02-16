<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Employee extends Model
{
    use HasFactory;
    use HasRoles;

    protected $fillable = [
        'last_name',
        'first_name',
        'middle_name',
        'name',
        'birth_date',
        'address',
        'contact_number',
        'sss_number',
        'philhealth_number',
        'pagibig_number',
        'tin_number',
        'license_number',
        'expired_at',
        'employed_at',
        'status',
        'id_number',
    ];

    public function violations()
    {
        return $this->belongsToMany(Violation::class)
            ->withPivot('committed_at', 'creator_id', 'updator_id');
    }
}
