<!DOCTYPE html>
<html lang="en">

<head>
  @include('administrator.layout.style')
  @yield('css')
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="#" class="logo d-flex align-items-center">
        <img src="/lunamapping_template/img/luna.jpg" alt="">
        <span class="d-none d-lg-block" style="font-size: 17px;">Luna Mapping System</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

  

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <span class="d-none d-md-block dropdown-toggle ps-2">{{session('user')->user_name}}</span>
          </a>

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
           
        

            <li>
              <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                <i class="bi bi-person"></i>
                <span>Change password</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->



  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link collapsed" href="/administrator/home">
          <i class="bx bxs-home"></i>
          <span>Home</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/administrator/barangay">
          <i class="bx bxs-map-pin"></i>
          <span>Baranggay</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link collapsed" href="/administrator/agriculture">
          <i class="bx bx-landscape"></i>
          <span>Agriculture</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->







  <main id="main" class="main">

  
    <section class="section">
      @yield('container')
    </section>

  </main>


  @include('administrator.layout.script')
  @yield('js')
</body>

</html>




