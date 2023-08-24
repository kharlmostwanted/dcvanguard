@section('page-title', 'Billings')
<div class="container">
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
            <option selected value="">Sort By</option>
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
              wire:model="paid"
              type="checkbox"
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
              wire:model="unpaid"
              type="checkbox"
            >
            <label
              class="form-check-label"
              for="unpaid"
            >Unpaid</label>
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
                    </div>
                  </td>
                  <td class="text-end">
                    {{ number_format($billing->totalAmount, 2) }}
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
@endpush
