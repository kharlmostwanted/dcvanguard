@section('page-title', 'Dashboard')
<div class="container-fluid">
  <div class="row row-cols-auto justify-content-end mb-5">
    <div class="col">
      <input
        class="form-control flatpickr"
        id="date_from"
        name="date_from"
        placeholder="select start date"
        type="text"
        wire:model="date_from"
      >
    </div>
    <div class="col">
      <input
        class="form-control flatpickr"
        id="date_to"
        name="date_to"
        placeholder="select end date"
        type="text"
        wire:model="date_to"
      >
    </div>
  </div>
  <div class="row g-3">
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
          <span class="text-success fw-semibold">
            <i class="fe fe-trending-up me-1"></i>{{ $this->payments()->count() }}</span>
          <span class="fw-medium ms-1">Payments</span>
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
              <span class="fs-6 text-uppercase fw-semibold">Total Collectible</span>
            </div>
            <div>
              <span class="fe fe-book-open fs-3 text-primary"></span>
            </div>
          </div>
          <h2 class="fw-bold mb-1">
            {{ number_format($this->billings()->unpaid()->sum('total_price'),2) }}
          </h2>
          <span class="text-danger fw-semibold">{{ $this->billings()->unpaid()->count() }}</span>
          <span class="fw-medium ms-1">Billings</span>
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
              <span class="fs-6 text-uppercase fw-semibold">Clients</span>
            </div>
            <div>
              <span class="fe fe-users fs-3 text-primary"></span>
            </div>
          </div>
          <h2 class="fw-bold mb-1">
            {{ $this->clients()->count() }}
          </h2>
          <span class="text-success fw-semibold"><i
              class="fe fe-trending-up me-1"></i>{{ $this->clients()->inGoodStanding()->count() }}</span>
          <span class="fw-medium ms-1">In good standing</span>
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
              <span class="fs-6 text-uppercase fw-semibold">New Billings</span>
            </div>
            <div>
              <span class="fe fe-user-check fs-3 text-primary"></span>
            </div>
          </div>
          <h2 class="fw-bold mb-1">
            {{ $this->billings()->count() }}
          </h2>
          <span class="text-success fw-semibold"><i
              class="fe fe-trending-up me-1"></i>{{ number_format($this->billings()->sum('total_price'), 2) }}</span>
          <span class="fw-medium ms-1">Total Price</span>
        </div>
      </div>
    </div>
  </div>
</div>
@push('scripts')
  <script src="{{ asset('/assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
  <script src="{{ asset('/assets/js/vendors/flatpickr.js') }}"></script>
@endpush
