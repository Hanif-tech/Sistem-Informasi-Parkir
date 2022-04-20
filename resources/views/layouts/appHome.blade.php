<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>E-Parking</title>
  @stack('prepend-style')
  @include('includes.style')
  @stack('addon-style')

</head>
<body class="pt-5">
    {{-- <div class="container">
    <div class="dropdown justify-content-end d-flex">
        <a class="btn btn-logout" type="button" href="{{route("logout")}}">
          Logout
        </a>
      </div>
    </div> --}}

      <!-- Content -->
        @yield('content')
      <!-- end: Content -->

    @include('includes.script')
</body>
</html>
