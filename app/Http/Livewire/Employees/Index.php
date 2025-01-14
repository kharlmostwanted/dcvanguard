<?php

namespace App\Http\Livewire\Employees;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search;

    public function render()
    {
        return view('livewire.employees.index');
    }

    public function employees()
    {
        return Employee::query()
            ->withCasts([
                'birth_date' => 'date',
                'hired_at' => 'datetime',
                'started_at' => 'datetime',
                'resigned_at' => 'datetime',
            ])->when(!empty($this->search), function ($query) {
                $query->whereAny([
                    'first_name',
                    'middle_name',
                    'last_name',
                    'name',
                    'birth_date',
                    'hired_at',
                    'started_at',
                    'resigned_at',
                    'status',
                ], 'like', $this->search . '%');
            })->orderBy('name');
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
