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
          <h4 class="card-title">Basic Info</h4>
          <div class="row row-cols-3 g-2">
            <div class="col">
              <x-input
                id="billing.number_of_guards"
                label="Number of guards"
                name="billing.number_of_guards"
                placeholder="Number of guards"
                type="number"
                wire:model.debounce.500ms="billing.number_of_guards"
              />
            </div>
            <div class="col">
              <label
                class="form-label"
                for="billing.start_date"
              >Start date</label>
              <input
                autocomplete="off"
                class="form-control flatpickr{{ $errors->has('billing.start_date') ? ' is-invalid' : '' }} d-block"
                id="billing.start_date"
                name="billing.start_date"
                placeholder="Start date"
                required
                type="text"
                wire:change.debounce.500ms="startDateUpdated"
                wire:model.debounce.500ms="billing.start_date"
              >
              @error('billing.start_date')
                <div
                  class="invalid-feedback"
                  id="{{ 'billing.start_date' }}Feedback"
                >
                  {{ $message }}
                </div>
              @enderror
            </div>
            <div class="col">
              <label
                class="form-label"
                for="billing.end_date"
              >End date</label>
              <input
                autocomplete="off"
                class="form-control flatpickr{{ $errors->has('billing.end_date') ? ' is-invalid' : '' }}"
                id="billing.end_date"
                name="billing.end_date"
                placeholder="End date"
                required
                type="text"
                wire:model.debounce.500ms="billing.end_date"
              >
              @error('billing.end_date')
                <div
                  class="invalid-feedback"
                  id="{{ 'billing.end_date' }}Feedback"
                >
                  {{ $message }}
                </div>
              @enderror
            </div>
          </div>
        </div>
        <div class="card-body border-top mt-4">
          <h4 class="card-title">
            Items
          </h4>
          <!-- Form -->
          @for ($i = 0; $i < $this->itemCount; $i++)
            <form class="row">
              <div class="col-12 col-md-6 mb-3">
                <x-input
                  id="items.{{ $i }}.description"
                  name="items.{{ $i }}.description"
                  placeholder="Details"
                  required
                  type="text"
                  wire:model.debounce.500ms="items.{{ $i }}.description"
                />
              </div>
              <div class="col-12 col-md-3 mb-3">
                <x-input
                  class="form-control"
                  id="items.{{ $i }}.amount"
                  name="items.{{ $i }}.amount"
                  placeholder="Amount"
                  required
                  type="number"
                  wire:model.debounce.500ms="items.{{ $i }}.amount"
                />
              </div>
              <div class="col-12 col-md-3 align-items-baseline mb-3">
                @if ($this->itemCount > 1)
                  <button
                    class="btn btn-primary"
                    type="button"
                    wire:click.prevent="removeItem({{ $i }})"
                  >Remove</button>
                @endif
              </div>
            </form>
          @endfor
        </div>
        <div class="card-body border-top mt-4">
          <div class="row row-cols-3 g-2 fw-bold text-primary">
            <div class="col">Total</div>
            <div class="col text-end">{{ number_format($this->totalAmount, 2) }}</div>
            <div class="col"></div>
          </div>
        </div>
      </div>

      <div class="d-flex justify-content-end align-items-center">
        <button
          class="btn btn-primary me-2"
          wire:click="addRow"
        >Add row</button>
        <button
          class="btn btn-primary"
          data-bs-target="#modalConfirmSave"
          data-bs-toggle="modal"
          wire:loading.attr="hidden"
        >Proceed</button>
        <div
          class="spinner-border text-primary ms-2"
          role="status"
          wire:loading
        ></div>
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
    </div>
  </div>
  <!-- Modal -->
  <div
    aria-hidden="true"
    aria-labelledby="modalConfirmSaveLabel"
    class="modal fade"
    id="modalConfirmSave"
    role="dialog"
    tabindex="-1"
    wire:ignore.self
  >
    <div
      class="modal-dialog modal-dialog-centered modal-lg"
      role="document"
      wire:ignore.self
    >
      <div class="modal-content">
        <div class="modal-header">
          <h5
            class="modal-title"
            id="modalConfirmSaveLabel"
          >
            <p class="mb-0">
              <strong>{{ $this->client->company_name }} - {{ $this->client->representative->name }}</strong> <br>
              {{ $client->street }}<br>
              {{ $client->city }}<br>
              {{ $client->province }}
            </p>
          </h5>
          <button
            aria-label="Close"
            class="btn-close"
            data-bs-dismiss="modal"
            type="button"
          >

          </button>
        </div>
        <div class="modal-body">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4>Total Amount</h4>
            <h4 class="text-end">{{ number_format($this->totalAmount, 2) }}</h4>
          </div>
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
                @foreach ($this->cleanItems as $item)
                  <tr>
                    <td class="bg-white">{{ $item['description'] }}</td>
                    <td class="bg-white text-end">{{ $item['amount'] }}</td>
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
        <div class="modal-footer justify-content-between">
          <div class="error-texts">
            @if ($errors->any())
              <div
                class="alert alert-danger"
                role="alert"
              >
                Please check the form for any errors and try again.
              </div>
            @endif
          </div>
          <div class="buttons">
            <button
              class="btn btn-secondary"
              data-bs-dismiss="modal"
              type="button"
            >Close</button>
            <button
              class="btn btn-primary"
              type="button"
              wire:click.prevent="save"
            >Save changes</button>
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
  {{-- <script defer>
    flatpickr(".flatpickr", {
      dateFormat: "Y-m-d",
      altFormat: "m-d-Y",
      altInput: true,
    });
  </script> --}}
@endpush
