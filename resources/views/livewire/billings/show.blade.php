@section('page-title', 'Billing: ' . $billing->number)
<div class="container p-4">
  {{-- flash session message --}}
  @if (session()->has('success'))
    <div
      class="alert alert-success alert-dismissible fade show"
      role="alert"
    >
      <div class="alert-body">
        <strong>Success!</strong> {{ session('success') }}.
        <a class="link" href="{{ route('clients.index') }}">Go to clients list</a>
      </div>
      <button
        aria-label="Close"
        class="btn-close"
        data-bs-dismiss="alert"
        type="button"
      ></button>
    </div>
  @endif
  <div class="row">
    <div class="col-xl-8 col-lg-7 col-12">
      <!-- card -->
      <div class="card mb-4">
        <!-- Card Header -->
        <div class="card-header d-flex justify-content-between align-items-center">
          <h3 class="mb-0">Billing Information</h3>
          @if ($this->billing->isPaid)
            <span class="badge bg-success">
              <i class="fe fe-check me-1"></i>
              Payment Complete
            </span>
          @endif
        </div>
        <!-- Card Body -->
        <div class="card-body">
          <p>For payment of security services</p>
          <p>
            {{ str(spelloutNumber(empty($this->billing->number_of_guards) ? 0 : $this->billing->number_of_guards))->title }}
            ({{ $this->billing->number_of_guards }}) security
            {{ str('guard')->plural(empty($this->billing->number_of_guards) ? 0 : $this->billing->number_of_guards) }}
            on
            duty for
            {{ str(Carbon\Carbon::parse($this->billing->start_date)?->format('M d, Y'))->upper() }} to
            {{ str(Carbon\Carbon::parse($this->billing->end_date)?->format('M d, Y'))->upper() }}
          </p>
          <div class="table-responsive">
            <table class="table-sm table">
              <tbody>
                @foreach ($this->billing->items as $item)
                  <tr>
                    <td class="bg-white">{{ $item->title }}</td>
                    <td class="bg-white text-end">{{ $item->pivot->price }}</td>
                  </tr>
                @endforeach
                <tr>
                  <td class="fw-bold bg-white bg-white text-end">Total</td>
                  <td class="fw-bold bg-white text-end">{{ number_format($this->totalAmount, 2) }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <p>
            AMOUNT: {{ str(spelloutNumber($this->totalAmount))->title }} Pesos Only.
          </p>
        </div>

      </div>

      <div class="d-flex justify-content-end align-items-center">
        @if (empty($this->billing->deleted_at))
          <button
            class="btn btn-primary me-2"
            wire:click="delete"
          >Delete</button>
        @endif
        @if (!$this->billing->isPaid)
          <button
            class="btn btn-primary me-2"
            wire:click="markPaid"
          >Mark Paid</button>
        @endif
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
            <a href="{{ route('clients.show', $billing->client) }}">View Profile</a>
          </div>
          <div class="d-flex align-items-center">
            <!-- img -->
            <img
              alt=""
              class="avatar-lg rounded-circle"
              src="{{ Avatar::create($client->company_name)->toBase64() }}"
            >
            <div class="ms-3">
              <!-- title -->
              <h4 class="mb-0">{{ $client->company_name }}</h4>
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
      @if ($this->billing->isPaid)
        <!-- card -->
        <div class="card">
          <!-- card body -->
          <div class="card-body">
            <div class="mb-3">
              <h4 class="mb-0">Payment Details</h4>
            </div>
            <!-- text -->
            <div class="d-flex align-items-center justify-content-between mb-2">
              <span>Payment Date:</span>
              <span class="text-dark">{{ $this->billing->payments()->first()->created_at->format('M d, Y') }}</span>
            </div>
            <!-- text -->
            <div class="d-flex align-items-center justify-content-between">
              <span>Total Amount:
              </span>
              <span class="text-dark fw-bold">{{ number_format($this->totalAmount, 2) }}</span>
            </div>
          </div>
        </div>
      @endif
    </div>
  </div>
</div>
@push('scripts')
  <script src="{{ asset('/assets/libs/inputmask/dist/jquery.inputmask.min.js') }}"></script>
  <script src="{{ asset('/assets/libs/flatpickr/dist/flatpickr.min.js') }}"></script>
  <script src="{{ asset('/assets/js/vendors/flatpickr.js') }}"></script>
@endpush
