<?php

namespace App\Http\Livewire\Employees;

use App\Models\Employee;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search', 'employedFrom', 'employedTo', 'expired', 'resigned'];

    public $search;
    public $employedFrom;
    public $employedTo;
    public $expired;
    public $resigned;

    public $employee;

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

    public function createEmployee()
    {
        $this->employee = [];
    }

    public function saveEmployee()
    {
        $this->validate([
            'employee.first_name' => 'required',
            'employee.last_name' => 'required',
            'employee.birth_date' => 'required|date',
            'employee.employed_at' => 'required|date',
            'employee.expired_at' => 'required|date',
        ], [
            'employee.first_name.required' => 'First name is required.',
            'employee.last_name.required' => 'Last name is required.',
            'employee.birth_date.required' => 'Birth date is required.',
            'employee.birth_date.date' => 'Birth date must be a valid date.',
            'employee.employed_at.required' => 'Employed date is required.',
            'employee.employed_at.date' => 'Employed date must be a valid date.',
            'employee.expired_at.required' => 'Expired date is required.',
            'employee.expired_at.date' => 'Expired date must be a valid date.',
        ]);

        $this->employee['name'] = $this->employee['last_name'] . ' ' . $this->employee['first_name'] . ' ' . $this->employee['middle_name'];
        $this->employee['birth_date'] = Carbon::parse($this->employee['birth_date'])->format('Y-m-d');
        $this->employee['employed_at'] = Carbon::parse($this->employee['employed_at'])->format('Y-m-d');
        $this->employee['expired_at'] = Carbon::parse($this->employee['expired_at'])->format('Y-m-d');
        $employee = Employee::updateOrCreate(['id' => $this->employee['id'] ?? null], $this->employee);
        $this->employee['id'] = $employee->id;

        $this->alert('success', 'Employee saved successfully.');
    }

    public function editEmployee($id)
    {
        $this->employee = Employee::withCasts([
            'birth_date' => 'date:Y-m-d',
            'employed_at' => 'date:Y-m-d',
            'expired_at' => 'date:Y-m-d',
        ])->find($id)->toArray();
    }
}
