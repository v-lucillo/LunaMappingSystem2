@extends('view_only.layout.master')

@section('css')
<style type="text/css">
  * {
  box-sizing: border-box;
}

body {
  font-family: Arial, Helvetica, sans-serif;
}

/* Float four columns side by side */
.column {
  float: left;
  width: 30.333%;
  padding: 0 10px;
  margin: 20px;
}

/* Remove extra left and right margins, due to padding in columns */
.row {margin: 0 -5px;}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Style the counter cards */
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); /* this adds the "card" effect */
  padding: 16px;
  text-align: center;
  background-color: #f1f1f1;
}

/* Responsive columns - one column layout (vertical) on small screens */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    display: block;
    margin-bottom: 20px;
  }
  
 
}
.box1{
   height: 200px;
   width: 200px;
   float: left;
}
.box2{
   height: 200px;
   width: 200px;
   float: right;
}

.graphs h1{
    font-size: 1.5em;
}
.graphs h2{
    font-size: 1.5em;
    color: #F0F8FF;
    margin-top:60px;
    margin-left:-70px;
}
.graphs{
    display: flex;
}
.graphs .box{
     height: 300px;
   width: 500px;
   margin-left:-100px;
}
.card{
    width:200px;
    height:100px;
    border-radius:20px;
    align-items: center;
    margin-left:150px;
}
.card h1{
    font-size:1em;
    
}
.card h2{
    font-size:1em;
    
}


/* CSS */
.button-42 {
  background-color: initial;
  background-image: linear-gradient(-180deg, #FF7E31, #E62C03);
  border-radius: 6px;
  box-shadow: rgba(0, 0, 0, 0.1) 0 2px 4px;
  color: #FFFFFF;
  cursor: pointer;
  display: inline-block;
  font-family: Inter,-apple-system,system-ui,Roboto,"Helvetica Neue",Arial,sans-serif;
  height: 40px;
  line-height: 40px;
  outline: 0;
  overflow: hidden;
  padding: 0 20px;
  pointer-events: auto;
  position: relative;
  text-align: center;
  touch-action: manipulation;
  user-select: none;
  -webkit-user-select: none;
  vertical-align: top;
  white-space: nowrap;
  width: 100%;
  z-index: 9;
  border: 0;
  transition: box-shadow .2s;
}

.button-42:hover {
  box-shadow: rgba(253, 76, 0, 0.5) 0 3px 8px;
}


input[type=text], select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}



</style>

 <style>
      .checkbox-wrapper-36 *,
      .checkbox-wrapper-36 *::before,
      .checkbox-wrapper-36 *::after {
        box-sizing: border-box;
      }

      .checkbox-wrapper-36 label {
        background: white;
        border-radius: 12px;
        box-shadow: 0px 50px 20px 0 rgba(0,0,0,0.1);
        display: flex;
        height: 50px;
        padding: 8px;
        position: relative;
        transition: transform 300ms ease, box-shadow 300ms ease;
        width: 116px;
      }

      .checkbox-wrapper-36 input {
        display: none;
      }

      .checkbox-wrapper-36 label:after {
        animation: move-left-36 400ms;
        background: #E2E2E2 url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='27' height='27' viewBox='0 0 24 24'%3E%3Cpath stroke='#E2E2E2' fill='#E2E2E2' stroke-linecap='round' d='M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z'/%3E%3C/svg%3E") no-repeat center;
        border-radius: 12px;
        content: '';
        left: 8px;
        outline: none;
        position: absolute;
        transition: background 100ms linear;
        width: 36px;
        height: 36px;
        left: 8px;
        top: 7px;
      }

      .checkbox-wrapper-36 label:active {
        box-shadow: 0px 10px 20px 0 rgba(0,0,0,0.2);
        transform: scale(1.15);
      }

      .checkbox-wrapper-36 input:checked + label:after {
        animation: move-right-36 400ms;
        background: #6EB54E url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='27' height='27' viewBox='0 0 24 24'%3E%3Cpath stroke='white' fill='white' stroke-linecap='round' d='M20.285 2l-11.285 11.567-5.286-5.011-3.714 3.716 9 8.728 15-15.285z'/%3E%3C/svg%3E") no-repeat center;
        left: 72px;
      }

      @keyframes move-right-36 {
        0% {
          left: 8px;
        }
        75% {
          left: 78px;
        }
        100% {
          left: 72px;
        }
      }

      @keyframes move-left-36 {
        0% {
          left: 72px;
        }
        75% {
          left: 2px;
        }
        100% {
          left: 8px;
        }
      }
    </style>
@endsection

@section('container')

<fieldset style="color: #FFF">
  <legend>Filters:</legend>

  <div style="display: flex; justify-content: center; align-items: end; gap: 50px">
    
     <div>

    <div class="checkbox-wrapper-36">
      <span>Show Facilities</span>
      <input id="toggle-36" type="checkbox" name = "show_facilities_button">
      <label for="toggle-36"></label>
    </div>

  </div>


  <div style="width: 200px; margin-top: 14px;">
    <label for="inputNanme4" class="form-label">Business Sector</label>
    <select class="form-select" name = "option_brngy_sec">
      <option value ="" selected="">Open this select menu</option>
      @foreach($biz_sec_List as $list)
        <option value="{{$list->id}}">{{$list->name}}</option>
      @endforeach
    </select>
  </div>

  <div class="dropdown" style="margin: 0px;margin-top: 15px; padding: 0px">
    <div class="select">
        <span class="selected">Barangays</span>
        <div class="caret"></div>
    </div>
    <ul class="menu">
       <li id="option_brngy" __id = "">
          <p >All</p>
        </li>
       @foreach($barangay_list as $row)
        <li id="option_brngy" __id = "{{$row->id}}">
            <p>{{$row->name}}</p>
        </li>
       @endforeach
    </ul>
  </div>

  </div>



  



</fieldset>

<div style="">

  <div>
      <div id="map" class="map"></div>
      <pre id="coordinates" class="coordinates"></pre>
  </div>

    

  <div class="graphs">
      
      
  <div class="graphBox">
    <h1>Graph</h1>
    <div class="box">
        <canvas id="myChart"></canvas>
    </div>
  </div>





  <div class="graphBox">
    <h2>Total Business per Baranggay</h2>
    <div class="box">
        <canvas id="biz_bar_chart"></canvas>
    </div>
  </div>



  </div>

</div>



<div style="display: flex; justify-content: center; align-items: center; margin-bottom: 100px;">
    <div style="width:90%; height: 100%; background: #FFF; border-radius: 10px; padding: 20px">
    <h1>Population Graph</h1>
    <div>
          <label for="inputNanme4" class="form-label">Year</label>
          <input type="text" class="form-control" value="{{date('Y')}}" name = "filter_year">
    </div>



    <div>
      <label for="inputNanme4" class="form-label">Baranggay</label>
      <select class="form-select" name = "filter_baranggay">
        <option value ="" selected="">Open this select menu</option>
        @foreach($barangay_list as $list)
          <option value="{{$list->id}}">{{$list->name}}</option>
        @endforeach
      </select>
    </div>



    <div>
      <button class="button-42" role="button" style="margin-bottom: 10px;" name = "filter_button">Apply Filter</button>
      <button class="button-42" role="button" name = "reset_button">Remove Filter</button>

    </div>




   <canvas id="population_chart_canvas" style="margin-top: 20px"></canvas>


  </div>
</div>



@endsection


@section('js')
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

<script type="text/javascript">


$('input[name="show_facilities_button"]').on('click', function(){
  if($(this).is(":checked")){
    render_marker_facilities();
  }else{
    for (let id in currentMarkers_facilities) {
        currentMarkers_facilities[id].remove();
      }
  }
});



let filter_button =  $('button[name="filter_button"]');
let filter_year =  $("input[name='filter_year']");
let filter_baranggay = $("select[name='filter_baranggay']");
let reset_button = $('button[name="reset_button"]');

filter_button.on('click', function(){
  population_chart();
});

reset_button.on('click', function(){
  filter_year.val("{{date('Y')}}");
  filter_baranggay.prop('selectedIndex',0);
  population_chart();
});


const population_chart_canvas = document.getElementById('population_chart_canvas');
let population_chartsss =  new Chart(population_chart_canvas, {
  type: 'bar',
  options: {
    indexAxis: 'y',
    elements: {
      bar: {
        borderWidth: 0,
      }
    }
  }
});
  


// render_marker_facilities();

let currentMarkers_facilities = [];


function render_marker_facilities(id = null) {
  $.ajax({
    url: `/administrator/get_facilities_record_for_map`,
    data: {
      id: id
    },
    success: function(e) {
      for (let id in currentMarkers_facilities) {
        currentMarkers_facilities[id].remove();
      }
      e.forEach((data) => {
        let lat = data.coordinates.split("Lat: ")[1];
        let long = data.coordinates.split("Long: ")[1].split(" -")[0];

        let popup = new mapboxgl.Popup()
          .setText(`${data.name}`)
          .addTo(map);

        let marker = new mapboxgl.Marker({ "color": data.color})
          .setLngLat([long, lat])
          .addTo(map)
          .setPopup(popup);

        currentMarkers_facilities.push(marker);

      });
    }
  });

}




