<?php

namespace App\Http\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search', 'employedFrom', 'employedTo', 'expired', 'resigned'];

    public $search;
    public $employedFrom;
    public $employedTo;
    public $expired;
    public $resigned;

    public function render()
    {
        return view('livewire.employees.index');
    }

    public function employees()
    {
        return Employee::query()
            ->withCasts([
                'birth_date' => 'date',
                'employed_at' => 'datetime',
                'expired_at' => 'datetime',
            ])->when(!empty($this->search), function ($query) {
                $query->whereAny([
                    'first_name',
                    'middle_name',
                    'last_name',
                    'name',
                    'birth_date',
                    'employed_at',
                    'status',
                ], 'like', $this->search . '%');
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
        return $this->employees()
            ->paginate(10);
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
