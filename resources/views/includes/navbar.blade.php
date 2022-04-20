        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class=" brand-logo d-flex align-items-center" href="{{url('/')}}">
                    <img src="{{url('frontend/asset/img/logo.png')}}" width="45"  alt="">
                    <h4>E-Parking</h4>
                </a>
              <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{url('frontend/asset/skydash/images/logo-mini.svg')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
              {{-- <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
              </button> --}}
              @auth
                <div class="d-flex justify-content-center ms-auto align-items-center">
                        <h5 class="mall">{{Auth::user()->mall['nama_mall']}}</h5>
                </div>
              @endauth
              <ul class="navbar-nav navbar-nav-right">
                  @auth
                  <li class="nav-item nav-profile dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" data-toggle="dropdown" id="profileDropdown">
                      <p class="username-profile">{{Auth::user()->username}}</p>
                      <img src="{{url('frontend/asset/img/petugas.png')}}" alt="profile"/>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                      <a class="dropdown-item" href="{{route('logout')}}">
                        <i class="ti-power-off text-primary"></i>
                        Logout
                      </a>
                    </div>
                  </li>
                  @endauth
              </ul>
              <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
              </button>
            </div>
          </nav>
          <!-- partial -->
          <div class="container-fluid page-body-wrapper">



