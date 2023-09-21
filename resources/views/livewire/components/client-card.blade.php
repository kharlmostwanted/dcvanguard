<div class="card mt-lg-0 mb-4 mt-4">
  <!-- card body -->
  <div class="card-body">
    <!-- heading -->
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h4 class="mb-0">Client</h4>
      <a href="{{ route('clients.show', $this->client) }}">View Profile</a>
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
