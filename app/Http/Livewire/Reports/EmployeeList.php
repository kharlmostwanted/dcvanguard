<?php

namespace App\Http\Livewire\Reports;

use Livewire\Component;
use App\Models\Employee;

class EmployeeList extends Component
{
    protected $queryString = ['search', 'employedFrom', 'employedTo', 'expired', 'resigned'];

    public $search;
    public $employedFrom;
    public $employedTo;
    public $expired;
    public $resigned;

    public function render()
    {
        return view('livewire.reports.employee-list')->layout('layouts.print');
    }

    public function employees()
    {
        return Employee::query()
            ->withCount('violations')
            ->withCasts([
                'birth_date' => 'date',
                'employed_at' => 'datetime',
                'expired_at' => 'datetime',
                'resigned_at' => 'datetime',
            ])->when(!empty(str($this->search)->trim()), function ($query) {
                $query->whereAny([
                    'first_name',
                    'middle_name',
                    'last_name',
                    'name',
                    'birth_date',
                    'employed_at',
                    'address',
                    'contact_number',
                    'sss_number',
                    'philhealth_number',
                    'pagibig_number',
                    'tin_number',
                    'license_number',
                    'status',
                    'id_number',
                    'address',
                ], 'like', str($this->search)->trim() . '%');
            })->when(!empty($this->employedFrom), function ($query) {
                $query->where('employed_at', '>=', $this->employedFrom);
            })->when(!empty($this->employedTo), function ($query) {
                $query->where('employed_at', '<=', $this->employedTo);
            })->when($this->resigned == 'resigned', function ($query) {
                $query->where('status', 'resigned');
            })->when($this->expired == 'true', function ($query) {
                $query->where('expired_at', '<=', now());
            })
            ->orderBy('name');
    }

    public function getEmployeesProperty()
    {
        return $this->employees()->get();
    }
}
