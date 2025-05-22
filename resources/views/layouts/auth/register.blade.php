<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Register</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset('assets-dashboard/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets-dashboard/vendors/css/vendor.bundle.base.css') }}">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ asset('assets-dashboard/css/style.css') }}">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ asset('assets-dashboard/images/favicon.png') }}"/>
  </head>
  <body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
          <div class="row w-100 m-0">
            <div class="content-wrapper full-page-wrapper d-flex align-items-center auth login-bg">
              <div class="card col-lg-4 mx-auto">
                <div class="card-body px-5 py-5">
                  <h3 class="card-title text-left mb-3 text-dark">Đăng kí</h3>
                  <form method="POST" action="{{ route('auth.register') }}">
                    @csrf
                    <div class="form-group">
                        <label>Họ và tên</label>
                        <input type="text" name="hoTen" value="{{ old('hoTen') }}" class="form-control p_input">
                        @error('hoTen')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control p_input">
                        @error('email')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control p_input">
                        @error('password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label>Nhập lại mật khẩu</label>
                        <input type="password" name="re_password" class="form-control p_input">
                        @error('re_password')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    
                    
                    
                    <div class="text-center">
                      <button type="submit" class="btn btn-primary btn-block enter-btn">Đăng kí</button>
                    </div>
                    <div class="d-flex">
                      <button class="btn btn-facebook col mr-2">
                        <i class="mdi mdi-facebook"></i> Facebook </button>
                      <button class="btn btn-google col">
                        <i class="mdi mdi-google-plus"></i> Google plus </button>
                    </div>
                    <p class="sign-up text-center">Đã có tài khoản? <a href="{{ route('auth.login') }}">Đăng nhập</a></p>
                    <p class="terms">Bằng cách tạo một tài khoản, bạn chấp nhận<a href="#">Điều khoản & Điều kiện của chúng tôi</a></p>
                  </form>
                </div>
              </div>
            </div>
            <!-- content-wrapper ends -->
          </div>
          <!-- row ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="{{ asset('assets-dashboard/vendors/js/vendor.bundle.base.js') }}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ asset('assets-dashboard/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/misc.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/settings.js') }}"></script>
    <script src="{{ asset('assets-dashboard/js/todolist.js') }}"></script>
    <!-- endinject -->
  </body>
</html>