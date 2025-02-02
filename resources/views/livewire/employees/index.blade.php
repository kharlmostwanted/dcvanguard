@section('page-title', 'Employees')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
      <div class="row d-md-flex justify-content-between align-items-center">
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
    <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-lg-0 mb-4">
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
              wire:model.live="expired"
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
              wire:model.live.debounce.500ms="resigned"
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
        <div class="card-header">
          <h4 class="mb-1">Employee List</h4>
        </div>
        <!-- table  -->
        <div class="table-responsive">
          <table class="table-centered mb-0 table text-nowrap">
            <thead>
              <tr>
                <th>STATUS</th>
                <th>NAME</th>
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
                  <td>{{ $employee->status }}</td>
                  <td>{{ $employee->name }}</td>
                  <td>{{ $employee->birth_date?->format('M d, Y') }}</td>
                  <td>{{ $employee->address }}</td>
                  <td>{{ $employee->contact_number }}</td>
                  <td>{{ $employee->sss_number }}</td>
                  <td>{{ $employee->philhealth_number }}</td>
                  <td>{{ $employee->pagibig_number }}</td>
                  <td>{{ $employee->tin_number }}</td>
                  <td>{{ $employee->license_number }}</td>
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
