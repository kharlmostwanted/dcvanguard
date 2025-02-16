<?php

namespace App\Http\Livewire\Employees;

use Livewire\Component;
use App\Models\Employee;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Show extends Component
{
    use LivewireAlert;
    public Employee $employee;

    public function mount(Employee $employee)
    {
        $this->employee = Employee::with('violations')
            ->withCasts([
                'birth_date' => 'date',
                'employed_at' => 'datetime',
                'expired_at' => 'datetime',
            ])->find($employee->id);
    }

    public function render()
    {
        return view('livewire.employees.show');
    }

    public function removeViolation($violationId)
    {
        $this->employee->violations()->detach($violationId);
        $this->employee = Employee::with('violations')
            ->withCasts([
                'birth_date' => 'date',
                'employed_at' => 'datetime',
                'expired_at' => 'datetime',
            ])->find($this->employee->id);

        $this->alert('success', 'Violation removed successfully.');
    }
}
