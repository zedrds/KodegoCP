<nav class="navbar sticky navbar-dark">
        <div class="container d-flex align-content-center justify-content-between px-5">
          <a href="{{route('home')}}">
            <img class="logo rounded-circle" src="{{asset('frontend/assets/img/UNWINDLOGO.png')}}"
          /></a>
          <a href="#" class="nav-link text-white d-block d-lg-none"><i class="ri-menu-line"></i></a> 
          <div class="d-lg-flex d-none ">
            
            <a class="nav-link text-white p-2 " href="{{route('home')}}">HOME</a>
            <a class="nav-link text-white p-2 " href="{{route('unit.types')}}">UNITS</a>
            @auth
                <!-- <a class="nav-link text-white p-2 pe-4" href="{{route('guest.profile')}}">My Profile</a> -->
                <div class="dropdown">
                <a class="btn text-white dropdown-toggle me-3" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                My Profile
                </a>

                <ul class="dropdown-menu text-end">
                  <li><a class="dropdown-item" href="{{route('guest.profile')}}">View Profile</a></li>
                  <li><a class="dropdown-item" href="{{route('guest.logout')}}">Logout</a></li>
                </ul>
              </div>
            @else
                <a class="nav-link text-white p-2 pe-4" href="{{ route('login') }}">LOGIN</a>
            @endauth
            <small><a href="{{route('search')}}" class="btn btn-secondary">Book now</a></small>
          </div>
        </div>
      </nav>