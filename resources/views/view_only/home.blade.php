@extends('view_only.layout.master')

@section('css')

  
@endsection


@section('container')


        <div class="slider">
           <div class="slides">
              <!-- radio btn start -->
              <input type="radio" name="radio-btn" id="radio1">
              <input type="radio" name="radio-btn" id="radio2">
              <input type="radio" name="radio-btn" id="radio3">
              <!-- radio btn end -->
              <!-- slide img starts -->
              <div class="slide first">
                 <img id="img1" src="{{$images[0]->image_location}}" alt="">
              </div>
              <div class="slide">
                 <img id="img2" src="{{$images[1]->image_location}}" alt="">
              </div>
              <div class="slide">
                 <img id="img3" src="{{$images[2]->image_location}}" alt="">
              </div>
              <!-- slide img ends -->
              <!--  -->
              <!-- auto nav start -->
              <div class="navigation-auto">
                 <div class="auto-btn1"></div>
                 <div class="auto-btn2"></div>
                 <div class="auto-btn3"></div>
              </div>
              <!-- auto nav end -->
           </div>
           <!-- manual nav start -->
           <div class="navigation-manual">
              <label for="radio1" class="manual-btn"></label>
              <label for="radio2" class="manual-btn"></label>
              <label for="radio3" class="manual-btn"></label>
           </div>
           <!-- manual nav end -->
        </div>

        
        <div class="person">
           <div class="mayor">
              <div class="pctr">
                 <img id="mayor_pctr" src="{{$person_incharge[0]->image_location}}">
                 <h1>Mayor</h1>
                 <!-- <h2 id="mayor_name"></h2> -->
                 <h2>{{$person_incharge[0]->name}}</h2>
              </div>
           </div>
           <div class="v_mayor">
              <div class="pctr">
                 <img id="vmayor_pctr" src="{{$person_incharge[1]->image_location}}">
                 <h1>Vice Mayor</h1>
                 <!-- <h2 id="vmayor_name"></h2> -->
                 <h2>{{$person_incharge[1]->name}}</h2>
              </div>
           </div>
        </div>


   <!--      <div class="buttom">
           <div class="where">
              <p class="brngy">Barangay DikAmmo Nu Sadino</p>
           </div>
           <div class="hotline">
              <h1>Emergency hotline</h1>
              <div>
                 <h4 class="pnp">PNP</h4>
                 <p id="pnp">0916934132</p>
              </div>
              <div>
                 <h4 class="bfp">BFP</h4>
                 <p id="bfp">0943313112</p>
              </div>
              <div>
                 <h4 class="rhu">RHU</h4>
                 <p id="rhu">0923132134</p>
              </div>
           </div>
        </div>
 -->


@endsection

@section('js')
<script type="text/javascript">

    
</script>

<script type="text/javascript">
var counter = 1;
    setInterval(function(){
        document.getElementById('radio' + counter).checked = true;
        counter++;
        if (counter > 3){
            counter = 1;
        }
    },8000);
</script>


@endsection