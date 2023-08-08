<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta
    content="width=device-width, initial-scale=1"
    name="viewport"
  >

  <!-- CSRF Token -->
  <meta
    content="{{ csrf_token() }}"
    name="csrf-token"
  >

  <title>{{ config('app.name', 'Dcvanguard') }}</title>

  {{-- THEME CSS --}}
  <link
    href="../../assets/libs/bootstrap-select/dist/css/bootstrap-select.min.css"
    rel="stylesheet"
  >
  <script>
    // Render blocking JS:
    if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
  </script>
  <!-- Favicon icon-->
  <link
    href="../../assets/images/favicon/favicon.ico"
    rel="shortcut icon"
    type="image/x-icon"
  >

  <!-- Libs CSS -->
  <link
    href="../../assets/fonts/feather/feather.css"
    rel="stylesheet"
  >
  <link
    href="{{ asset('/assets/libs/bootstrap-icons/font/bootstrap-icons.css') }}"
    rel="stylesheet"
  />
  <link
    href="../../assets/libs/@mdi/font/css/materialdesignicons.min.css"
    rel="stylesheet"
  />

  <link
    href="../../assets/libs/simplebar/dist/simplebar.min.css"
    rel="stylesheet"
  >

  <!-- Theme CSS -->
  <link
    href="../../assets/css/theme.min.css"
    rel="stylesheet"
  >
  {{-- END THEME CSS --}}

  <!-- Scripts -->
  @vite(['resources/sass/app.scss', 'resources/js/app.js'])
  @livewireStyles
</head>

