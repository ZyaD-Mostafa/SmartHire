
 <style>
    /* Header and main navigation styles */
    header {
      background-color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 10px;
      height: 80px;
      margin: 0;
      width: 100%;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    .row {
      width: 100%;
      display: flex;
      align-items: center;
    }

    .logo {
      margin-left: 50px;
      text-decoration: none;
      color: #302927;
      font-size: 35px;
      font-weight: bold;
    }

    header ul {
      list-style: none;
      display: flex;
      justify-content: space-evenly;
      align-items: center;
      margin: 0;
      padding: 0;
      flex-grow: 1;
    }

    header ul li {
      margin: 0 15px;
      position: relative;
    }

    header ul a {
      font-size: 20px;
      color: #302927;
      font-weight: bold;
      text-decoration: none;
      transition: color 0.3s;
      position: relative;
    }

    /* Nav item hover effect with underline */
    .navitem:hover {
      color: #302927;
      cursor: pointer;
    }
    .hamburger {
    font-size: 200px;
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
    .navitem::after {
      content: "";
      position: absolute;
      bottom: -5px; /* distance between text and underline */
      left: 0;
      width: 100%;
      height: 3px;
      background-color: #7a564d;
      transform: scaleX(0);
      transform-origin: right;
      transition: transform 0.3s ease-in-out;
    }

    .navitem:hover::after {
      transform: scaleX(1);
      transform-origin: left;
    }

    /* Dropdown styles */
    .dropdown {
      z-index: 1000;
    }

    header ul .dropdown {
      display: none;
      position: absolute;
      top: 100%;
      left: 0;
      background-color: white;
      border-radius: 20px;
      list-style: none;
      padding: 20px 0;
      margin: 0;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    header ul li:hover .dropdown {
      display: block;
    }

    header ul .dropdown li {
      padding: 10px;
      width: 100%;
    }

    header ul .dropdown a {
      font-size: 15px;
      padding: 10px 20px;
      white-space: nowrap;
      color: #302927;
    }

    header ul .dropdown a:hover {
      background-color: #302927;
      border-radius: 30px;
      color: white;
    }

    /* Hamburger (menu icon) */
    .hamburger {
      font-size: 30px;
      color: #302927;
      cursor: pointer;
      display: none;
      margin-right: 20px;
      text-align: right;
    }

    /* Side Navigation Menu */
    .sidenav {
      height: 100%;
      width: 0;
      position: fixed;
      z-index: 1500;
      top: 0;
      right: 0;
      background-color: white;
      overflow-x: hidden;
      transition: 0.3s;
      padding-top: 60px;
    }
    .sidenav a {
      padding: 8px 32px;
      text-decoration: none;
      font-size: 25px;
      color: #302927;
      display: block;
      transition: 0.3s;
    }
    .sidenav a:hover {
      color: #7a564d;
    }
    .sidenav .closebtn {
      position: absolute;
      top: 20px;
      right: 25px;
      font-size: 36px;
    }

    /* Responsive styles */
    @media screen and (max-width: 768px) {
      header ul {
        display: none;
      }
      .hamburger {
        display: block;
      }
    }
  </style>
  <header class="row">
    <!-- Logo container with hamburger icon -->
    <div class="col-2" style="display: flex; align-items: center;">
    <a class="logo" href="{{ url('/') }}">
    <img src="{{ asset('assets//IMG/logo111 (1).png') }}" alt="SmartHire Logo" style="height: 70px;width:80%;margin: bottom 5%; margin-top:-15%;">
</a>

    </div>
    <ul class="col-7">
      <li><a href="{{url('/')}}" class="navitem">Home</a></li>
      <li>
        <a href="#" class="navitem">About US</a>
        <span class="dropdown-toggle"></span>
        <ul class="dropdown">
          <li><a href="{{route('user.feedback')}}">Feedback</a></li>
          <li><a href="{{route('user.team')}}">Team</a></li>
        </ul>
      </li>
      <li><a href="#footerr">Contact US</a></li>
      <li>
        <a href="{{ url('/profile') }}" class="navitem">
          <img src="{{ asset('assets/IMG/user-circle-solid-24.png')}}" alt="profile" class="profile" style="height: 30px;">
        </a>
      </li>
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

  <!-- Side Navigation Menu -->
  <span id="menuIcon" class="hamburger" onclick="openNav()">&#9776;</span>

<!-- Side Navigation Menu -->
<div id="sideNav" class="sidenav">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="{{url('/')}}">Home</a></a>
    <a href="{{route ('user.feedback')}}">Feedback</a>
    <a href="{{route('user.team')}}">Our Team</a>
    <a href="#footerr">Contact US</a>
</div>

  <script>
    function openNav() {
      document.getElementById("sideNav").style.width = "250px";
    }

    function closeNav() {
      document.getElementById("sideNav").style.width = "0";
    }
  </script>

