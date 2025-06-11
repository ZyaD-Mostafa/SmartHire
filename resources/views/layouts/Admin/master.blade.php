<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/fonts/simple-line-icons/style.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://pixinvent.com/stack-responsive-bootstrap-4-admin-template/app-assets/css/colors.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/admin/css/lwa.css')}}">


</head>

<body id="body-pd" class="body-pd">
    <header class="header" dir="ltr" id="header">
        <div class="header_img_text">
          <div class="header_img">
            <img src="images/user 1.svg" alt="">
          </div>
          <p class="header_text">{{
                Auth::user()->name
            }}</p>
        </div>
              <div class="header_toggle">
          <i class='bx bx-menu' id="header-toggle"></i>
        </div>
      </header>


    <div class="l-navbar" id="nav-bar">
      <nav class="nav">
            <div>
        <a href="{{ route('admin.home') }}" class="nav_logo">
            <i class='bx bx-layer nav_logo-icon' title="Home"></i>
            <span class="nav_logo-name">
                <img class="visionlogo" src="{{ asset('assets/admin/images/SmartHire.png') }}" alt="">
            </span>
        </a>

        <!-- Nav list items -->
        <div class="nav_list">

            <a href="{{ route('admin.home') }}"
               class="nav_link {{ Request::routeIs('admin.home') ? 'active' : '' }}">
                <img src="{{ asset('assets/admin/images/Untitled design (43) 7.svg') }}"
                     alt="Dashboard Icon"
                     class="nav_icon" title="Dashboard">
                <span class="nav_name">Dashboard</span>
            </a>

            <a href="{{ route('admin.job') }}"
               class="nav_link {{ Request::routeIs('admin.job') ? 'active' : '' }}">
                <img src="{{ asset('assets/admin/images/Untitled design (43) 2.svg') }}"
                     alt="Jobs Icon"
                     class="nav_icon" title="Jobs">
                <span class="nav_name">Jobs</span>
            </a>

            <a href="{{ route('admin.exam') }}"
               class="nav_link {{ Request::routeIs('admin.exam') ? 'active' : '' }}">
                <img src="{{ asset('assets/admin/images/Untitled design (43) 3.svg') }}"
                     alt="Exams Icon"
                     class="nav_icon" title="Exams">
                <span class="nav_name">Exams</span>
            </a>

            <a href="{{ route('admin.questions') }}"
               class="nav_link {{ Request::routeIs('admin.questions') ? 'active' : '' }}">
                <img src="{{ asset('assets/admin/images/Untitled design (43) 4.svg') }}"
                     alt="Questions Icon"
                     class="nav_icon" title="Questions">
                <span class="nav_name">Questions</span>
            </a>

            <a href="{{ route('admin.showApp') }}"
               class="nav_link {{ Request::routeIs('admin.showApp') ? 'active' : '' }}">
                <img src="{{ asset('assets/admin/images/Untitled design (43) 5.svg') }}"
                     alt="Applicants Icon"
                     class="nav_icon" title="Applicants">
                <span class="nav_name">Applicants</span>
            </a>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="nav_link mt-5"
                        style="background: none; border: none; color: white; display: flex; align-items: center; gap: 10px; padding-left: 20px; cursor: pointer;">
                    <i class='bx bx-log-out nav_icon' title="SignOut" style="color: white;"></i>
                    <span class="nav_name" style="color: white;">SignOut</span>
                </button>
            </form>

        </div>
    </div>
</nav>

    </div>

    </div>
    </div>

    @yield('content')

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.min.js"></script>
    <script src="{{ asset('assets/admin/js/users1.js') }}"></script>
    <script src="{{ asset('assets/admin/js/lwa.js') }}"></script>
    <script>
        //bar
        var ctxB = document.getElementById("barChart").getContext('2d');
        var myBarChart = new Chart(ctxB, {
            type: 'bar',
            data: {
                labels: ["يناير", "فبراير", "مارس", "أبريل", "مايو", "يونيو", "يوليو", "أغسطس", "سبتمبر", "أكتوبر", "نوفمبر", "ديسمبر"],
                datasets: [{
                    label: '# of Votes',
                    data: [12, 19, 3, 5, 2, 3, 12, 19, 3, 5, 2, 3, 12, 19],
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(0, 0, 0, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(90, 200, 195, 0.2)',
                        'rgba(120, 130, 190, 0.2)',
                        'rgba(200, 100, 150, 0.2)',
                        'rgba(50, 180, 120, 0.2)',
                        'rgba(255, 150, 0, 0.2)',
                        'rgba(10, 120, 190, 0.2)',
                        'rgba(180, 80, 100, 0.2)',
                        'rgba(140, 200, 60, 0.2)',
                        'rgba(160, 90, 170, 0.2)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(0, 0, 0, 1)',
                        'blue',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });

        function toggleAddForm() {
            const addUserForm = document.getElementById('addUserForm');
            if (addUserForm.style.display === 'none') {
                addUserForm.style.display = 'block';
            } else {
                addUserForm.style.display = 'none';
            }
        }
    </script>




</body>

</html>
