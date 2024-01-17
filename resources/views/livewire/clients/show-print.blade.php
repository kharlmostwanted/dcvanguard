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
                  {{ $client->since?->format('M d, Y') }}</span>
                <span class="ms-3"><i class="fe fe-map-pin text-muted me-2"></i>{{ $client->province }}</span>
              </div>
            </div>
          </div>
        </div>
        <!-- card body -->
        <div class="card-body border-top">
          <div class="row row-cols-3">
            <!-- text -->
            <div class="col">
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
                  {{ number_format($this->billings->sum('balance'), 2) }}</h5>
                <span>{{ $this->billings->where('balance', '>', 0)->count() }}
                  {{ str('Billing')->plural($this->billings->where('balance', '>', 0)->count()) }}</span></span>
              </div>
            </div>
            <!-- text -->
            <div class="col">
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
        <div class="">
          <table class="text-nowrap table-centered table-hover mb-0 table">
            <thead class="table-light">
              <tr>
                <th>Billing Number</th>
                <th>Date</th>
                <th>Total Price</th>
                <th>Total Payment</th>
                <th>Balance</th>
                <th>Status</th>
              </tr>
            </thead>
            <!-- tbody -->
            <tbody>
              @php
                $runningBalance = $this->billings->sum('balance');
              @endphp
              @foreach ($client->billings()->orderBy('end_date', 'desc')->withCasts(['start_date' => 'date', 'end_date' => 'date'])->get() as $billing)
                <tr>
                  <td><a href="{{ route('billings.show', $billing) }}">{{ $billing->number }}</a></td>
                  <td>{{ $billing->start_date->format('m/d/Y') }} - {{ $billing->end_date->format('m/d/Y') }}</td>
                  <td class="text-end">{{ number_format($billing->total_price, 2) }}</td>
                  <td class="text-end">{{ number_format($billing->totalPayment, 2) }}</td>
                  <td class="text-end">
                    @if ($runningBalance == 0)
                      -
                    @else
                      {{ number_format($runningBalance, 2) }}
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
                @php
                  $runningBalance -= $billing->balance;
                @endphp
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="col-lg-4 d-print-none">
      <!-- client card -->
      @livewire('components.client-card', ['client' => $client])
    </div>
  </div>
</div>
@push('scripts')
  <script>
    // Trigger print immediately when the component renders
    window.onload = function() {
      window.print();
    };
  </script>
@endpush
