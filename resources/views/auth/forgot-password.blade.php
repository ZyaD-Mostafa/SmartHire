<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Your Password</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/CSS/forget.css') }}">
</head>
<body>

  <div class="container">
    <img src="{{ asset('assets/IMG/forget.png') }}" alt="restpass">
    <h1 class="">Forget Password?</h1>
    <p class="mb-3">
      No problem. Just let us know your email address and we will email you a password reset link
      that will allow you to choose a new one.
    </p>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-success ml-2" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
      @csrf

      <label for="email" >Email</label><br>
      <input
        type="email"
        id="email"
        name="email"
        value="{{ old('email') }}"
        required
        autofocus
        class="p-3"
      ><br><br>

      <!-- Display validation errors -->
      <x-input-error :messages="$errors->get('email')" class="mt-2 text-danger" />

      <button type="submit" >EMAIL PASSWORD RESET LINK</button>
    </form>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
