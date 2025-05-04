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
           
        

            @if(session('user')->id == 1)
              <li>
                <span class="dropdown-item d-flex align-items-center" id = "add_user_button" style="cursor: pointer;">
                  <i class="bx bxs-user-plus"></i>
                  <span>Add User</span>
                </span>
              </li>

            @endif
            <li>
              <hr class="dropdown-divider">
            </li>


            <li>
              <a class="dropdown-item d-flex align-items-center" href="/logout">
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


      <li class="nav-item">
        <a class="nav-link collapsed" href="/administrator/population">
          <i class="ri-user-location-fill"></i>
          <span>Population</span>
        </a>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" href="/administrator/facilities">
          <i class="bx bxs-buildings"></i>
          <span>Facilities</span>
        </a>
      </li>

    </ul>

  </aside><!-- End Sidebar-->







<div class="modal fade" id="add_user_modal" tabindex="-1">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Add User</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form name = "add_user_form">
            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Username</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" name ="user_name" placeholder="(e.g admin2)">
                <span style="color: red;" name = "user_name"></span>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name ="password" placeholder="*********">
                <span style="color: red;" name = "password"></span>
              </div>
            </div>

            <div class="row mb-3">
              <label for="inputText" class="col-sm-3 col-form-label">Confirm Password</label>
              <div class="col-sm-9">
                <input type="password" class="form-control" name ="password_confirmation" placeholder="*********">
                <span style="color: red;" name = "password_confirmation"></span>
              </div>
            </div>


        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" name = "save_user_button">Save changes</button>
      </div>
    </div>
  </div>
</div>





  <main id="main" class="main">

  
    <section class="section">
      @yield('container')
    </section>

  </main>


  @include('administrator.layout.script')
  @yield('js')
</body>

<script type="text/javascript">
  const add_user_modal = new bootstrap.Modal($('#add_user_modal'));

  $('#add_user_button').on('click', function(){
    add_user_modal.show();
  });


  const form  = $('form[name="add_user_form"]');

  $('button[name="save_user_button"]').on('click', function(){
    form.find('span').empty();
    $.ajax({
      url: `/administrator/add_user`,
      data: form.serializeArray(),
      success: function(e){
        form.trigger('reset');
        add_user_modal.hide();
        Toastify({
                  text: "Success",
                  duration: 3000,
                  newWindow: true,
                  close: true,
                  gravity: "top", // `top` or `bottom`
                  position: "center", // `left`, `center` or `right`
                  stopOnFocus: true, // Prevents dismissing of toast on hover
                  className: "info",
                  onClick: function(){} // Callback after click
                }).showToast();
      },
      error: function(e){
        let error = e.responseJSON.errors;
        for(let id in error){
          form.find(`span[name="${id}"]`).empty().append(error[id]);
        }
      }
    });
  });
</script>
</html>




