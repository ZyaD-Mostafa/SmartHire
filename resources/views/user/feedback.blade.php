<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SmartHire Feedback Page</title>

  <!-- Bootstrap CSS -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
  />
  <!-- Bootstrap Icons -->
  <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
  />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

  <style>
    body {
      font-family: Arial, sans-serif;
      color: #333;
    }

    /* قسم العنوان الرئيسي */
    .feedback-section {
      margin-top: 60px;
      margin-bottom: 60px;
      text-align: left;
    }
    .feedback-section h1 {
      font-size: 2rem;
      font-weight: bold;
      margin-bottom: 1rem;
    }
    .feedback-section p {
      color: #555;
      margin-bottom: 1rem;
      max-width: 600px;
    }
    .btn-feedback {
      display: inline-block;
      background-color: #2D7A3F;
      color: #fff;
      font-weight: bold;
      margin-top: 1.5rem;
      padding: 0.6rem 1.5rem;
      border-radius: 4px;
      text-decoration: none;
    }
    /* لون النجوم */
    .card-rating {
      color: #2f783f;
    }
    .btn-feedback {
      background-color: #198754;
      color: #fff;
      font-weight: bold;
      padding: 1rem 1.5rem;
      border: none;
      border-radius: 50px;
      text-decoration: none;
      transition: 0.3s ease;
    }
    .btn-feedback:hover {
      background-color: #136f40;
      transform: scale(1.1);
    }
    .card {
      background-color: #e3d9d7;
      border: none;
      border-radius: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .hamburger {
    font-size: 30px;
    color: white;
    cursor: pointer;
    display: none;
    position: absolute;
    top: 11px;
    width: 70px;
    right: 0;
    left:auto;

}
.hamburger {
    font-size: 30px;
    color: white;
    cursor: pointer;
    display: none;
}
@media (max-width: 768px) {
    .nav-links {
        display: none;
    }

    .hamburger {
        display: block;
    }

}
  </style>
</head>
<body>

  <!-- Navbar -->
  @include('partials.white_nav')

  <!-- قسم العنوان والمقدمة -->
  <div class="container feedback-section">
    <h1 class="fs-2">Don't take our word for it,<br>See what our users say</h1>
    <p class="fs-6">
      We value user feedback on recruitment, as it helps us improve our process,
      enhance user experience, while making necessary adjustments and ensuring
      a smooth and fair recruitment journey.
    </p>
    <p class="fs-6">
      We would like to know your feedback about our website. If you forgot to write,
      please press the button.
    </p>
    <button class="btn-feedback" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
        FEEDBACK
      </button>
  </div>

  <!-- قسم السلايدر (كاروسيل) مع عرض التعليقات من قاعدة البيانات -->
  <div class="container mb-5">
    <div id="feedbackCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
      <div class="carousel-inner">
        {{-- تقسيم التعليقات إلى شرائح كل شريحتين --}}
        @foreach($feedbacks->chunk(2) as $chunk)
          <div class="carousel-item @if($loop->first) active @endif">
            <div class="row justify-content-center">
              @foreach($chunk as $feedback)
                <div class="col-md-6 mb-3">
                  <div class="card text-start p-3">
                    <div class="card-body">
                      <h5 class="card-title fw-bold">
                        {{ $feedback->rating }} <i class="bi bi-star-fill card-rating"></i>
                      </h5>
                      <p class="card-text text-muted">
                        {{ $feedback->feedback }}
                      </p>
                      <p class="fw-bold mb-0">{{ $feedback->user->name}}</p>
                      <small class="text-muted">
                        {{ \Carbon\Carbon::parse($feedback->created_at)->format('F d, Y') }}
                      </small>
                    </div>
                  </div>
                </div>
              @endforeach
            </div>
          </div>
        @endforeach
      </div>

      <!-- أزرار التحكم (السهمين) -->
      <div class="text-end mt-3">
        <button class="btn btn-outline-secondary me-2" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="prev">
          <i class="fa-solid fa-arrow-left"></i>
        </button>
        <button class="btn btn-outline-secondary mx-5" type="button" data-bs-target="#feedbackCarousel" data-bs-slide="next">
          <i class="fa-solid fa-arrow-right"></i>
        </button>
      </div>
    </div>
  </div>



  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 600px;">
      <div class="modal-content" style="box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);">
        <div class="modal-body">
          <!-- تأكد من تعديل الـ action ليشير إلى الراوت المناسب للتخزين -->
          <form action="{{ route('feedback.store') }}" method="POST" id="feedbackForm">
            @csrf
            <!-- يتم تخزين user_id فقط -->
            <input type="hidden" name="user_id" value="{{ auth()->id() }}">
            <h2 class="text-black text-center"><strong>We need your feedback</strong></h2>
            <p class="text-muted text-center">How would you rate your experience with our website?</p>
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
                <button type="submit" class="btn me-4" style="min-width: 120px; background-color: #189024; border-color: #189024; color: white;">
                  CONFIRM
                </button>
                <button type="button" id="remindMeLater" class="btn btn-danger" data-bs-dismiss="modal">
                  Remind Me Later
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- JavaScript للتعامل مع تحديد التقييم بالنجوم -->
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const stars = document.querySelectorAll('.star');
      const ratingInput = document.getElementById('rating');

      stars.forEach(function(star) {
        star.addEventListener('click', function() {
          const rating = this.getAttribute('data-value');
          ratingInput.value = rating;
          // تحديث لون النجوم بناءً على التقييم المحدد
          stars.forEach(function(s, index) {
            s.style.color = (index < rating) ? '#FFD700' : '#e9e9e9';
          });
        });
      });
    });
  </script>

  @include('partials.footer')

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
