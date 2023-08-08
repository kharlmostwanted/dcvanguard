<!DOCTYPE html>
<html lang="en">

<head> <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta
    content="width=device-width, initial-scale=1"
    name="viewport"
  >
  <meta
    content=""
    name="description"
  >
  <meta
    content=""
    name="keywords"
  >
  <meta
    content="Codescandy"
    name="author"
  >

  <script>
    // Render blocking JS:
    if (localStorage.theme) document.documentElement.setAttribute("data-theme", localStorage.theme);
  </script>

  <!-- Favicon icon-->
  <link
    href="../assets/images/favicon/favicon.ico"
    rel="shortcut icon"
    type="image/x-icon"
  >

  <!-- Libs CSS -->
  <link
    href="../assets/fonts/feather/feather.css"
    rel="stylesheet"
  >
  <link
    href="../assets/libs/bootstrap-icons/font/bootstrap-icons.css"
    rel="stylesheet"
  />
  <link
    href="../assets/libs/@mdi/font/css/materialdesignicons.min.css"
    rel="stylesheet"
  />
  <link
    href="../assets/libs/simplebar/dist/simplebar.min.css"
    rel="stylesheet"
  >

  <!-- Theme CSS -->
  <link
    href="../assets/css/theme.min.css"
    rel="stylesheet"
  >
  <title>Sign in | Geeks - Bootstrap 5 Template </title>
</head>

<body>
  <!-- Page content -->
  <main>
    <section class="d-flex flex-column container">
      <div class="row align-items-center justify-content-center g-0 min-vh-100">

        <div class="col-lg-5 col-md-8 py-xl-0 py-8">
          <!-- Card -->
          <div class="card shadow">
            <!-- Card body -->
            <div class="card-body p-6">
              <div class="mb-4">
                <a href="../index.html"><img
                    alt="logo-icon"
                    class="mb-4"
                    src="../assets/images/brand/logo/logo-icon.svg"
                  ></a>
                <h1 class="fw-bold mb-1">Sign in</h1>
                <span>Don’t have an account? <a
                    class="ms-1"
                    href="sign-up.html"
                  >Sign up</a></span>
              </div>
              <!-- Form -->
              <form
                action="{{ route('login') }}"
                method="POST"
              >
                @csrf
                <!-- Username -->
                <div class="mb-3">
                  <label
                    class="form-label"
                    for="email"
                  >Username or email</label>
                  <input
                    autocomplete="email"
                    autofocus
                    class="form-control @error('email') is-invalid @enderror"
                    id="email"
                    name="email"
                    required
                    type="email"
                    value="{{ old('email') }}"
                  >

                  @error('email')
                    <span
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <!-- Password -->
                <div class="mb-3">
                  <label
                    class="form-label"
                    for="password"
                  >Password</label>
                  <input
                    autocomplete="current-password"
                    class="form-control @error('password') is-invalid @enderror"
                    id="password"
                    name="password"
                    required
                    type="password"
                  >

                  @error('password')
                    <span
                      class="invalid-feedback"
                      role="alert"
                    >
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
                <!-- Checkbox -->
                <div class="d-lg-flex justify-content-between align-items-center mb-4">
                  <div class="form-check">
                    <input
                      class="form-check-input"
                      id="rememberme"
                      type="checkbox"
                    >
                    <label
                      class="form-check-label"
                      for="rememberme"
                    >Remember me</label>
                  </div>
                  <div>
                    <a href="forget-password.html">Forgot your password?</a>
                  </div>
                </div>
                <div>
                  <!-- Button -->
                  <div class="d-grid">
                    <button
                      class="btn btn-primary"
                      type="submit"
                    >Sign in</button>
                  </div>
                </div>
                <hr class="my-4">
                <div class="mt-4 text-center">
                  <!--Facebook-->
                  <a
                    class="btn-social btn-social-outline btn-facebook"
                    href="#"
                  >
                    <i class="mdi mdi-facebook fs-4"></i>
                  </a>
                  <!--Twitter-->
                  <a
                    class="btn-social btn-social-outline btn-twitter"
                    href="#"
                  >
                    <i class="mdi mdi-twitter fs-4"></i>
                  </a>
                  <!--LinkedIn-->
                  <a
                    class="btn-social btn-social-outline btn-linkedin"
                    href="#"
                  >
                    <i class="mdi mdi-linkedin"></i>
                  </a>
                  <!--GitHub-->
                  <a
                    class="btn-social btn-social-outline btn-github"
                    href="#"
                  >
                    <i class="mdi mdi-github"></i>
                  </a>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <!-- Scripts -->
  <!-- Libs JS -->
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.min.js"></script>

  <!-- Theme JS -->
  <script src="../assets/js/theme.min.js"></script>

</body>

</html>
