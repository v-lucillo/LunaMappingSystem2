@extends('view_only.layout.master')

@section('css')

  </style>
@endsection


@section('container')
 <br>
<div class="slider">
  <div class="slides">
      <!-- radio btn start -->
      <input type="radio" name="radio-btn" id="radio1">
      <input type="radio" name="radio-btn" id="radio2">
      <input type="radio" name="radio-btn" id="radio3">
      <!-- radio btn end -->
       <!-- slide img starts -->

      <div class="slide first">
          <img id="img1" src="{{asset('lunamapping_template/img/img_1.jpg')}}" alt="">
      </div>
      <div class="slide">
          <img id="img2" src="{{asset('lunamapping_template/img/img_2.jpg')}}" alt="">
      </div>
      <div class="slide">
          <img id="img3" src="{{asset('lunamapping_template/img/img_3.jpg')}}" alt="">
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
<!--  -->
<!-- mayor and vice mayor info -->
<div class="person">
  <div class="mayor">
      <div class="pctr">
          <img id="mayor_pctr" src="{{asset('lunamapping_template/img/mayor.png')}}">
          <h1>Mayor</h1>
          <h2 id="mayor_name">Adut K. Rina</h2>
      </div>
  </div>
  <div class="v_mayor">
      <div class="pctr">
          <img id="vmayor_pctr" src=" {{asset('lunamapping_template/img/v_mayor.png')}}">
          <h1>Vice Mayor</h1>
          <h2 id="vmayor_name">Mangun G. Ngurkut</h2>
      </div>
     
  </div>
</div>
<div class="buttom">

  <div class="where">
      <p class="brngy">Barangay DikAmmo Nu Sadino</p>
  </div>

  {{-- <div class="hotline">
      <h1>Emergency hotline</h1>
      <div><h4 class="pnp">PNP</h4><p id="pnp">0916934132</p></div>
      <div><h4 class="bfp">BFP</h4><p id="bfp">0943313112</p></div>
      <div><h4 class="rhu">RHU</h4><p id="rhu">0923132134</p></div>
      
  </div> --}}
</div>

 
@endsection


@section('js')
    
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

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