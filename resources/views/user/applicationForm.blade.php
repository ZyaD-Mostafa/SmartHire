<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Application</title>
  <link rel="stylesheet" href="{{ asset('assets/CSS/applicationForm.css') }}">
</head>
<body>
    @include('partials.chat_bot')

  <div class="container">
    <div class="phoneimage">
      <div class="text">
        <p>Fill out the <br> application <br> form to apply <br> for <br> your desired position!</p>
      </div>
    </div>
    <div class="desktopimage">
      <div class="text">
        <p>Fill out the <br> application <br> form to apply <br> for <br> your desired position!</p>
      </div>
    </div>

    <div class="formdiv">
    <form action="{{ route('applicationForm.store', ['job' => $job->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="logo">
            <a href="{{ url('/') }}" class="home-link">SmartHire</a>
        </div>

        {{-- Name Field --}}
        <div id="block" class="col-4">
            <label>Name: </label>
            <input type="text" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- Email Field --}}
        <div id="block" class="col-4">
            <label>Email: </label>
            <input type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- Phone Number Field --}}
        <div id="block" class="col-4">
            <label>Phone Number: </label>
            <input type="text" name="phone" value="{{ old('phone') }}" required>
            @error('phone')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- Another Phone Number Field --}}
        <div id="block" class="col-4">
            <label>Another Phone Number: </label>
            <input type="text" name="secPhone" value="{{ old('secPhone') }}">
            @error('secPhone')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- National ID Field --}}
        <div id="block" class="col-4">
            <label>National ID: </label>
            <input type="text" name="national_id" value="{{ old('national_id') }}" required>
            @error('national_id')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- Address Field --}}
        <div id="block" class="col-4">
            <label>Address: </label>
            <input type="text" name="address" value="{{ old('address') }}" required>
            @error('address')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- Date of Birth Field --}}
        <div id="block" class="col-4">
            <label>Date of Birth: </label>
            <input type="date" name="dob" value="{{ old('dob') }}">
            @error('dob')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- Graduation Year Field --}}
        <div id="block" class="col-4">
            <label>Graduation Year: </label>
            <input type="text" name="grad_year" value="{{ old('grad_year') }}" required>
            @error('grad_year')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- University/College Field --}}
        <div id="block" class="col-4">
            <label>University/College: </label>
            <input type="text" name="university" value="{{ old('university') }}" required>
            @error('university')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- Degree Major Field --}}
        <div id="block" class="col-4">
            <label>Degree Major: </label>
            <input type="text" name="degree" value="{{ old('degree') }}" required>
            @error('degree')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        {{-- CV Upload Field --}}
        <div id="cv">
            <label id="cvlabel">Upload your CV:</label>
            <div class="border">
                <label for="fileInput" class="custom-file-label">Choose files</label>
                <input type="file" name="cv" id="fileInput">
            </div>
            @error('cv')
                <div class="error-message" style="margin-left: 5%;">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="submi">Submit</button>
    </form>
</div>


  </div>

  <script src="{{ asset('assets/JS/applicationForm.js') }}"></script>

</body>
</html>
