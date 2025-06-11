<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Quiz Exam Page</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('assets/CSS/exam.css') }}">
</head>
<body>
  <div class="container-fluid p-3 bg-white">
    <div class="row align-items-center">
      <div class="col-2">
      </div>
      <div class="col-md-6 text-md-start text-center">
        <h2><b>{{ $exam->exam_name }}</b></h2>
        <p class="text-muted" style="font-size: 20px;">Test duration: {{ $exam->exam_duration }} minutes</p>
      </div>
      <div class="col-md-4 text-center timer-section">
        <p id="exam-time" class="fw-bold"></p>
        <div class="timer-bar" id="timer"></div>
        <p id="timer-countdown" class="fw-bold" style="margin-top:10px; font-size: 1.2em;"></p>

      </div>
    </div>
  </div>
  <hr>

  <div class="container mt-4">
    <!-- نموذج إرسال الإجابات -->
    <form action="{{ route('exam.submit', ['job' => $job->id, 'exam' => $exam->id]) }}" method="POST" id="examForm">
        @csrf
      <div class="quiz-container">
        @foreach($exam->questions as $question)
          <div class="question">
            <p><strong>{{ $loop->iteration }}. {{ $question->question_text }}</strong></p>
            <span class="points">{{ $question->points }} point{{ $question->points > 1 ? 's' : '' }}</span>
            @if($question->question_type == 'mcq')
              <label>
                <input type="radio" name="q{{ $question->id }}" value="option1" >
                {{ $question->option1 }}
              </label>
              <label>
                <input type="radio" name="q{{ $question->id }}" value="option2">
                {{ $question->option2 }}
              </label>
              <label>
                <input type="radio" name="q{{ $question->id }}" value="option3">
                {{ $question->option3 }}
              </label>
              <label>
                <input type="radio" name="q{{ $question->id }}" value="option4">
                {{ $question->option4 }}
              </label>
            @elseif($question->question_type == 'true_false')
              <label>
                <input type="radio" name="q{{ $question->id }}" value="true" > True
              </label>
              <label>
                <input type="radio" name="q{{ $question->id }}" value="false"> False
              </label>
            @elseif($question->question_type == 'written')
              <textarea class="form-control" name="q{{ $question->id }}" placeholder="Here is your answer....."></textarea>
            @endif
          </div>
          <br>
        @endforeach
      </div>
      <div class="text-center my-4">
        <input type="submit" class="submit-btn btn btn-outline-danger" value="Submit">
      </div>
      <input type="hidden" name="is_like" id="is_like" value="0">

    </form>
  </div>

  <div class="container feedback-section1 d-flex justify-content-start gap-3">
    <span class="feedback-option1" id="like-btn" style="cursor:pointer;">
      <i class="thumbs-up">👍</i> Like
    </span>
    <span class="feedback-option1" id="dislike-btn" style="cursor:pointer;">
      <i class="thumbs-down">👎</i> Dislike
    </span>
    <span class="feedback-option1" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="flag">🚩</i> Report an issue
    </span>
  </div>


