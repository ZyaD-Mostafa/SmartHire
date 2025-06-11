<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('assets/CSS/avajob.css')}}">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <title>Two Column Layout</title>


</head>
<body>

    @include('partials.white_nav')
    @include('partials.chat_bot')

    <div class="news">
        <p class="newsp">
            <span class="text-content">New Cairo Technology</span> <br>
            Passing this exam opens up global prospects for a distinguished job at this university.<br>
            Suppose you are striving for excellence in the field of Information and Communication Technology (ICT),<br>
            is an essential step for a successful and bright start in your career.
        </p>
        <img class="newsimg" src="{{ asset('assets/IMG/Tem3.png') }}">
    </div>

    <div class="progress">
        <img class="progressicon" src="{{ asset('assets/IMG/Capture2-removebg-preview.png') }}">
        <img class="progressicon" src="{{ asset('assets/IMG/Capture-removebg-preview (1).png') }}">
        <img class="progressicon" src="{{ asset('assets/IMG/Step_3.ico') }}">
        <img class="progressicon" src="{{ asset('assets/IMG/Capture1-removebg-preview.png') }}">
    </div>

    <div style="display: flex;">
        <p class="pprogress">Read the exam instructions</p>
        <p class="pprogress">Enroll for the exam</p>
        <p class="pprogress">Lab exam (6 exercises)</p>
        <p class="pprogress">Pass the exam</p>
    </div>

    <div class="container1">
        <div class="row align-items-center">
            <!-- First Column: Image & Text -->
            <div class="col-md-8 col-sm-12 text-center text-md-left">
                <img src="{{ asset('assets/IMG/Step_1_Prime.png') }}" class="img-fluid" alt="Exam Instructions">
                <div style="display: block;">
                    <p class="text-content">Read the exam instructions carefully.</p>
                    <p class="description">
                        1-Registration and data verification: Register using your official email and national ID number to ensure the accuracy of your data. Could you make sure to upload the required documents correctly before starting the exam
                        <br>2-Technical settings: Make sure your device is equipped with a webcam and microphone, as the exam may require electronic monitoring. Use a stable internet connection to avoid interruption during the exam.
                        <br>3- Adherence to the rules: It is strictly forbidden to use mobile phones or any external materials during the exam.
                        <br>Please fully comply with the rules of academic conduct, as cheating or any violation will lead to exclusion from admission.
                    </p>
                </div>
            </div>
        </div>

        <hr>

        <div class="row align-items-center">
            <div class="col-md-8 col-sm-12 text-center text-md-left">
                <img src="{{ asset('assets/IMG/Enroll.png') }}" class="img-fluid" alt="Exam Instructions">
                <p class="text-content">Enorll for the exam</p>
            </div>
        </div>

        <hr>

        @if(!$hasApplication)
    <div class="alert alert-warning text-center">
        <p>Please fill out the application form first before accessing the exams.</p>
        <a href="{{ route('user.applicationForm', ['job' => $job->id]) }}" class="btn btn-primary">Go to Application</a>
    </div>
@else
    <div class="row align-items-center">
        <div class="col-md-8 col-sm-12 text-center text-md-left">
            <img src="{{ asset('assets/IMG/Lab_Exercize.png') }}" class="img-fluid" alt="Exam Instructions">
            <div style="display: block;">
                <p class="text-content">Read the exam instructions carefully.</p>
                <p class="description">
                    Note: once you start scanning, there will be no rejection or settings.
                    <br>Make sure you are accurate, and focus on doing well. Good Luck!
                </p>
            </div>
            <br>
        </div>
    </div>
    <br>

    @php
        // Get all exam IDs from the current job
        $examIds = $exams->pluck('id');
        // Count how many exams the user has taken
        $takenExamsCount = \App\Models\UserExam::where('user_id', auth()->id())
                              ->whereIn('exam_id', $examIds)
                              ->count();
    @endphp

    @if($exams->isEmpty())
        <div class="alert alert-warning text-center">
            <p>No exams available at this time.</p>
        </div>
    @elseif($takenExamsCount == $exams->count())
        <div class="alert alert-success text-center">
            <p>All exams are completed, we will contact you soon.</p>
        </div>
    @else
        @foreach($exams as $exam)
            @php
                $hasTaken = \App\Models\UserExam::where('user_id', auth()->id())
                                             ->where('exam_id', $exam->id)
                                             ->exists();
            @endphp

            <div class="row align-items-center p-3 border rounded">
                <div class="col-md-8 col-sm-12 text-center text-md-left">
                    <div>
                        <p class="exam"><strong>{{ $exam->exam_name }}</strong></p>
                        <p class="exam">Duration: {{ $exam->exam_duration }} min</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12 text-center">
                    @if($hasTaken)
                        <button class="btn btn-secondary responsive-btn" disabled>Exam Taken</button>
                    @else
                        <a href="{{ route('user.exam', ['job' => $job->id, 'exam' => $exam->id]) }}" class="btn btn-primary responsive-btn">Start</a>
                    @endif
                </div>
            </div>
            <hr>
        @endforeach
    @endif
