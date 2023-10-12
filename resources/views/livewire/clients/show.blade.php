@section('page-title', __('Client: #' . $client->id))
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 col-12">
      <!-- card -->
      <div class="card mb-4">
        <!-- card body -->
        <div class="card-body d-flex justify-content-between align-items-center">
          <div class="d-flex align-items-center">
            <!-- img -->
            <img
              alt=""
              class="avatar-xl rounded-circle"
              src="{{ Avatar::create($client->company_name)->toBase64() }}"
            >
            <div class="ms-4">
              <!-- text -->
              <h3 class="mb-1">{{ $client->company_name }}</h3>
              <div>
                <span><i class="fe fe-calendar text-muted me-2"></i>Client since
                  {{ $client->created_at->format('M d, Y') }}</span>
                <span class="ms-3"><i class="fe fe-map-pin text-muted me-2"></i>{{ $client->province }}</span>
              </div>
            </div>
          </div>
          <div>
            <a
              class="btn btn-primary"
              href="{{ route('billings.create', $this->client) }}"
            >Add Bill</a>
            <a
              class="btn btn-primary"
              href="{{ route('clients.show-print', $this->client) }}"
              target="_blank"
            >Print</a>
          </div>
        </div>
        <!-- card body -->
        <div class="card-body border-top">
          <div class="hstack justify-content-between d-md-flex d-inline gap-2">
            <!-- text -->
            <div class="mb-3">
              <span class="fw-semibold">Last Paid Bill</span>
              <div class="mt-2">
                <h5 class="h3 fw-bold mb-0">
                  {{ $client->billings()->paid()->latest()->first()?->created_at->diffForHumans() ?? 'None' }}</h5>
                <span
                  class="text-end">{{ number_format($client->billings()->paid()->latest()->first()?->total_price,2) }}</span>
              </div>
            </div>
            <!-- text -->
            <div class="mb-3">
              <span class="fw-semibold">Total Unpaid Bills</span>
              <div class="mt-2">
                <h5 class="h3 fw-bold mb-0">
                  {{ number_format($client->billings()->unpaid()->get()->sum('total_price'),2) }}</h5>
                <span>{{ $client->billings()->unpaid()->get()->count() }}
                  {{ str('billing')->plural($client->billings()->unpaid()->count()) }}</span></span>
              </div>
            </div>
            <!-- text -->
            <div>
              <span class="fw-semibold">Total Paid Bills</span>
              <div class="mt-2">
                <h5 class="h3 fw-bold mb-0">
                  {{ number_format($client->payments()->whereHas('billing')->sum('amount'),2) }}</h5>
                <span>{{ $client->billings()->paid()->count() }}
                  {{ str('billing')->plural($client->billings()->paid()->count()) }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <!-- Card header -->
        <div class="card-header d-flex justify-content-between">
          <h4 class="mb-0">Bills</h4>
          <div class="">
            <div class="form-group">
              <select
                class="form-control"
                id="billing_status"
                name="billing_status"
                wire:model.debounce.500ms="status"
              >
                <option value="">All</option>
                <option value="fully-paid">Fully Paid</option>
                <option value="partially-paid">Partially Paid</option>
                <option value="unpaid">Unpaid</option>
                <option value="overpaid">Overpaid</option>
              </select>
            </div>
          </div>
        </div>
        <!-- Table -->
        <div class="table-responsive">
          <table class="text-nowrap table-centered table-hover mb-0 table">
            <thead class="table-light">
              <tr>
                <th>Actions</th>
                <th>Billing Number</th>
                <th>From</th>
                <th>To</th>
                <th>Total Price</th>
                <th>Total Payment</th>
                <th>Balance</th>
                <th>Status</th>
              </tr>
            </thead>
            <!-- tbody -->
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
                        id="dropdownClient{{ $billing->id }}"
                        role="button"
                      >
                        <i class="fe fe-more-vertical"></i>
                      </a>
                      <div
                        aria-labelledby="dropdownClient{{ $billing->id }}"
                        class="dropdown-menu"
                      >
                        <a
                          class="dropdown-item"
                          href="{{ route('billings.show', $billing) }}"
                        >View</a>
                        <a
                          class="dropdown-item"
                          href="{{ route('billings.show', $billing) }}"
                        >Add Payment</a>
                        @if (!$billing->isPaid)
                          <a
                            class="dropdown-item"
                            href="#"
                            wire:click.prevent="markPaid({{ $billing->id }})"
                          >Mark Paid</a>
                        @else
                          <a
                            class="dropdown-item"
                            href="#"
                            wire:click.prevent="markUnpaid({{ $billing->id }})"
                          >Mark Unpaid</a>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td><a href="{{ route('billings.show', $billing) }}">{{ $billing->number }}</a></td>
                  <td>{{ $billing->start_date->format('m/d/Y') }}</td>
                  <td>{{ $billing->end_date->format('m/d/Y') }}</td>
                  <td class="text-end">{{ number_format($billing->total_price, 2) }}</td>
                  <td class="text-end">{{ number_format($billing->totalPayment, 2) }}</td>
                  <td class="text-end">
                    @if ($billing->balance == 0)
                      -
                    @else
                      {{ number_format($billing->balance, 2) }}
                    @endif
                  </td>
                  <td>
                    @if ($billing->paymentStatus == 'Paid')
                      <span class="badge bg-success-soft">Paid</span>
                    @elseif($billing->paymentStatus == 'Partial')
                      <span class="badge bg-warning-soft">Partial</span>
                    @elseif($billing->paymentStatus == 'Overpaid')
                      <span class="badge bg-success">Overpaid</span>
                    @else
                      <span class="badge bg-danger-soft">Unpaid</span>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>

      <div class="d-flex justify-content-end">
        {{ $this->billings->links() }}
      </div>
    </div>
    <div class="col-lg-4">
      <!-- client card -->
      @livewire('components.client-card', ['client' => $client])
    </div>
  </div>
</div>
