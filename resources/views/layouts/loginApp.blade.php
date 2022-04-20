<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Parking</title>

  <!-- start: Css -->
  @stack('prepend-style')
  @include('includes.style')
  @stack('addon-style')
  <!-- end: Css -->

</head>
<body>
  	{{-- <div class="panel container col-lg-4 col-md-6 col-sm-6 col-xs-12" style="position: relative; margin: auto; box-shadow: 0 7px 16px #00655b, 0 4px 5px #006f64;">
          <div class="panel-body">
            <div style="float: left; margin-left:20px;">
              <img src="{{url('frontend/asset/img/logo.png')}}" width="100px" class="animated fadeInDown">
            </div>
            <div style="float: left;">
              <h1 class="animated fadeInLeft" id="jam" style="margin-left: 40px; font-size: 62pt">21:14</h1>
              <p class="animated fadeInRight" style="margin-left: 85px; font-size: 14pt;">Sat,02 Apr 2022</p>
            </div>
          </div>
          <div class="panel-heading bg-teal">
              <h4 style="color: white" class="animated zoomIn">Login Petugas Parkir</h4>
          </div> --}}
          <main>
              @yield('content')
          </main>
      </div>
</body>
</html>