@endif


        <hr>

        <div class="row align-items-center">
            <div class="col-md-8 col-sm-12 text-center text-md-left">
                <img src="{{ asset('assets/IMG/Final.png') }}" class="img-fluid" alt="Exam Instructions">
                <div style="display: block;">
                    <p class="text-content">Pass the exam</p>
                    <p class="description">
                        You have successfully completed the exam. Your answers will be reviewed soon, and you will <br>
                        receive your results as soon as possible. Thank you for your efforts, and we wish you the best in your next steps!
                    </p>
                </div>
            </div>
        </div>
    </div>



    @php
            // Use the solvedExamId from session or fallback to the current exam's id
            $solvedExamId = session('solvedExamId') ?? (isset($exam) ? $exam->id : null);
            @endphp
<!-- Feedback Modal -->
@if($solvedExamId)

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xlg" style="max-width: 600px;">
      <div class="modal-content" style="box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
        <div class="modal-body">


        <form action="{{ route('exam.feedback.store', ['job' => $job->id, 'exam' => $solvedExamId]) }}" method="POST" id="feedbackForm">
          @csrf
          <!-- Remove hidden inputs for job_id and exam_id if they're now in the route -->
          <input type="hidden" name="user_id" value="{{ auth()->id() }}">
          <!-- Rest of the form remains the same -->
          <h2 class="text-black text-center"><strong>We need your feedback</strong></h2>
          <p class="text-muted text-center">How would you rate your experience with our exam?</p>
          <div class="d-flex justify-content-center mb-3 stars">
            <span class="star" data-value="1" style="font-size:35px; cursor:pointer; color:#e9e9e9;">★</span>
            <span class="star" data-value="2" style="font-size:35px; cursor:pointer; color:#e9e9e9;">★</span>
            <span class="star" data-value="3" style="font-size:35px; cursor:pointer; color:#e9e9e9;">★</span>
            <span class="star" data-value="4" style="font-size:35px; cursor:pointer; color:#e9e9e9;">★</span>
            <span class="star" data-value="5" style="font-size:35px; cursor:pointer; color:#e9e9e9;">★</span>
          </div>
          <input type="hidden" name="rating" id="rating" value="">
          <textarea id="feedbackComment" name="feedback" class="form-control mb-3" placeholder="Comment"
            style="width:80%; height:90px; border-radius:30px; border:1px solid #ccc; padding:10px; resize:none; margin: 0 auto; display: block;"></textarea>
          <div class="d-flex justify-content-center">
            <div class="modal-footer">
                <button type="submit" class="btn me-4" style="min-width: 120px; background-color: #189024; border-color: #189024; color: white;">CONFIRM</button>
                <button type="button" id="remindMeLater" class="btn btn-danger">Remind Me Later</button>
              </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  @endif
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



  <script>
    // Global variables for rating and modal origin
    let selectedRating = 0;
    let modalOrigin = "";

    // Star Rating Functionality with Hover Effect
    const stars = document.querySelectorAll('.star');

    // Helper function to update star colors based on rating value
    function updateStars(rating) {
      stars.forEach(function(s) {
        let starValue = parseInt(s.getAttribute('data-value'));
        s.style.color = starValue <= rating ? '#f1c91c' : '#e9e9e9';
      });
    }

    // Attach all event listeners (click, mouseover, mouseout) in one loop
    stars.forEach(function(star) {
      // On click: permanently set the rating
      star.addEventListener('click', function() {
        selectedRating = parseInt(this.getAttribute('data-value'));
        document.getElementById('rating').value = selectedRating;
        updateStars(selectedRating);
      });
      // On hover: temporarily show gold color up to the hovered star
      star.addEventListener('mouseover', function() {
        let rating = parseInt(this.getAttribute('data-value'));
        updateStars(rating);
      });
      // On mouseout: revert to the selected rating
      star.addEventListener('mouseout', function() {
        updateStars(selectedRating);
      });
    });

    // Confirm Button in Modal: Behavior depends on modalOrigin
    const confirmFeedback = document.getElementById("confirmFeedback");
    if (confirmFeedback) {
      confirmFeedback.addEventListener("click", function() {
        if (modalOrigin === "submit") {
          // In submit flow: require a rating and then close exam
          if (selectedRating === 0) {
            alert("Smart Hire: Please select a rating before confirming.");
            return;
          }
          const feedbackComment = document.getElementById("feedbackComment").value;
          console.log("Feedback submitted (Submit flow):", { rating: selectedRating, comment: feedbackComment });
          var modalInstance = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
          if (modalInstance) {
            modalInstance.hide();
          }
          // For submit flow, replace the page or show a success message.
          document.body.innerHTML = '<h2>Exam Closed</h2>';
        } else if (modalOrigin === "report") {
          // In report flow: simply close the modal
          var modalInstance = bootstrap.Modal.getInstance(document.getElementById('exampleModal'));
          if (modalInstance) {
            modalInstance.hide();
          }
        }
      });
    }

    // Remind Me Later Button: simply close the modal when clicked
    const remindMeLater = document.getElementById("remindMeLater");
    if (remindMeLater) {
      remindMeLater.addEventListener("click", function() {
        console.log("Remind Me Later clicked");
        const modalEl = document.getElementById("exampleModal");
        // Try using Bootstrap's built‑in method
        let modalInstance = bootstrap.Modal.getOrCreateInstance(modalEl);
        modalInstance.hide();
        console.log("Called modalInstance.hide()");

        // Fallback: After 500ms, if modal is still visible, force its removal.
        setTimeout(function() {
          if (modalEl.classList.contains("show")) {
            console.log("Forcing modal close");
            modalEl.classList.remove("show");
            modalEl.style.display = "none";
            // Remove the backdrop if it exists.
            const backdrop = document.querySelector(".modal-backdrop");
            if (backdrop) {
              backdrop.remove();
            }
          }
        }, 500);
      });
    } else {
      console.log("Remind Me Later button not found");
    }

    // When modal is hidden, remove background blur and overlay (if present)
    const exampleModalEl = document.getElementById('exampleModal');
    if (exampleModalEl) {
      exampleModalEl.addEventListener('hidden.bs.modal', function() {
        const content = document.querySelector(".content");
        if (content) {
          content.classList.remove("blur");
        }
        const overlay = document.querySelector(".alert-overlay");
        if (overlay) {
          overlay.remove();
        }
      });
    }
  </script>





    @if(session('examSubmitted'))
