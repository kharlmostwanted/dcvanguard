@section('page-title', 'Employees')
<div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
        <div class="row d-md-flex justify-content-between align-items-center d-print-none">
          <div class="col-md-6 col-lg-8 col-xl-9">
            <h4 class="mb-md-0 mb-3">Displaying {{ $this->employees->currentPage() * 10 - 9 }} -
              {{ $this->employees->count() * $this->employees->currentPage() }} of {{ $this->employees->total() }}
              Employees
            </h4>
          </div>
          <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3">
            <!-- Search input -->
            <input
              class="form-control me-2"
              id="search-input"
              placeholder="Search Employees"
              type="search"
              wire:model.debounce.500ms="search"
            >
          </div>
        </div>
      </div>
      <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-lg-0 d-print-none mb-4">
        <!-- Card -->
        <div class="card">
          <!-- Card header -->
          <div class="card-header">
            <h4 class="mb-0">Filter</h4>
          </div>
          <!-- Card body -->
          <div class="card-body">
            <span class="dropdown-header mb-2 px-0">Date Employed:</span>
            <div class="row row-cols-2 justify-content-end">
              <div class="col">
                <input
                  class="form-control flatpickr"
                  id="employedFrom"
                  name="employedFrom"
                  placeholder="select start date"
                  type="text"
                  wire:model="employedFrom"
                >
              </div>
              <div class="col">
                <input
                  class="form-control flatpickr"
                  id="employedTo"
                  name="employedTo"
                  placeholder="select end date"
                  type="text"
                  wire:model="employedTo"
                >
              </div>
            </div>
          </div>
          <div class="card-body border-top">
            <span class="dropdown-header mb-2 px-0">Status</span>
            <div class="form-check">
              <input
                class="form-check-input"
                id="expired"
                type="checkbox"
                wire:model="expired"
              >
              <label
                class="form-check-label"
                for="expired"
              >
                Expired
              </label>
            </div>
            <div class="form-check">
              <input
                class="form-check-input"
                id="resigned"
                type="checkbox"
                value="resigned"
                wire:model.debounce.500ms="resigned"
              >
              <label
                class="form-check-label"
                for="resigned"
              >
                Resigned
              </label>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-9 col-lg-9 col-md-8 col-12">
        <div class="card">
          <!-- card header  -->
          <div class="card-header d-flex justify-content-between align-items-center">
            <h4 class="mb-1">Employee List</h4>
            <button
              class="btn btn-primary d-print-none"
              data-bs-target="#addEmployeeModal"
              data-bs-toggle="modal"
              wire:click="createEmployee"
            >
              <i class="fe fe-plus"></i>
              Add Employee
            </button>
          </div>
          <!-- table  -->
          <div class="table-responsive">
            <table class="table-centered mb-0 table text-nowrap">
              <thead>
                <tr>
                  <th class="d-print-none">&nbsp;</th>
                  <th>ID</th>
                  <th>STATUS</th>
                  <th>NAME</th>
                  <th>Violations</th>
                  <th>BIRTHDAY</th>
                  <th>ADDRESS</th>
                  <th>CONTACT NO.</th>
                  <th>SSS NO.</th>
                  <th>PHILHEALTH</th>
                  <th>PAG-IBIG NO.</th>
                  <th>TIN NUMBER</th>
                  <th>LICENSE</th>
                  <th>EXPIRY DATE</th>
                  <th>EMPLOYMENT DATE</th>
                </tr>
              </thead>
              <tbody>
                @forelse ($this->employees as $employee)
                  <tr>
                    <td class="d-print-none">
                      <div class="button-group">
                        <button
                          class="btn btn-sm btn-outline-primary"
                          data-bs-target="#addEmployeeModal"
                          data-bs-toggle="modal"
                          wire:click="editEmployee({{ $employee->id }})"
                        >
                          <i class="fe fe-edit-2"></i>
                        </button>
                        <button
                          class="btn btn-sm btn-outline-primary"
                          data-bs-target="#addViolationModal"
                          data-bs-toggle="modal"
                          wire:click="addViolation({{ $employee->id }})"
                        >
                          <i class="fe fe-plus"></i>
                        </button>
                      </div>
                    </td>
                    <td>{{ $employee->id_number }}</td>
                    <td>{{ $employee->status }}</td>
                    <td>
                      <a href="{{ route('employees.show', $employee) }}">
                        {{ $employee->name }}
                      </a>
                    </td>
                    <td class="text-center">{{ $employee->violations_count }}</td>
                    <td>{{ $employee->birth_date?->format('M d, Y') }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->contact_number }}</td>
                    <td>{{ $employee->sss_number }}</td>
                    <td>{{ $employee->philhealth_number }}</td>
                    <td>{{ $employee->pagibig_number }}</td>
                    <td>{{ $employee->tin_number }}</td>
                    <td>
                      <span @class(['badge', 'bg-danger' => $employee->expired_at?->isPast()])>
                        {{ $employee->license_number }}
                      </span>
                    </td>
                    <td class="text-center">
                      {{ $employee->expired_at?->format('m/d/Y') }}
                      @if ($employee->expired_at?->isPast())
                        <span class="badge bg-danger">Expired</span>
                      @else
                        {{ $employee->expired_at?->diffForHumans(now(), true, true) }}
                      @endif
                    </td>
                    <td class="text-center">
                      {{ $employee->employed_at?->format('m/d/Y') }}
                      @if (str($employee->status)->contains('resigned'))
                        <span class="badge bg-warning">Resigned</span>
                      @else
                        {{ $employee->employed_at?->diffForHumans(now(), true, true) }}
                      @endif
                    </td>
                  </tr>
                @empty
                  <tr>
                    <td
                      class="text-center"
                      colspan="7"
                    >No Employees Found</td>
                  </tr>
                @endforelse
              </tbody>
            </table>
          </div>

        </div>
        <div class="d-flex justify-content-end d-print-none mt-4">
          {{ $this->employees->links() }}
        </div>
      </div>
    </div>
  </div>

  {{-- add employee modal --}}
  <div
    aria-hidden="true"
    aria-labelledby="adEmployeeModalLabel"
    class="modal fade"
    id="addEmployeeModal"
    role="dialog"
    tabindex="-1"
    wire:ignore.self
  >
    <div
      class="modal-dialog modal-dialog-centered modal-lg"
      role="document"
      wire:ignore.self
    >
      <div class="modal-content">
        <div class="modal-header">
          <h5
            class="modal-title"
            id="adEmployeeModalLabel"
          >Employee Details</h5>
          <button
            aria-label="Close"
            class="btn-close"
            data-bs-dismiss="modal"
            type="button"
          >
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div
          class="modal-body"
          wire:loading.class="opacity-0"
        >
          <div class="row d-flex row-cols-auto g-2">
            <div class="col">
              <label
                class="form-label"
                for="employee.id_number"
              >ID</label>
              <x-inputs.text
                id="employee.id_number"
                label="ID Number"
                placeholder="ID Number"
                wire:model.defer="employee.id_number"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="employee.status"
              >Status</label>
              <x-inputs.text
                id="employee.status"
                label="status"
                placeholder="Status"
                wire:model.defer="employee.status"
              />
            </div>
          </div>
          <div class="row d-flex justify-content-between row-cols-auto g-2 mt-3">
            <div class="col">
              <label
                class="form-label"
                for="employee.last_name"
              >Last Name</label>
              <x-inputs.text
                id="employee.last_name"
                label="Last Name"
                placeholder="Last Name"
                wire:model.defer="employee.last_name"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="employee.first_name"
              >First Name</label>
              <x-inputs.text
                id="employee.first_name"
                label="First Name"
                placeholder="First Name"
                wire:model.defer="employee.first_name"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="employee.middle_name"
              >Middle Name</label>
              <x-inputs.text
                id="employee.middle_name"
                label="Middle Name"
                placeholder="Middle Name"
                wire:model.defer="employee.middle_name"
              />
            </div>
          </div>
          <div class="row row-cols-3 g-2 justify-content-between mt-3">
            <div class="col">
              <label
                class="form-label"
                for="employee.birth_date"
              >Date of Birth</label>
              <x-inputs.date
                id="employee.birth_date"
                label="Date of Birth"
                placeholder="Date of Birth"
                wire:model.defer="employee.birth_date"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="employee.expired_at"
              >Expiration</label>
              <x-inputs.date
                id="employee.expired_at"
                label="Expiration"
                placeholder="Expiration"
                wire:model.defer="employee.expired_at"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="employee.employed_at"
              >Employment Date</label>
              <x-inputs.date
                id="employee.employed_at"
                label="Employment Date"
                placeholder="Employment Date"
                wire:model.defer="employee.employed_at"
              />
            </div>
          </div>
          <div class="mt-3">
            <label
              class="form-label"
              for="employee.address"
            >Address</label>
            <x-inputs.text
              id="employee.address"
              label="Address"
              placeholder="Address"
              wire:model.defer="employee.address"
            />
          </div>
          <div class="row row-cols-auto justify-content-between mt-3">
            <div class="col">
              <label
                class="form-label"
                for="employee.contact_number"
              >Contact Number</label>
              <x-inputs.text
                id="employee.contact_number"
                label="Contact Number"
                placeholder="Contact Number"
                wire:model.defer="employee.contact_number"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="employee.sss_number"
              >SSS Number</label>
              <x-inputs.text
                id="employee.sss_number"
                label="SSS Number"
                placeholder="SSS Number"
                wire:model.defer="employee.sss_number"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="employee.philhealth_number"
              >Philhealth Number</label>
              <x-inputs.text
                id="employee.philhealth_number"
                label="Philhealth Number"
                placeholder="Philhealth Number"
                wire:model.defer="employee.philhealth_number"
              />
            </div>
          </div>
          <div class="row row-cols-auto justify-content-between mt-3">
            <div class="col">
              <label
                class="form-label"
                for="employee.pagibig_number"
              >Pag-ibig Number</label>
              <x-inputs.text
                id="employee.pagibig_number"
                label="Pag-ibig Number"
                placeholder="Pag-ibig Number"
                wire:model.defer="employee.pagibig_number"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="employee.tin_number"
              >TIN Number</label>
              <x-inputs.text
                id="employee.tin_number"
                label="TIN Number"
                placeholder="TIN Number"
                wire:model.defer="employee.tin_number"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="employee.license_number"
              >License Number</label>
              <x-inputs.text
                id="employee.license_number"
                label="License Number"
                placeholder="License Number"
                wire:model.defer="employee.license_number"
              />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            class="btn btn-secondary"
            data-bs-dismiss="modal"
            type="button"
          >Close</button>
          <button
            class="btn btn-primary"
            type="button"
            wire:click="saveEmployee"
          >Save changes</button>
        </div>
      </div>
    </div>
  </div>

  <div
    aria-hidden="true"
    aria-labelledby="addViolationModalLabel"
    class="modal fade"
    id="addViolationModal"
    role="dialog"
    tabindex="-1"
    wire:ignore.self
  >
    <div
      class="modal-dialog modal-dialog-centered"
      role="document"
    >
      <div class="modal-content">
        <div class="modal-header">
          <h5
            class="modal-title"
            id="addViolationModalLabel"
          >Add Violation</h5>
          <button
            aria-label="Close"
            class="btn-close"
            data-bs-dismiss="modal"
            type="button"
          >
            <span aria-hidden="true"></span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row row-cols-1 g-2">
            <div class="col">
              <label
                class="form-label"
                for="violation"
              >Violation</label>
              <x-inputs.text
                autocomplete="off"
                id="violation"
                label="Violation"
                placeholder="Violation"
                wire:model.defer="violation"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="committed_at"
              >Committed at:</label>
              <x-inputs.date
                id="committed_at"
                label="Commited at"
                placeholder="Commited at"
                wire:model.defer="committed_at"
              />
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button
            class="btn btn-secondary"
            data-bs-dismiss="modal"
            type="button"
          >Close</button>
          <button
            class="btn btn-primary"
            type="button"
            wire:click='storeViolation'
          >Add Violation</button>
        </div>
      </div>
    </div>
  </div>

</div>
@push('scripts')
  <script src="../assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>
  <script src="../assets/js/vendors/tooltip.js"></script>
  <script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
  <script src="{{ asset('/assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
  <script src="{{ asset('/assets/js/vendors/flatpickr.js') }}"></script>
@endpush
