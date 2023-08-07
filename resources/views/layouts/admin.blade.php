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
    href="../../assets/libs/bootstrap-icons/font/bootstrap-icons.css"
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
  <div id="db-wrapper">
    <!-- navbar vertical -->
    <!-- Sidebar -->
    <livewire:partials.navs.admin />
    <!-- Page Content -->
    <main id="page-content">
      <div class="header">
        <!-- navbar -->
        <nav class="navbar-default navbar navbar-expand-lg">
          <a
            href="#"
            id="nav-toggle"
          >
            <i class="fe fe-menu"></i>
          </a>
          <div class="ms-lg-3 d-none d-md-none d-lg-block">
            <!-- Form -->
            <form class="d-flex align-items-center">
              <span class="position-absolute search-icon ps-3">
                <i class="fe fe-search"></i>
              </span>
              <input
                class="form-control ps-6"
                placeholder="Search Entire Dashboard"
                type="search"
              >
            </form>
          </div>
          <!--Navbar nav -->
          <div class="d-flex ms-auto">
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
              ></label>

            </a>
            <ul class="navbar-nav navbar-right-wrap d-flex nav-top-wrap ms-2">
              <li class="dropdown stopevent">
                <a
                  aria-expanded="false"
                  aria-haspopup="true"
                  class="btn btn-light btn-icon rounded-circle indicator indicator-primary text-muted"
                  data-bs-toggle="dropdown"
                  href="#"
                  id="dropdownNotification"
                  role="button"
                >
                  <i class="fe fe-bell"></i>
                </a>
                <div
                  aria-labelledby="dropdownNotification"
                  class="dropdown-menu dropdown-menu-end dropdown-menu-lg"
                >
                  <div>
                    <div class="border-bottom d-flex justify-content-between align-items-center px-3 pb-3">
                      <span class="h4 mb-0">Notifications</span>
                      <a
                        class="text-muted"
                        href="# "
                      >
                        <span class="align-middle">
                          <i class="fe fe-settings me-1"></i>
                        </span>
                      </a>
                    </div>
                    <!-- List group -->
                    <ul
                      class="list-group list-group-flush"
                      data-simplebar
                      style="max-height: 300px;"
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
                                  <p class="mb-3">
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
                                  <p class="mb-3">
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
                          <div class="col-auto me-2 text-center">
                            <a
                              class="badge-dot bg-secondary"
                              data-bs-placement="top"
                              data-bs-toggle="tooltip"
                              href="#"
                              title="Mark as unread"
                            >
                            </a>
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
                                  src="../../assets/images/avatar/avatar-3.jpg"
                                >
                                <div class="ms-3">
                                  <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                                  <p class="mb-3">
                                    Krisitn Watsan like your comment on course
                                    Javascript Introduction!
                                  </p>
                                  <span class="fs-6 text-muted">
                                    <span><span class="fe fe-thumbs-up text-info me-1"></span>Oct
                                      9,</span>
                                    <span class="ms-1">1:56 PM</span>
                                  </span>
                                </div>
                              </div>
                            </a>
                          </div>
                          <div class="col-auto me-2 text-center">
                            <a
                              class="badge-dot bg-secondary"
                              data-bs-placement="top"
                              data-bs-toggle="tooltip"
                              href="#"
                              title="Mark as unread"
                            >
                            </a>
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
                                  src="../../assets/images/avatar/avatar-4.jpg"
                                >
                                <div class="ms-3">
                                  <h5 class="fw-bold mb-1">Sina Ray</h5>
                                  <p class="mb-3">
                                    You earn new certificate for complete the
                                    Javascript
                                    Beginner course.
                                  </p>
                                  <span class="fs-6 text-muted">
                                    <span><span class="fe fe-award text-warning me-1"></span>Oct
                                      9,</span>
                                    <span class="ms-1">1:56 PM</span>
                                  </span>
                                </div>
                              </div>
                            </a>
                          </div>
                          <div class="col-auto me-2 text-center">
                            <a
                              class="badge-dot bg-secondary"
                              data-bs-placement="top"
                              data-bs-toggle="tooltip"
                              href="#"
                              title="Mark as unread"
                            >
                            </a>
                          </div>
                        </div>
                      </li>
                    </ul>
                    <div class="border-top px-3 pb-0 pt-3">
                      <a
                        class="text-link fw-semibold"
                        href="../../pages/notification-history.html"
                      >
                        See all Notifications
                      </a>
                    </div>
                  </div>
                </div>
              </li>
              <!-- List -->
              <li class="dropdown ms-2">
                <a
                  aria-expanded="false"
                  class="rounded-circle"
                  data-bs-toggle="dropdown"
                  href="#"
                  id="dropdownUser"
                  role="button"
                >
                  <div class="avatar avatar-md avatar-indicators avatar-online">
                    <img
                      alt="avatar"
                      class="rounded-circle"
                      src="../../assets/images/avatar/avatar-1.jpg"
                    >
                  </div>
                </a>
                <div
                  aria-labelledby="dropdownUser"
                  class="dropdown-menu dropdown-menu-end"
                >
                  <div class="dropdown-item">
                    <div class="d-flex">
                      <div class="avatar avatar-md avatar-indicators avatar-online">
                        <img
                          alt="avatar"
                          class="rounded-circle"
                          src="../../assets/images/avatar/avatar-1.jpg"
                        >
                      </div>
                      <div class="lh-1 ms-3">
                        <h5 class="mb-1">Annette Black</h5>
                        <p class="text-muted mb-0">annette@geeksui.com</p>
                      </div>
                    </div>
                  </div>
                  <div class="dropdown-divider"></div>
                  <ul class="list-unstyled">
                    <li class="dropdown-submenu dropstart-lg">
                      <a
                        class="dropdown-item dropdown-list-group-item dropdown-toggle"
                        href="#"
                      >
                        <i class="fe fe-circle me-2"></i> Status
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                          >
                            <span class="badge-dot bg-success me-2"></span> Online
                          </a>
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                          >
                            <span class="badge-dot bg-secondary me-2"></span> Offline
                          </a>
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                          >
                            <span class="badge-dot bg-warning me-2"></span> Away
                          </a>
                        </li>
                        <li>
                          <a
                            class="dropdown-item"
                            href="#"
                          >
                            <span class="badge-dot bg-danger me-2"></span> Busy
                          </a>
                        </li>
                      </ul>
                    </li>
                    <li>
                      <a
                        class="dropdown-item"
                        href="../../pages/profile-edit.html"
                      >
                        <i class="fe fe-user me-2"></i> Profile
                      </a>
                    </li>
                    <li>
                      <a
                        class="dropdown-item"
                        href="../../pages/student-subscriptions.html"
                      >
                        <i class="fe fe-star me-2"></i> Subscription
                      </a>
                    </li>
                    <li>
                      <a
                        class="dropdown-item"
                        href="#"
                      >
                        <i class="fe fe-settings me-2"></i> Settings
                      </a>
                    </li>
                  </ul>
                  <div class="dropdown-divider"></div>
                  <ul class="list-unstyled">
                    <li>
                      <a
                        class="dropdown-item"
                        href="../../index.html"
                      >
                        <i class="fe fe-power me-2"></i> Sign Out
                      </a>
                    </li>
                  </ul>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </div>
      <!-- Container fluid -->
      <section class="container-fluid p-4">
        {{ $slot }}
      </section>
    </main>
  </div>
  @livewireScripts

  {{-- THEME SCRIPTS --}}
  <!-- Scripts -->
  <!-- Libs JS -->
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/libs/simplebar/dist/simplebar.min.js"></script>

  <!-- Theme JS -->
  <script src="../../assets/js/theme.min.js"></script>

  <script src="../../assets/libs/quill/dist/quill.min.js"></script>

  <script src="../../assets/libs/bootstrap-select/dist/js/bootstrap-select.min.js"></script>

  <script src="../../assets/js/vendors/editor.js"></script>
  {{-- END THEME SCRIPTS --}}
</body>

</html>
