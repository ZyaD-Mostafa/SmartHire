<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Reset Password</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="{{ asset('assets/CSS/Reset1.css') }}" />
</head>
<body>
  <div class="container-xxl  d-flex align-items-center justify-content-center">
    <div class="row w-100">
      <div class="col-12 col-md-10 col-lg-8 mx-auto">
        <div class="form-container">
          <div class="img-container">
            <img src="{{ asset('assets/IMG/Copy_of_GraduationProjet-removebg-preview (1).png') }}" alt="Reset Password Illustration" class="img-fluid" />
          </div>
          <br>
          <form method="POST" action="{{ route('password.store') }}">
            @csrf
            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div class="mb-3">
              <label for="email" class="form-label">
                <h4><b>Email</b></h4>
              </label>
              <input type="email" class="form-control" id="email" name="email"
                     value="{{ old('email', $request->email) }}" required autofocus autocomplete="username" />
              @error('email')
                <div class="text-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            <br>
            <!-- Password -->
            <div class="mb-3">
              <label for="password" class="form-label">
                <h4><b>Password</b></h4>
              </label>
              <input type="password" class="form-control" id="password" name="password"
                     required autocomplete="new-password" />
              @error('password')
                <div class="text-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            <br>
            <!-- Confirm Password -->
            <div class="mb-4">
              <label for="password_confirmation" class="form-label">
                <h4><b>Confirm Password</b></h4>
              </label>
              <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                     required autocomplete="new-password" />
              @error('password_confirmation')
                <div class="text-danger mt-2">{{ $message }}</div>
              @enderror
            </div>
            <br>
            <button type="submit" class="btn btn-custom d-block mx-auto">RESET PASSWORD</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
