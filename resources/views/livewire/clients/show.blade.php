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
                  {{ number_format($client->billings()->paid()->get()->sum('total_price'),2) }}</h5>
                <span>{{ $client->billings()->paid()->count() }}
                  {{ str('billing')->plural($client->billings()->paid()->count()) }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h4 class="mb-0">Bills</h4>
        </div>
        <!-- Table -->
        <div class="table-responsive">
          <table class="text-nowrap table-centered table-hover mb-0 table">
            <thead class="table-light">
              <tr>
                <th>Actions</th>
                <th>Billing Number</th>
                <th>Total Price</th>
                <th>Date</th>
                <th>Status</th>
                <th>Payment Details</th>
              </tr>
            </thead>
            <!-- tbody -->
            <tbody>
              @foreach ($client->billings()->orderBy('end_date')->withCasts(['start_date' => 'date', 'end_date' => 'date'])->get() as $billing)
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
                  <td class="text-end">{{ number_format($billing->total_price, 2) }}</td>
                  <td>{{ $billing->start_date->format('m/d/Y') }} to {{ $billing->end_date->format('m/d/Y') }}</td>
                  <td>
                    @if ($billing->isPaid)
                      <span class="badge bg-success-soft">Paid</span>
                    @else
                      <span class="badge bg-danger-soft">Unpaid</span>
                    @endif
                  </td>
                  <td>
                    @if ($billing->isPaid)
                      <div class="d-flex flex-column">
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="me-1">OR No:</span>
                          <span>
                            {{ $billing->payments->first()?->or_number }}
                          </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="me-1">Received:</span>
                          <span>
                            {{ Carbon\Carbon::parse($billing->payments->first()?->received_at)->format('m/d/Y') }}
                          </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="me-1">Check No:</span>
                          <span>
                            {{ $billing->payments->first()?->check_number }}
                          </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="me-1">Bank:</span>
                          <span>
                            {{ $billing->payments->first()?->check_bank }}
                          </span>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                          <span class="me-1">Check Date:</span>
                          <span>
                            {{ !empty($billing->payments->first()->check_date) ? Carbon\Carbon::parse($billing->payments->first()->check_date)->format('m/d/Y') : '' }}
                          </span>
                        </div>
                      </div>
                    @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4">
      <!-- card -->
      <div class="card mt-lg-0 mt-4">
        <!-- card body -->
        <div class="card-body border-bottom">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="mb-0">Contact</h4>
            <a href="{{ route('clients.edit', $this->client) }}">Edit</a>
          </div>
          <!-- text email -->
          <div>
            <div class="d-flex align-items-center mb-2">
              <i class="fe fe-mail text-muted fs-4"></i><a
                class="ms-2"
                href="email:{{ $client->representative->email }}"
              >{{ $client->representative->email }}</a>
            </div>
            <!-- text phone -->
            <div class="d-flex align-items-center">
              <i class="fe fe-phone text-muted fs-4"></i><span
                class="ms-2">{{ $client->representative->mobile_number }}</span>
            </div>
          </div>
        </div>
        <!-- card body -->
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- text -->
            <h4 class="mb-0">Address</h4>
            {{-- <a href="#">Change</a> --}}
          </div>
          <div>
            <!-- address -->
            <p class="mb-0 ms-4">
              <i class="fe fe-map-pin"></i>
              {{ $client->street }} <br>
              {{ $client->city }} <br>
              {{ $client->province }} <br>
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