function population_chart(){
  $.ajax({
    url:`/administrator/population_chart`,
    data: {
      filter_year: filter_year.val(),
      filter_baranggay: filter_baranggay.val()
    },
    success: function(e){
      asdasdremoveData(population_chartsss);
      asdsdaddData(population_chartsss, e.label, e.datasets);
    },
    error: function(e){
      console.log(e);
    }
  });
}
population_chart();




function asdsdaddData(chart, label, newData, color) {
  chart.data = {
    labels: label,
    datasets: newData
  };
  chart.update();
}

function asdasdremoveData(chart) {
    chart.data.labels = [];
    chart.data.datasets = [];
    chart.update();
}

</script>





{{--  Map Script --}}
<script>
  // TO MAKE THE MAP APPEAR YOU MUST
  // ADD YOUR ACCESS TOKEN FROM
  // https://account.mapbox.com
  mapboxgl.accessToken = 'pk.eyJ1IjoidmljdG9yaW5vaSIsImEiOiJjbGtnbDgxbjYwMWxyM2VueTZzbzdjMG9xIn0.cDWO9uV_3oq2AlHuIWQzfw';
    const coordinates = document.getElementById('coordinates');
    const map = new mapboxgl.Map({
        container: 'map',
        // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
        style: 'mapbox://styles/mapbox/satellite-v9',
        center: [121.72827890300437, 16.973888694502364],
        zoom: 12
    });

   
        // const el = document.createElement('div');
        // el.className = 'marker';
        // const marker = new mapboxgl.Marker(el).setLngLat([121.71871068604531, 16.939325096589386]).addTo(map);

    // function onDragEnd() {
    //     const lngLat = marker.getLngLat();
    //     coordinates.style.display = 'block';
    //     // coordinates.innerHTML = `Longitude: ${lngLat.lng}<br />Latitude: ${lngLat.lat}`;
    // }


  map.on('load', () => {

    render_baranggay_borders();


  map.addSource('maine', {
    'type': 'geojson',
    'data': {
      'type': 'FeatureCollection',
      'features': [{
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
            [
             [
            121.6998623050041,
            16.938138950810995
          ],
          [
            121.70001432256498,
            16.938274213189786
          ],
          [
            121.70190682518614,
            16.940218005661265
          ],
          [
            121.7035204326832,
            16.941532912707757
          ],
          [
            121.70521372450082,
            16.942676302668147
          ],
          [
            121.70744488548553,
            16.942523851074625
          ],
          [
            121.70562167695658,
            16.946826871726785
          ],
          [
            121.70620658514866,
            16.94812956834855
          ],
          [
            121.70566150344928,
            16.948287203345075
          ],
          [
            121.70425444833165,
            16.95130648569483
          ],
          [
            121.7028727296057,
            16.953767960111406
          ],
          [
            121.70307556479582,
            16.953901330396477
          ],
          [
            121.7049896889032,
            16.954713730556136
          ],
          [
            121.70642211290328,
            16.954240841337324
          ],
          [
            121.70787988954038,
            16.954616727736834
          ],
          [
            121.7053699784608,
            16.958715053233732
          ],
          [
            121.70204877985469,
            16.955502004429192
          ],
          [
            121.69984310042014,
            16.95404696298074
          ],
          [
            121.69658529118044,
            16.952216020928205
          ],
          [
            121.69481060657773,
            16.949972788108965
          ],
          [
            121.69583738067558,
            16.94740212635196
          ],
          [
            121.6964838693666,
            16.943788595615118
          ],
          [
            121.69842825581645,
            16.94025914425974
          ],
          [
            121.6998623050041,
            16.938138950810995
          ]
            ]
          ]
          },

          'properties': {
            'name': 'Polygon 1'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.7062123267803,
            16.948124643817593
          ],
          [
            121.70562436631087,
            16.946829780203416
          ],
          [
            121.70562113830351,
            16.94682113426782
          ],
          [
            121.70742813032552,
            16.942513137532515
          ],
          [
            121.71158536336975,
            16.935728948224565
          ],
          [
            121.71981981382129,
            16.94037392626352
          ],
          [
            121.7228899427513,
            16.942077538952333
          ],
          [
            121.72308660756931,
            16.94221340849063
          ],
          [
            121.72391150603426,
            16.944261914481842
          ],
          [
            121.72125223258541,
            16.948970446954718
          ],
          [
            121.71814842891138,
            16.949746489934768
          ],
          [
            121.71795046182905,
            16.955530783593503
          ],
          [
            121.71874699689812,
            16.95580577586459
          ],
          [
            121.71961008171746,
            16.95638175161804
          ],
          [
            121.72006504009715,
            16.956989727264727
          ],
          [
            121.71602567971229,
            16.965297176560526
          ],
          [
            121.704189221246,
            16.96096652406149
          ],
          [
            121.70539534122446,
            16.958732081388433
          ],
          [
            121.70788656129548,
            16.954511290664584
          ],
          [
            121.70766561058923,
            16.9545354889878
          ],
          [
            121.70642687164735,
            16.95423742410763
          ],
          [
            121.70498808758288,
            16.954701080418104
          ],
          [
            121.70308762595306,
            16.953911680419907
          ],
          [
            121.70288690855318,
            16.953770884659164
          ],
          [
            121.70415316772915,
            16.9515601691717
          ],
          [
            121.70563910431105,
            16.94835726232934
          ],
          [
            121.70566782248358,
            16.94828705895324
          ],
          [
            121.7062123267803,
            16.948124643817593
          ]
              ]
            ]
          },
          'properties': {
            'name': 'Polygon 2'
          }
        },
       
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.71158922780216,
            16.935728872952055
          ],
          [
            121.71251648688519,
            16.93426021623486
          ],
          [
            121.71639911553683,
            16.92801337520926
          ],
          [
            121.71772273893697,
            16.926578260825565
          ],
          [
            121.72328195722628,
            16.92662047022816
          ],
          [
            121.7312772511807,
            16.92896613366743
          ],
          [
            121.73288132340753,
            16.929346339955444
          ],
          [
            121.73262582962883,
            16.929795277499622
          ],
          [
            121.73238076416817,
            16.930219273087786
          ],
          [
            121.73223998188291,
            16.930728066531586
          ],
          [
            121.73221280850714,
            16.9310982054934
          ],
          [
            121.73213579606562,
            16.93176686076967
          ],
          [
            121.73194262494872,
            16.93285082105362
          ],
          [
            121.73179040328841,
            16.935180649407485
          ],
          [
            121.73191724828371,
            16.93617567045183
          ],
          [
            121.73272905625635,
            16.93772886351796
          ],
          [
            121.73302297440421,
            16.938287848467425
          ],
          [
            121.73269926080769,
            16.942311744345446
          ],
          [
            121.72836463627698,
            16.943261658588554
          ],
          [
            121.72391346741335,
            16.944257521034743
          ],
          [
            121.72308843893575,
            16.942214649218926
          ],
          [
            121.7199661991292,
            16.940450275022442
          ],
          [
            121.71158922780216,
            16.935728872952055
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 3'
          }
        },

        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.73269952113901,
            16.942312231268943
          ],
          [
            121.7327732584784,
            16.942645615462652
          ],
          [
            121.7327215870447,
            16.944905995885534
          ],
          [
            121.73315881609477,
            16.947534871588232
          ],
          [
            121.7334306865622,
            16.948201990323128
          ],
          [
            121.73365653633141,
            16.948326992765644
          ],
          [
            121.73449103593106,
            16.94835030098318
          ],
          [
            121.73551187877553,
            16.948308565514438
          ],
          [
            121.73692453688966,
            16.948283001053127
          ],
          [
            121.73781071270668,
            16.948755504840165
          ],
          [
            121.73894221534886,
            16.9492786432358
          ],
          [
            121.73962111693692,
            16.949522172681654
          ],
          [
            121.74142209197811,
            16.9496935450657
          ],
          [
            121.74264307855816,
            16.950005066591416
          ],
          [
            121.74519212603025,
            16.95136821446313
          ],
          [
            121.74521219727006,
            16.952577759932353
          ],
          [
            121.74516303477083,
            16.954864133951233
          ],
          [
            121.7446567238004,
            16.96102297831341
          ],
          [
            121.74407287059466,
            16.96683084749705
          ],
          [
            121.74309144050443,
            16.966448116135737
          ],
          [
            121.74097788645804,
            16.966303718701965
          ],
          [
            121.73961917314278,
            16.96618338742104
          ],
          [
            121.73862529951361,
            16.96614728802274
          ],
          [
            121.7372068370089,
            16.965954278162755
          ],
          [
            121.73642664189686,
            16.96570553142837
          ],
          [
            121.73391887189149,
            16.964444025060743
          ],
          [
            121.7333638137876,
            16.964028676254898
          ],
          [
            121.73205974100273,
            16.96091032504407
          ],
          [
            121.7319147414492,
            16.960619866979428
          ],
          [
            121.73161675223031,
            16.96067614514446
          ],
          [
            121.73099096679596,
            16.9605712015467
          ],
          [
            121.72893221995139,
            16.960972833378975
          ],
          [
            121.72478811237482,
            16.944064644558765
          ],
          [
            121.72513660068057,
            16.943985911197103
          ],
          [
            121.73269952113901,
            16.942312231268943
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 4'
          }
        },
        
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.73319993657117,
            16.96367492529761
          ],
          [
            121.73299269594116,
            16.96381484776886
          ],
          [
            121.73296498314738,
            16.96518220124277
          ],
          [
            121.72980892164605,
            16.964944773928423
          ],
          [
            121.7288016232755,
            16.96512228866149
          ],
          [
            121.72866436278218,
            16.965193647757857
          ],
          [
            121.72840837443783,
            16.965458281592063
          ],
          [
            121.72821985976088,
            16.9655158337591
          ],
          [
            121.72813053751963,
            16.965562661385277
          ],
          [
            121.72808551664053,
            16.96565479312386
          ],
          [
            121.7280051523876,
            16.965818666107282
          ],
          [
            121.727947287137,
            16.96596140587212
          ],
          [
            121.72798383451442,
            16.966069189225635
          ],
          [
            121.72802038189297,
            16.96614492884264
          ],
          [
            121.72774627655639,
            16.966322625515915
          ],
          [
            121.72735452440565,
            16.966457805711656
          ],
          [
            121.72701023313527,
            16.966829602723706
          ],
          [
            121.72694217089878,
            16.966963296800373
          ],
          [
            121.72687410351426,
            16.967038265750602
          ],
          [
            121.72670304505368,
            16.96734506339226
          ],
          [
            121.72634407684887,
            16.968082104406292
          ],
          [
            121.72515760419992,
            16.967619343930224
          ],
          [
            121.72415516813533,
            16.96903090508276
          ],
          [
            121.72373837622871,
            16.969092985082497
          ],
          [
            121.7235398407197,
            16.968939610925915
          ],
          [
            121.72343675497524,
            16.968786236644036
          ],
          [
            121.72280475195117,
            16.96854820574832
          ],
          [
            121.72220501877001,
            16.968314506994417
          ],
          [
            121.72184962133133,
            16.968282638959423
          ],
          [
            121.72152754220491,
            16.968165789524832
          ],
          [
            121.72125719551673,
            16.96788959951685
          ],
          [
            121.71602476773899,
            16.96529434727489
          ],
          [
            121.72006552007116,
            16.956989385657607
          ],
          [
            121.7196181986929,
            16.956387337573688
          ],
          [
            121.71874958240932,
            16.955805065964327
          ],
          [
            121.71795476289543,
            16.95553498434299
          ],
          [
            121.71815472383133,
            16.949751322116327
          ],
          [
            121.72126290601369,
            16.948975513766342
          ],
          [
            121.7239197764709,
            16.94425824402741
          ],
          [
            121.72478619162155,
            16.944063273770382
          ],
          [
            121.72540709226757,
            16.946619063818105
          ],
          [
            121.72892057530697,
            16.960964747645363
          ],
          [
            121.73098103455658,
            16.9605695662258
          ],
          [
            121.73161570277148,
            16.960675532452996
          ],
          [
            121.7319157850124,
            16.960620524195775
          ],
          [
            121.73319993657117,
            16.96367492529761
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 5'
          }
        },
       
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.72981302042615,
            16.964944387874397
          ],
          [
            121.73001782726556,
            16.965839109263086
          ],
          [
            121.73017915497815,
            16.966459946881173
          ],
          [
            121.73019920344359,
            16.966598698391863
          ],
          [
            121.7302099271601,
            16.966892047443096
          ],
          [
            121.73019920344785,
            16.96706436415795
          ],
          [
            121.73018772153421,
            16.967290000102608
          ],
          [
            121.73005476379888,
            16.967604185253876
          ],
          [
            121.72987487980504,
            16.96799317566405
          ],
          [
            121.7296480695494,
            16.96832980133067
          ],
          [
            121.7289616403782,
            16.969621409645384
          ],
          [
            121.7277340078382,
            16.97159047843043
          ],
          [
            121.72744363615197,
            16.971989708968025
          ],
          [
            121.72664511401109,
            16.97160783629741
          ],
          [
            121.7266539076615,
            16.971491664013442
          ],
          [
            121.72660414026365,
            16.971396463919817
          ],
          [
            121.72653944264403,
            16.97128698375171
          ],
          [
            121.72645981480287,
            16.97127270372542
          ],
          [
            121.72629060564418,
            16.97127270372542
          ],
          [
            121.72602683842683,
            16.971301263776922
          ],
          [
            121.7257531175286,
            16.971286983825493
          ],
          [
            121.72562869902879,
            16.971267943789883
          ],
          [
            121.7252014346239,
            16.970666728075344
          ],
          [
            121.72484344021717,
            16.970280141055724
          ],
          [
            121.72458937967065,
            16.9697941448145
          ],
          [
            121.72427757809271,
            16.96930814731644
          ],
          [
            121.72415566078996,
            16.969031341178123
          ],
          [
            121.7251577497081,
            16.967620153985465
          ],
          [
            121.72634299230839,
            16.968082729853904
          ],
          [
            121.72686749251676,
            16.96706336864571
          ],
          [
            121.7270124695059,
            16.966830134632318
          ],
          [
            121.72735849395696,
            16.96646786359807
          ],
          [
            121.72774660246387,
            16.966320271495093
          ],
          [
            121.72802032776514,
            16.966144468461266
          ],
          [
            121.72798360989327,
            16.96606782121586
          ],
          [
            121.72794770789125,
            16.965962461461828
          ],
          [
            121.72800358791358,
            16.965823494880226
          ],
          [
            121.72812999734668,
            16.965562308042138
          ],
          [
            121.72821372286597,
            16.965520231153747
          ],
          [
            121.72840955543938,
            16.96545915178227
          ],
          [
            121.72866591643412,
            16.965194074523197
          ],
          [
            121.72880238867663,
            16.96512421163328
          ],
          [
            121.72967709658798,
            16.964972249698434
          ],
          [
            121.72981302042615,
            16.964944387874397
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 6'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.72981648431636,
            16.964947167729136
          ],
          [
            121.73098057433259,
            16.965034344451325
          ],
          [
            121.73097429250566,
            16.965348286242374
          ],
          [
            121.7309742915711,
            16.96583974925035
          ],
          [
            121.7309633591388,
            16.966418349163334
          ],
          [
            121.73096408136928,
            16.9668637108973
          ],
          [
            121.73097484293407,
            16.967414393779052
          ],
          [
            121.73097753894933,
            16.9674602140786
          ],
          [
            121.73097163672122,
            16.96747856133166
          ],
          [
            121.73095393003416,
            16.96749408592831
          ],
          [
            121.73092884556019,
            16.967495497255626
          ],
          [
            121.73097431901505,
            16.967726814591316
          ],
          [
            121.73097038297311,
            16.967766830606408
          ],
          [
            121.73095803218985,
            16.96786217951471
          ],
          [
            121.73089977537512,
            16.968028966411495
          ],
          [
            121.73095366572517,
            16.968300011765706
          ],
          [
            121.73094083456596,
            16.96857491720374
          ],
          [
            121.73094298051296,
            16.968735050165037
          ],
          [
            121.73100246640877,
            16.969253732431625
          ],
          [
            121.73101085327602,
            16.9695998061526
          ],
          [
            121.73101085327602,
            16.96970408730361
          ],
          [
            121.73101085327602,
            16.969744195422663
          ],
          [
            121.73100891586625,
            16.969764896857612
          ],
          [
            121.73127041783431,
            16.969704042759176
          ],
          [
            121.73147074503737,
            16.96962964121893
          ],
          [
            121.73148325325263,
            16.968696002563377
          ],
          [
            121.73250365379465,
            16.968705594472567
          ],
          [
            121.73327052619084,
            16.968697022091646
          ],
          [
            121.73332628025469,
            16.968920610078868
          ],
          [
            121.73352598211517,
            16.970318825917232
          ],
          [
            121.73355507025013,
            16.970574783760128
          ],
          [
            121.73362488177213,
            16.971253626781248
          ],
          [
            121.73338380470716,
            16.97136946279268
          ],
          [
            121.73322672878015,
            16.971452926878257
          ],
          [
            121.73323254640621,
            16.971575340801493
          ],
          [
            121.73318018776467,
            16.971608726403772
          ],
          [
            121.73313946437531,
            16.971681061854113
          ],
          [
            121.73316855251022,
            16.971742268751328
          ],
          [
            121.73102676276665,
            16.971896343172546
          ],
          [
            121.7284114939805,
            16.970505210309483
          ],
          [
            121.7294160749181,
            16.968773117912832
          ],
          [
            121.72965192047485,
            16.968329226197227
          ],
          [
            121.72987097244493,
            16.96799957026397
          ],
          [
            121.73019627197897,
            16.967279528497585
          ],
          [
            121.73020892576642,
            16.966740453190667
          ],
          [
            121.7301803158739,
            16.966463629642618
          ],
          [
            121.73006357854155,
            16.966012283108952
          ],
          [
            121.72996646856706,
            16.96559828631932
          ],
          [
            121.72986103473659,
            16.965155096967138
          ],
          [
            121.72981648431636,
            16.964947167729136
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 7'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.73147232928744,
            16.969629163807184
          ],
          [
            121.73138677518386,
            16.969659849696015
          ],
          [
            121.73123870077433,
            16.969713353285044
          ],
          [
            121.73100918651465,
            16.969763709304175
          ],
          [
            121.7310124770566,
            16.969640178969343
          ],
          [
            121.7310100095657,
            16.96955515861754
          ],
          [
            121.73100918692921,
            16.969443430423226
          ],
          [
            121.7310053942171,
            16.96936029303889
          ],
          [
            121.73100292640572,
            16.9692531577045
          ],
          [
            121.73098565143448,
            16.96910631635491
          ],
          [
            121.73096021134972,
            16.96889684156882
          ],
          [
            121.73094680908787,
            16.968759000211605
          ],
          [
            121.7309426338918,
            16.96864038680404
          ],
          [
            121.7309540103895,
            16.96830717478319
          ],
          [
            121.73089987852853,
            16.968028951428508
          ],
          [
            121.73095813730038,
            16.967863840230066
          ],
          [
            121.73097429883398,
            16.967726464386203
          ],
          [
            121.73092855894924,
            16.967494728489953
          ],
          [
            121.73095253119163,
            16.967494728489953
          ],
          [
            121.73097150230598,
            16.967478480334577
          ],
          [
            121.73097785844794,
            16.967459919554216
          ],
          [
            121.73098074896336,
            16.965031664146508
          ],
          [
            121.73295562523157,
            16.965184094219182
          ],
          [
            121.73299308640247,
            16.96381435003788
          ],
          [
            121.73321067710145,
            16.963665608636745
          ],
          [
            121.73336176204793,
            16.96402778815707
          ],
          [
            121.733914027543,
            16.964442525353547
          ],
          [
            121.73657672264324,
            16.965800260375744
          ],
          [
            121.7396284207203,
            16.966209619929813
          ],
          [
            121.74109828629963,
            16.966321083123432
          ],
          [
            121.74286005324149,
            16.966449296342418
          ],
          [
            121.74406987134756,
            16.966708225290915
          ],
          [
            121.74663227726023,
            16.96838653495348
          ],
          [
            121.7469107792329,
            16.96897260820802
          ],
          [
            121.7472728583295,
            16.97259556343913
          ],
          [
            121.73838799435083,
            16.97270211988787
          ],
          [
            121.73373667057433,
            16.972435728653608
          ],
          [
            121.73377443377115,
            16.972085488032064
          ],
          [
            121.7337161117888,
            16.971987869699447
          ],
          [
            121.7334925441939,
            16.971964627232822
          ],
          [
            121.73328355709208,
            16.971876305829966
          ],
          [
            121.73317177329363,
            16.971741499398945
          ],
          [
            121.7331411191272,
            16.97168587080033
          ],
          [
            121.73318376840353,
            16.971604287056877
          ],
          [
            121.73323441441903,
            16.971574967890234
          ],
          [
            121.73322758449433,
            16.97145741250418
          ],
          [
            121.73322831887458,
            16.97144932873222
          ],
          [
            121.73362604845914,
            16.97125270418387
          ],
          [
            121.73333081950193,
            16.968917940341726
          ],
          [
            121.73326914418044,
            16.968696137144093
          ],
          [
            121.73149027210479,
            16.968698351625306
          ],
          [
            121.73147232928744,
            16.969629163807184
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 8'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.70760744082003,
            16.990872893819002
          ],
          [
            121.70791498853936,
            16.990738879487978
          ],
          [
            121.70831649050484,
            16.989686885622987
          ],
          [
            121.70833589728568,
            16.98935899521389
          ],
          [
            121.70841999333788,
            16.988251587520935
          ],
          [
            121.70836996584916,
            16.987450265265537
          ],
          [
            121.7083376212135,
            16.986757355841405
          ],
          [
            121.71055885762286,
            16.98694238396213
          ],
          [
            121.71052651205429,
            16.985371535462875
          ],
          [
            121.71150332004339,
            16.98547052341118
          ],
          [
            121.71150204186102,
            16.982111624324006
          ],
          [
            121.71150785876137,
            16.980395905418135
          ],
          [
            121.71149753822175,
            16.979527289511452
          ],
          [
            121.7115439806488,
            16.979517418852566
          ],
          [
            121.71221997595774,
            16.979473000884212
          ],
          [
            121.71290629110183,
            16.979454869826654
          ],
          [
            121.71352036317546,
            16.979435128501763
          ],
          [
            121.71434110191399,
            16.979416242946485
          ],
          [
            121.71496549452718,
            16.97946559626027
          ],
          [
            121.71488840095776,
            16.985370634876404
          ],
          [
            121.71421097397524,
            16.98542460006783
          ],
          [
            121.71373830914621,
            16.994476702593772
          ],
          [
            121.71341841179492,
            16.994152778154074
          ],
          [
            121.71296587181945,
            16.993950833667597
          ],
          [
            121.71234489460892,
            16.9937708752104
          ],
          [
            121.71166746492196,
            16.993213002893427
          ],
          [
            121.71074540785037,
            16.99269112083593
          ],
          [
            121.71014324813007,
            16.992565149086673
          ],
          [
            121.7094658184451,
            16.9922772133432
          ],
          [
            121.70903301614658,
            16.992007273182026
          ],
          [
            121.70760744082003,
            16.990872893819002
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 9'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.7284289216089,
            16.97051500943175
          ],
          [
            121.73095527077976,
            16.97189695194527
          ],
          [
            121.73093087369199,
            16.973488706911496
          ],
          [
            121.7301272657325,
            16.974482745284106
          ],
          [
            121.72984333926212,
            16.975711865198534
          ],
          [
            121.72850938022373,
            16.97673253169245
          ],
          [
            121.72916153797513,
            16.978291872562764
          ],
          [
            121.72949415850155,
            16.978829573239338
          ],
          [
            121.72918675170632,
            16.9792818923398
          ],
          [
            121.72883205155813,
            16.97939497194396
          ],
          [
            121.72840641138163,
            16.979327124189638
          ],
          [
            121.7280990045864,
            16.979462819673728
          ],
          [
            121.72793347784989,
            16.979711594474267
          ],
          [
            121.7272240775535,
            16.979598515060914
          ],
          [
            121.72649103057938,
            16.978897421174736
          ],
          [
            121.72617544409269,
            16.978900085142513
          ],
          [
            121.72527156459063,
            16.978747529516284
          ],
          [
            121.72456263949118,
            16.978357664575924
          ],
          [
            121.724793040147,
            16.977493178556585
          ],
          [
            121.72473226810769,
            16.97722744151109
          ],
          [
            121.72477233992726,
            16.976997488222636
          ],
          [
            121.72461205265125,
            16.976811335355052
          ],
          [
            121.72456053174005,
            16.9765540060869
          ],
          [
            121.7245834776142,
            16.976345907800592
          ],
          [
            121.72469224397895,
            16.97609405300264
          ],
          [
            121.72477780206799,
            16.975951700249027
          ],
          [
            121.72490946076408,
            16.975765547974802
          ],
          [
            121.7250182271311,
            16.97559581925323
          ],
          [
            121.72528155622479,
            16.975322062928072
          ],
          [
            121.72555061168504,
            16.975185183158487
          ],
          [
            121.72589408441792,
            16.975015453913244
          ],
          [
            121.72614596442224,
            16.974790973061005
          ],
          [
            121.726357772607,
            16.974539116176587
          ],
          [
            121.72648943715501,
            16.974177755707743
          ],
          [
            121.72626617987856,
            16.973838295240682
          ],
          [
            121.72618603438889,
            16.972704935311654
          ],
          [
            121.72624327984465,
            16.97238189782928
          ],
          [
            121.72638066893734,
            16.972135512936376
          ],
          [
            121.72647798621585,
            16.971932929562783
          ],
          [
            121.7266403801342,
            16.971738704817653
          ],
          [
            121.72669762559008,
            16.971640150561186
          ],
          [
            121.72745326560317,
            16.97199056545935
          ],
          [
            121.7284289216089,
            16.97051500943175
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 10'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.74154489732257,
            16.972763875114026
          ],
          [
            121.74156577250733,
            16.97478042407731
          ],
          [
            121.74156577250733,
            16.977016571852218
          ],
          [
            121.74148227176403,
            16.97735598481053
          ],
          [
            121.74148227176403,
            16.978374220002365
          ],
          [
            121.74154489732257,
            16.97899314457628
          ],
          [
            121.74096039211776,
            16.978853387593333
          ],
          [
            121.74039676209753,
            16.978633769265926
          ],
          [
            121.73945737873271,
            16.978374220002365
          ],
          [
            121.7383301186967,
            16.978074739636966
          ],
          [
            121.73803786609318,
            16.97801484350677
          ],
          [
            121.73801699090842,
            16.97921276248306
          ],
          [
            121.73745336088825,
            16.979352519198343
          ],
          [
            121.73655572789721,
            16.979572136684595
          ],
          [
            121.73663943239018,
            16.98003133018598
          ],
          [
            121.73643068052985,
            16.980530458658734
          ],
          [
            121.73605492718525,
            16.980590353986003
          ],
          [
            121.73576267458174,
            16.980809970023415
          ],
          [
            121.7349694175187,
            16.98096969061571
          ],
          [
            121.7346980401021,
            16.980790004939834
          ],
          [
            121.7343431619422,
            16.98094972554911
          ],
          [
            121.73403003415393,
            16.981029585803796
          ],
          [
            121.73375865673722,
            16.981009620742498
          ],
          [
            121.73336202820576,
            16.98108948097169
          ],
          [
            121.73286103517626,
            16.980510477895606
          ],
          [
            121.73229740515825,
            16.980011349369676
          ],
          [
            121.73173377513808,
            16.979432358617615
          ],
          [
            121.73129539623494,
            16.978573851798856
          ],
          [
            121.73087789251872,
            16.978194510325764
          ],
          [
            121.72949825336366,
            16.978824652043485
          ],
          [
            121.72914206826499,
            16.978278721810625
          ],
          [
            121.72896397571469,
            16.977833241564184
          ],
          [
            121.72868471590482,
            16.977136421091004
          ],
          [
            121.72851575630625,
            16.976734612979953
          ],
          [
            121.72916418979048,
            16.97623235307539
          ],
          [
            121.72984002818657,
            16.97571698785859
          ],
          [
            121.73013031449062,
            16.974509056050564
          ],
          [
            121.73020591881789,
            16.974388693049306
          ],
          [
            121.73064430048032,
            16.973842749913047
          ],
          [
            121.73092742196894,
            16.97348024279313
          ],
          [
            121.73095031323788,
            16.971907306578473
          ],
          [
            121.73318546215506,
            16.97175295733892
          ],
          [
            121.73329310672841,
            16.971883368887475
          ],
          [
            121.73350121963313,
            16.971965734071333
          ],
          [
            121.73371650878119,
            16.972000052870015
          ],
          [
            121.73377391922037,
            16.972096145472804
          ],
          [
            121.73373803769545,
            16.972439332936304
          ],
          [
            121.73644545136716,
            16.972597494357174
          ],
          [
            121.73843131628223,
            16.972700450413427
          ],
          [
            121.74050524744217,
            16.972686727106648
          ],
          [
            121.74103629400634,
            16.972659272168855
          ],
          [
            121.74153863535236,
            16.97266613590405
          ],
          [
            121.74154489732257,
            16.972763875114026
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 11'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.70412344001357,
            16.96090591023942
          ],
          [
            121.71602668609842,
            16.96530822198902
          ],
          [
            121.71217503227422,
            16.97166858177421
          ],
          [
            121.7118008539137,
            16.971201777805433
          ],
          [
            121.71080846782502,
            16.970641611511155
          ],
          [
            121.71032040909319,
            16.97037708795787
          ],
          [
            121.70934070411636,
            16.970092232218036
          ],
          [
            121.70897711161945,
            16.97088259572918
          ],
          [
            121.70919747070815,
            16.97100905358286
          ],
          [
            121.70949495547956,
            16.9713041215754
          ],
          [
            121.70940681184408,
            16.971715108362673
          ],
          [
            121.70919747070815,
            16.972157708513606
          ],
          [
            121.70897711161945,
            16.972494926975244
          ],
          [
            121.708503339912,
            16.97377002859291
          ],
          [
            121.70856512487023,
            16.979550301919645
          ],
          [
            121.70813750272276,
            16.979550301919645
          ],
          [
            121.70736778285902,
            16.979468505563077
          ],
          [
            121.70638425192266,
            16.979468505563077
          ],
          [
            121.70565729427352,
            16.979468505563077
          ],
          [
            121.70505862326792,
            16.979509403745297
          ],
          [
            121.70424614118963,
            16.979509403745297
          ],
          [
            121.70321984803655,
            16.979386709171933
          ],
          [
            121.7026639392455,
            16.97934581096297
          ],
          [
            121.70197974381091,
            16.978855031758215
          ],
          [
            121.7015521216656,
            16.978323352839183
          ],
          [
            121.7008679262309,
            16.97795526655098
          ],
          [
            121.700098206365,
            16.977178193126164
          ],
          [
            121.70009818894863,
            16.975051451779038
          ],
          [
            121.69984161566151,
            16.972761085440254
          ],
          [
            121.69979885344696,
            16.971288692323697
          ],
          [
            121.69979885344696,
            16.97006168923808
          ],
          [
            121.69967056680116,
            16.96842567265108
          ],
          [
            121.70026923780676,
            16.968098467623136
          ],
          [
            121.70193995342629,
            16.966958972264536
          ],
          [
            121.7016620051757,
            16.966596449114746
          ],
          [
            121.70266767393906,
            16.96573122365966
          ],
          [
            121.70304164067562,
            16.965402533885282
          ],
          [
            121.7034105538084,
            16.965054508791326
          ],
          [
            121.70382719734715,
            16.964749929469647
          ],
          [
            121.7036212517529,
            16.964589880098345
          ],
          [
            121.70348395470143,
            16.964306715490196
          ],
          [
            121.70348395470143,
            16.963863500466616
          ],
          [
            121.70350969759568,
            16.963613165465304
          ],
          [
            121.70356976506145,
            16.963440803555343
          ],
          [
            121.70358692719333,
            16.963252026043932
          ],
          [
            121.70356118399468,
            16.962989378755623
          ],
          [
            121.703483845922,
            16.96262595448539
          ],
          [
            121.70355249445282,
            16.962420760639148
          ],
          [
            121.70363830511724,
            16.962162216073637
          ],
          [
            121.70366833884839,
            16.96198985283229
          ],
          [
            121.70373269684677,
            16.961718995989997
          ],
          [
            121.70376702111218,
            16.961456346558265
          ],
          [
            121.70377560217895,
            16.961263463147958
          ],
          [
            121.7038270885709,
            16.961066057839744
          ],
          [
            121.70396438561704,
            16.96084855050306
          ],
          [
            121.70418749334317,
            16.960959356135646
          ],
          [
            121.70412344001357,
            16.96090591023942
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 12'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.70856168907926,
            16.97953746500457
          ],
          [
            121.70850063746042,
            16.97378631246748
          ],
          [
            121.7089751986341,
            16.97250198479506
          ],
          [
            121.70919669775543,
            16.972166157763027
          ],
          [
            121.7094083522448,
            16.97170792586371
          ],
          [
            121.7094960822385,
            16.97130510951891
          ],
          [
            121.7091974667029,
            16.97100537240702
          ],
          [
            121.70897924692929,
            16.970881397685673
          ],
          [
            121.70934871964056,
            16.97009375541485
          ],
          [
            121.71032584716659,
            16.970377416006514
          ],
          [
            121.71180572535792,
            16.971203889808166
          ],
          [
            121.71217835120427,
            16.971684159906218
          ],
          [
            121.71605094510886,
            16.96531337923342
          ],
          [
            121.72128069238823,
            16.96789554371705
          ],
          [
            121.72154814753867,
            16.968157446714258
          ],
          [
            121.72186654652734,
            16.968297534214415
          ],
          [
            121.72220420815171,
            16.96831595617205
          ],
          [
            121.72345870016846,
            16.96881539766288
          ],
          [
            121.72352874794547,
            16.968937212458698
          ],
          [
            121.72373252329902,
            16.969077299377147
          ],
          [
            121.72416554592388,
            16.96902248276936
          ],
          [
            121.72424965730778,
            16.969294437487278
          ],
          [
            121.72501550208796,
            16.970472336338233
          ],
          [
            121.72522564594595,
            16.970711729753233
          ],
          [
            121.72538542342517,
            16.970924186458376
          ],
          [
            121.72563093600127,
            16.97125964725022
          ],
          [
            121.72575953738709,
            16.971285738361132
          ],
          [
            121.72598946107502,
            16.971296920264578
          ],
          [
            121.72607909234387,
            16.971293192964026
          ],
          [
            121.72619210568234,
            16.971274556457033
          ],
          [
            121.72635578017253,
            16.97126710185337
          ],
          [
            121.72655452776877,
            16.97127828375872
          ],
          [
            121.7266558500724,
            16.971490739822755
          ],
          [
            121.7266558500724,
            16.97161374059219
          ],
          [
            121.7267104082353,
            16.971636104360087
          ],
          [
            121.72663636501392,
            16.971740468574268
          ],
          [
            121.72646489649986,
            16.971941742250905
          ],
          [
            121.72638305925483,
            16.972131833858683
          ],
          [
            121.72623483838794,
            16.97239282821306
          ],
          [
            121.72618028022504,
            16.972709646691186
          ],
          [
            121.72626605417622,
            16.97383934622127
          ],
          [
            121.72648538857317,
            16.974179332179077
          ],
          [
            121.72635917603583,
            16.97454011655202
          ],
          [
            121.72614512116502,
            16.974789210399848
          ],
          [
            121.72589226260271,
            16.975015940628708
          ],
          [
            121.72528243363035,
            16.97532179042986
          ],
          [
            121.72501902028341,
            16.97559505964449
          ],
          [
            121.724914773958,
            16.975757028204256
          ],
          [
            121.72477920337633,
            16.975947842935724
          ],
          [
            121.72468765252142,
            16.976105374449133
          ],
          [
            121.72458363870595,
            16.97634509331209
          ],
          [
            121.7245605960826,
            16.97655712853991
          ],
          [
            121.72461344963955,
            16.976809880468522
          ],
          [
            121.7247670940643,
            16.976995961766633
          ],
          [
            121.72473034868898,
            16.97723611288336
          ],
          [
            121.7247793425235,
            16.977517265020637
          ],
          [
            121.72457111839941,
            16.978349004502974
          ],
          [
            121.72452212378107,
            16.978817588209168
          ],
          [
            121.72430777575443,
            16.980176474845138
          ],
          [
            121.72422203653593,
            16.980410764690987
          ],
          [
            121.72380553585481,
            16.979942081760356
          ],
          [
            121.72327272790199,
            16.979532073383965
          ],
          [
            121.72251944769363,
            16.979075205853533
          ],
          [
            121.72157872519512,
            16.97929123800938
          ],
          [
            121.72058660004245,
            16.97950209984289
          ],
          [
            121.71913497711427,
            16.97986528635124
          ],
          [
            121.71878898827543,
            16.97992415498227
          ],
          [
            121.71641890937104,
            16.979555146402475
          ],
          [
            121.71428172012486,
            16.979420319664584
          ],
          [
            121.71204637641597,
            16.979467177837748
          ],
          [
            121.71144007686814,
            16.97951989319668
          ],
          [
            121.70856168907926,
            16.97953746500457
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 13'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.71149847723211,
            16.97964805150295
          ],
          [
            121.71149387042539,
            16.97952041793775
          ],
          [
            121.71151253284603,
            16.98545447543053
          ],
          [
            121.71050931875288,
            16.985373165849595
          ],
          [
            121.71056032963793,
            16.986950565417857
          ],
          [
            121.70831258664651,
            16.98674894931291
          ],
          [
            121.70838905171843,
            16.9877218534547
          ],
          [
            121.70841454007643,
            16.988197189423957
          ],
          [
            121.70838905171843,
            16.98874565250655
          ],
          [
            121.70829984755261,
            16.989698939489145
          ],
          [
            121.70809594068862,
            16.99023521022565
          ],
          [
            121.70790477800301,
            16.99072272774626
          ],
          [
            121.70753519681017,
            16.990917734400355
          ],
          [
            121.70688524367944,
            16.9902595861317
          ],
          [
            121.70629901144434,
            16.989613623548323
          ],
          [
            121.70587845353549,
            16.989016410878364
          ],
          [
            121.70577650010352,
            16.988870154423566
          ],
          [
            121.70564905831219,
            16.988711709802928
          ],
          [
            121.70555984896112,
            16.988480136642735
          ],
          [
            121.704693252259,
            16.98728568353495
          ],
          [
            121.7044511128575,
            16.98665189889472
          ],
          [
            121.704693252259,
            16.986079053243046
          ],
          [
            121.70487167076499,
            16.98555495888013
          ],
          [
            121.7049481377756,
            16.985299012939763
          ],
          [
            121.7049226494176,
            16.98476272808894
          ],
          [
            121.7048856534579,
            16.98451467392799
          ],
          [
            121.7048681794497,
            16.98421386025703
          ],
          [
            121.70492060147427,
            16.98394646992263
          ],
          [
            121.70495904429174,
            16.98372921499498
          ],
          [
            121.70495205468819,
            16.983465166360062
          ],
          [
            121.70480609498537,
            16.98275445918614
          ],
          [
            121.70472847501418,
            16.9823770659888
          ],
          [
            121.7045861586181,
            16.981999667930978
          ],
          [
            121.70445031114946,
            16.98173363277853
          ],
          [
            121.70428858797243,
            16.981634642858396
          ],
          [
            121.7038801744398,
            16.980873857315586
          ],
          [
            121.7036472930642,
            16.98031703578205
          ],
          [
            121.70341441168978,
            16.97989013815389
          ],
          [
            121.70327856421977,
            16.979692156316247
          ],
          [
            121.70271576756409,
            16.97935806149087
          ],
          [
            121.70371845126289,
            16.979450865668213
          ],
          [
            121.70422949650197,
            16.97951273509507
          ],
          [
            121.70495401633588,
            16.979518922036902
          ],
          [
            121.70564759410081,
            16.979469425004964
          ],
          [
            121.70671496710156,
            16.9794694250169
          ],
          [
            121.70734197252796,
            16.979474766354926
          ],
          [
            121.70792417596584,
            16.97953663577394
          ],
          [
            121.70857753760106,
            16.979542822714947
          ],
          [
            121.71027239864236,
            16.979530449009673
          ],
          [
            121.71150796371535,
            16.97953663595092
          ],
          [
            121.71149847723211,
            16.97964805150295
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 14'
          }
        },{
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.71376825830868,
            16.99447216533737
          ],
          [
            121.71407816453177,
            16.988382347369864
          ],
          [
            121.71422915803964,
            16.985434021987828
          ],
          [
            121.71490863698892,
            16.98538588572748
          ],
          [
            121.71498413362264,
            16.979501102282427
          ],
          [
            121.71649408684272,
            16.979585343371653
          ],
          [
            121.71634309164733,
            16.983689032680246
          ],
          [
            121.71630534281627,
            16.984483286585046
          ],
          [
            121.7162882959197,
            16.98547891360451
          ],
          [
            121.71627571258597,
            16.988150456630407
          ],
          [
            121.71723201629123,
            16.988162490519883
          ],
          [
            121.71715651897796,
            16.989137230721255
          ],
          [
            121.71706843837308,
            16.989955529102403
          ],
          [
            121.71779197201681,
            16.98996755990531
          ],
          [
            121.71779197201681,
            16.99019620144705
          ],
          [
            121.71781713790512,
            16.99067755115118
          ],
          [
            121.7181946262088,
            16.990701618603808
          ],
          [
            121.7188992710449,
            16.99067755115118
          ],
          [
            121.7187860245532,
            16.99091822553865
          ],
          [
            121.71806879677422,
            16.992566836792804
          ],
          [
            121.71820720910921,
            16.99378042599797
          ],
          [
            121.71814429446141,
            16.995693746769263
          ],
          [
            121.71809396268759,
            16.996030681811547
          ],
          [
            121.7175421420979,
            16.997060300960158
          ],
          [
            121.71742889560744,
            16.99737316695297
          ],
          [
            121.71693916017927,
            16.998455205403943
          ],
          [
            121.71661200364815,
            16.99927346311449
          ],
          [
            121.71600802236094,
            16.99958632541292
          ],
          [
            121.71478747684108,
            16.999899187189072
          ],
          [
            121.71439740559327,
            16.999971385986015
          ],
          [
            121.71395700257034,
            16.999790888940865
          ],
          [
            121.7134159359997,
            16.999201264048665
          ],
          [
            121.7134159359997,
            16.997997942186373
          ],
          [
            121.71376825830868,
            16.99447216533737
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 15'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.71811205935165,
            16.995314953524485
          ],
          [
            121.71815872227978,
            16.996002140458145
          ],
          [
            121.71822074443088,
            16.993678076964855
          ],
          [
            121.71806850528003,
            16.992594230432587
          ],
          [
            121.7188748094988,
            16.990679628800024
          ],
          [
            121.71786133867897,
            16.990679628814817
          ],
          [
            121.71781623095842,
            16.98997322522051
          ],
          [
            121.71707195016933,
            16.989951655603278
          ],
          [
            121.71724110427908,
            16.988161366956433
          ],
          [
            121.71629383781942,
            16.988145189587712
          ],
          [
            121.71629384310006,
            16.98516853477453
          ],
          [
            121.71636715017826,
            16.983410568135426
          ],
          [
            121.71638970414267,
            16.98282277461145
          ],
          [
            121.71656438043942,
            16.979650089182527
          ],
          [
            121.71795290159213,
            16.979788200454237
          ],
          [
            121.71651994776278,
            16.979575721532342
          ],
          [
            121.71646440691626,
            16.980659361517496
          ],
          [
            121.71635333424018,
            16.983782748596226
          ],
          [
            121.71629855585246,
            16.985879236772064
          ],
          [
            121.71633187102225,
            16.988120806345663
          ],
          [
            121.71721768791934,
            16.988165440852697
          ],
          [
            121.71630859940501,
            16.988044690138565
          ],
          [
            121.71659214954434,
            16.979676736374955
          ],
          [
            121.71885648100329,
            16.979887935744017
          ],
          [
            121.72266415428697,
            16.979074365691858
          ],
          [
            121.72428444079162,
            16.98015912497749
          ],
          [
            121.72468951241825,
            16.97845450042776
          ],
          [
            121.72537813418211,
            16.97876443331576
          ],
          [
            121.72643132040815,
            16.978803174890643
          ],
          [
            121.72728197082392,
            16.97957800471164
          ],
          [
            121.72801109975029,
            16.979616746118538
          ],
          [
            121.72825414272506,
            16.97938429755608
          ],
          [
            121.72914530030334,
            16.979306814638264
          ],
          [
            121.72959087909038,
            16.978803174890643
          ],
          [
            121.73088710829325,
            16.97822205042563
          ],
          [
            121.73137319095804,
            16.978880654440474
          ],
          [
            121.73096811451558,
            16.98561064218049
          ],
          [
            121.73091716735377,
            17.001081448778947
          ],
          [
            121.73078166356402,
            17.00198852176952
          ],
          [
            121.73023964841053,
            17.001340612938677
          ],
          [
            121.72854585105603,
            17.000109579987566
          ],
          [
            121.72739406885506,
            16.99920249790226
          ],
          [
            121.72597127907648,
            16.998813747092598
          ],
          [
            121.7250227525592,
            16.99816582728475
          ],
          [
            121.72332895520299,
            16.99745311291035
          ],
          [
            121.72177066163647,
            16.99699956598768
          ],
          [
            121.7206866313295,
            16.996610810608843
          ],
          [
            121.71912833776298,
            16.996222054424578
          ],
          [
            121.71804430745595,
            16.995962883186877
          ],
          [
            121.71811205935165,
            16.995314953524485
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 16'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.71449901878941,
            17.000080276301077
          ],
          [
            121.71450594027044,
            16.999946731575648
          ],
          [
            121.71660555364679,
            16.999281400417033
          ],
          [
            121.71756579819044,
            16.99705792311724
          ],
          [
            121.71813729058812,
            16.996012385548397
          ],
          [
            121.72333040317824,
            16.997449989119104
          ],
          [
            121.7250324566254,
            16.998174731812952
          ],
          [
            121.72591335360414,
            16.998807840801405
          ],
          [
            121.72741662708609,
            16.99921179316486
          ],
          [
            121.73013742785241,
            17.00126718435186
          ],
          [
            121.72970792400287,
            17.001654156132503
          ],
          [
            121.72709540376377,
            17.004369727189925
          ],
          [
            121.72556196797058,
            17.00681370748879
          ],
          [
            121.72431250176902,
            17.008823178514945
          ],
          [
            121.72300624164944,
            17.010995555374024
          ],
          [
            121.72141601193971,
            17.01181019019893
          ],
          [
            121.71965540047427,
            17.012787747312117
          ],
          [
            121.71727005590884,
            17.01409114885749
          ],
          [
            121.71431677215998,
            17.01387391589668
          ],
          [
            121.71198822151257,
            17.01327652395466
          ],
          [
            121.71147707624868,
            17.011755881320994
          ],
          [
            121.71204501543065,
            17.009203346284238
          ],
          [
            121.71295371812238,
            17.006922328095726
          ],
          [
            121.71449901878941,
            17.000080276301077
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 17'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.72790947112685,
            17.003544791858488
          ],
          [
            121.7281387324976,
            17.003854751025727
          ],
          [
            121.72862887749727,
            17.004520027506643
          ],
          [
            121.728834422175,
            17.00482242512588
          ],
          [
            121.72886604440731,
            17.005011423404483
          ],
          [
            121.72941152835972,
            17.005223101234208
          ],
          [
            121.73033647981111,
            17.00562377652436
          ],
          [
            121.73135723967653,
            17.00599003586582
          ],
          [
            121.73220313520375,
            17.006042955130482
          ],
          [
            121.73360430763182,
            17.005944676618398
          ],
          [
            121.73315359305667,
            17.008407282479325
          ],
          [
            121.73261928183109,
            17.010055473418433
          ],
          [
            121.73301570651182,
            17.01053344603848
          ],
          [
            121.73386428129822,
            17.01134379682317
          ],
          [
            121.73422623406424,
            17.012019546266373
          ],
          [
            121.73424346991112,
            17.012579922004193
          ],
          [
            121.73417452652723,
            17.013288630095047
          ],
          [
            121.73399637672776,
            17.01492853027665
          ],
          [
            121.73287659045195,
            17.015123215920724
          ],
          [
            121.73269844263444,
            17.015755942868438
          ],
          [
            121.73280024138654,
            17.016339996613524
          ],
          [
            121.73274934201055,
            17.017435092475836
          ],
          [
            121.73249484513025,
            17.01809214691862
          ],
          [
            121.73218944887259,
            17.01843284090687
          ],
          [
            121.7319095023031,
            17.018895210327244
          ],
          [
            121.73190082279086,
            17.01918119659777
          ],
          [
            121.73170353765835,
            17.019550626789737
          ],
          [
            121.73149739369103,
            17.02009784801234
          ],
          [
            121.73115731296429,
            17.020500458717706
          ],
          [
            121.7309143981592,
            17.020794673685174
          ],
          [
            121.73093059247867,
            17.021228252794558
          ],
          [
            121.72968362981277,
            17.0212901925851
          ],
          [
            121.7285986103513,
            17.02130567752957
          ],
          [
            121.72725448176374,
            17.021321162472702
          ],
          [
            121.72448525298609,
            17.021336647414586
          ],
          [
            121.72276865502948,
            17.021336647414586
          ],
          [
            121.7216179862051,
            17.020080661042442
          ],
          [
            121.72075968722771,
            17.019136070901936
          ],
          [
            121.7205491610631,
            17.018996704740417
          ],
          [
            121.72045199514139,
            17.018160505589194
          ],
          [
            121.72014430305529,
            17.01761852266317
          ],
          [
            121.71983661096908,
            17.01715396462029
          ],
          [
            121.71969086682026,
            17.016751345585007
          ],
          [
            121.71926981449121,
            17.016224843943235
          ],
          [
            121.71876779056169,
            17.015775767844644
          ],
          [
            121.71824957231092,
            17.0155899429366
          ],
          [
            121.71742366197401,
            17.015187321669828
          ],
          [
            121.71635483683201,
            17.014583388147173
          ],
          [
            121.71548034353344,
            17.01433561998448
          ],
          [
            121.71449248999375,
            17.013932996020472
          ],
          [
            121.7172779130907,
            17.0141033370341
          ],
          [
            121.72297828587199,
            17.010959748291683
          ],
          [
            121.72692958971345,
            17.00456406273949
          ],
          [
            121.72790947112685,
            17.003544791858488
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 18'
          }
        },
        {
          'type': 'Feature',
          'geometry': {
            'type': 'Polygon',
            'coordinates': [
              [
                [
            121.71330906047388,
            16.994292837725027
          ],
          [
            121.71361486398496,
            16.99441599019488
          ],
          [
            121.71380740581719,
            16.99460998794636
          ],
          [
            121.71346242929741,
            16.996992608646536
          ],
          [
            121.71323329574983,
            16.998902158918867
          ],
          [
            121.71330526494131,
            16.99905049670916
          ],
          [
            121.71352620492257,
            16.999266782991498
          ],
          [
            121.713815584018,
            16.99955439336526
          ],
          [
            121.7141830762755,
            16.999853567476535
          ],
          [
            121.71447971090691,
            17.00009635698673
          ],
          [
            121.71437092039787,
            17.00048963749491
          ],
          [
            121.71433404427876,
            17.00066570236733
          ],
          [
            121.71427574712277,
            17.000870629460408
          ],
          [
            121.71422423647255,
            17.00099914650818
          ],
          [
            121.7141350733367,
            17.001239545845678
          ],
          [
            121.71408963092324,
            17.001382308304926
          ],
          [
            121.71406580350907,
            17.001512253841597
          ],
          [
            121.71397393988832,
            17.00202915310274
          ],
          [
            121.71391668006157,
            17.00226215797838
          ],
          [
            121.71381331839467,
            17.0027167068194
          ],
          [
            121.71371389421472,
            17.00315845716851
          ],
          [
            121.71364279986233,
            17.003580380433093
          ],
          [
            121.71344869232041,
            17.004331110768206
          ],
          [
            121.71335204245281,
            17.004757738462544
          ],
          [
            121.71321213994855,
            17.005415049139884
          ],
          [
            121.71294208996432,
            17.00661385607212
          ],
          [
            121.71286088851042,
            17.007035424505162
          ],
          [
            121.71280273978391,
            17.007274581191098
          ],
          [
            121.7126475083108,
            17.00775332404909
          ],
          [
            121.71259351438698,
            17.00860639973054
          ],
          [
            121.71243489500387,
            17.00906605547543
          ],
          [
            121.71218517225566,
            17.009655049805232
          ],
          [
            121.71178188475699,
            17.00998557291031
          ],
          [
            121.7111133640127,
            17.010313995504646
          ],
          [
            121.71064824730615,
            17.010666334489102
          ],
          [
            121.71010534233505,
            17.01093902353972
          ],
          [
            121.7096560530602,
            17.01103355684957
          ],
          [
            121.70911199751106,
            17.011085308810507
          ],
          [
            121.70897275103084,
            17.011145217351142
          ],
          [
            121.70869433718383,
            17.011184524237976
          ],
          [
            121.7081535490056,
            17.01128409435357
          ],
          [
            121.70758045303853,
            17.01130252537149
          ],
          [
            121.70704268182533,
            17.01130343829574
          ],
          [
            121.70606336164946,
            17.01112015755278
          ],
          [
            121.70529248862908,
            17.010863579266456
          ],
          [
            121.7045482413796,
            17.01049945010378
          ],
          [
            121.70403021406918,
            17.010218361054527
          ],
          [
            121.703103356653,
            17.009385275712987
          ],
          [
            121.70238920121983,
            17.00869026475398
          ],
          [
            121.70180942545693,
            17.008000771442795
          ],
          [
            121.70130304264313,
            17.0073221405398
          ],
          [
            121.70083510647174,
            17.006591706336394
          ],
          [
            121.7009915398881,
            17.005996819139057
          ],
          [
            121.70150706922095,
            17.005411971587648
          ],
          [
            121.70221342021989,
            17.004855371444606
          ],
          [
            121.70385961658104,
            17.00285683976604
          ],
          [
            121.710691177912,
            16.992818433181085
          ],
          [
            121.71330906047388,
            16.994292837725027
          ]
        ]
            ]
          },
          'properties': {
            'name': 'Polygon 19'
          }
        },
       
      ]
      
    }
  });
  // Add a new layer to visualize the polygon.
  map.addLayer({
    'id': 'maine',
    'type': 'fill',
    'source': 'maine', // reference the data source
    'layout': {},
    'paint': {
      'fill-color': '#0080ff', // blue color fill
      'fill-opacity': .4
    }
  });
  // Add a black outline around the polygon.
  map.addLayer({
      'id': 'outline',
      'type': 'line',
      'source': 'maine',
      'layout': {},
      'paint': {
        'line-color': '#000',
        'line-width': 3
      }
  });





  });



