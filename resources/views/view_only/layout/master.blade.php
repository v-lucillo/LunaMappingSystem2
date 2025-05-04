<!DOCTYPE html>
<html lang="en">

<head>
  @include('view_only.layout.style')
  @yield('css')
</head>

<body>

  @include('view_only.layout.topbar')

   @yield('container')

  

  @include('view_only.layout.script')
  @yield('js')
</body>

</html>
