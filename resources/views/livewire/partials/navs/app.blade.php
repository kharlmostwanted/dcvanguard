<nav class="navbar navbar-expand-lg">
  <div class="container-fluid px-0">
    <a
      class="navbar-brand"
      href="{{ route('home') }}"
    ><img
        alt=""
        class=""
        src="{{ asset('/assets/images/brand/logo/logo-header.svg') }}"
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
          ></label>

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
                            src="{{ asset('/assets/images/avatar/avatar-1.jpg') }}"
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
                            src="{{ asset('/assets/images/avatar/avatar-2.jpg') }}"
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
                            src="{{ asset('/assets/images/avatar/avatar-3.jpg') }}"
                          >
                          <div class="ms-3">
                            <h5 class="fw-bold mb-1">Jenny Wilson</h5>
                            <p class="text-body mb-3">
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
                            src="{{ asset('/assets/images/avatar/avatar-4.jpg') }}"
                          >
                          <div class="ms-3">
                            <h5 class="fw-bold mb-1">Sina Ray</h5>
                            <p class="text-body mb-3">
                              You earn new certificate for complete the Javascript
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
                  href="{{ asset('/pages/notification-history.html') }}"
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
                src="{{ asset('/assets/images/avatar/avatar-1.jpg') }}"
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
                    src="{{ asset('/assets/images/avatar/avatar-1.jpg') }}"
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
                  <i class="fe fe-circle me-2"></i>Status
                </a>
                <ul class="dropdown-menu">
                  <li>
                    <a
                      class="dropdown-item"
                      href="#"
                    >
                      <span class="badge-dot bg-success me-2"></span>Online
                    </a>
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="#"
                    >
                      <span class="badge-dot bg-secondary me-2"></span>Offline
                    </a>
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="#"
                    >
                      <span class="badge-dot bg-warning me-2"></span>Away
                    </a>
                  </li>
                  <li>
                    <a
                      class="dropdown-item"
                      href="#"
                    >
                      <span class="badge-dot bg-danger me-2"></span>Busy
                    </a>
                  </li>
                </ul>
              </li>
              <li>
                <a
                  class="dropdown-item"
                  href="{{ asset('/pages/profile-edit.html') }}"
                >
                  <i class="fe fe-user me-2"></i>Profile
                </a>
              </li>
              <li>
                <a
                  class="dropdown-item"
                  href="{{ asset('/pages/student-subscriptions.html') }}"
                >
                  <i class="fe fe-star me-2"></i>Subscription
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
    <!-- Collapse -->
    <div
      class="navbar-collapse collapse"
      id="navbar-default"
    >
      <ul class="navbar-nav">
        <li class="nav-item dropdown">
          <a
            aria-expanded="false"
            aria-haspopup="true"
            class="nav-link dropdown-toggle"
            data-bs-display="static"
            data-bs-toggle="dropdown"
            href="#"
            id="navbarBrowse"
          >
            Clients
          </a>
          <ul
            aria-labelledby="navbarBrowse"
            class="dropdown-menu dropdown-menu-arrow"
          >
            <li>
              <a
                class="dropdown-item"
                href="{{ route('clients.index') }}"
              >
                View All
              </a>
            </li>
            <li>
              <a
                class="dropdown-item"
                href="{{ route('clients.create') }}"
              >
                Create New
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a
            aria-expanded="false"
            aria-haspopup="true"
            class="nav-link dropdown-toggle"
            data-bs-display="static"
            data-bs-toggle="dropdown"
            href="#"
            id="navbarBillings"
          >
            Billings
          </a>
          <ul
            aria-labelledby="navbarBillings"
            class="dropdown-menu dropdown-menu-arrow"
          >
            <li>
              <a
                class="dropdown-item"
                href="{{ route('billings.index') }}"
              >
                View All
              </a>
            </li>
          </ul>
        </li>
      </ul>

    </div>

  </div>
</nav>
