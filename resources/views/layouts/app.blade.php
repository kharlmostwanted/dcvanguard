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
  <livewire:partials.navs.app />
  <!-- Page header-->
  <main>
    <section class="py-lg-6 bg-primary py-4">
      <div class="container">
        <div class="row">
          <div class="offset-lg-1 col-lg-10 col-md-12 col-12">
            <div class="d-lg-flex align-items-center justify-content-between">
              <!-- Content -->
              <div class="mb-lg-0 mb-4">
                <h1 class="mb-1 text-white">@yield('page-title')</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Page Content -->
    <section class="pb-12">
      <div class="container">
        {{ $slot }}
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
