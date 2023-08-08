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
    <nav class="navbar-vertical navbar">
      <div
        class="vh-100"
        data-simplebar
      >
        <!-- Brand logo -->
        <a
          class="navbar-brand"
          href="{{ route('home') }}"
        >
          <img
            alt=""
            src="../../assets/images/brand/logo/logo-inverse.svg"
          >
        </a>
        <!-- Navbar nav -->
        <ul
          class="navbar-nav flex-column"
          id="sideNavbar"
        >
          <li class="nav-item">
            <a
              aria-controls="navDashboard"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navDashboard"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-home me-2"></i> Dashboard
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navDashboard"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/admin-dashboard.html"
                  >
                    Overview
                  </a>
                </li>
                <!-- Nav item -->
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/dashboard-analytics.html"
                  >
                    Analytics

                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a
              aria-controls="navCourses"
              aria-expanded="false"
              class="nav-link"
              data-bs-target="#navCourses"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-book me-2"></i> Courses
            </a>
            <div
              class="show collapse"
              data-bs-parent="#sideNavbar"
              id="navCourses"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/admin-course-overview.html"
                  >
                    All Courses
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    href="../../pages/dashboard/admin-course-category.html"
                  >
                    Courses Category
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/admin-course-category-single.html"
                  >
                    Category Single
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              aria-controls="navProfile"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navProfile"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-user me-2"></i> User
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navProfile"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/admin-instructor.html"
                  >
                    Instructor
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/admin-students.html"
                  >Students</a>
                </li>
              </ul>
            </div>
          </li>

          <!-- Nav item -->
          <li class="nav-item">
            <a
              aria-controls="navCMS"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navCMS"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-book-open me-2"></i> CMS
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navCMS"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/admin-cms-overview.html"
                  >
                    Overview
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/admin-cms-post.html"
                  >
                    All Post
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/admin-cms-post-new.html"
                  >
                    New Post
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/admin-cms-post-category.html"
                  >
                    Category
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              aria-controls="navProject"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navProject"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-file me-2"></i> Project
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navProject"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/project-grid.html"
                  >
                    Grid
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/project-list.html"
                  >
                    List
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    aria-controls="navprojectSingle"
                    aria-expanded="false"
                    class="nav-link collapsed"
                    data-bs-target="#navprojectSingle"
                    data-bs-toggle="collapse"
                    href="#"
                  >

                    Single
                  </a>
                  <div
                    class="collapse"
                    data-bs-parent="#navProject"
                    id="navprojectSingle"
                  >
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/project-overview.html"
                        >
                          Overview
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/project-task.html"
                        >
                          Task
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/project-budget.html"
                        >
                          Budget
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/project-team.html"
                        >
                          Team
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/project-files.html"
                        >
                          Files
                        </a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/project-summary.html"
                        >
                          Summary
                        </a>
                      </li>

                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/add-project.html"
                  >
                    Create Project
                  </a>
                </li>

              </ul>
            </div>
          </li>

          <!-- Nav item -->
          <li class="nav-item">
            <a
              aria-controls="navAuthentication"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navAuthentication"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-lock me-2"></i> Authentication
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navAuthentication"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/sign-in.html"
                  >Sign In</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/sign-up.html"
                  >Sign Up</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/forget-password.html"
                  >
                    Forget Password
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/notification-history.html"
                  >
                    Notifications
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/404-error.html"
                  > 404 Error</a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              aria-controls="navecommerce"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navecommerce"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-shopping-bag me-2"></i> Ecommerce
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navecommerce"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    aria-controls="navproduct"
                    aria-expanded="false"
                    class="nav-link collapsed"
                    data-bs-target="#navproduct"
                    data-bs-toggle="collapse"
                    href="#"
                  >

                    Product
                  </a>
                  <div
                    class="collapse"
                    data-bs-parent="#navProduct"
                    id="navproduct"
                  >
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/ecommerce/product-grid.html"
                        >Grid</a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/ecommerce/product-grid-with-sidebar.html"
                        >Grid
                          Sidebar</a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/ecommerce/products.html"
                        >Products</a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/ecommerce/product-single.html"
                        >Product
                          Single</a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/ecommerce/product-single-v2.html"
                        >Product
                          Single v2</a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="../../pages/dashboard/ecommerce/add-product.html"
                        >Add
                          Product</a>
                      </li>

                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/ecommerce/shopping-cart.html"
                  >Shopping Cart</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/ecommerce/checkout.html"
                  >Checkout</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/ecommerce/order.html"
                  >Order</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/ecommerce/order-single.html"
                  >Order
                    Single</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/ecommerce/order-history.html"
                  >Order History</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/ecommerce/order-summary.html"
                  >Order Summary</a>
                </li>

                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/ecommerce/customers.html"
                  >Customers</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/ecommerce/customer-single.html"
                  >Customer Single</a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/ecommerce/add-customer.html"
                  >Add
                    Customer</a>
                </li>

              </ul>
            </div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              aria-controls="navlayouts"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navlayouts"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-layout me-2"></i> Layouts
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navlayouts"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/layouts/layout-horizontal.html"
                  >Top</a>
                </li>

                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/layouts/layout-compact.html"
                  >
                    Compact
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/layouts/layout-vertical.html"
                  >Vertical</a>
                </li>

              </ul>
            </div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <div class="nav-divider"></div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <div class="navbar-heading">Apps</div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              class="nav-link"
              href="../../pages/dashboard/chat-app.html"
            >
              <i class="nav-icon fe fe-message-square me-2"></i> Chat

            </a>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              class="nav-link"
              href="../../pages/dashboard/task-kanban.html"
            >
              <i class="nav-icon mdi mdi-trello me-2"></i>
              Task
            </a>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              class="nav-link"
              href="../../pages/dashboard/mail.html"
            >
              <i class="nav-icon mdi mdi-email-outline me-2"></i>
              Mail
            </a>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              class="nav-link"
              href="../../pages/dashboard/calendar.html"
            >
              <i class="nav-icon mdi mdi-calendar me-2"></i>
              Calendar
            </a>
          </li>
          <li class="nav-item">
            <div class="nav-divider"></div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <div class="navbar-heading">Components</div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              aria-controls="navTables"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navTables"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-database me-2"></i> Tables
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navTables"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/basic-table.html"
                  >
                    Basic
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/datatables.html"
                  >
                    Data Tables
                  </a>
                </li>

              </ul>
            </div>
          </li>
          <!-- Nav item -->
          <!-- Nav item -->
          <li class="nav-item">
            <a
              class="nav-link"
              href="../../pages/help-center.html"
            >
              <i class="nav-icon fe fe-help-circle me-2"></i> Help Center

            </a>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              aria-controls="navSiteSetting"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navSiteSetting"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-settings me-2"></i> Site Setting
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navSiteSetting"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/setting-general.html"
                  >
                    General
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/setting-google.html"
                  >
                    Google
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/setting-social.html"
                  >
                    Social
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/setting-social-login.html"
                  >
                    Social Login
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/setting-payment.html"
                  >
                    Payment
                  </a>
                </li>
                <li class="nav-item">
                  <a
                    class="nav-link"
                    href="../../pages/dashboard/setting-smpt.html"
                  >
                    SMPT
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              aria-controls="navMenuLevel"
              aria-expanded="false"
              class="nav-link collapsed"
              data-bs-target="#navMenuLevel"
              data-bs-toggle="collapse"
              href="#"
            >
              <i class="nav-icon fe fe-corner-left-down me-2"></i> Menu Level
            </a>
            <div
              class="collapse"
              data-bs-parent="#sideNavbar"
              id="navMenuLevel"
            >
              <ul class="nav flex-column">
                <li class="nav-item">
                  <a
                    aria-controls="navMenuLevelSecond"
                    aria-expanded="false"
                    class="nav-link"
                    data-bs-target="#navMenuLevelSecond"
                    data-bs-toggle="collapse"
                    href="#"
                  >
                    Two Level
                  </a>
                  <div
                    class="collapse"
                    data-bs-parent="#navMenuLevel"
                    id="navMenuLevelSecond"
                  >
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="#"
                        >NavItem 1</a>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="#"
                        >NavItem 2</a>
                      </li>
                    </ul>
                  </div>
                </li>
                <li class="nav-item">
                  <a
                    aria-controls="navMenuLevelThree"
                    aria-expanded="false"
                    class="nav-link collapsed"
                    data-bs-target="#navMenuLevelThree"
                    data-bs-toggle="collapse"
                    href="#"
                  >
                    Three Level
                  </a>
                  <div
                    class="collapse"
                    data-bs-parent="#navMenuLevel"
                    id="navMenuLevelThree"
                  >
                    <ul class="nav flex-column">
                      <li class="nav-item">
                        <a
                          aria-controls="navMenuLevelThreeOne"
                          aria-expanded="false"
                          class="nav-link collapsed"
                          data-bs-target="#navMenuLevelThreeOne"
                          data-bs-toggle="collapse"
                          href="#"
                        >
                          NavItem 1
                        </a>
                        <div
                          class="collapse collapse"
                          data-bs-parent="#navMenuLevelThree"
                          id="navMenuLevelThreeOne"
                        >
                          <ul class="nav flex-column">
                            <li class="nav-item">
                              <a
                                class="nav-link"
                                href="#"
                              >
                                NavChild Item 1
                              </a>
                            </li>
                          </ul>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a
                          class="nav-link"
                          href="#"
                        >Nav
                          Item 2</a>
                      </li>
                    </ul>
                  </div>
                </li>
              </ul>
            </div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <div class="nav-divider"></div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <div class="navbar-heading">Documentation</div>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              class="nav-link"
              href="../../docs/index.html"
            >
              <i class="nav-icon fe fe-clipboard me-2"></i> Documentation
            </a>
          </li>
          <!-- Nav item -->
          <li class="nav-item">
            <a
              class="nav-link"
              href="../../docs/changelog.html"
            >
              <i class="nav-icon fe fe-git-pull-request me-2"></i> Changelog <span
                class="text-primary ms-1"
                id="changelog"
              ></span>
            </a>
          </li>
        </ul>
        <!-- Card -->
        <div class="card bg-dark-primary mx-4 my-8 text-center shadow-none">
          <div class="card-body py-6">
            <img
              alt=""
              src="../../assets/images/background/giftbox.png"
            >
            <div class="mt-4">
              <h5 class="text-white">Unlimited Access</h5>
              <p class="text-white-50 fs-6">
                Upgrade your plan from a Free trial, to select ‘Business Plan’. Start Now
              </p>
              <a
                class="btn btn-white btn-sm mt-2"
                href="#"
              >Upgrade Now</a>
            </div>
          </div>
        </div>
      </div>
    </nav>
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
                        href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                      >
                        <i class="fe fe-power me-2"></i> Sign Out
                      </a>
                      <form
                        action="{{ route('logout') }}"
                        class="d-none"
                        id="logout-form"
                        method="post"
                      >
                        @csrf
                      </form>
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
        <div class="row">
          <!-- Page Header -->
          <div class="col-lg-12 col-md-12 col-12">
            <div class="border-bottom d-md-flex align-items-center justify-content-between mb-3 pb-3">
              <div class="mb-md-0 mb-3">
                <h1 class="h2 fw-bold mb-1">Courses Category</h1>
                <!-- Breadcrumb -->
                <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                      <a href="../dashboard/admin-dashboard.html">Dashboard</a>
                    </li>
                    <li class="breadcrumb-item">
                      <a href="#">Courses</a>
                    </li>
                    <li
                      aria-current="page"
                      class="breadcrumb-item active"
                    >
                      Courses Category
                    </li>
                  </ol>
                </nav>
              </div>
              <div>
                <a
                  class="btn btn-primary"
                  data-bs-target="#newCatgory"
                  data-bs-toggle="modal"
                  href="#"
                >Add New
                  Category</a>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          {{ $slot }}
        </div>
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