function render_baranggay_borders(){
  $.ajax({
    url: `/administrator/get_all_barangays`,
    success: function(data){

      for(let id in data){
        map.addSource(`source${data[id].id}`, {
          'type': 'geojson',
          'data': {
            'type': 'Feature',
            'geometry': {
              'type': 'Polygon',
              // These coordinates outline Maine.
              'coordinates': JSON.parse(data[id].border)
            }
          }
        });
        map.addLayer({
          'id': `fill${data[id].id}`,
          'type': 'fill',
          'source': `source${data[id].id}`, // reference the data source
          'layout': {},
          'paint': {
            'fill-color': data[id].color, // blue color fill
            'fill-opacity': .4
          }
        });
        // Add a black outline around the polygon.
        map.addLayer({
          'id': `line${data[id].id}`,
          'type': 'line',
          'source': `source${data[id].id}`,
          'layout': {},
          'paint': {
            'line-color': data[id].color,
            'line-width': 3
          }
        });
      }
      // render_marker();
    },
    error: function(e){
      console.log(e);
    }
  });
}


// marker.on('dragend', onDragEnd);

let currentMarkers =  [];

function render_marker(id = null, biz_sec = null){
  $.ajax({
    url: `/administrator/get_baranggay_record_for_map`,
    data: {
      id: id,
      biz_sec: biz_sec
    },
    success: function(e){
      for(let id in currentMarkers){
        currentMarkers[id].remove();
      }
      e.forEach((data) => {
        let lat  =  data.coordinates.split("Lat: ")[1];
        let long =  data.coordinates.split("Long: ")[1].split(" -")[0];

        let popup = new mapboxgl.Popup()
          .setText(data.name)
          .addTo(map);

          let marker = new mapboxgl.Marker({ "color": data.color })
          .setLngLat([long, lat])
          .addTo(map)
          .setPopup(popup);

          currentMarkers.push(marker);

      });
    }
  });
  
    // add.locations.forEach((location) => {
    //   console.log(location.long + " " + location.lat);

    //   var marker = new mapboxgl.Marker(el)
    //       .setLngLat([location.long, location.lat])
    //       .setPopup(popup)
    //       .addTo(this.map);

    //   this.markers.push(marker);
    // });

}



