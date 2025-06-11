<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New User</title>
    <link rel="stylesheet" href="{{ asset('assets/superadmin/css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container">
        <header class="dashboard-header">
            <h1 class="dashboard-title">Create New User</h1>
            <div>
                <a href="{{ route('superadmin.home') }}" class="btn-secondary">
                    <i class="fas fa-arrow-left"></i> Back to Users
                </a>
            </div>
        </header>

        <div class="form-wrapper">
            <form action="{{ route('superadmin.store.user') }}" method="POST" class="user-form" enctype="multipart/form-data" >
                @csrf

                <div class="form-group">
                    <label for="name">Full Name</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fas fa-user"></i>
                        </span>
                        <input type="text" id="name" name="name" required
                               placeholder="Enter full name" value="{{ old('name') }}">
                    </div>
                    @error('name')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="input-group">
                        <span class="input-icon">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" id="email" name="email" required
                               placeholder="Enter email address" value="{{ old('email') }}">
                    </div>
                    @error('email')
                        <span class="error-message">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <span class="input-icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="password" id="password" name="password" required
                                   placeholder="Enter password">
                            <button type="button" class="password-toggle">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('password')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="role">User Role</label>
                        <div class="input-group">
                            <span class="input-icon">
                                <i class="fas fa-user-tag"></i>
                            </span>
                            <select id="role" name="role" required>
                                <option value="">Select Role</option>
                                <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                                <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>SuperAdmin</option>
                            </select>
                        </div>
                        @error('role')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <div class="status-toggle">
                            <input type="checkbox" id="status" name="status"
                                   {{ old('status', true) ? 'checked' : '' }} hidden>
                            <label for="status" class="toggle-switch">
                                <span class="toggle-text">Inactive</span>
                                <span class="toggle-slider"></span>
                                <span class="toggle-text">Active</span>
                            </label>
                        </div>
                    </div>
                </div>


                <div class="form-row">
                    <div class="form-group">
                        <label for="Photo">Photo</label>
                        <div class="input-group">
                            <span class="input-icon">
                                <i class="fas fa-lock"></i>
                            </span>
                            <input type="file" id="Photo" name="profile_photo" required
                                   placeholder="Enter Photo">
                            <button type="button" class="password-toggle">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                        @error('profile_photo')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>


                </div>


                <div class="form-actions">
                    <button type="reset" class="btn-reset">
                        <i class="fas fa-undo"></i> Reset
                    </button>
                    <button type="submit" class="btn-submit">
                        <i class="fas fa-user-plus"></i> Create User
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Password toggle functionality
        document.querySelectorAll('.password-toggle').forEach(button => {
            button.addEventListener('click', function() {
                const input = this.parentElement.querySelector('input');
                const icon = this.querySelector('i');

                if (input.type === 'password') {
                    input.type = 'text';
                    icon.classList.replace('fa-eye', 'fa-eye-slash');
                } else {
                    input.type = 'password';
                    icon.classList.replace('fa-eye-slash', 'fa-eye');
                }
            });
        });

        // Status toggle styling
        const statusToggle = document.getElementById('status');
        statusToggle.addEventListener('change', function() {
            const slider = document.querySelector('.toggle-slider');
            if (this.checked) {
                slider.style.transform = 'translateX(100%)';
            } else {
                slider.style.transform = 'translateX(0)';
            }
        });

        // Initialize toggle position
        if (statusToggle.checked) {
            document.querySelector('.toggle-slider').style.transform = 'translateX(100%)';
        }
    </script>
</body>
</html>
