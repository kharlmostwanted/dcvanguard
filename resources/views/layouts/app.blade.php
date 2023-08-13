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
  <livewire:partials.navs.app />
  <!-- Page header-->
  <main>
    <!-- Page header -->
    <section class="bg-primary py-lg-6 py-4">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-xl-12 col-lg-12 col-md-12 col-12">
            <div>
              <h1 class="display-4 mb-0 text-white">@yield('page-title')</h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Content -->
    <section class="py-6">
      {{ $slot }}
    </section>
  </main>

  {{-- footer --}}
  <footer class="footer">
    <div class="container">
      <div class="row align-items-center g-0 border-top py-2">
        <!-- Desc -->
        <div class="col-md-6 col-12 text-md-start text-center">
          <span>© <span id="copyright">
              <script>
                document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
              </script>
            </span>Geeks. All Rights Reserved.</span>
        </div>
        <!-- Links -->
        <div class="col-12 col-md-6">
          <nav class="nav nav-footer justify-content-center justify-content-md-end">
            <a
              class="nav-link active ps-0"
              href="#"
            >Privacy</a>
            <a
              class="nav-link"
              href="#"
            >Terms </a>
            <a
              class="nav-link"
              href="#"
            >Feedback</a>
            <a
              class="nav-link"
              href="#"
            >Support</a>
          </nav>
        </div>
      </div>
    </div>
  </footer>
  @livewireScripts

  {{-- THEME SCRIPTS --}}
  <!-- Scripts -->
  <!-- Libs JS -->
  <script src="../../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../../assets/libs/simplebar/dist/simplebar.min.js"></script>

  <!-- Theme JS -->
  <script src="../../assets/js/theme.min.js"></script>
  
  @stack('scripts')
</body>

</html>
