<header class="row">
    <div class="col-2">
        <a class="logo" href="{{url('/')}}">SmartHire</a>
    </div>

    <ul class="col-7">
        <li><a href="{{url('/')}}">Home</a></li>
        <li>
            <a href="#">About US</a>
            <span class="dropdown-toggle"></span>
            <ul class="dropdown">
                <li><a href="#footerr">Feedback</a></li>
                <li><a href="#footerr">Team</a></li>
            </ul>
        </li>
        <li><a href="#footerr">Contact US</a></li>
        <li class="line11"><a></a></li>
        <li><a href="#findjob"><img src="assets/IMG/search_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.png" alt="search" class="search"> Find Job</a></li>

        <li>
            @if (Route::has('login'))
            @auth
            <div>
                @if (Auth::user()->role == 'admin')
                    <a href="{{ url('/dashboard') }}">Dashboard</a>
                @else
                    <a href="{{ url('/profile') }}"><img src="assets/IMG/user-circle-solid-24.png" alt="profile" class="profile"></a>

                @endif
                @if (Auth::user()->role == 'admin')
                <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endif
            </div>
        @else
            <a href="{{ route('login') }}">Log in</a>
        @endauth

            @endif
        </li>
    </ul>

    <span id="menuIcon" class="hamburger" onclick="openNav()">&#9776;</span>

    <!-- Side Navigation Menu -->
    <div id="sideNav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="About Us.html">About</a>
        <a href="Our Team.html">Our Team</a>
        <a href="Our Services.html">Our Services</a>
        <a href="Contact.html">Contact</a>
    </div>
</header>
