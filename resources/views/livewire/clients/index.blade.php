@section('page-title', 'Clients')
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-12 mb-4">
      <div class="row d-md-flex justify-content-between align-items-center">
        <div class="col-md-6 col-lg-8 col-xl-9">
          <h4 class="mb-md-0 mb-3">Displaying {{ $this->clients->count() }} out of {{ $this->totalClients }} clients</h4>
        </div>
        <div class="d-inline-flex col-md-6 col-lg-4 col-xl-3">
          <!-- Search input -->
          <input
            class="form-control"
            id="search-input"
            placeholder="Search Clients"
            type="search"
          >
        </div>
      </div>
    </div>
    <div class="col-xl-3 col-lg-3 col-md-4 col-12 mb-lg-0 mb-4">
      <!-- Card -->
      <div class="card">
        <!-- Card header -->
        <div class="card-header">
          <h4 class="mb-0">Filter</h4>
        </div>
        <!-- Card body -->
        <div class="card-body">
          <span class="dropdown-header mb-2 px-0"> Category</span>
          <!-- Checkbox -->
          <div class="form-check mb-1">
            <input
              class="form-check-input"
              id="sketchCheck"
              type="checkbox"
            >
            <label
              class="form-check-label"
              for="sketchCheck"
            >Paid</label>
          </div>
          <!-- Checkbox -->
          <div class="form-check mb-1">
            <input
              class="form-check-input"
              id="HTML5Check"
              type="checkbox"
            >
            <label
              class="form-check-label"
              for="HTML5Check"
            >Unpaid</label>
          </div>
        </div>
      </div>
    </div>
    <!-- Tab content -->
    <div class="col-xl-9 col-lg-9 col-md-8 col-12">
      <div class="card">
        <!-- card header  -->
        <div class="card-header">
          <h4 class="mb-1">Table Basic</h4>
          <p class="mb-0">Just add the base class <code class="highlighter-rouge">.table</code> to any <code
              class="highlighter-rouge"
            >&lt;table&gt;</code>, then extend with custom styles.</p>
        </div>
        <!-- table  -->
        <div class="table-responsive">
          <table class="text-nowrap table-centered mb-0 table">
            <thead>
              <tr>
                <th>Project name</th>
                <th>Due Date</th>
                <th>priority</th>
                <th>Members</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div>
                      <div>
                        <img
                          alt=""
                          src="../../assets/images/brand/dropbox-logo.svg"
                        >
                      </div>
                    </div>
                    <div class="lh-1 ms-3">
                      <h5 class="mb-1"> <a
                          class="text-inherit"
                          href="#"
                        >Dropbox Design
                          System</a></h5>

                    </div>
                  </div>
                </td>
                <td>June 2</td>
                <td><span class="badge bg-warning">Medium</span></td>
                <td>
                  <div class="avatar-group">
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-1.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-2.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-3.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm avatar-primary">
                      <span class="avatar-initials rounded-circle fs-6">+5</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <a
                      aria-expanded="false"
                      aria-haspopup="true"
                      class="text-muted text-primary-hover"
                      data-bs-toggle="dropdown"
                      href="#"
                      id="dropdownOne"
                      role="button"
                    >
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <div
                      aria-labelledby="dropdownOne"
                      class="dropdown-menu"
                    >
                      <a
                        class="dropdown-item"
                        href="#"
                      >Action</a>
                      <a
                        class="dropdown-item"
                        href="#"
                      >Another action</a>
                      <a
                        class="dropdown-item"
                        href="#"
                      >Something else
                        here</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div>
                      <div>
                        <img
                          alt=""
                          src="../../assets/images/brand/slack-logo.svg"
                        >
                      </div>
                    </div>
                    <div class="lh-1 ms-3">
                      <h5 class="mb-1"> <a
                          class="text-inherit"
                          href="#"
                        >Slack UI Design</a></h5>
                    </div>
                  </div>
                </td>
                <td>June 12</td>
                <td><span class="badge bg-danger">High</span></td>
                <td>
                  <div class="avatar-group">
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-4.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-5.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-6.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm avatar-primary">
                      <span class="avatar-initials rounded-circle fs-6">+5</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <a
                      aria-expanded="false"
                      aria-haspopup="true"
                      class="text-muted text-primary-hover"
                      data-bs-toggle="dropdown"
                      href="#"
                      id="dropdownTwo"
                      role="button"
                    >
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <div
                      aria-labelledby="dropdownTwo"
                      class="dropdown-menu"
                    >
                      <a
                        class="dropdown-item"
                        href="#"
                      >Action</a>
                      <a
                        class="dropdown-item"
                        href="#"
                      >Another action</a>
                      <a
                        class="dropdown-item"
                        href="#"
                      >Something else
                        here</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td>
                  <div class="d-flex align-items-center">
                    <div>
                      <div>
                        <img
                          alt=""
                          src="../../assets/images/brand/github-logo.svg"
                        >
                      </div>
                    </div>
                    <div class="lh-1 ms-3">
                      <h5 class="mb-1"> <a
                          class="text-inherit"
                          href="#"
                        >GitHub Satellite</a></h5>
                    </div>
                  </div>
                </td>
                <td>Aug 14</td>
                <td><span class="badge bg-info">Low</span></td>
                <td>
                  <div class="avatar-group">
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-7.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-8.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-9.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm avatar-primary">
                      <span class="avatar-initials rounded-circle fs-6">+1</span>
                    </span>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <a
                      aria-expanded="false"
                      aria-haspopup="true"
                      class="text-muted text-primary-hover"
                      data-bs-toggle="dropdown"
                      href="#"
                      id="dropdownThree"
                      role="button"
                    >
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <div
                      aria-labelledby="dropdownThree"
                      class="dropdown-menu"
                    >
                      <a
                        class="dropdown-item"
                        href="#"
                      >Action</a>
                      <a
                        class="dropdown-item"
                        href="#"
                      >Another action</a>
                      <a
                        class="dropdown-item"
                        href="#"
                      >Something else
                        here</a>
                    </div>
                  </div>
                </td>
              </tr>
              <tr>
                <td class="border-bottom-0 align-middle">
                  <div class="d-flex align-items-center">
                    <div>
                      <div>
                        <img
                          alt=""
                          src="../../assets/images/brand/3dsmax-logo.svg"
                        >
                      </div>
                    </div>
                    <div class="lh-1 ms-3">
                      <h5 class="mb-1"> <a
                          class="text-inherit"
                          href="#"
                        >3D Character Modelling</a></h5>
                    </div>
                  </div>
                </td>
                <td class="border-bottom-0 align-middle">Sept 20
                </td>
                <td class="border-bottom-0 align-middle"><span class="badge bg-warning">Medium</span></td>
                <td class="border-bottom-0 align-middle">
                  <div class="avatar-group">
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-10.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-11.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm">
                      <img
                        alt="avatar"
                        class="rounded-circle"
                        src="../../assets/images/avatar/avatar-12.jpg"
                      >
                    </span>
                    <span class="avatar avatar-sm avatar-primary">
                      <span class="avatar-initials rounded-circle fs-6">+5</span>
                    </span>
                  </div>
                </td>
                <td class="border-bottom-0 align-middle">
                  <div class="dropdown">
                    <a
                      aria-expanded="false"
                      aria-haspopup="true"
                      class="text-muted text-primary-hover"
                      data-bs-toggle="dropdown"
                      href="#"
                      id="dropdownFour"
                      role="button"
                    >
                      <i class="fe fe-more-vertical"></i>
                    </a>
                    <div
                      aria-labelledby="dropdownFour"
                      class="dropdown-menu"
                    >
                      <a
                        class="dropdown-item"
                        href="#"
                      >Action</a>
                      <a
                        class="dropdown-item"
                        href="#"
                      >Another action</a>
                      <a
                        class="dropdown-item"
                        href="#"
                      >Something else
                        here</a>
                    </div>
                  </div>
                </td>
              </tr>

            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>
@push('scripts')
  <script src="../assets/libs/@popperjs/core/dist/umd/popper.min.js"></script>
  <script src="../assets/libs/tippy.js/dist/tippy-bundle.umd.min.js"></script>

  <script src="../assets/js/vendors/tooltip.js"></script>

  <script src="../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
@endpush
