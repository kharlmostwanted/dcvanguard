<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;

class Show extends Component
{
    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = Employee::withCasts([
            'birth_date' => 'date',
            'employed_at' => 'datetime',
            'expired_at' => 'datetime',
        ])->find($employee->id);
    }

    public function render()
    {
        return view('livewire.employees.show');
    }
}