function render_population(id = null){
$('h2[name="sc"]').text("");
$('h2[name="m"]').text("");
$('h2[name="f"]').text("");

  // $.ajax({
  //   url: `/administrator/get_population_records`,
  //   data: {
  //     id: id
  //   },
  //   success: function(e){
  //     for(let id in e){
  //       if(e[id].group == 3){
  //         $('h2[name="sc"]').text(e[id].count);
  //       }
  //       if(e[id].group == 1){
  //         $('h2[name="m"]').text(e[id].count);
  //       }

  //       if(e[id].group == 2){
  //         $('h2[name="f"]').text(e[id].count);
  //       }
  //     }
  //   }
  // });

}

render_population();

render_marker();




const ctx = document.getElementById('myChart');

  
function render_chart(id = null){
  $.ajax({
    url: `/administrator/get_barangay_chart`,
    data: {
      id: id
    },
    success: function(e){
      removeData(new_chart);
      addData(new_chart, e.label, e.set, e.color);
    },
    error: function(e){
      console.log(e);
    }
  });
}



let new_chart =  new Chart(ctx, {
  type: 'bar',
  options: {
    scales: {
      y: {
        beginAtZero: true
      }
    }
  }
});


function biz_chart(){
  $.ajax({
    url:`/administrator/get_total_biz_per_baranggay`,
    success: function(e){
      const biz_bar_chart = document.getElementById('biz_bar_chart');
      let new_chart_2 =  new Chart(biz_bar_chart, {
      type: 'bar',
      data : {
        labels: e.label,
        datasets: [{
          label: 'No. business',
          data: e.set,
          backgroundColor: e.color,
          borderWidth: 1
        }]
      },
      options: {
    indexAxis: 'y',
    // Elements options apply to all of the options unless overridden in a dataset
    // In this case, we are setting the border of each horizontal bar to be 2px wide
    elements: {
      bar: {
        borderWidth: 2,
      }
    }
  }
      // options: {
      //   scales: {
      //     y: {
      //       beginAtZero: true
      //     }
      //   }
      // }
    });


    },
    error: function(e){
      console.log(e);
    }
  });
}
biz_chart();
  

