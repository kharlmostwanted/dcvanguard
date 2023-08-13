@section('page-title', 'Create Billing')
<div class="container p-4">
  <div class="row">
    <div class="col-xl-8 col-lg-7 col-12">
      <!-- card -->
      <div class="card mb-4">
        <!-- Card Header -->
        <div class="card-header">
          <h3 class="mb-0">Billing Information</h3>
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <!-- Form -->
          <form class="row">
            <div class="col-12 col-md-6 mb-3">
              <label
                class="form-label"
                for="item"
              >Item</label>
              <x-input
                id="item"
                name="item"
                placeholder="Details"
                required
                type="text"
                wire:model="item"
              />
            </div>
            <div class="col-12 col-md-3 mb-3">
              <label
                class="form-label"
                for="lname"
              >Amount</label>
              <x-input
                class="form-control"
                id="amount"
                name="amount"
                placeholder="Amount"
                required
                type="number"
                wire:model="amount"
              />
            </div>
            <div class="col-12 col-md-3 mb-3">
              <label
                class="form-label"
                for="lname"
              >Due</label>
              <input
                class="form-control flatpickr{{ $errors->has('due_at') ? ' is-invalid' : '' }}"
                id="due_at"
                name="due_at"
                placeholder="Enter due date"
                required
                type="text"
                wire:model="due_at"
              >
              @error('due_at')
                <div
                  class="invalid-feedback"
                  id="{{ 'due_at' }}Feedback"
                >
                  {{ $message }}
                </div>
              @enderror
            </div>
          </form>
        </div>
      </div>

      <div class="d-flex justify-content-end align-items-center">
        <button
          class="btn btn-primary"
          wire:click="save"
        >Save</button>
      </div>
    </div>
    <div class="col-xl-4 col-lg-5 col-12">
      <!-- card -->
      <div class="card mt-lg-0 mb-4 mt-4">
        <!-- card body -->
        <div class="card-body">
          <!-- heading -->
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Client</h4>
            <a href="#">View Profile</a>
          </div>
          <div class="d-flex align-items-center">
            <!-- img -->
            <img
              alt=""
              class="avatar-lg rounded-circle"
              src="{{ Avatar::create($client->representative->name)->toBase64() }}"
            >
            <div class="ms-3">
              <!-- title -->
              <h4 class="mb-0">{{ $client->representative->name }}</h4>
              <div>
                <span>Client since {{ $client->created_at->format('M d, Y') }}</span>
              </div>
            </div>
          </div>
        </div>
        <!-- card body -->
        <div class="card-body border-top">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <!-- text -->
            <h4 class="mb-0">Contact</h4>
            <a href="{{ route('clients.edit', $client) }}">Edit</a>
          </div>
          <div>
            <!-- text -->
            <div class="d-flex align-items-center mb-2"><i class="fe fe-mail text-muted fs-4"></i><a
                class="ms-2"
                href="mailto:{{ $client->representative->email }}"
              >{{ $client->representative->email }}</a></div>
            <div class="d-flex align-items-center"><i class="fe fe-phone text-muted fs-4"></i><span
                class="ms-2">{{ $client->representative->mobile_number }}</span></div>
          </div>
        </div>
        <!-- card body -->
        <div class="card-body border-top">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Billing Address</h4>
            <a href="{{ route('clients.edit', $client) }}">Edit</a>
          </div>
          <div>
            <!-- address -->
            <p class="mb-0">
              <strong>{{ $client->company_name }}</strong> <br><br>
              {{ $client->street }}<br>
              {{ $client->city }}<br>
              {{ $client->province }}
            </p>
          </div>
        </div>
        <!-- card body -->
      </div>
      <!-- card -->
      <div class="card">
        <!-- card body -->
        <div class="card-body">
          <div class="mb-3">
            <h4 class="mb-0">Payment Details</h4>
          </div>
          <!-- text -->
          <div class="d-flex align-items-center justify-content-between mb-2">
            <span>Transactions:</span>
            <span class="text-dark">#GK444TO10000</span>
          </div>
          <!-- text -->
          <div class="d-flex align-items-center justify-content-between mb-2">
            <span>Payment Method:
            </span>
            <span class="text-dark">Credit Card</span>
          </div>
          <!-- text -->
          <div class="d-flex align-items-center justify-content-between mb-2">
            <span>Card Holder Name:
            </span>
            <span class="text-dark">Harold Gonzalez</span>
          </div>
          <!-- text -->
          <div class="d-flex align-items-center justify-content-between mb-2">
            <span>Card Number:
            </span>
            <span class="text-dark">xxxx xxxx xxxx 6779</span>
          </div>
          <!-- text -->
          <div class="d-flex align-items-center justify-content-between">
            <span>Total Amount:
            </span>
            <span class="text-dark fw-bold">$368.00</span>
          </div>
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
