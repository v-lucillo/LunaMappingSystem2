<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('admintemplate/assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('admintemplate/assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('admintemplate/assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
<!--   <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet"> -->

  <!-- Template Main CSS File -->
  <link href="{{asset('admintemplate/assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
 
</head>

<body>

  <main>
    <div class="container">

      <section class="section register min-vh-100 d-flex flex-column align-items-center justify-content-center py-4">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

              <div class="card mb-3">

                <div class="card-body">

                  <div class="pt-4 pb-2">
                    <div class="d-flex justify-content-center py-4">
                        <img src="{{asset('images/pnplogo.png')}}" width="100px" alt="">
                        
                      </div><!-- End Logo -->
                      <!-- <div;>
                      <span class="d-none d-lg-block"  >PNPMapping Appication</span>

                    </div> -->
                    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
                    <p class="text-center small">Enter your username & password to login</p>
                  </div>

                  <form class="row g-3 needs-validation" method="POST" action="{{route('a.post_log_in')}}">
                    @csrf
                    <div class="col-12">
                      <label for="yourUsername" class="form-label" >Email</label>
                      <div class="input-group has-validation">
                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                        <input type="text" name="email"  class="form-control" id="yourUsername" required>
                        <div class="invalid-feedback">Please enter your username.</div>
                      </div>
                    </div>

                    <div class="col-12">
                      <label for="yourPassword" class="form-label" >Password</label>
                      <input type="password" name="password"  class="form-control" id="yourPassword" required>
                      <div class="invalid-feedback">Please enter your password!</div>
                      <p style="text-align: center"><span style="color: red" name="sign_in_error"></span></p>
                    </div>
                    {{-- <div class="col-12">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="rememberMe">
                        <label class="form-check-label" for="rememberMe">Remember me</label>
                      </div>
                    </div> --}}
                    <div class="col-12">
                      <button type="submit"  class="btn btn-primary">Log In</button>
                    </div>
                    {{-- <div class="col-12">
                      <p class="small mb-0">Don't have account? <a href="{{route('a.register')}}">Create an account</a></p>
                    </div> --}}
                  </form>

                </div>
              </div>

            </div>
          </div>
        </div>

      </section>

    </div>
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

  <script type="text/javascript">
  let message = "{{session('message')}}";
  if(message){
    alert(message);
  }
    // $('a[name="login"]').on('click', function(){
    //     $("span[name='sign_in_error']").empty();
    //     $.ajax({
    //         url: "{{route('a.sign_in')}}",
    //         data: {
    //             email: $('input[name="email"]').val(),
    //             password: $('input[name="password"]').val()
    //         },
    //         success: function(e){
    //             window.location.replace("{{route('v.dashboard')}}");
    //         },
    //         error: function(e){
    //             $("span[name='sign_in_error']").empty().append(e.responseJSON.message);
    //         }
    //     });
    // });
  </script>
</body>

</html>