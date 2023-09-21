<div class="card mb-4">
  <!-- Card Header -->
  <div class="card-header d-flex justify-content-between align-items-center">
    <h3 class="mb-0">Billing Information</h3>
    @if ($this->billing->paymentPercentage >= 100)
      <span class="badge bg-success">
        <i class="fe fe-check me-1"></i>
        Payment Complete
      </span>
    @else
      <span class="badge bg-warning">
        <i class="fe fe-alert-triangle me-1"></i>
        Payment Incomplete <span class="fw-bold">{{ $this->billing->paymentPercentage }}%</span>
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
