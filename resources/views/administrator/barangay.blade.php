@extends('administrator.layout.master')

@section('css')
<style type="text/css">
  #map{
    position: relative;
    height: 500px;
  }
</style>
@endsection


@section('container')
  <div class="row">
    <div class="col-lg-5 col-sm-12">
        <div class="card">
          <div class="d-flex justify-content-between align-items-center" style="padding: 0px 20px;">
              <h5 class="card-title" name = "card_title">Add Record</h5>
              <i class="bx bxs-trash" name = "remove_edit_button" style="display: none;"></i>
          </div>

          <div class="card-body">
            <form name = "barrangay_form">
              
              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Baranngay</label>
                <div class="col-sm-9">
                  <select class="form-select" name = "baranngay">
                    <option selected="">Open this select menu</option>
                    @foreach($barangay_list as $list)
                      <option value="{{$list->id}}">{{$list->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <input hidden name="id">

              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name ="address" placeholder="(e.g 123 Centro 1, Isabela)">
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Coordinates</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name ="coordinates" readonly="readonly">
                </div>
              </div>

              <div class="row mb-3">
                <div class="col-sm-12">
                  <div id="map" class="map"></div>
                  <pre id="info"></pre>
                </div>
              </div>

              


              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Business Type</label>
                <div class="col-sm-9">
                  <select class="form-select" name = "business_type">
                    <option selected="">Open this select menu</option>
                    @foreach($business_list as $list)
                      <option value="{{$list->id}}">{{$list->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Remarks</label>
                <div class="col-sm-9">
                  <textarea name = "remarks" class="form-control" style="height: 100px"></textarea>
                </div>
              </div>
            </form>


            <div class="row mb-3">
              <div class="col-sm-12">
                <button type="submit" class="btn btn-primary" name = "create_baranggay_record">Submit Form</button>
              </div>
            </div>

          </div>
        </div>
    </div>


    <div class="col-lg-7 col-sm-12">
      <div class="card-datatable table-responsive">
        <table class="table" name = "baranggay_record_table">
            <thead>
            <tr>
                <th>Baranggay</th>
                <th>Business Type</th>
                <th>Address</th>
                <th>Remarks</th>
                <th>Coordinates</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection


@section('js')

<script type="text/javascript">
  const barrangay_form =  $('form[name="barrangay_form"]');
  const remove_edit_button =  $('i[name="remove_edit_button"]');
  const card_title =  $('h5[name="card_title"]');

  const baranggay_record_table =  $('table[name="baranggay_record_table"]').DataTable({
      ajax: `/administrator/get_baranggay_record`,
      columns: [
          {data: 'baranggay_name'},
          {data: 'business_type_name'},
          {data: 'address'},
          {data: 'remarks'},
          {data: 'coordinates'},
      ],
  });


  $(document).on('click', 'table[name="baranggay_record_table"] tbody tr', function(){
    let data = baranggay_record_table.row(this).data();
    console.log(data);
    remove_edit_button.show();
    card_title.text("Modify Record");
    for(let key in data){
      barrangay_form.find(`input[name="${key}"]`).val(data[key]);
    }
    $('input[name="id"]').val(data.id);
    $('select[name="business_type"]').val(data.business_type).change();
    $('select[name="baranngay"]').val(data.baranngay).change();
    $('textarea[name="remarks"]').val(data.remarks);


    let lat  =  data.coordinates.split("Lat: ")[1];
    let long =  data.coordinates.split("Long: ")[1].split(" -")[0];
    marker.setLngLat([long, lat]);

  });


  remove_edit_button.on('click', function(){
    $(this).hide();
    card_title.text("Add Record");
    barrangay_form.trigger('reset');
  });

  $('button[name="create_baranggay_record"]').on('click', function(){
    $.ajax({
      url: `/administrator/create_baranggay_record`,
      data: barrangay_form.serializeArray(),
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
        barrangay_form.trigger('reset');
        baranggay_record_table.ajax.reload(null, false);
      },
      error: function(e){
        console.log(e);
      }
    });
  });
</script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoidmljdG9yaW5vaSIsImEiOiJjbGtnbDgxbjYwMWxyM2VueTZzbzdjMG9xIn0.cDWO9uV_3oq2AlHuIWQzfw';
  // const coordinates = document.getElementById('coordinates');
  const map = new mapboxgl.Map({
      container: 'map',
      // Choose from Mapbox's core styles, or make your own style with Mapbox Studio
      style: 'mapbox://styles/mapbox/satellite-v9',
      center: [121.72827890300437, 16.973888694502364],
      zoom: 12
  });

  const marker = new mapboxgl.Marker({
      draggable: true
  })
  .setLngLat([121.72827890300437, 16.973888694502364])
  .addTo(map);


  function onDragEnd() {
      const lngLat = marker.getLngLat();
      $('input[name="coordinates"]').val(`Long: ${lngLat.lng} - Lat: ${lngLat.lat}`);
  }
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


  marker.on('dragend', onDragEnd);
</script>



@endsection