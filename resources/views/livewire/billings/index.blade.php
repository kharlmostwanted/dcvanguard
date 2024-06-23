@section('page-title', 'Billings')
<div class="container-fluid">
  <div class="row g-3 mb-4">
    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
      <!-- card -->
      <div class="card">
        <!-- card body -->
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between lh-1 mb-3">
            <div>
              <span class="fs-6 text-uppercase fw-semibold">Total Collectible</span>
            </div>
            <div>
              <span class="fe fe-book-open fs-3 text-primary"></span>
            </div>
          </div>
          <h2 class="fw-bold mb-1">
            {{ number_format($this->billings()->sum('total_price'), 2) }}
          </h2>
          {{-- <span class="text-danger fw-semibold">{{ $this->billings->where('balance', '>', 0)->count() }}</span>
          <span class="fw-medium ms-1">Billings</span> --}}
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-md-12 col-12">
      <!-- card -->
      <div class="card">
        <!-- card body -->
        <div class="card-body">
          <div class="d-flex align-items-center justify-content-between lh-1 mb-3">
            <div>
              <span class="fs-6 text-uppercase fw-semibold">Total Collection</span>
            </div>
            <div>
              <span class="fe fe-shopping-bag fs-3 text-primary"></span>
            </div>
          </div>
          <h2 class="fw-bold mb-1">
            {{ number_format($this->payments()->sum('amount'), 2) }}
          </h2>
          {{-- <span class="text-success fw-semibold">
            <i class="fe fe-trending-up me-1"></i>{{ $this->payments()->count() }}</span>
          <span class="fw-medium ms-1">Payments</span> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
      <div class="row d-md-flex justify-content-between align-items-center">
        <div class="col-md-6 col-lg-8 col-xl-9">
          <h4 class="mb-md-0 mb-3">Displaying {{ $this->billings->count() }} out of {{ $this->totalBillings }} billings
          </h4>
        </div>
        <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3">
          <!-- Search input -->
          <input
            class="form-control me-2"
            id="search-input"
            placeholder="Search billings"
            type="search"
            wire:model.debounce.500ms="search"
          >
          <!-- Sort -->
          <select
            aria-label="Default select example"
            class="form-select"
            data-width="100%"
            wire:model.debounce.500ms="orderBy"
          >
            <option
              selected
              value=""
            >Sort By</option>
            @foreach ($this->orderByableColumns as $column => $alias)
              <option value="{{ $column }}">{{ $alias }}</option>
            @endforeach
          </select>
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
          <span class="dropdown-header mb-2 px-0"> Category</span>
          <!-- Checkbox -->
          <div class="form-check mb-1">
            <input
              class="form-check-input"
              id="paid"
              type="checkbox"
              wire:model="paid"
            >
            <label
              class="form-check-label"
              for="paid"
            >Paid</label>
          </div>
          <!-- Checkbox -->
          <div class="form-check mb-1">
            <input
              class="form-check-input"
              id="unpaid"
              type="checkbox"
              wire:model="unpaid"
            >
            <label
              class="form-check-label"
              for="unpaid"
            >Unpaid</label>
          </div>
        </div>
        <div class="card-body border-top">
          <span class="dropdown-header mb-2 px-0">Due Date:</span>
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
          <h4 class="mb-1">Billing List</h4>
        </div>
        <!-- table  -->
        <div class="table-responsive">
          <table class="text-nowrap table-centered mb-0 table">
            <thead>
              <tr>
                <th>Actions</th>
                <th>#</th>
                <th>Status</th>
                <th>Name</th>
                <th>Amount</th>
                <th>Paid</th>
                <th>Guards</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($this->billings as $billing)
                <tr>
                  <td>
                    <div class="dropdown">
                      <a
                        aria-expanded="false"
                        aria-haspopup="true"
                        class="text-muted text-primary-hover"
                        data-bs-toggle="dropdown"
                        href="#"
                        id="dropdownBilling{{ $billing->id }}"
                        role="button"
                      >
                        <i class="fe fe-more-vertical"></i>
                      </a>
                      <div
                        aria-labelledby="dropdownBilling{{ $billing->id }}"
                        class="dropdown-menu"
                      >
                        <a
                          class="dropdown-item"
                          href="{{ route('billings.show', $billing) }}"
                        >View</a>
                      </div>
                    </div>
                  </td>
                  <td>
                    {{ $billing->id }}
                  </td>
                  <td>
                    @if ($billing->is_paid)
                      <span class="badge bg-success">Paid</span>
                    @else
                      <span class="badge bg-danger">Unpaid</span>
                    @endif
                  </td>
                  <td>
                    <div class="d-flex flex-column">
                      <strong>{{ $billing->client->company_name }}</strong>
                      <small>{{ $billing->client->representative->name }}</small>
                      @if ($billing->client->trashed())
                        <span class="badge bg-danger">Deleted Client</span>
                      @endif
                    </div>
                  </td>
                  <td class="text-end">
                    {{ number_format($billing->total_price, 2) }}
                  </td>
                  <td class="text-end">
                    {{ number_format($billing->paid, 2) }}
                  </td>
                  <td class="text-end">
                    {{ $billing->number_of_guards }}
                  </td>
                  <td>
                    {{ $billing->start_date->format('M d, Y') }} - {{ $billing->end_date->format('M d, Y') }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
      <div class="d-flex justify-content-end mt-4">
        {{ $this->billings->links() }}
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
