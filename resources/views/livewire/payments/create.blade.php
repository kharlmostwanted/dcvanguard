@section('page-title', __('Add Payment'))
<div class="container">
  <div class="card">
    <!-- card body -->
    <div class="card-body">
      <div class="mb-3">
        <h4 class="mb-0">Payment Details</h4>
      </div>
      <!-- Or Number -->
      <div class="d-flex align-items-center justify-content-between">
        <span>OR No.:</span>
        <div>
          <x-input
            id="payment.or_number"
            name="payment.or_number"
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
      <div class="d-flex align-items-center justify-content-end mt-2">
        <button
          class="btn btn-outline-primary"
          wire:click.prevent="savePayment"
        >Save</button>
      </div>
    </div>
  </div>
</div>
