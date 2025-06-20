<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SmartHire</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/CSS/home.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/CSS/styles.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

</head>

<body>
      @include('partials.chat_bot')

    <section id="home">
        <div class="containerone">
            <header class="row">
                <div class="col-2">
                    <a class="logo" href="{{ url('/') }}">
                        <img src="{{ asset('assets//IMG/logo111 (2).png') }}" alt="SmartHire Logo"
                            style="height: 60px;width:70%;">
                    </a>

                </div>

                <ul class="col-7">
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li>
                        <a href="#">About US</a>
                        <span class="dropdown-toggle"></span>
                        <ul class="dropdown">
                            <li><a href="{{ route('user.feedback') }}">Feedback</a></li>
                            <li><a href="{{ route('user.team') }}">Team</a></li>
                        </ul>
                    </li>
                    <li><a href="#footerr">Contact US</a></li>
                    <li class="line11"><a></a></li>
                    <li><a href="#findjob"><img src="assets/IMG/search_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.png"
                                alt="search" class="search"> Find Job</a></li>


                    @if (Route::has('login'))
                        @auth
                            @if (Auth::user()->role === 'admin')
                                <!-- Separate li for Dashboard -->
                                <li><a href="{{ route('admin.home') }}">Dashboard</a></li>
                                <!-- Separate li for Profile image -->
                                <!-- Separate li for Profile image -->
                                <li class="profile-dropdown">
                                    <a href="javascript:void(0);" onclick="toggleProfileCard()">
                                        <img src="assets/IMG/user-circle-regular-24.png" alt="profile" class="profile">
                                    </a>

                                    <div id="profileCard" class="profile-card d-none">
                                        <div class="card-header">
                                            <h5><b>Hi, {{ Auth::user()->name }}</b></h5>
                                            <span class="close-btn" onclick="toggleProfileCard()">✕</span>
                                        </div>

                                        <button class="manage-btn"
                                            onclick="window.location.href='{{ route('profile.edit', Auth::user()->id) }}'">
                                            Manage your account
                                        </button>


                                        <div class="action-buttons">
                                            <a href="{{ route('profile.show') }}" class="btn-profile">
                                                <i class="fa-solid fa-user-circle icon" style="color: #000;"></i>
                                                View Profile
                                            </a>
                                            <a href="#" class="btn-profile"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa-solid fa-right-from-bracket icon" style="color: #000;"></i>
                                                Sign Out
                                            </a>

                                            <!-- Hidden Logout Form -->
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    @else
                                        <!-- For non-admin users, only the profile image -->
                                        <!-- Separate li for Profile image -->
                                <li class="profile-dropdown">
                                    <a href="javascript:void(0);" onclick="toggleProfileCard()">
                                        <img src="assets/IMG/user-circle-regular-24.png" alt="profile" class="profile">
                                    </a>

                                    <div id="profileCard" class="profile-card d-none">
                                        <div class="card-header">
                                            <h5><b>Hi, {{Auth::user()->name}}</b></h5>
                                            <span class="close-btn" onclick="toggleProfileCard()">✕</span>
                                        </div>

                                        <button class="manage-btn"
                                            onclick="window.location.href='{{ route('profile.edit', Auth::user()->id) }}'">
                                            Manage your account
                                        </button>


                                        <div class="action-buttons">
                                            <a href="{{ route('profile.show') }}" class="btn-profile">
                                                <i class="fa-solid fa-user-circle icon" style="color: #000;"></i>
                                                View Profile
                                            </a>
                                             <a href="#" class="btn-profile"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fa-solid fa-right-from-bracket icon" style="color: #000;"></i>
                                                Sign Out
                                            </a>

                                            <!-- Hidden Logout Form -->
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                            @endif
                        @else
                            <li><a href="{{ route('login') }}">Log in</a></li>
                        @endauth
                    @endif
                </ul>

                <span id="menuIcon" class="hamburger" onclick="openNav()">&#9776;</span>

                <!-- Side Navigation Menu -->
                <div id="sideNav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="{{ url('/') }}">Home</a></a>
                    <a href="{{ route('user.feedback') }}">Feedback</a>
                    <a href="{{ route('user.team') }}">Our Team</a>
                    <a href="#footerr">Contact US</a>
                </div>
            </header>


            <div class="row">
                <div class="col-7" id="paragraph">
                    <p class="textt">Your <span>potential</span> is our <br>
                        <span>priority</span>—let’s make your <br>
                        job search a <span>success!</span>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <div class="col-3">
                        <a href="#findjob" style="text-decoration: none;">
                            <button class="btnn">Hiring Now</button>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </section>



    <section>
        <!-- Carousel Section -->
        <div class="container py-5" id="findjob">
            <h2 class="text-center mb-4" style="font-family: 'Comic Sans MS', cursive; margin-right:170px;">Find
                Latest Jobs</h2>
            <div id="cardCarousel" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators -->
                <div class="carousel-indicators">
                    @foreach ($chunks as $index => $chunk)
                        <button type="button" data-bs-target="#cardCarousel" data-bs-slide-to="{{ $index }}"
                            class="{{ $index == 0 ? 'active' : '' }}"></button>
                    @endforeach
                </div>

                <div class="carousel-inner">
                    @foreach ($chunks as $index => $chunk)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <div class="row justify-content-center">
                                @foreach ($chunk as $job)
                                    <div class="col-lg-4 col-md-6 col-12 mb-4">
                                        <div class="card">
                                            <img src="{{ asset('uploads/profile_photos/' . $job->user->profile_photo) }}" alt="{{$job->user->profile_photo}} Logo" alt="{{ $job->user->name }} Logo"
                                                class="card-img-top">
                                            <div class="card-body">
                                                <h5 class="card-title" style="font-family: 'Comic Sans MS', cursive;">
                                                    {{ $job->name }}</h5>
                                                <div class="details" style="font-family: 'Comic Sans MS', cursive;">
                                                    <p>{{ $job->major }}</p>
                                                    <p>{{ $job->location }}</p>
                                                    <p>{{ $job->duration }}</p>
                                                </div>
                                                @if ($job->is_available)
                                                    @php
                                                        $url = Auth::check()
                                                            ? (Auth::user()->role === 'user'
                                                                ? route('user.avajob', ['job' => $job->id])
                                                                : route('admin.job'))
                                                            : route('login');
                                                    @endphp

                                                    <a href="{{ $url }}" class="btn btn-dark"
                                                        style="width: 50%; height: 50%; font-family: 'Comic Sans MS', cursive;">
                                                        Know More
                                                    </a>
                                                @else
                                                    <button class="btn btn-secondary" disabled
                                                        style="width: 50%; height: 50%; font-family: 'Comic Sans MS', cursive;">
                                                        Not Available
                                                    </button>
                                                @endif

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Arrows -->
                <button class="carousel-control-prev" type="button" data-bs-target="#cardCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#cardCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon"></span>
                </button>
            </div>
        </div>

        <!-- Empty Space Section -->
        <div class="container-fluid py-5 bg-white">
            <div class="row">
                <div class="col-lg-6 col-md-12 text-center text-lg-start mb-4">
                    <div class="ms-lg-5" style="margin-top: 10rem; margin-left: 40px; text-align: center;">
                        <h2 style="font-family: canva sans; margin: 0;">
                            Get ready for more opportunities!
                        </h2>
                        <h5 class="mt-6" style="font-family: canva sans; margin: 0; margin-left:25px;">
                            You are minutes away from the right job.
                        </h5>
                    </div>

                </div>

                <div class="col-lg-6 col-md-12 d-flex justify-content-center">
                    <img src="assets/IMG/GettyImages-514412665-56992d8d3df78cafda900e50.jpg" alt="Job Opportunities"
                        class="img-fluid rounded shadow-lg" style="max-width: 90%; ">
                </div>
            </div>
        </div>
        <!-- Colored Section -->
        <div class="colored py-5" id="footerr">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8 col-md-10 col-sm-12">
                        <div class="card curved-card p-4">
                            <h2 class="with-comma text-center text-lg-start"
                                style="font-family:canva sans; text-align: center !important; margin-left: 0 !important;">
                                <b>Smart Hire Solutions for Technological Universities</b>
                            </h2>
                            <p class="mt-3 text-center text-lg-start"
                                style="font-family:canva sans; padding-left: 1.5rem; padding-right: 1.5rem;">
                                We streamline the hiring process for technological universities by connecting engineers
                                with open academic positions. Our platform simplifies applications using advanced
                                algorithms. We provide a seamless way to showcase qualifications, explore opportunities,
                                and apply with confidence.
                            </p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Section -->


    </section>

    <script src="{{ asset('assets/JS/navbar.js') }}"></script>
    <script src="{{ asset('assets/JS/main.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>

            @include('partials.footer')

</body>

</html>
