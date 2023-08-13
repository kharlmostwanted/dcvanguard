@section('page-title', 'Create Billing')
<div class="container p-4">
  <div class="row">
    <div class="col-xl-8 col-lg-7 col-12">
      <!-- card -->
      <div class="card">
        <!-- card header -->
        <div class="card-header border-bottom-0">
          <div class="d-flex justify-content-between align-items-center">
            <div>
              <!-- heading -->
              <h4 class="mb-1">Billing ID: GK00017</h4>
              <span>Billing Date: October 03,2022 t 6:31 pm <span class="badge bg-success-soft ms-2">Paid</span></span>
            </div>
            <div>
              <!-- button -->
              <a
                class="btn btn-primary btn-sm"
                href="#"
              >Invoice</a>
            </div>
          </div>
        </div>
        <div class="table-responsive">
          <!-- Table -->
          <table class="text-nowrap mb-0 table">
            <!-- Table Head -->
            <thead class="table-light">
              <tr>
                <th>Products</th>
                <th>Items</th>
                <th>Amounts</th>
              </tr>
            </thead>
            <!-- tbody -->
            <tbody>
              <tr>
                <td>
                  Item Here
                </td>
                <td>1</td>
                <td>$120.00</td>
              </tr>
              <tr>
                <td class="border-bottom-0 pb-0"></td>
                <td
                  class="fw-medium text-dark border-bottom-0 pb-0"
                  colspan="1"
                >
                  <!-- text -->
                  Sub Total :
                </td>
                <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                  <!-- text -->
                  $340.00
                </td>
              </tr>
              <tr>
                <td class="border-bottom-0 pb-0"></td>
                <td
                  class="fw-medium text-dark border-bottom-0 pb-0"
                  colspan="1"
                >
                  <!-- text -->
                  Discount (GKDIS15%) :
                </td>
                <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                  <!-- text -->
                  -$51.00
                </td>
              </tr>
              <tr>
                <td class="border-bottom-0 pb-0"></td>
                <td
                  class="fw-medium text-dark border-bottom-0 pb-0"
                  colspan="1"
                >
                  <!-- text -->
                  Shipping Charge :
                </td>
                <td class="fw-medium text-dark border-bottom-0 pb-0 text-end">
                  <!-- text -->
                  $15.00
                </td>
              </tr>
              <tr>
                <td class="border-bottom-0"></td>
                <td
                  class="fw-semibold text-dark"
                  colspan="1"
                >
                  <!-- text -->
                  Tax Vat 19% (included) :
                </td>
                <td class="fw-semibold text-dark text-end">
                  <!-- text -->
                  $64.00
                </td>
              </tr>
              <tr>
                <td></td>
                <td
                  class="fw-semibold text-dark"
                  colspan="1"
                >
                  <!-- text -->
                  Paid by Customer
                </td>
                <td class="fw-semibold text-dark text-end">
                  <!-- text -->
                  $368.00
                </td>
              </tr>
            </tbody>
          </table>
        </div>
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
            <a href="#">Edit</a>
          </div>
          <div>
            <!-- text -->
            <div class="d-flex align-items-center mb-2"><i class="fe fe-mail text-muted fs-4"></i><a
                class="ms-2"
                href="#"
              >{{ $client->representative->email }}</a></div>
            <div class="d-flex align-items-center"><i class="fe fe-phone text-muted fs-4"></i><span
                class="ms-2">{{ $client->representative->mobile_number }}</span></div>
          </div>
        </div>
        <!-- card body -->
        <div class="card-body border-top">
          <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="mb-0">Billing Address</h4>
            <a href="#">Edit</a>
          </div>
          <div>
            <!-- address -->
            <p class="mb-0">{{ $client->street }}<br>
              <br>
              {{ $client->city }}<br>
              {{ $client->province }}</p>
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
