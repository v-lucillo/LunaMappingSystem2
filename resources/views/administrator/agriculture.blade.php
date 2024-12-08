@extends('administrator.layout.master')

@section('css')

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
            <form name = "agri_form">
              
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
                <label for="inputText" class="col-sm-3 col-form-label">Crop Type</label>
                <div class="col-sm-9">
                  <select class="form-select" name = "agri_type">
                    <option selected="">Open this select menu</option>
                    @foreach($crop_type_list as $list)
                      <option value="{{$list->id}}">{{$list->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Produced</label>
                <div class="col-sm-9">
                  <input type="number" class="form-control" name ="produced" placeholder="(e.g 200)">
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Measurement</label>
                <div class="col-sm-9">
                  <select class="form-select" name = "measurement">
                    <option selected="">Open this select menu</option>
                      <option value="1">(Kg) Kilogram</option>
                      <option value="2">(Mg) Metric Ton</option>
                      <option value="3">Piece</option>
                  </select>
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Start Date</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name ="start_date">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">End Date</label>
                <div class="col-sm-9">
                  <input type="date" class="form-control" name ="end_date" >
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
                <button type="submit" class="btn btn-primary" name = "create_agri_record">Submit Form</button>
              </div>
            </div>

          </div>
        </div>
    </div>


    <div class="col-lg-7 col-sm-12">
      <div class="card-datatable table-responsive">
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
                <th></th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            </tbody>
        </table>
      </div>
    </div>



    <div class="col-12 mt-3">
      <div class="card">
          <div class="card-body">
              <canvas id="chartId" width="1200px" height="400px"></canvas>
          </div>
      </div>
    </div>




  </div>
@endsection


@section('js')
    <!-- create_agri_record -->
<script type="text/javascript">


  var chrt = document.getElementById("chartId").getContext("2d");
  var chartId = new Chart(chrt, {
     type: 'bar',
     options: {
        responsive: false,
     },
  });


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


  function render_chart(){
    $.ajax({
      url: `/administrator/get_agri_chart`,
      success: function(e){
        console.log(e);
        removeData(chartId);
        addData(chartId, e.label, e.set, e.color);
      },
      error: function(e){
        console.log(e);
      }
    });
  }
  render_chart();




  const agri_form =  $('form[name="agri_form"]');
  const remove_edit_button = $('i[name="remove_edit_button"]');
  const card_title =  $('h5[name="card_title"]');

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
          {data: function(){
            return `<button class="btn btn-danger" name="delete">Delete</button>`;
          }}
      ],
  });



  $(document).on('click', 'table[name="agri_record_table"] tbody tr button[name="delete"]', function(){
    let data = agri_record_table.row($(this).parent()).data();
    $.ajax({
      url:`/administrator/delete_rec`,
      data: {
        id: data.id,
        table_id: 2,
      },
      success: function(e){
        agri_record_table.ajax.reload(null, false);
        $(this).hide();
        card_title.text("Add Record");
        agri_form.trigger('reset');
        alert("Record Deleted");
      },
      error: function(e){
        console.log(e);
      }
    });
  });



  $('button[name="create_agri_record"]').on('click', function(){
    $.ajax({
      url: `/administrator/create_agri_record`,
      data: agri_form.serializeArray(),
      success: function(e){
        render_chart();
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
        agri_form.trigger('reset');
        agri_record_table.ajax.reload(null, false);
        remove_edit_button.hide();
        card_title.text("Add Record");
      },
      error: function(e){
        console.log(e);
      }
    });
  });


  remove_edit_button.on('click', function(){
    $(this).hide();
    card_title.text("Add Record");
    agri_form.trigger('reset');
  });

  $(document).on('click', 'table[name="agri_record_table"] tbody tr', function(){
    let data = agri_record_table.row(this).data();
    remove_edit_button.show();
    card_title.text("Modify Record");

    for(let key in data){
      agri_form.find(`input[name="${key}"]`).val(data[key]);
    }


    $('input[name="id"]').val(data.id);
    $('select[name="agri_type"]').val(data.agri_type).change();
    $('select[name="measurement"]').val(data.measurement).change();
    $('select[name="baranngay"]').val(data.baranngay).change();
    $('textarea[name="remarks"]').val(data.remarks);


    // let lat  =  data.coordinates.split("Lat: ")[1];
    // let long =  data.coordinates.split("Long: ")[1].split(" -")[0];
    // marker.setLngLat([long, lat]);

  });



</script>
@endsection