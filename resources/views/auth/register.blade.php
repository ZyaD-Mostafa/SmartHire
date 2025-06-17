<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartHire</title>
    <link rel="stylesheet" href="{{ asset('assets/css/register.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <div class="all">
        <div class="text">
            <h1> Find Your Job In Effictive Way </h1>
            <div class="texticon"><i class="far fa-check-circle"></i><p>Apply for jobs easily.</p></div>
            <div class="texticon"><i class="far fa-check-circle"></i><p>Receive alerts for the best job.</p></div>
            <div class="texticon"><i class="far fa-check-circle"></i><p>Join a vibrant academic community.</p></div>
            <div class="texticon"><i class="far fa-check-circle"></i><p>Explore the right job & career opportunities.</p></div>
        </div>

        <div class="form-container">
            <h4>Create Your Account and Start Applying for Jobs</h4>
            <hr>

            <!-- نموذج تسجيل الحساب مرتبط بـ Back-end -->
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <!-- First Name Field -->
                <div class="enteryname">
                    <label>First Name</label>
                    <br>
                    <input type="text" name="first_name" value="{{ old('first_name') }}" required>
                    @error('first_name')
                        <p style="color: red; font-size: 12px;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Last Name Field -->
                <div class="enteryname">
                    <label>Last Name</label>
                    <br>
                    <input type="text" name="last_name" value="{{ old('last_name') }}" >
                    @error('last_name')
                        <p style="color: red; font-size: 12px;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email Field -->
                <div class="entery">
                    <label>Email</label>
                    <br>
                    <input type="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <p style="color: red; font-size: 12px;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="entery">
                    <label>Password</label>
                    <br>
                    <div class="input-container" id="password">
                        <input type="password" name="password" required autocomplete="new-password">
                        <i class="fas fa-eye eye-icon" onclick="togglePasswordVisibility(this)"></i>
                    </div>
                    @error('password')
                        <p style="color: red; font-size: 12px;">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Confirm Password Field -->
                <div class="entery">
                    <label>Confirm Password</label>
                    <br>
                    <div class="input-container">
                        <input type="password" name="password_confirmation" required autocomplete="new-password">
                        <i class="fas fa-eye eye-icon" onclick="togglePasswordVisibility(this)"></i>
                    </div>
                </div><br>

                <!-- Submit Button -->
                <button type="submit">Create Account</button>

                <div class="footer">
                    <p>Already on SmartHire? <a href="{{ route('login') }}">Log in</a></p>
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
