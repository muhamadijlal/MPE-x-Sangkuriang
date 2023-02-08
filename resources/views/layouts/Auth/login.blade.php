
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Mitra Pratama Engineering</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{ asset('assets/css/vertical-layout-light/style.css') }}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}"/>
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo mb-5 d-flex justify-content-center">
                <img src="{{ asset('assets/images/mpe/logo.png') }}" alt="logo">
              </div>
              @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                </div>
              @endif
              <h6 class="font-weight-light">Login untuk melanjutkan.</h6>
              <form class="pt-3" action="{{ route('autentikasi') }}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="email" class="form-control form-control-lg @error('email')
                      is-invalid
                  @enderror" id="exampleInputEmail1" placeholder="Username" name="email" autocomplete="off">
                  @error('email')
                      <div class="invalid-feedback">
                        {{ $message }}
                      </div>
                  @enderror
                </div>
                <div class="form-group">
                  <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password" autocomplete="off">
                </div>
                <div class="mt-3 d-flex justify-content-end">
                  <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">Log In</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="{{ asset('assets/') }}vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{ asset('assets/') }}js/off-canvas.js"></script>
  <script src="{{ asset('assets/') }}js/hoverable-collapse.js"></script>
  <script src="{{ asset('assets/') }}js/template.js"></script>
  <script src="{{ asset('assets/') }}js/settings.js"></script>
  <script src="{{ asset('assets/') }}js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
