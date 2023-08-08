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
        <livewire:partials.headers.admin />
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
