@section('page-title', __('Client: #'. $client->id))
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-12">
      <!-- card -->
      <div class="card mb-4">
        <!-- card body -->
        <div class="card-body">
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
                <span><i class="fe fe-calendar text-muted me-2"></i>Client since {{ $client->created_at->format('M d, Y') }}</span>
                <span class="ms-3"><i class="fe fe-map-pin text-muted me-2"></i>{{ $client->province }}</span>
              </div>
            </div>
          </div>
        </div>
        <!-- card body -->
        <div class="card-body border-top">
          <div class="hstack justify-content-between d-md-flex d-inline gap-2">
            <!-- text -->
            <div class="mb-3">
              <span class="fw-semibold">Last Order</span>
              <div class="mt-2">
                <h5 class="h3 fw-bold mb-0">20 Hours ago</h5>
                <span>White Adidas Low-Top Sneakers</span>
              </div>
            </div>
            <!-- text -->
            <div class="mb-3">
              <span class="fw-semibold">Lifetime Spent</span>
              <div class="mt-2">
                <h5 class="h3 fw-bold mb-0">$12,487.00</h5>
                <span>Total 18 order</span>
              </div>
            </div>
            <!-- text -->
            <div>
              <span class="fw-semibold">Average Order</span>
              <div class="mt-2">
                <h5 class="h3 fw-bold mb-0">$210.18</h5>
                <span>$2000.00 Large Order</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- card -->
      <div class="mb-4">
        <div class="card">
          <!-- card body -->
          <div class="card-header">
            <h4 class="mb-0">Recent Order</h4>
          </div>
          <div class="card-body">

            <ul class="list-group list-group-flush">
              <li class="list-group-item px-0">
                <div>
                  <!-- order id -->
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                      <h6 class="text-primary mb-0">Order ID: GK00017</h6>
                    </div>
                    <div>
                      <span>Yesterday at 4:41 pm </span>
                    </div>
                  </div>
                  <!-- text -->
                  <div class="d-flex justify-content-between">
                    <div>
                      <a
                        class="text-inherit"
                        href="#"
                      >
                        <div class="d-lg-flex align-items-center">
                          <!-- img -->
                          <div>
                            <img
                              alt=""
                              class="img-4by3-md rounded"
                              src="../../../assets/images/ecommerce/ecommerce-img-1.jpg"
                            >
                          </div>
                          <!-- text -->
                          <div class="ms-lg-3 mt-lg-0 mt-2">
                            <h5 class="mb-0">
                              White & Red Nike Athletic Shoe
                            </h5>
                            <span class="fs-6">SKU: Shoe01</span>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div>
                      <!-- button -->
                      <a
                        class="btn btn-light-danger text-danger btn-sm"
                        href="#"
                      >Refund</a>
                    </div>
                  </div>
                </div>
              </li>
              <li class="list-group-item px-0">
                <div>
                  <!-- order id -->
                  <div class="d-flex justify-content-between align-items-center mb-2">
                    <div>
                      <h6 class="text-primary mb-0">Order ID: GK00017</h6>
                    </div>
                    <div>
                      <span>Yesterday at 4:41 pm </span>
                    </div>
                  </div>
                  <!-- text -->
                  <div class="d-flex justify-content-between">
                    <div>
                      <a
                        class="text-inherit"
                        href="#"
                      >
                        <div class="d-lg-flex align-items-center">
                          <!-- img -->
                          <div>
                            <img
                              alt=""
                              class="img-4by3-md rounded"
                              src="../../../assets/images/ecommerce/ecommerce-img-1.jpg"
                            >
                          </div>
                          <!-- text -->
                          <div class="ms-lg-3 mt-lg-0 mt-2">
                            <h5 class="mb-0">
                              White & Red Nike Athletic Shoe
                            </h5>
                            <span class="fs-6">SKU: Shoe01</span>
                          </div>
                        </div>
                      </a>
                    </div>
                    <div>
                      <!-- button -->
                      <a
                        class="btn btn-light-danger text-danger btn-sm"
                        href="#"
                      >Refund</a>
                    </div>
                  </div>
                </div>
              </li>

            </ul>

          </div>

          <!-- text -->
          <div class="card-footer d-flex justify-content-end">
            <a href="order-summary.html">View All Orders</a>
          </div>
        </div>
      </div>
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h4 class="mb-0">Recent Payments</h4>
        </div>
        <!-- Table -->
        <div class="table-responsive">
          <table class="text-nowrap table-centered table-hover mb-0 table">
            <thead class="table-light">
              <tr>
                <th>ID</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
            </thead>
            <!-- tbody -->
            <tbody>
              <tr>
                <td><a href="#!">#GK00017</a></td>
                <td>$23.00</td>
                <td>May 5, 2022</td>
                <td>
                  <span class="badge bg-success-soft">Completed</span>
                </td>
                <td><a href="#">View Details</a></td>
              </tr>
              <tr>
                <td><a href="#!">#GK00018</a></td>
                <td>$123.00</td>
                <td>April 4, 2022</td>
                <td>
                  <span class="badge bg-success-soft">Refunded</span>
                </td>
                <td><a href="#">View Details</a></td>
              </tr>
              <tr>
                <td><a href="#!">#GK00019</a></td>
                <td>$124.00</td>
                <td>April 3, 2022</td>
                <td>
                  <span class="badge bg-success-soft">Completed</span>
                </td>
                <td><a href="#">View Details</a></td>
              </tr>
              <tr>
                <td><a href="#!">#GK00020</a></td>
                <td>$657.00</td>
                <td>April 2, 2022</td>
                <td>
                  <span class="badge bg-danger-soft">Cancel</span>
                </td>
                <td><a href="#">View Details</a></td>
              </tr>
              <tr>
                <td><a href="#!">#GK00021</a></td>
                <td>$235.00</td>
                <td>March 31, 2022</td>
                <td>
                  <span class="badge bg-success-soft">Completed</span>
                </td>
                <td><a href="#">View Details</a></td>
              </tr>
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
            <a href="#">Edit</a>
          </div>
          <!-- text email -->
          <div>
            <div class="d-flex align-items-center mb-2">
              <i class="fe fe-mail text-muted fs-4"></i><a
                class="ms-2"
                href="#"
              >haroldonzalez@gmail.com</a>
            </div>
            <!-- text phone -->
            <div class="d-flex align-items-center">
              <i class="fe fe-phone text-muted fs-4"></i><span class="ms-2">+(000) 123465
                987</span>
            </div>
          </div>
        </div>
        <!-- card body -->
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-4">
            <!-- text -->
            <h4 class="mb-0">Default Address</h4>
            <a href="#">Change</a>
          </div>
          <div>
            <!-- address -->
            <p class="mb-0">
              3812 Orchard Street <br>
              Bloomington,<br>
              Minnesota 55431,<br>
              United States
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
