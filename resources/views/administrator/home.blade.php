@extends('administrator.layout.master')

@section('css')

  
@endsection


@section('container')
    
   <?php  
    $image_1 =  $images[0]->image_location;
    $image_2 =  $images[1]->image_location;
    $image_3 =  $images[2]->image_location;


    $mayor_image = $person_incharge[0]->image_location;
    $mayor_name = $person_incharge[0]->name;

    $vice_mayor_image = $person_incharge[1]->image_location;
    $vice_mayor_name = $person_incharge[1]->name;
   ?>
    <div class="row">
        <div class="col-lg-4 col-sm-12">
            <div class="card">
            <div class="card-body">

                <h5 class="card-title">Image One</h5>
                <form enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class = "col-sm-12 pb-4">
                           <div name = "image_container" style="height: 200px; width: 100%; background-color: rgb(232, 230, 230); background-repeat: no-repeat; background-position: center center; background-size: contain; border-radius: 5px; background-image: url({{$image_1}});
                            ">
                        
                            </div> 
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="file" name="image" id = "1">
                        </div>
                    </div>
                </form>

            </div>
          </div>
        </div>


        <div class="col-lg-4 col-sm-12">
            <div class="card">
            <div class="card-body">

                <h5 class="card-title">Image Two</h5>
                <form enctype="multipart/form-data">
                    @csrf

                    <div class="row mb-3">
                        <div class = "col-sm-12 pb-4">
                           <div name = "image_container" style="height: 200px; width: 100%; background-color: rgb(232, 230, 230); background-repeat: no-repeat; background-position: center center; background-size: contain; border-radius: 5px; background-image: url({{$image_2}});">
                        
                            </div> 
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="file" name="image" id = "2">
                        </div>
                    </div>
                </form>

            </div>
          </div>
        </div>


        <div class="col-lg-4 col-sm-12">
            <div class="card">
            <div class="card-body">

                <h5 class="card-title">Image Three</h5>
                <form enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <div class = "col-sm-12 pb-4">
                           <div name = "image_container" style="height: 200px; width: 100%; background-color: rgb(232, 230, 230); background-repeat: no-repeat; background-position: center center; background-size: contain; border-radius: 5px; background-image: url({{$image_3}});">
                        
                            </div> 
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="file" name="image" id = "3">
                        </div>
                    </div>
                </form>    


            </div>
          </div>
        </div>



        <div class="col-lg-6 col-sm-12">
            <div class="card">
            <div class="card-body">

                <h5 class="card-title">Mayor</h5>

                <form enctype="multipart/form-data" name ="mayor_form">
                    @csrf
                    <div class="row mb-3">
                        <div class = "col-sm-12 pb-4">
                           <div name = "image" style="height: 200px; width: 100%; background-color: rgb(232, 230, 230); background-repeat: no-repeat; background-position: center center; background-size: contain; border-radius: 5px; background-image: url({{$mayor_image}});">
                        
                            </div> 
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="file" name="person_incharge_image">
                        </div>
                    </div>

                    <div class="row mb-3">
                      <div class="col-12">
                        <input type="text" name = "name" value="{{$mayor_name}}" class="form-control" placeholder="Full name">
                      </div>
                    </div>
                    <input hidden name="id" value="1">
                </form>
                <button type="submit" class="btn btn-primary" name = "update_mayors_info_button">Submit</button>

            </div>
          </div>
        </div>



        <div class="col-lg-6 col-sm-12">
            <div class="card">
            <div class="card-body">

                <h5 class="card-title">Vice Mayor</h5>
                <form enctype="multipart/form-data" name ="vice_mayor_form">
                    @csrf
                    <div class="row mb-3">
                        <div class = "col-sm-12 pb-4">
                           <div name = "image" style="height: 200px; width: 100%; background-color: rgb(232, 230, 230); background-repeat: no-repeat; background-position: center center; background-size: contain; border-radius: 5px;background-image: url({{$vice_mayor_image}});">
                        
                            </div> 
                        </div>
                        <div class="col-12">
                            <input class="form-control" type="file" name="person_incharge_image">
                        </div>
                    </div>


                    <div class="row mb-3">
                      <div class="col-12">
                        <input type="text" name = "name" class="form-control" value = "{{$vice_mayor_name}}" placeholder="Full name">
                      </div>
                    </div>
                    <input hidden name="id" value="2">
                </form>
                <button type="submit" class="btn btn-primary" name = "update_vice_mayors_info_button">Submit</button>
        



            </div>
          </div>
        </div>








    </div>
@endsection

@section('js')
<script type="text/javascript">

    $(document.body).on("change",'input[name="image"]',function(){
        let  image_container = $($(this).parent().parent().find('div[name="image_container"]'));
        let form = $($(this).parent().parent().parent());
        const fileInput = $(this)[0];
        if (fileInput.files[0]) {
            image_container.css('background-image', "url('"+window.URL.createObjectURL(fileInput.files[0])+"')");
            upload_image(form, $(this).attr('id'));
        }
    });

    $(document.body).on("change",'form input[name="person_incharge_image"]',function(){
        let image = $($(this).parent().parent().parent().find('div[name="image"]'));
        const fileInput = $(this)[0];
        if (fileInput.files[0]) {
            image.css('background-image', "url('"+window.URL.createObjectURL(fileInput.files[0])+"')");
        }
    });

    $('button[name="update_mayors_info_button"]').on('click', function(){
        $("form[name='mayor_form']").ajaxSubmit({
            url: "/administrator/update_person_incharge",
            type: "POST",
            success: function(e){
                Toastify({
                  text: "Success",
                  duration: 3000,
                  destination: "https://github.com/apvarun/toastify-js",
                  newWindow: true,
                  close: true,
                  gravity: "top", // `top` or `bottom`
                  position: "center", // `left`, `center` or `right`
                  stopOnFocus: true, // Prevents dismissing of toast on hover
                  className: "info",
                  onClick: function(){} // Callback after click
                }).showToast();
            },
            error: function(){

            }
        });
    });


    $('button[name="update_vice_mayors_info_button"]').on('click', function(){
        $("form[name='vice_mayor_form']").ajaxSubmit({
            url: "/administrator/update_person_incharge",
            type: "POST",
            success: function(e){
                Toastify({
                  text: "Success",
                  duration: 3000,
                  destination: "https://github.com/apvarun/toastify-js",
                  newWindow: true,
                  close: true,
                  gravity: "top", // `top` or `bottom`
                  position: "center", // `left`, `center` or `right`
                  stopOnFocus: true, // Prevents dismissing of toast on hover
                  className: "info",
                  onClick: function(){} // Callback after click
                }).showToast();
            },
            error: function(){

            }
        });
    });


    function upload_image(form, image_number){      
        form.append('<input class="form-control" hidden="" name = "image_number" value = "'+image_number+'">')

        $(form).ajaxSubmit({
            url: "/administrator/upload_image",
            type: "POST",
            success: function(e){
                Toastify({
                  text: "Success",
                  duration: 3000,
                  destination: "https://github.com/apvarun/toastify-js",
                  newWindow: true,
                  close: true,
                  gravity: "top", // `top` or `bottom`
                  position: "center", // `left`, `center` or `right`
                  stopOnFocus: true, // Prevents dismissing of toast on hover
                  className: "info",
                  onClick: function(){} // Callback after click
                }).showToast();
            },
            error: function(){

            }
        }); 
    }


</script>
@endsection