<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/CSS/profile.css">
    <title>Profile</title>
</head>
<body>
    {{-- <video src="assets/IMG/back-vid.mp4" id="back-vid" autoplay loop muted></video> --}}
    <div class="containerone">
        <header class="row">

            <div class="col-2">  <a class="logo" href="{{ url('/') }}">
    <img src="{{ asset('assets//IMG/logo111 (2).png') }}" alt="SmartHire Logo" style="height: 60px;width:70%;">
</a>
</div>
            <ul class="col-7 ">
                <li><a href="{{url('/')}}">Home</a> </li>
                <li>
                    <a href="#">About US</a>
                    <span class="dropdown-toggle"></span>
                    <ul class="dropdown">
                        <li><a href="{{route('user.feedback')}}">Feedback</a></li>
                        <li><a href="{{route('user.team')}}">Team</a></li>
                    </ul>
                </li>
                <li><a href="#footerr">Contact US</a></li>
            </ul>

             <span id="menuIcon" class="hamburger" onclick="openNav()">&#9776;</span>

<!-- Side Navigation Menu -->
<div id="sideNav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{url('/')}}">Home</a></a>
    <a href="{{route ('user.feedback')}}">Feedback</a>
    <a href="{{route('user.team')}}">Our Team</a>
    <a href="#footerr">Contact US</a>
</div>
        </header>
{{-- Background video --}}
<video src="{{ asset('assets/IMG/back-vid.mp4') }}" id="back-vid" autoplay loop muted></video>
<div class="overlay"></div>

        <div class="contentt">
            <div class="cardd">
                <h2>User Profile </h2>
                <div class="pofilecard">
                <div class="profileimg" style="width: 200px; height: 200px; border-radius: 50%; overflow: hidden; display: flex; justify-content: center; align-items: center; background-color: #e0e0e0;">

                    <img id="profilePreview" src="{{ asset('uploads/profile_photos/' . Auth::user()->profile_photo) }}" alt="Profile Photo" style="width: 100%; height: 100%; object-fit: cover;">
                </div>


                </div>
                <div class="cardinfo">
                    @php
                    // Get the first application if exists
                    $application = Auth::user()->userApps()->first();
                    @endphp
                <h1 style="top: 250px; left: 40%; position: absolute;">{{ Auth::user()->name }}</h1>

                    <div class="firstinfo"><h3>Name:</h3><p>{{ Auth::user()->name}}</p></div>
                    <div class="firstinfo"><h3>Email:</h3><p>{{ Auth::user()->email}}</p></div>

                    @if($application)
                    <div><h3>Phone Number:</h3><p>{{ $application->phone}}</p></div>

                    <div><h3>Date Of Birth:</h3><p>{{ $application->dob}}</p></div>

                    <div><h3>Address:</h3><p>{{ $application->address }}</p></div>

                    <div><h3>University/Collage:</h3><p>{{ $application->university }}</p></div>
                    @else
                    <div><h3>Phone Number:</h3><p></p></div><br>

                    <div><h3>Date Of Birth:</h3><p></p></div><br>

                    <div><h3>Address:</h3><p></p></div><br>

                    <div><h3>University/Collage:</h3><p></p></div><br>

                    @endif
                    <div class="buttons">
                        <button class="button"><a href="{{route('profile.edit',Auth::user()->id)}}" class="btna">Edit<img src="assets/IMG/edit-regular-24.png" alt="" style="margin-left: 8%"></a></button>

                        <button class="button"><a href="{{ route('logout') }}"  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btna">SignOut</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </button>
                    </div>

                </div>
            </div>

        </div>

    </div>


    <script src="assets/JS/navbar.js"></script>

</body>
</html>
