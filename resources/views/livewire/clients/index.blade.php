@section('page-title', 'Clients')
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
      <div class="row d-md-flex justify-content-between align-items-center">
        <div class="col-md-6 col-lg-8 col-xl-9">
          <h4 class="mb-md-0 mb-3">Displaying {{ $this->clients->count() }} out of {{ $this->totalClients }} clients</h4>
        </div>
        <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3">
          <!-- Search input -->
          <input
            class="form-control me-2"
            id="search-input"
            placeholder="Search Clients"
            type="search"
            wire:model.debounce.500ms="search"
          >
          <!-- Sort -->
          <select
            aria-label="Default select example"
            class="form-select"
            data-width="100%"
          >
            <option selected>Sort By</option>
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
              id="sketchCheck"
              type="checkbox"
            >
            <label
              class="form-check-label"
              for="sketchCheck"
            >Paid</label>
          </div>
          <!-- Checkbox -->
          <div class="form-check mb-1">
            <input
              class="form-check-input"
              id="HTML5Check"
              type="checkbox"
            >
            <label
              class="form-check-label"
              for="HTML5Check"
            >Unpaid</label>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-9 col-lg-9 col-md-8 col-12">
      <div class="card">
        <!-- card header  -->
        <div class="card-header">
          <h4 class="mb-1">Client List</h4>
        </div>
        <!-- table  -->
        <div class="table-responsive">
          <table class="text-nowrap table-centered mb-0 table">
            <thead>
              <tr>
                <th>Actions</th>
                <th>#</th>
                <th>Company Name</th>
                <th>Email</th>
                <th>Mobile</th>
                <th>Representative</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($this->clients as $client)
                <tr>
                  <td>
                    <div class="dropdown">
                      <a
                        aria-expanded="false"
                        aria-haspopup="true"
                        class="text-muted text-primary-hover"
                        data-bs-toggle="dropdown"
                        href="#"
                        id="dropdownClient{{ $client->id}}"
                        role="button"
                      >
                        <i class="fe fe-more-vertical"></i>
                      </a>
                      <div
                        aria-labelledby="dropdownClient{{ $client->id}}"
                        class="dropdown-menu"
                      >
                        <a
                          class="dropdown-item"
                          href="#"
                        >Edit</a>
                        <a
                          class="dropdown-item"
                          href="#"
                        >Add Billing</a>
                      </div>
                    </div>
                  </td>
                  <td>
                    {{ $client->id }}
                  </td>
                  <td>
                    {{ $client->company_name }}
                  </td>
                  <td>
                    {{ $client->representative->email }}
                  </td>
                  <td>
                    {{ $client->representative->mobile_number }}
                  </td>
                  <td>
                    {{ $client->representative->name }}
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
      <div class="d-flex justify-content-end mt-4">
        {{ $this->clients->links() }}
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
