<!DOCTYPE html>
<html lang="en">

<head>
  @include('administrator.layout.style')
  @yield('css')
</head>

<body>

  @include('administrator.layout.topbar')

  <main id="main" class="main">
    @yield('container')
  </main><!-- End #main -->

  

  @include('administrator.layout.script')
  @yield('js')
</body>

</html>
