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
      <!-- Nav item -->
      <li class="nav-item">
        <div class="navbar-heading">Admin</div>
      </li>
      <!-- Nav item: Clients -->
      <li class="nav-item">
        <a
          aria-controls="navClients"
          aria-expanded="false"
          class="nav-link"
          data-bs-target="#navClients"
          data-bs-toggle="collapse"
          href="#"
        >
          <i class="nav-icon fe fe-book me-2"></i> Clients
        </a>
        <div
          class="show collapse"
          data-bs-parent="#sideNavbar"
          id="navClients"
        >
          <ul class="nav flex-column">
            <li class="nav-item">
              <a
                class="nav-link"
                href="{{route('clients.index')}}"
              >
                All Clients
              </a>
            </li>
            <li class="nav-item">
              <a
                class="nav-link active"
                href="{{ route('clients.create') }}"
              >
                Create
              </a>
            </li>
          </ul>
        </div>
      </li>
    </ul>
  </div>
</nav>
