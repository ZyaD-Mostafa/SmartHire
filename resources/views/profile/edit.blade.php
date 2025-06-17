<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset(path: 'assets/CSS/Editprofile.css') }}">
    <title>Profile</title>
</head>

<body>
    <div class="containerone">
        @include('partials.white_nav')
            @include('partials.chat_bot')


        <div class="content">
            <!-- Success Message -->
            {{-- @if (session('status') === 'profile-updated')
        <div class="alert alert-success text-center">
          Profile updated successfully.
        </div>
      @endif --}}

            <!-- Profile Update Form (Name, Email, and Photo Upload) -->
            <form action="{{ route('profile.update', Auth::user()->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="firstsection row">
                    <div class="col-4" id="bookmark">
                        <div class="sqr">
                            <p>Edit Profile</p>
                        </div>
                        <div class="tria"></div>
                    </div>
                    <div class="col-1"></div>
                    <div class="col-6" id="profilephoto">
                        <div class="profileimg" id="profilePic"
                            style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center; background-color: #e0e0e0;">
                            <img id="profilePreview"
                                src="{{ asset('uploads/profile_photos/' . Auth::user()->profile_photo) }}"
                                alt="Profile Photo" style="width: 100%; height: 100%; object-fit: cover;">
                        </div>

                        <!-- Profile Image Circle -->


                        <!-- Button + Hidden File Input -->
                        <div class="butn">
                            <label for="profile_photo" class="upload-btn text-center align-items-center"
                                id="changePhotoBtn">Change Photo</label>
                            <input type="file" id="profile_photo" name="profile_photo" accept="image/*"
                                style="display:none;">
                        </div>

                    </div>
                </div>

                <div class="secsection">
                    <div class="formone">
                        <h1>Profile Information</h1>
                        <p>Update your account information and email address.</p>
                        <div class="inputs">
                            <label for="name">Name</label><br>
                            <input type="text" name="name" id="name"
                                value="{{ old('name', Auth::user()->name) }}"><br><br>
                            <label for="email">Email</label><br>
                            <input type="email" name="email" id="email"
                                value="{{ old('email', Auth::user()->email) }}"><br><br>
                            <!-- Save button for profile update and photo upload -->
                            <button type="submit">Save</button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Update Password Form -->
            <div class="secsection2">
                <div class="formone">
                    <h1>Update Password</h1>
                    <p>Ensure your account is using a long, random password to stay secure.</p>

                    @if (session('status') === 'password-updated')
                        <div style="color: green; margin-bottom: 10px;">Password updated successfully!</div>
                    @endif

                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        @method('put')

                        <div class="inputs">
                            <!-- Current Password -->
                            <label for="current_password">Current Password</label><br>
                            <input type="password" name="current_password" id="current_password">
                            @error('current_password', 'updatePassword')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <br><br>

                            <!-- New Password -->
                            <label for="password">New Password</label><br>
                            <input type="password" name="password" id="password">
                            @error('password', 'updatePassword')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <br><br>

                            <!-- Confirm Password -->
                            <label for="password_confirmation">Confirm Password</label><br>
                            <input type="password" name="password_confirmation" id="password_confirmation">
                            @error('password_confirmation', 'updatePassword')
                                <div style="color: red;">{{ $message }}</div>
                            @enderror
                            <br><br>

                            <button type="submit">Save</button>
                        </div>
                    </form>
                </div>
            </div>


            <!-- Delete Account Form -->
            <!-- Delete Account Section -->
            <!-- Delete Account Section -->
            <div class="secsection3">
                <div class="formtwo">
                    <h1>Delete Account</h1>
                    <p class="paragraph">
                        Once your account is deleted, all of your resources and data will be permanently deleted.
                        Before deleting your account, please download any data or information that you wish to retain.
                    </p>
                    <!-- Button to open the modal -->
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#deleteAccountModal">
                        DELETE ACCOUNT
                    </button>
                </div>
            </div>

            <!-- Delete Account Confirmation Modal -->
            <div class="modal fade" id="deleteAccountModal" tabindex="-1" aria-labelledby="deleteAccountModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
                    <div class="modal-content" style="box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteAccountModalLabel">Confirm Account Deletion</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>Are you sure you want to delete your account? This action cannot be undone.</p>
                            <!-- Confirmation checkbox -->
                            <input type="checkbox" id="toggleCheckbox">
                            <label for="toggleCheckbox" class="confirmation">Confirm account deletion.</label><br>
                            <!-- Hidden deletion form -->
                            <form id="deleteAccountForm" action="{{ route('profile.destroy') }}" method="POST">
                                @csrf
                                @method('delete')
                                <!-- Optionally include a hidden field if needed -->
                                <input type="hidden" name="confirm_deletion" value="1">
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <!-- The delete button starts disabled -->
                            <button type="button" class="btn btn-danger" id="myButton" disabled
                                onclick="document.getElementById('deleteAccountForm').submit();">
                                Confirm Delete
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap JS (required for modal functionality) -->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

            <!-- Custom JavaScript -->



            {{-- <!-- Footer Section -->
  {{-- Footer code commented out if not needed --}}
            <script>
                document.getElementById('profile_photo').addEventListener('change', function(event) {
                    const file = event.target.files[0];
                    const preview = document.getElementById('profilePreview');

                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            preview.src = e.target.result;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            </script>
            <script src="{{ asset('assets/JS/editprof.js') }}"></script>
</body>

</html>