<script>
  document.addEventListener("DOMContentLoaded", function () {
    var feedbackModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
      backdrop: 'static',
      keyboard: false
    });
    feedbackModal.show();
  });
</script>
@endif


    <script>
        // Dropdown toggle for navbar
        document.addEventListener("DOMContentLoaded", function() {
            const dropdownToggle = document.querySelector(".dropdown-toggle");
            const dropdownMenu = document.querySelector(".dropdown");
            dropdownToggle.addEventListener("click", function() {
                if (dropdownMenu.style.display === "block") {
                    dropdownMenu.style.display = "none";
                } else {
                    dropdownMenu.style.display = "block";
                }
            });
            document.addEventListener("click", function(event) {
                if (!dropdownToggle.contains(event.target) && !dropdownMenu.contains(event.target)) {
                    dropdownMenu.style.display = "none";
                }
            });
        });

        // Side Navigation Functions
        function openNav() {
            document.getElementById("sideNav").style.display = "block";
        }
        function closeNav() {
            document.getElementById("sideNav").style.display = "none";
        }

        function handleExamStart(btn, examKey) {
            disableButton(btn);
            sessionStorage.setItem(examKey, 'true');
        }
        document.addEventListener("DOMContentLoaded", function() {
            if (sessionStorage.getItem('pedagogicalExamStarted') === 'true') {
                let btnPedagogical = document.getElementById('btnPedagogical');
                if (btnPedagogical) disableButton(btnPedagogical);
            }
            if (sessionStorage.getItem('itExamStarted') === 'true') {
                let btnIT = document.getElementById('btnIT');
                if (btnIT) disableButton(btnIT);
            }
            if (sessionStorage.getItem('englishExamStarted') === 'true') {
                let btnEnglish = document.getElementById('btnEnglish');
                if (btnEnglish) disableButton(btnEnglish);
            }
        });
    </script>
    @include('partials.footer')

</body>
</html>