<body>
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid px-0">
      <a
        class="navbar-brand"
        href="index.html"
      ><img
          alt=""
          class=""
          src="logoheader.svg"
        ></a>
      <!-- Mobile view nav wrap -->

      <div class="d-flex align-items-center order-lg-3 ms-auto">

        <div>
          <a
            class="form-check form-switch theme-switch btn btn-light btn-icon rounded-circle"
            href="#"
          >
            <input
              class="form-check-input"
              id="flexSwitchCheckDefault"
              role="switch"
              type="checkbox"
            >
            <label
              class="form-check-label"
              for="flexSwitchCheckDefault"
            >
            </label>
          </a>
        </div>

        <ul class="navbar-nav navbar-right-wrap mx-2 flex-row">
          <li class="dropdown d-inline-block stopevent position-static">
            <a
              aria-expanded="false"
              aria-haspopup="true"
              class="btn btn-light btn-icon rounded-circle text-muted indicator indicator-primary"
              data-bs-toggle="dropdown"
              href="#"
              id="dropdownNotificationSecond"
              role="button"
            >
              <i class="fe fe-bell"> </i>
            </a>
            <div
              aria-labelledby="dropdownNotificationSecond"
              class="dropdown-menu dropdown-menu-end dropdown-menu-lg position-absolute mx-3 my-5"
            >
              <div>
                <div class="border-bottom d-flex justify-content-between align-items-center px-3 pb-3">
                  <span class="h5 mb-0">Notifications</span>
                  <a
                    class="text-muted"
                    href="# "
                  ><span class="align-middle"><i class="fe fe-settings me-1"></i></span></a>
                </div>
                <ul
                  class="list-group list-group-flush"
                  data-simplebar
                  style="height: 300px;"
                >
                  <li class="list-group-item bg-light">
                    <div class="row">
                      <div class="col">
                        <a
                          class="text-body"
                          href="#"
                        >
                          <div class="d-flex">
                            <img
                              alt=""
                              class="avatar-md rounded-circle"
                              src="../../assets/images/avatar/avatar-1.jpg"
                            >
                            <div class="ms-3">
                              <h5 class="fw-bold mb-1">Kristin Watson:</h5>
                              <p class="text-body mb-3">
                                Krisitn Watsan like your comment on course
                                Javascript Introduction!
                              </p>
                              <span class="fs-6 text-muted">
                                <span><span class="fe fe-thumbs-up text-success me-1"></span>2
                                  hours ago,</span>
                                <span class="ms-1">2:19 PM</span>
                              </span>
                            </div>
                          </div>
                        </a>
                      </div>
                      <div class="col-auto me-2 text-center">

                        <a
                          class="badge-dot bg-info"
                          data-bs-placement="top"
                          data-bs-toggle="tooltip"
                          href="#"
                          title="Mark as read"
                        >
                        </a>
                        <div>
                          <a
                            class="bg-transparent"
                            data-bs-placement="top"
                            data-bs-toggle="tooltip"
                            href="#"
                            title="Remove"
                          >
                            <i class="fe fe-x text-muted"></i>
                          </a>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li class="list-group-item">
                    <div class="row">
                      <div class="col">
                        <a
                          class="text-body"
                          href="#"
                        >
                          <div class="d-flex">
                            <img
                              alt=""
                              class="avatar-md rounded-circle"
                              src="../../assets/images/avatar/avatar-2.jpg"
                            >
                            <div class="ms-3">
                              <h5 class="fw-bold mb-1">Brooklyn Simmons</h5>
                              <p class="text-body mb-3">
                                Just launched a new Courses React for Beginner.
                              </p>
                              <span class="fs-6 text-muted">
                                <span><span class="fe fe-thumbs-up text-success me-1"></span>Oct
                                  9,</span>
                                <span class="ms-1">1:20 PM</span>
                              </span>
                            </div>
                          </div>
                        </a>
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="border-top px-3 pb-0 pt-3">
                  <a
                    class="text-link fw-semibold"
                    href="../../pages/notification-history.html"
                  >See
                    all Notifications</a>
                </div>
              </div>
            </div>
          </li>

          <li class="dropdown d-inline-block position-static ms-2">
            <a
              aria-expanded="false"
              class="rounded-circle"
              data-bs-display="static"
              data-bs-toggle="dropdown"
              href="#"
            >
              <div class="avatar avatar-md avatar-indicators avatar-online">
                <img
                  alt="avatar"
                  class="rounded-circle"
                  src="guard.svg"
                >
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-end position-absolute mx-3 my-5">
              <div class="dropdown-item">
                <div class="d-flex">
                  <div class="avatar avatar-md avatar-indicators avatar-online">
                    <img
                      alt="avatar"
                      class="rounded-circle"
                      src="guard.svg"
                    >
                  </div>
                  <div class="lh-1 ms-3">
                    <h5 class="mb-1">Admin</h5>
                    <p class="text-muted mb-0">vanguard_inc2008@yahoo.com</p>
                  </div>
                </div>
              </div>
              <div class="dropdown-divider"></div>
              <ul class="list-unstyled">

                <li>
                  <a
                    class="dropdown-item"
                    href="profile-edit.html"
                  >
                    <i class="fe fe-user me-2"></i>Profile
                  </a>
                </li>

                <li>
                  <a
                    class="dropdown-item"
                    href="#"
                  >
                    <i class="fe fe-settings me-2"></i>Settings
                  </a>
                </li>
              </ul>
              <div class="dropdown-divider"></div>
              <ul class="list-unstyled">
                <li>
                  <a
                    class="dropdown-item"
                    href="login.html"
                  >
                    <i class="fe fe-power me-2"></i>Sign Out
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>

      </div>
      <div>
        <!-- Button -->
        <button
          aria-controls="navbar-default"
          aria-expanded="false"
          aria-label="Toggle navigation"
          class="navbar-toggler collapsed"
          data-bs-target="#navbar-default"
          data-bs-toggle="collapse"
          type="button"
        >
          <span class="icon-bar top-bar mt-0"></span>
          <span class="icon-bar middle-bar"></span>
          <span class="icon-bar bottom-bar"></span>
        </button>
      </div>

    </div>
  </nav>
  <!-- Page header-->
  <main>

    <section class="py-lg-6 bg-primary py-4">
      <div class="container">
        <div class="row">
          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
            <div class="d-lg-flex align-items-center justify-content-between">
              <!-- Content -->
              <div class="mb-lg-0 mb-4">
                <h1 class="mb-1 text-white">Add New Company</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Page Content -->
    <section class="pb-12">
      <div class="container">
        <div
          class="bs-stepper"
          id="courseForm"
        >
          <div class="row">
            <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
              <!-- Stepper Button -->
              <div
                class="bs-stepper-header shadow-sm"
                role="tablist"
              >
                <div
                  class="step"
                  data-target="#test-l-1"
                >
                  <button
                    aria-controls="test-l-1"
                    class="step-trigger"
                    id="courseFormtrigger1"
                    role="tab"
                    type="button"
                  >
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Basic Information</span>
                  </button>
                </div>
                <div class="bs-stepper-line"></div>
                <div
                  class="step"
                  data-target="#test-l-2"
                >
                  <button
                    aria-controls="test-l-2"
                    class="step-trigger"
                    id="courseFormtrigger2"
                    role="tab"
                    type="button"
                  >
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Company Media</span>
                  </button>
                </div>
                <div class="bs-stepper-line"></div>
                <div
                  class="step"
                  data-target="#test-l-3"
                >
                  <button
                    aria-controls="test-l-3"
                    class="step-trigger"
                    id="courseFormtrigger3"
                    role="tab"
                    type="button"
                  >
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Address</span>
                  </button>
                </div>
                <div class="bs-stepper-line"></div>
                <div
                  class="step"
                  data-target="#test-l-4"
                >
                  <button
                    aria-controls="test-l-4"
                    class="step-trigger"
                    id="courseFormtrigger4"
                    role="tab"
                    type="button"
                  >
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">Notes</span>
                  </button>
                </div>
              </div>

              <!-- Stepper content -->
              <div class="bs-stepper-content mt-5">
                <form onSubmit="return false">
                  <!-- Content one -->
                  <div
                    aria-labelledby="courseFormtrigger1"
                    class="bs-stepper-pane fade"
                    id="test-l-1"
                    role="tabpanel"
                  >
                    <!-- Card -->
                    <div class="card mb-3">
                      <div class="card-header border-bottom px-4 py-3">
                        <h4 class="mb-0">BASIC INFORMATION</h4>
                      </div>
                      <!-- Card body -->
                      <div class="card-header border-bottom px-4 py-3">
                        <!-- input -->
                        <div class="col-md-12 mb-3">
                          <label
                            class="form-label"
                            for="companyName"
                          >Company Name</label>
                          <input
                            class="form-control"
                            id="companyName"
                            placeholder="Enter company name"
                            required
                            type="text"
                          >
                        </div>
                        <!-- input -->
                        <div class="col-md-12 mb-3">
                          <label
                            class="form-label"
                            for="clientName"
                          >Client Name</label>
                          <input
                            class="form-control"
                            id="companyName"
                            placeholder="Enter client name"
                            required
                            type="text"
                          >
                        </div>
                        <!-- input -->
                        <div class="col-md-12 mb-3">
                          <label
                            class="form-label"
                            for="email"
                          >Email</label>
                          <input
                            class="form-control"
                            id="email"
                            placeholder="Enter email address"
                            required
                            type="email"
                          >

                        </div>
                        <!-- input -->
                        <div class="col-md-12 mb-3">
                          <label
                            class="form-label"
                            for="phone"
                          >Phone</label>
                          <input
                            class="form-control"
                            id="phone"
                            placeholder="Enter phone number"
                            required
                            type="number"
                          >
                        </div>

                        <!-- input -->
                        <div class="col-md-12 mb-3">
                          <label
                            class="form-label"
                            for="country"
                          >Company Type</label>
                          <select
                            aria-label="Default select example"
                            class="form-select"
                            id="country"
                            required
                          >
                            <option selected>Select Company Type</option>
                            <option value="1">Government</option>
                            <option value="2">Private</option>
                          </select>
                        </div>
                      </div>
                    </div>

                    <!-- Button -->
                    <button
                      class="btn btn-primary"
                      onclick="courseForm.next()"
                    >
                      Next
                    </button>

                  </div>

                  <!-- Content two -->
                  <div
                    aria-labelledby="courseFormtrigger2"
                    class="bs-stepper-pane fade"
                    id="test-l-2"
                    role="tabpanel"
                  >
                    <!-- Card -->
                    <div class="card mb-3 border-0">
                      <div class="card-header border-bottom px-4 py-3">
                        <h4 class="mb-0">COMPANY MEDIA
                          <small class="text-muted">(Optional)
                          </small>
                        </h4>
                      </div>
                      <!-- Card body -->
                      <div class="card-body">
                        <div
                          class="custom-file-container mb-4"
                          data-upload-id="courseImage"
                        ></div>
                      </div>
                    </div>

                    <!-- Button -->
                    <div class="d-flex justify-content-between">
                      <button
                        class="btn btn-secondary"
                        onclick="courseForm.previous()"
                      >
                        Previous
                      </button>
                      <button
                        class="btn btn-primary"
                        onclick="courseForm.next()"
                      >
                        Next
                      </button>
                    </div>
                  </div>

                  <!-- Content three -->
                  <div
                    aria-labelledby="courseFormtrigger3"
                    class="bs-stepper-pane fade"
                    id="test-l-3"
                    role="tabpanel"
                  >
                    <!-- Card -->
                    <div class="card mb-3 border-0">
                      <!-- Card body -->
                      <div class="card-body">
                        <!-- row -->
                        <div class="row gx-3">
                          <!-- input -->
                          <div class="col-md-12 mb-3">
                            <label
                              class="form-label"
                              for="address"
                            >Address</label>
                            <input
                              class="form-control"
                              id="address"
                              placeholder="Enter address"
                              required
                              type="text"
                            >
                          </div>
                          <!-- input -->
                          <div class="col-md-12 mb-3">
                            <label
                              class="form-label"
                              for="building"
                            >Building</label>
                            <input
                              class="form-control"
                              id="aparment"
                              placeholder="Enter building name"
                              required
                              type="text"
                            >
                          </div>
                          <!-- input -->
                          <div class="col-md-6 mb-3">
                            <label
                              class="form-label"
                              for="city"
                            >City</label>
                            <input
                              class="form-control"
                              id="city"
                              placeholder="Enter City"
                              required
                              type="text"
                            >
                          </div>
                          <!-- input -->
                          <div class="col-md-6 mb-3">
                            <label
                              class="form-label"
                              for="state"
                            >Province</label>
                            <select
                              aria-label="Default select example"
                              class="form-select"
                              id="province"
                              required
                            >
                              <option selected>Select Province</option>
                              <option value="1">Davao de Oro</option>
                              <option value="2">Davao del Norte</option>
                              <option value="3">Davao del Sur</option>
                              <option value="4">Davao Occidental</option>
                              <option value="5">Davao Oriental</option>
                            </select>
                          </div>
                          <!-- input -->
                          <div class="col-md-12 mb-3">
                            <label
                              class="form-label"
                              for="country"
                            >Country</label>
                            <select
                              aria-label="Default select example"
                              class="form-select"
                              id="country"
                              required
                            >
                              <option selected>Select Country</option>
                              <option value="1">Philippines</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Button -->
                    <div class="d-flex justify-content-between">
                      <button
                        class="btn btn-secondary"
                        onclick="courseForm.previous()"
                      >
                        Previous
                      </button>
                      <button
                        class="btn btn-primary"
                        onclick="courseForm.next()"
                      >
                        Next
                      </button>
                    </div>

                  </div>
              </div>
              <!-- Content four -->
              <div
                aria-labelledby="courseFormtrigger4"
                class="bs-stepper-pane fade"
                id="test-l-4"
                role="tabpanel"
              >
                <!-- Card -->
                <div class="row gx-3">
                  <div class="col-md-12">
                    <label
                      class="form-label"
                      for="customerNotes"
                    >NOTES
                      <small class="text-muted">(Optional)</small></label>
                    <textarea
                      class="form-control"
                      id="customerNotes"
                      placeholder="Write notes"
                      rows="3"
                    ></textarea>
                  </div>
                </div>
                <!-- Button -->
                <button
                  class="btn btn-secondary mt-3"
                  onclick="courseForm.previous()"
                >
                  Previous
                </button>
                <button
                  class="btn btn-info mt-3"
                  type="submit"
                >
                  Save
                </button>
              </div>
              </form>
            </div>

          </div>
        </div>
      </div>
      </form>
      </div>
    </section>
  </main>
  @livewireScripts

  {{-- THEME SCRIPTS --}}
  <!-- Scripts -->
  <script src="../../assets/libs/file-upload-with-preview/dist/file-upload-with-preview.iife.js"></script>
  <script src="../../assets/libs/@yaireo/tagify/dist/tagify.min.js"></script>
  <!-- Libs JS -->
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/libs/simplebar/dist/simplebar.min.js"></script>

  <!-- Theme JS -->
  <script src="../../assets/js/theme.min.js"></script>


  <script src="../../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

  <script src="../../assets/libs/quill/dist/quill.min.js"></script>
  <script src="../../assets/libs/dragula/dist/dragula.min.js"></script>
  <script src="../../assets/libs/bs-stepper/dist/js/bs-stepper.min.js"></script>
  <script src="../../assets/js/vendors/beStepper.js"></script>
  <script src="../../assets/js/vendors/customDragula.js"></script>
  <script src="../../assets/js/vendors/editor.js"></script>
  <script src="../../assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
  <script src="../../assets/js/vendors/popup.js"></script>
  {{-- END THEME SCRIPTS --}}
</body>

</html>