function addData(chart, label, newData, color) {
  chart.data = {
    labels: label,
    datasets: [{
      label: '# business',
      data: newData,
      backgroundColor: color,
      borderWidth: 1
    }]
  };
  chart.update();
}

function removeData(chart) {
    chart.data.labels = [];
    chart.data.datasets = [];
    chart.update();
}

render_chart();

let option_brngy = $('li#option_brngy');
let option_brngy_sec = $('select[name="option_brngy_sec"]');

option_brngy.on('click', function(){
  let id = $(this).attr('__id');
  let biz_sec = option_brngy_sec.val()??null;

  render_marker(id, biz_sec);
  render_chart(id);
  render_population(id);
  re_layer(id);
});



option_brngy_sec.on('click', function(){
  let id = $(this).val();
  let baranggay = $('div.dropdown .active').attr('__id')??null;

  console.log(baranggay, id);
  render_marker(baranggay, id);
  render_chart(id);
  render_population(id);
  re_layer(id);
});




function re_layer(id){
  $.ajax({
    url:`/administrator/get_all_barangays`,
    data: {id: id},
    success: function(data){
      for(let i = 1; i <= 19 ; i++){
        if (map.getLayer(`fill${i}`)) map.removeLayer(`fill${i}`);
        if (map.getLayer(`line${i}`)) map.removeLayer(`line${i}`);
      }

      for(let id in data){
        map.addLayer({
          'id': `fill${data[id].id}`,
          'type': 'fill',
          'source': `source${data[id].id}`, // reference the data source
          'layout': {},
          'paint': {
            'fill-color': data[id].color, // blue color fill
            'fill-opacity': .4
          }
        });
        // Add a black outline around the polygon.
        map.addLayer({
          'id': `line${data[id].id}`,
          'type': 'line',
          'source': `source${data[id].id}`,
          'layout': {},
          'paint': {
            'line-color': data[id].color,
            'line-width': 3
          }
        });

      }
    },
    error: function(e){
      console.log(e);
    }
  });
}

</script>



@endsection