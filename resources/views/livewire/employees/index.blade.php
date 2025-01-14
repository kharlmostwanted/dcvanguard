@section('page-title', 'Employees')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
      <div class="row d-md-flex justify-content-between align-items-center">
        <div class="col-md-6 col-lg-8 col-xl-9">
          <h4 class="mb-md-0 mb-3">Displaying {{ ($this->employees->currentPage()*10) - 9 }} - {{ $this->employees->count() * $this->employees->currentPage() }} of {{ $this->employees->total() }}
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
    <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h4 class="mb-0">Filter</h4>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <span class="dropdown-header mb-2 px-0">Date Started:</span>
          <div class="row row-cols-2 justify-content-end mb-5">
            <div class="col">
              <input
                class="form-control flatpickr"
                id="dueDateFrom"
                name="dueDateFrom"
                placeholder="select start date"
                type="text"
                wire:model="dueDateFrom"
              >
            </div>
            <div class="col">
              <input
                class="form-control flatpickr"
                id="dueDateTo"
                name="dueDateTo"
                placeholder="select end date"
                type="text"
                wire:model="dueDateTo"
              >
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-8 col-12">
      <div class="card">
        <!-- card header  -->
        <div class="card-header">
          <h4 class="mb-1">Employee List</h4>
        </div>
        <!-- table  -->
        <div class="table-responsive">
          <table class="table-centered mb-0 table text-nowrap">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Roles</th>
                <th>Date Hired</th>
                <th>Date Started</th>
                <th>Status</th>
                <th>Date Resigned</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($this->employees as $employee)
                <tr>
                  <td>{{ $employee->id }}</td>
                  <td>{{ $employee->name }}</td>
                  <td>{{ $employee->roles()->pluck('name')->implode(',') }}</td>
                  <td>{{ $employee->hired_at->format('m-d-Y') }}</td>
                  <td>{{ $employee->started_at->format('m-d-Y') }}</td>
                  <td>{{ $employee->status }}</td>
                  <td>{{ $employee->resigned_at?->format('m-d-Y')?? '-' }}</td>
                </tr>
              @empty
                <tr>
                  <td colspan="7" class="text-center">No Employees Found</td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>

      </div>
      <div class="d-flex justify-content-end mt-4">
        {{ $this->employees->links() }}
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
