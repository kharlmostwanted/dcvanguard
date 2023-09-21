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
        <a
          class="link"
          href="{{ route('clients.index') }}"
        >Go to clients list</a>
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
      <!-- billing card -->
      @livewire('components.billing-card', ['billing' => $this->billing])

      <div class="card">
        <div class="card-header">
          <h4 class="mb-0">Payments</h4>
        </div>
        <div class="table-responsive">
          <table class="text-nowrap table-centered mb-0 table">
            <thead>
              <tr>
                <th></th>
                <th>OR</th>
                <th>Received</th>
                <th>Check No.</th>
                <th>Check Bank</th>
                <th>Check Date</th>
                <th>Amount</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($this->payments as $payment)
                <tr>
                  <td>
                    <div class="dropdown">
                      <a
                        aria-expanded="false"
                        aria-haspopup="true"
                        class="text-muted text-primary-hover"
                        data-bs-toggle="dropdown"
                        href="#"
                        id="dropdownClient{{ $payment->id }}"
                        role="button"
                      >
                        <i class="fe fe-more-vertical"></i>
                      </a>
                      <div
                        aria-labelledby="dropdownClient{{ $payment->id }}"
                        class="dropdown-menu"
                      >
                        
                        <a
                          class="dropdown-item"
                          href="#"
                          wire:click.prevent="deletePayment({{ $payment->id }})"
                        >Delete</a>
                      </div>
                    </div>
                  </td>
                  <td>{{ $payment->or_number }}</td>
                  <td>{{ $payment->received_at->format('m/d/Y') }}</td>
                  <td>{{ $payment->check_number }}</td>
                  <td>{{ $payment->check_bank }}</td>
                  <td>{{ $payment->check_date?->format('m/d/Y') }}</td>
                  <td class="text-end">{{ $payment->amount }}</td>
                </tr>
              @endforeach
              <tr>
                <th colspan="5"></th>
                <th>TOTAL:</th>
                <th class="fw-bold text-primary text-end">{{ number_format($this->payments->sum('amount'), 2) }}</th>
              </tr>
          </table>
        </div>
      </div>

      <div class="d-flex justify-content-end align-items-center mt-4">
        @if (empty($this->billing->deleted_at))
          <button
            class="btn btn-primary me-2"
            wire:click="delete"
          >Delete Entire Bill</button>
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
      @livewire('components.client-card', ['client' => $this->billing->client])
      <!-- card -->
      <div class="card">
        <!-- card body -->
        <div class="card-body">
          <div class="mb-3">
            <h4 class="mb-0">Payment Details</h4>
          </div>
          <!-- Amount -->
          <div class="d-flex align-items-center justify-content-between">
            <span>Amount:</span>
            <div>
              <x-input
                id="payment.amount"
                name="payment.amount"
                style="width: 220px;"
                type="number"
                wire:model.debounce.500ms="payment.amount"
              />
            </div>
          </div>
          <!-- Or Number -->
          <div class="d-flex align-items-center justify-content-between mt-2">
            <span>OR No.:</span>
            <div>
              <x-input
                id="payment.or_number"
                name="payment.or_number"
                style="width: 220px;"
                type="text"
                wire:model.debounce.500ms="payment.or_number"
              />
            </div>
          </div>
          <!-- Payment Date -->
          <div class="d-flex align-items-center justify-content-between mt-2">
            <span>Payment Received:</span>
            <div>
              <input
                autocomplete="off"
                class="form-control flatpickr{{ $errors->has('payment.received_at') ? ' is-invalid' : '' }} d-block"
                id="payment.received_at"
                name="payment.received_at"
                placeholder="enter date"
                required
                style="width: 220px;"
                type="text"
                wire:model.debounce.500ms="payment.received_at"
              >
              @error('payment.received_at')
                <div
                  class="invalid-feedback"
                  id="{{ 'payment.received_at' }}Feedback"
                >
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <!-- Check Number -->
          <div class="d-flex align-items-center justify-content-between mt-2">
            <span>Check No.:</span>
            <div>
              <x-input
                id="payment.check_number"
                name="payment.check_number"
                style="width: 220px;"
                type="text"
                wire:model.debounce.500ms="payment.check_number"
              />
            </div>
          </div>
          <!-- Bank -->
          <div class="d-flex align-items-center justify-content-between mt-2">
            <span>Check Bank:</span>
            <div>
              <x-input
                id="payment.check_bank"
                name="payment.check_bank"
                style="width: 220px;"
                type="text"
                wire:model.debounce.500ms="payment.check_bank"
              />
            </div>
          </div>
          <!-- Check Date -->
          <div class="d-flex align-items-center justify-content-between mt-2">
            <span>Check Date:</span>
            <div>
              <input
                autocomplete="off"
                class="form-control flatpickr{{ $errors->has('payment.check_date') ? ' is-invalid' : '' }} d-block"
                id="payment.check_date"
                name="payment.check_date"
                placeholder="enter date"
                required
                style="width: 220px;"
                type="text"
                wire:model.debounce.500ms="payment.check_date"
              >
              @error('payment.check_date')
                <div
                  class="invalid-feedback"
                  id="{{ 'payment.check_date' }}Feedback"
                >
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
          <div class="d-flex align-items-center justify-content-end mt-4">
            <button
              class="btn btn-outline-primary"
              wire:click.prevent="addPayment"
            >Add Payment</button>
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
  <script defer>
    flatpickr(".flatpickr", {
      dateFormat: "m/d/Y",
    });
  </script>
@endpush