<script>
document.addEventListener("DOMContentLoaded", function () {
  // ===== 1. تخزين وقت الدخول ووقت الانتهاء =====
  const now = Date.now();
  const durationMs = {{ $exam->exam_duration * 60 * 1000 }};

  // إذا لم يُخزن وقت البداية، خزّنه الآن
  if (!localStorage.getItem('examStartTime')) {
    localStorage.setItem('examStartTime', now);
  }
  // إذا لم يُخزن وقت الانتهاء، خزّنه أيضاً
  if (!localStorage.getItem('examEndTime')) {
    localStorage.setItem('examEndTime', now + durationMs);
  }

  // قراءة الأوقات من التخزين
  const examStartTime = parseInt(localStorage.getItem('examStartTime'), 10);
  const examEndTime = parseInt(localStorage.getItem('examEndTime'), 10);
  let timeLeft = Math.max(0, Math.floor((examEndTime - now) / 1000));

  // ===== 2. عرض وقت الدخول المثبت =====
  const startDate = new Date(examStartTime);
  document.getElementById('exam-time').innerText =
    `Entered at: ${startDate.toLocaleString()}`;

  // ===== 3. إنشاء شريط التقدّم =====
  const timerFill = document.createElement('div');
  timerFill.classList.add('timer-fill');
  document.getElementById('timer').appendChild(timerFill);

  // ===== 4. مؤقت العدّ التنازلي =====
  const timerInterval = setInterval(function () {
    // تحديث شريط التقدّم
    const progress = Math.max(0, Math.min(100, (timeLeft * 1000) / durationMs * 100));
    timerFill.style.width = `${progress}%`;

    // دقائق وثواني
    const minutes = Math.floor(timeLeft / 60);
    const seconds = timeLeft % 60;
    document.getElementById("timer-countdown").innerText =
      `Time Remaining: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;

    if (timeLeft > 0) {
      timeLeft--;
    } else {
      clearInterval(timerInterval);
      clearStorage();
      showLoadingOverlay();
      document.getElementById('examForm').submit();
    }
  }, 1000);

  // ===== 5. حفظ واسترجاع الإجابات =====
  document.querySelectorAll('input[type=radio], textarea').forEach(el => {
    const key = `answer_${el.name}`;
    const saved = localStorage.getItem(key);
    if (saved !== null) {
      if (el.type === 'radio') {
        if (el.value === saved) el.checked = true;
      } else {
        el.value = saved;
      }
    }
    el.addEventListener('change', () => {
      localStorage.setItem(key, el.value);
    });
  });

  // ===== 6. دالة مسح التخزين =====
  function clearStorage() {
    localStorage.removeItem('examStartTime');
    localStorage.removeItem('examEndTime');
    Object.keys(localStorage)
      .filter(k => k.startsWith('answer_'))
      .forEach(k => localStorage.removeItem(k));
  }

  // ===== 7. تأكيد الإرسال اليدوي =====
  const submitBtn = document.querySelector(".submit-btn");
  submitBtn.addEventListener("click", function (e) {
    e.preventDefault();
    // تأثير blur على المحتوى
    document.querySelector('.container').classList.add('blur');

    // overlay خلفي
    let overlay = document.createElement("div");
    overlay.className = "alert-overlay";
    document.body.appendChild(overlay);

    // صندوق التأكيد
    let alertBox = document.createElement("div");
    alertBox.className = "custom-alert";
    alertBox.innerHTML = `
      <p><strong>Smart Hire</strong></p>
      <p>Are you sure you want to submit?</p>
      <button class="yes-btn btn btn-primary">Submit</button>
      <button class="no-btn btn btn-secondary">Cancel</button>
    `;
    document.body.appendChild(alertBox);

    // عند الضغط على "Submit"
    alertBox.querySelector(".yes-btn").onclick = function () {
      overlay.remove();
      alertBox.remove();
      clearStorage();
      document.getElementById('examForm').submit();
    };
    // عند الضغط على "Cancel"
    alertBox.querySelector(".no-btn").onclick = function () {
      document.querySelector('.container').classList.remove('blur');
      overlay.remove();
      alertBox.remove();
    };
  });

  // ===== 8. Like / Dislike =====
const likeBtn = document.getElementById("like-btn");
const dislikeBtn = document.getElementById("dislike-btn");
const isLikeInput = document.getElementById("is_like");

likeBtn.addEventListener("click", function () {
  likeBtn.classList.add("active");
  dislikeBtn.classList.remove("active");
  isLikeInput.value = "1";   // عند اللايك يرسل 1
});

dislikeBtn.addEventListener("click", function () {
  dislikeBtn.classList.add("active");
  likeBtn.classList.remove("active");
  isLikeInput.value = "-1";  // عند الديسلايك يرسل -1
});

  // ===== 9. شاشة التحميل عند انتهاء الوقت =====
  function showLoadingOverlay() {
    let overlay = document.createElement('div');
    overlay.classList.add('loading-overlay');
    overlay.innerHTML = '<h2>Processing your exam, please wait...</h2>';
    Object.assign(overlay.style, {
      position: 'fixed',
      top: '0', left: '0', width: '100%', height: '100%',
      backgroundColor: 'rgba(0,0,0,0.7)', color: 'white',
      display: 'flex', justifyContent: 'center', alignItems: 'center',
      fontSize: '2em', zIndex: '9999'
    });
    document.body.appendChild(overlay);
  }
});
</script>

<script>
// منع فتح قائمة السياق (الزر اليميني)
document.addEventListener('contextmenu', e => {
  e.preventDefault();
});

// منع تحديد النص ببدء الـ selection
document.addEventListener('selectstart', e => {
  // اترك الحقول التفاعلية مسموحاً
  if (e.target.tagName !== 'INPUT' && e.target.tagName !== 'TEXTAREA') {
    e.preventDefault();
  }
});

// منع اختصارات النسخ والقص والتحديد الكلي
document.addEventListener('keydown', e => {
  // مصفوفة الأحرف التي تريد حظرها عند استخدام Ctrl أو Cmd
  const blockedKeys = ['a', 'c', 'x', 'v'];
  if ((e.ctrlKey || e.metaKey) && blockedKeys.includes(e.key.toLowerCase())) {
    e.preventDefault();
  }
});

// منع حدث النسخ على مستوى الصفحة
document.addEventListener('copy', e => {
  e.preventDefault();
});

// منع حدث القص
document.addEventListener('cut', e => {
  e.preventDefault();
});

// منع حدث اللصق (لو أردت)
document.addEventListener('paste', e => {
  e.preventDefault();
});
</script>



  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
