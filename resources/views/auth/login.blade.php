<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartHire</title>
    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <style>
        .btn-google {
            display: inline-flex;
            align-items: center;
            background-color: #fff;
            border: 1px solid #ccc;
            padding: 10px 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            width: 90%;
            color: #555;
            transition: border-color 0.3s;
            align-items: center;
            text-align: center
        }

        .btn-google img {
            width: 20px;
            height: 20px;
            margin-right: 10px;
        }

        .btn-google:hover {
            border-color: #aaa;
        }
        </style>
  <div class="all">
    <div class="form-container">
      <h4>Login to Your Account</h4>
      <hr>

      <!-- نموذج تسجيل الدخول مربوط بالـ Back-end -->
      <form method="POST" action="{{ route('login') }}">
        @csrf <!-- Laravel CSRF Protection -->
       <!-- تأكد إنك ضايف صورة شعار جوجل في مجلد public/images -->
<a href="{{ route('google.login') }}" class="btn btn-google">
    <img src="{{ asset('assets/IMG/google-logo.png') }}" alt="Google Logo">
    <span>تسجيل الدخول باستخدام Google</span>
</a>
        <!-- Session Status -->
        @if (session('status'))
          <p style="color: green; font-size: 14px;">{{ session('status') }}</p>
        @endif

        <!-- Email Field -->
        <div class="entery">
          <label>Email</label>
          <br>
          <input type="email" name="email" value="{{ old('email') }}" required>
          @error('email')
            <p style="color: red; font-size: 12px;">{{ $message }}</p>
          @enderror
        </div>
        <br>

        <!-- Password Field -->
        <div class="entery">
          <label>Password</label>
          <br>
          <div class="input-container" id="password">
            <input type="password" name="password" required autocomplete="current-password">
            <i class="fas fa-eye eye-icon" onclick="togglePasswordVisibility(this)"></i>
          </div>
          @error('password')
            <p style="color: red; font-size: 12px;">{{ $message }}</p>
          @enderror
        </div>
        <br>

        <!-- Submit Button -->
        <button type="submit">Login</button>

        <div class="footer">
          @if (Route::has('password.request'))
            <p style="margin-bottom: 10px;">
              <a href="{{ route('password.request') }}" >Forgot your password?</a>
            </p>
          @endif
          <hr style="margin-bottom: 0;">
          <p style="margin-top: 10px;">New to SmartHire? <a href="{{ route('register') }}">JoinUs</a></p>
        </div>
      </form>
    </div>
  </div>

</body>

<script>
    function togglePasswordVisibility(icon) {
        const input = icon.previousElementSibling;
        const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
        input.setAttribute('type', type);
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    }
</script>
</html>
