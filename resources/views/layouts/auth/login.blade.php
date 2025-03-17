<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <title>Login</title>
    <link
      rel="stylesheet"
      href="{{ asset('assets-dashboard/css/login/style.css') }}"
    />
  </head>
  <body>
    <!-- partial:index.partial.html -->
    <body>
      <section class="container">
        <div class="login-container">
          <div class="circle circle-one"></div>
          <div class="form-container">
            <img
              src="https://raw.githubusercontent.com/hicodersofficial/glassmorphism-login-form/master/assets/illustration.png"
              alt="illustration"
              class="illustration"
            />
            <h1 class="opacity">Đăng Nhập</h1>
            <form accept="" method="POST" action="{{ route('auth.login') }}">
              @csrf
              <input type="text" name="email" placeholder="Tài Khoản" />
              @if ($errors->has('email'))
                <span class="error-message">
                  {{ $errors->first('email') }}
                </span>
              @endif

              <input type="password" name="password" placeholder="Mật Khẩu" />
              @if ($errors->has('password'))
                <span class="error-message">
                  {{ $errors->first('password') }}
                </span>
              @endif

              <button class="opacity">Đăng Nhập</button>
            </form>
            <div class="register-forget opacity">
              <a href="">Đăng kí</a>
              <a href="">Quên Mật Khẩu</a>
            </div>
          </div>
          <div class="circle circle-two"></div>
        </div>
        <div class="theme-btn-container"></div>
      </section>
    </body>
    <!-- partial -->
    <script src="{{ asset('assets-dashboard/js/login/script.js') }}"></script>
  </body>
</html>
