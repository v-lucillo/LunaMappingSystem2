@extends('view_only.layout.master')

@section('css')
<style>

  /* #map { position: absolute; top: 0; bottom: 0; width: 100%; }
      .coordinates {
      background: rgba(0, 0, 0, 0.5);
      color: #fff;
      position: absolute;
      bottom: 40px;
      left: 10px;
      padding: 5px 10px;
      margin: 0;
      font-size: 11px;
      line-height: 18px;
      border-radius: 3px;
      display: none;

  } */
   
   #map{
      position: relative;
      width: 800px; 
      height: 560px;
      margin-left: 350px;
      margin-top: 60px;

   }
   .mapboxgl-ctrl-attrib-button{
      background-color: none;
   }
   .dropdown_agri{
      /* min-width: 15em; */
      /* position: relative; */
      margin-top: 2em;
      margin-left: 50px;
      padding: 15px;
      float: left;
  }
  .dropdown_agri *{
      box-sizing: border-box;
      color: #fff;
      
  }
  .select_agri{
      background: #2a2f3b;
      color: #fff;
      display: flex;
      width: 200px;
      justify-content: center;
      border: 2px #2a2f3b solid;
      border-radius: 0.5em;
      padding: 1em;
      cursor: pointer;
      
      transition: background 0.3s;
      
  }
  .select-clicked_agri{
      border: 2px #26489a solid;
      box-shadow: 0 0 0.8em #26489a;
  }

  .select:hover_agri{
      background: #323741;
  }
  .caret_agri{
      width: 0;
      height: 0;
      border-left: 5px solid transparent;
      border-right: 5px solid transparent;
      border-top: 5px solid #fff;
      transition: 0.3s;
      margin-left: 10px;
      margin-top: 10px;
  }
  .caret-rotate_agri{
      transform: rotate(180deg);
  }
  .menu_agri{
      list-style: none;
      padding: 0.2em 0.5em;
      background: #323741;
      border: 1px #363a43 solid;
      box-shadow: 0 0.5em 1em rgba(0,0,0,0.2);
      border-radius: 0.5em;
      color: #9fa5b5;
      position: absolute;
      top: 12em;
      left: 155px;
      width: 200px;
      transform: translateX(-50%);
      opacity: 0;
      display: none;
      transform: 0.2s;
      z-index: 1;
      
  }
  .menu_agri li{
      padding: 0.7em 0.5em;
      margin: 0.3em 0;
      border-radius: .5em;
      cursor: pointer;
  }
  .menu_agri li:hover{
      background: #2a2d35;


  }
  .active_agri{
      background: #23242a;
  }
  .menu-open_agri{
      display: block;
      opacity: 1;
      margin-left: 10px;
      

  }
  .mapa_agri{
      color: white;
      
  }
 
  </style>
 
@endsection


@section('container')
<div class="dropdown_agri">
      <div class="select_agri">
          <span class="selected_agri">Barangays</span>
          <div class="caret_agri"></div>
      </div>
      <ul class="menu_agri">
          <li id="option_brngy">
            <p id="bustamante">Bustamante</p>
          </li>
          
          <li id="option_brngy">
             <p id="centro_1">Centro 1</p>
          </li>
          
          <li id="option_brngy">
              <p id="centro_2">Centro 2</p>
          </li>

          <li id="option_brngy">
              <p id="centro_3">Centro 3</p>
          </li>

          <li id="option_brngy">
              <p id="concepcion">Concepcion</p>
          </li>

          <li id="option_brngy">
              <p id="dadap">Dadap</p>
          </li>

          <li id="option_brngy">
              <p id="harana">Harana</p>
          </li>

          <li id="option_brngy">
              <p id="lalog_1">Lalog 1</p>
          </li>

          <li id="option_brngy">
              <p id="lalog_2">Lalog 2</p>
          </li>

          <li id="option_brngy">
              <p id="luyao">Luyao</p>
          </li>

          <li id="option_brngy">
              <p id="macanao">Macañao</p>
          </li>

          <li id="option_brngy">
              <p id="macugay">Macugay</p>
          </li>

          <li id="option_brngy">
              <p id="mambabanga">Mambabanga</p>
          </li>

          <li id="option_brngy">
              <p id="pulay">Pulay</p>
          </li>

          <li id="option_brngy">
              <p id="puroc">Puroc</p>
          </li>

          <li id="option_brngy">
              <p id="san_isidro">San Isidro</p>
          </li>

          <li id="option_brngy">
              <p id="san_miguel">San Miguel</p>
          </li>

          <li id="option_brngy">
              <p id="santo_domingo">Santo Domingo</p>
          </li>

          <li id="option_brngy">
              <p id="union_kalinga">Union Kalinga</p>
          </li>
      </ul>
  </div>


  <br>
  
  <div style="background: #fff;
    margin: 24px;
    padding: 30px;
    border-radius: 10px;">
    <table class="table" name = "agri_record_table">
            <thead>
            <tr>
                <th>Baranggay</th>
                <th>Crop Type</th>
                <th>Address</th>
                <th>Produced</th>
                <th>Measurement</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Remarks</th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            </tbody>
        </table>
  </div>

@endsection


@section('js')

<script type="text/javascript" src="//cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src="https://api.mapbox.com/mapbox-gl-js/v2.15.0/mapbox-gl.js"></script>
<script src="{{asset('lunamapping_template/pie.js')}}"></script>

<script type="text/javascript">
  const agri_record_table =  $('table[name="agri_record_table"]').DataTable({
      ajax: `/administrator/get_agri_record`,
      columns: [
          {data: 'baranggay_name'},
          {data: 'agri_type_name'},
          {data: 'address'},
          {data: 'produced'},
          {data: function(d){
            if(d.measurement ==  "1"){
              return "Kilogram";
            }else if(d.measurement ==  "2"){
              return "Metric Ton";
            }
            else if(d.measurement ==  "3"){
              return "Peice";
            }
          }},
          {data: 'start_date'},
          {data: 'end_date'},
          {data: 'remarks'},
      ],
  });


  $('li#option_brngy').on('click', function(){
    agri_record_table.search($(this).text().trim()).draw();
  });
  // setInterval(function(){
  // // $(document).find('.dt-search input').val("Dada"); 
  // agri_record_table.search("Dada").draw();   
  // }, 4000)
</script>



@endsection