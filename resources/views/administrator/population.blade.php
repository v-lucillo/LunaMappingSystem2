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
            <form name = "population_form">
              
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
                <label for="inputText" class="col-sm-3 col-form-label">Year</label>
                <div class="col-sm-9">
                  <input type = "number" class="form-control" name ="year">
                </div>
              </div>
              


              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Male</label>
                <div class="col-sm-9">
                  <input type = "number" class="form-control" name ="male">
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Female</label>
                <div class="col-sm-9">
                  <input type = "number" class="form-control" name ="female">
                </div>
              </div>


              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Senior Male</label>
                <div class="col-sm-9">
                  <input type = "number" class="form-control" name ="sc_male">
                </div>
              </div>

              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Senior Female</label>
                <div class="col-sm-9">
                  <input type = "number" class="form-control" name ="sc_female">
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
                <button type="submit" class="btn btn-primary" name = "create_population_record">Submit Form</button>
              </div>
            </div>

          </div>
        </div>
    </div>


    <div class="col-lg-7 col-sm-12">
      <div class="card-datatable table-responsive">
        <table class="table" name = "population_record_table">
            <thead>
            <tr>
                <th>Year</th>
                <th>Barangay</th>
                <th>Male</th>
                <th>Female</th>
                <th>Senior Male</th>
                <th>Senior Female</th>
                <th>Remarks</th>
                <th></th>
            </tr>
            </thead>
            <tbody class="table-border-bottom-0">
            </tbody>
        </table>
      </div>
    </div>


    <div class="row">
      <div class="col-12">
          <h1>Population Graph</h1>
      </div>
        <div class="col-5">
        <label for="inputNanme4" class="form-label">Year</label>
        <input type="text" class="form-control" value="{{date('Y')}}" name = "filter_year">
      </div>
      <div class="col-5">
        <label for="inputNanme4" class="form-label">Baranggay</label>
        <select class="form-select" name = "filter_baranggay">
          <option value ="" selected="">Open this select menu</option>
          @foreach($barangay_list as $list)
            <option value="{{$list->id}}">{{$list->name}}</option>
          @endforeach
        </select>
      </div>
      <div class="col-2" style="display: flex;align-items: end;gap: 15px;justify-content: end;">
        <button type="button" class="btn btn-success" name = "filter_button"><i class="bi bi-funnel"></i></button>
        <button type="button" class="btn btn-warning" name = "reset_button"><i class="bi bi-trash"></i></button>
      </div>
      <div class = "col-12">
          <div class="card mt-4">
              <div class="card-body">
                <canvas id="biz_bar_chart"></canvas>
              </div>
          </div>
      </div>
    </div>

  </div>
@endsection


@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
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


const biz_bar_chart = document.getElementById('biz_bar_chart');
let new_chart_2 =  new Chart(biz_bar_chart, {
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



function population_chart(){
  $.ajax({
    url:`/administrator/population_chart`,
    data: {
      filter_year: filter_year.val(),
      filter_baranggay: filter_baranggay.val()
    },
    success: function(e){
      removeData(new_chart_2);
      addData(new_chart_2, e.label, e.datasets);
    },
    error: function(e){
      console.log(e);
    }
  });
}
population_chart();




function addData(chart, label, newData, color) {
  chart.data = {
    labels: label,
    datasets: newData
  };
  chart.update();
}

function removeData(chart) {
    chart.data.labels = [];
    chart.data.datasets = [];
    chart.update();
}



  const population_form =  $('form[name="population_form"]');
  const remove_edit_button = $('i[name="remove_edit_button"]');
  const card_title =  $('h5[name="card_title"]');

  const population_record_table =  $('table[name="population_record_table"]').DataTable({
      ajax: `/administrator/get_population_record`,
      columns: [
          {data: 'year'},
          {data: 'baranggay_name'},
          {data: 'male'},
          {data: 'female'},
          {data: 'sc_male'},
          {data: 'sc_female'},
          {data: 'remarks'},
          {data: function(){
            return `<button class="btn btn-danger" name="delete">Delete</button>`;
          }}
      ],
  });



  $(document).on('click', 'table[name="population_record_table"] tbody tr button[name="delete"]', function(){
    let data = population_record_table.row($(this).parent()).data();
    $.ajax({
      url:`/administrator/delete_rec`,
      data: {
        id: data.id,
        table_id: 3,
      },
      success: function(e){
        population_record_table.ajax.reload(null, false);
        $(this).hide();
        card_title.text("Add Record");
        population_form.trigger('reset');
        alert("Record Deleted");
      },
      error: function(e){
        console.log(e);
      }
    });
  });




  $('button[name="create_population_record"]').on('click', function(){
    $.ajax({
      url: `/administrator/create_population_record`,
      data: population_form.serializeArray(),
      success: function(e){
        population_chart();
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
        population_form.trigger('reset');
        population_record_table.ajax.reload(null, false);
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
    population_form.trigger('reset');
  });

  $(document).on('click', 'table[name="population_record_table"] tbody tr', function(){
    let data = population_record_table.row(this).data();
    remove_edit_button.show();
    card_title.text("Modify Record");

    for(let key in data){
      population_form.find(`input[name="${key}"]`).val(data[key]);
    }


    $('input[name="id"]').val(data.id);
    $('select[name="group"]').val(data.group).change();
    $('select[name="baranngay"]').val(data.baranngay).change();
    $('textarea[name="remarks"]').val(data.remarks);


    // let lat  =  data.coordinates.split("Lat: ")[1];
    // let long =  data.coordinates.split("Long: ")[1].split(" -")[0];
    // marker.setLngLat([long, lat]);

  });

</script>

<script>
  $("input[name=year]").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});


  $("input[name=filter_year]").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});


</script>

@endsection