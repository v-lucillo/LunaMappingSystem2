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
</style>
@endsection

@section('container')

<div style="">
<div class="dropdown">
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

<div>
    <div id="map" class="map"></div>
    <pre id="coordinates" class="coordinates"></pre>
</div>

  
  <div class="row">
  <div class="column">
    <div class="card">
      <h1>Senior Citizen</h1>
      <h2 name = "sc"></h2>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <h1>Male</h1>
      <h2 name = "m"></h2>
    </div>
  </div>
  <div class="column">
    <div class="card">
      <h1>Female</h1>
      <h2 name = "f"></h2>
    </div>
  </div>
</div>

<div class="graphBox">
  <h1>Graph</h1>
  <div class="box">
      <canvas id="myChart"></canvas>
  </div>
</div>

</div>



@endsection


@section('js')
    
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>

<script type="text/javascript">

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
// Add a data source containing GeoJSON data.
map.addSource('maine', {
'type': 'geojson',
'data': {
'type': 'Feature',
'geometry': {
'type': 'Polygon',
// These coordinates outline Maine.
'coordinates': [
[
[121.70189618874934,  16.92872467254338],
[121.69961145305172, 16.95008058571881],
[121.69961145305172, 16.95008058571881],
[121.6951163625908,  16.97515372163481],
[121.7008160483237,  16.98026805955078],
[121.70666899953414,  16.992512834446543],
[121.71435099799834,  16.997060690061645],
[121.71032709404176,  16.998809835917967],
[121.70922966569037,  17.006156070239797],
// [121.8967165021246,  17.00755532031019],
[121.71508261690076,  17.008604751004242],
[121.72312906169424,  17.002946913945138],
[121.72639062785709,  17.00261859763779],
[121.72896554851104,  16.9978579465474],
[121.72965219401783,  16.997529621325484],
[121.73227566108079,  16.999509489690027],
[121.73085382365622,  17.003439387326438],
[121.73274209880344, 17.005080955915773],
[121.73520213668598,  17.005456441285233],
[121.73739699339097,  17.005456441285233],
[121.73812861229112,  16.999159663131024],
[121.73978021525869, 16.998678757087532],
[121.74098184489708,  16.999663724989873],
[121.74235513591265,  17.001633645265244],
[121.74063852214266, 17.008035743130435],
[121.74256732803616,  17.012021898282867],
[121.74727384855805,  17.012452613240313],
[121.75861394152759,  17.01979831249062],
[121.76117460768154,  17.01804936262124],
[121.7622720360352,  17.016300396412447],
[121.76446689273803,   16.980617921353797],
[121.73184698886035,  16.9351247507785],
[121.73184698886035,  16.93427368272195],
[121.72977114950908,  16.933706301878814],
[121.72235743753828,  16.932287842286513],
[121.71079204686492,  16.933706301878814],
[121.70189618874934,  16.92872467254338],
// [121.69992288114645,  16.9147249062585],
// [121.91937755493524,  16.870419938231933],
// [121.90287823488387,  16.856808027629683],
// [121.89985591755163,  16.85352507735179],
// [121.89985591755163,  16.83756155451779],
// [121.8970760445199,  16.82026621907606],
// // [121.90819553664693,  16.811617959363645],
// [121.90174035074244,  16.813243332097016],
// [121.90819553664693,  16.789662913721045],
// [121.95962318773456,  16.8062957573311],
// [121.97074267986301,  16.82026621907606],
// [121.97699739418448,  16.797646860563873],
// // [122.00827096579184,  16.814944259786174],
// [121.99728274224128,  16.819536437442437],
// [121.99842335523101,  16.85652488024111],
// [121.99147367265158,  16.90440660012345],
// [121.98313405355628,  16.93166714875619],
// [121.98660889484597,  16.980194447246006],
// [121.98104914878246,  17.01143141275682],
// [121.98104914878246,  17.022064085203965],
// [121.98029211632411,  17.02569286613121],
// [121.9765749723341,  17.031419045635445],
// [121.96852116035711,  17.038132274222605],
// [121.96067385638065,  17.03951437960015],
// [121.9299041644689,  17.03892204997544],



]
]
}
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
'fill-opacity': .2
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


// marker.on('dragend', onDragEnd);

let currentMarkers =  [];

function render_marker(id = null){
  $.ajax({
    url: `/administrator/get_baranggay_record_for_map`,
    data: {
      id: id
    },
    success: function(e){
      for(let id in currentMarkers){
        currentMarkers[id].remove();
      }
      e.forEach((data) => {
        console.log(data);
        let lat  =  data.coordinates.split("Lat: ")[1];
        let long =  data.coordinates.split("Long: ")[1].split(" -")[0];

        let popup = new mapboxgl.Popup()
          .setText(data.business_type_name)
          .addTo(map);

          let marker = new mapboxgl.Marker()
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

  $.ajax({
    url: `/administrator/get_population_records`,
    data: {
      id: id
    },
    success: function(e){
      for(let id in e){
        if(e[id].group == 3){
          $('h2[name="sc"]').text(e[id].count);
        }
        if(e[id].group == 1){
          $('h2[name="m"]').text(e[id].count);
        }

        if(e[id].group == 2){
          $('h2[name="f"]').text(e[id].count);
        }
      }
    }
  });

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
      addData(new_chart, e.label, e.set);
    },
    error: function(e){
      console.log(e);
    }
  });
}


// setInterval(function(){
//     removeData(new_chart);

//     addData(new_chart, ['karinderia', 'barbero', 'pancitan', 'sarisari-store', 'talipapa', 'marts'], [12, 19, 33, 21, 22, 34]);
// }, 5000);

// ['karinderia', 'barbero', 'pancitan', 'sarisari-store', 'talipapa', 'marts'],
// [12, 19, 3, 5, 2, 3]

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
  

function addData(chart, label, newData) {
  chart.data = {
    labels: label,
    datasets: [{
      label: '# business',
      data: newData,
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


$('li#option_brngy').on('click', function(){
  let id = $(this).attr('__id');
  render_marker(id);
  render_chart(id);
  render_population(id);
  // agri_record_table.search($(this).text().trim()).draw();
});


</script>



@endsection