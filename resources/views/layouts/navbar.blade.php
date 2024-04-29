<?php
$isLoggedIn = Auth::check();
?>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary bg-gradient bg-custom">
  <!-- Container wrapper -->
  <div class="container-fluid">
    <!-- Toggle button -->
    <button
      data-mdb-collapse-init
      class="navbar-toggler"
      type="button"
      data-mdb-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <i class="fas fa-bars"></i>
    </button>

    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <!-- Navbar brand -->
      <a class="navbar-brand mt-2 mt-lg-0" href="#">
        <img
          src="{{ asset('resources/images/hotel.png') }}"
          height="50"
          alt="Hotel Logo"
          loading="lazy"
        />
      </a>
      <!-- Left links -->
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="/Hotel-Reservation-System/">Home</a>
        </li>

        <li class="nav-item">
           <a class="nav-link" href="{{ route('room.details') }}">Rooms</a>
        </li>

        <li class="nav-item">
          <a class="nav-link" href="{{ route('reservation') }}">Reservation</a>
        </li>

      </ul>

      <!-- Left links -->
    </div>
    <!-- Collapsible wrapper -->

    <!-- Right elements -->
    <div class="d-flex align-items-center">
      @if (!$isLoggedIn)
        <!-- login and sign up -->
        <button type="button" class="btn btn-light px-3 me-2" data-mdb-toggle="modal" data-mdb-target="#loginModal">
          Login
        </button>
        <button data-mdb-ripple-init type="button" class="btn btn-info me-4">
          <a href="{{ route('register') }}" style="text-decoration: none; color: white;">Sign up</a>
        </button>
      @endif

      <!-- Modal -->
      <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="wrapper modal-content">
                <span class="close"><ion-icon name="close" data-mdb-dismiss="modal"></ion-icon></span>
                <div class="form-box login">
                    <h4>Log in</h4>
                    <form action="{{ route('login') }}" method="POST" id="login-form">
                    @csrf
                        <div class="input-box">
                            <span class="icon"><ion-icon name="person-circle"></ion-icon></span>
                            <input type="Text" id="username" name="name" required autocomplete="off">
                            <label for="username">User name</label> 
                        </div>
                        <div class="input-box">
                            <span class="icon"><ion-icon name="lock-closed"></ion-icon></span>
                            <input type="password" id="login-password" name="password" required>
                            <label for="login-password">Password</label>
                        </div>
                        <div class="remember-forgot">
                            <label><input type="checkbox" id="rememberMe">Remember me</label>
                            <a href="#">Forgot Password?</a>
                        </div>
                        <span id="msgBox"></span>
                        <button type="submit" class="btn btn-info" >Log in</button>
                    </form>
              </div>
            </div>
        </div>
      </div>

      <!-- Avatar -->
      @if ($isLoggedIn)
          <div class="dropdown">
              <a class="dropdown-toggle d-flex align-items-center hidden-arrow" 
              href="#" id="navbarDropdownMenuAvatar" 
              role="button" 
              aria-expanded="false" 
              data-mdb-toggle="dropdown">
              <img src="{{ asset('resources/images/user.png')}}" class="rounded-circle" height="30" alt="Portrait" loading="lazy"/>
              </a>
              <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuAvatar">
                  <li><a class="dropdown-item" href="#">My profile</a></li>
                  <li>            
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                              document.getElementById('logout-form').submit();">
                        Logout
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                  </li>
              </ul>
          </div>
      @endif
    </div>
    <!-- Right elements -->
  </div>
  <!-- Container wrapper -->
</nav>
<!-- Navbar -->