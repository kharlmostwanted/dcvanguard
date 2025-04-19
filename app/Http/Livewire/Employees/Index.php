<?php

namespace App\Http\Livewire\Employees;

use App\Models\Employee;
use App\Models\Image;
use Illuminate\Support\Carbon;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Validator;
use App\Models\Violation;
use Livewire\WithFileUploads;

class Index extends Component
{
    use WithPagination;
    use LivewireAlert;
    use WithFileUploads;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search', 'employedFrom', 'employedTo', 'expired', 'resigned'];

    public $search;
    public $employedFrom;
    public $employedTo;
    public $expired;
    public $resigned;
    public $violation;
    public $committed_at;
    public $profilePicture;

    public $employee;

    public function render()
    {
        return view('livewire.employees.index');
    }

    public function employees()
    {
        return Employee::query()
            ->withCount('violations')
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

    public function addViolation($id)
    {
        $this->employee = Employee::withCasts([
            'birth_date' => 'date:Y-m-d',
            'employed_at' => 'date:Y-m-d',
            'expired_at' => 'date:Y-m-d',
        ])->find($id)->toArray();
    }

    public function storeViolation()
    {
        Validator::make([
            'violation' => $this->violation,
            'committed_at' => $this->committed_at
        ], [
            'violation' => 'required',
            'committed_at' => 'required|date'
        ])->validate();

        $violation = Violation::firstOrCreate([
            'title' => str($this->violation)->trim(),
        ]);

        $employee = Employee::findorFail($this->employee['id']);

        $employee->violations()->attach($violation->id, [
            'committed_at' => Carbon::parse($this->committed_at),
            'creator_id' => auth()->id()
        ]);

        $this->alert('success', 'Violation added successfully.');
    }

    public function editProfilePicture($id)
    {
        $this->employee = Employee::withCasts([
            'birth_date' => 'date:Y-m-d',
            'employed_at' => 'date:Y-m-d',
            'expired_at' => 'date:Y-m-d',
        ])->find($id)->toArray();
    }

    public function updatedProfilePicture()
    {
        Validator::make([
            'profilePicture' => $this->profilePicture
        ], [
            'profilePicture' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ])->validate();
    }

    public function updateProfilePicture()
    {
        $image = new Image();
        $image->file_name = $this->profilePicture->getClientOriginalName();
        $image->original_name = $this->profilePicture->getClientOriginalName();
        $image->path = $this->profilePicture->storeAs('profile_images', $this->employee['id'] . '.' . $this->profilePicture->extension());
        $image->extension = $this->profilePicture->extension();
        $image->save();

        $employee = Employee::findorFail($this->employee['id']);
        $employee->profile_img_id = $image->id;
        $employee->save();
        $this->alert('success', 'Profile picture updated successfully.');
    }
}
