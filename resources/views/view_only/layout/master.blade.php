<!DOCTYPE html>
<html lang="en">

<head>
  @include('view_only.layout.style')
  @yield('css')
</head>

<body>

  @include('view_only.layout.topbar')

  <main id="main" class="main">
    @yield('container')
  </main><!-- End #main -->

  

  @include('view_only.layout.script')
  @yield('js')
</body>

</html>
