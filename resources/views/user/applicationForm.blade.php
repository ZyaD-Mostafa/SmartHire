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

        <div id="block" class="col-4">
          <label>Name: </label>
          <input type="text" name="name" required>
        </div>

        <div id="block" class="col-4">
          <label>Email: </label>
          <input type="email" name="email" required>
        </div>

        <div id="block" class="col-4">
          <label>Phone Number: </label>
          <input type="text" name="phone" required>
        </div>

        <div id="block" class="col-4">
          <label>Another Phone Number: </label>
          <input type="text" name="secPhone" required>
        </div>

        <div id="block" class="col-4">
          <label>National ID: </label>
          <input type="text" name="national_id" required>
        </div>

        <div id="block" class="col-4">
          <label>Address: </label>
          <input type="text" name="address" required>
        </div>

        <div id="block" class="col-4">
          <label>Date of Birth: </label>
          <input type="date" name="dob">
        </div>

        <div id="block" class="col-4">
          <label>Graduation Year: </label>
          <input type="text" name="grad_year" required>
        </div>

        <div id="block" class="col-4">
          <label>University/College: </label>
          <input type="text" name="university" required>
        </div>

        <div id="block" class="col-4">
          <label>Degree Major: </label>
          <input type="text" name="degree" required>
        </div>

        <div id="cv">
          <label id="cvlabel">Upload your CV:</label>
          <div class="border">
            <label for="fileInput" class="custom-file-label">Choose files</label>
            <input type="file" name="cv" id="fileInput">
          </div>
        </div>

        <button type="submit" class="submi">Submit</button>
      </form>
    </div>

    @if($errors->any())
      <div class="alert alert-danger">
        <h4>Errors:</h4>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>

  <script src="{{ asset('assets/JS/applicationForm.js') }}"></script>

</body>
</html>
