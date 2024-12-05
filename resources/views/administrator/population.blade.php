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
                <label for="inputText" class="col-sm-3 col-form-label">Group</label>
                <div class="col-sm-9">
                  <select class="form-select" name = "group">
                    <option selected="">Open this select menu</option>
                    <option value="1">Male</option>
                    <option value="2">Female</option>
                    <option value="3">Senior Citizen</option>
                  </select>
                </div>
              </div>



              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Year</label>
                <div class="col-sm-9">
                  <input type = "number" class="form-control" name ="year">
                </div>
              </div>
              


              <div class="row mb-3">
                <label for="inputText" class="col-sm-3 col-form-label">Count</label>
                <div class="col-sm-9">
                  <input type = "number" class="form-control" name ="count">
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
                <th>Group</th>
                <th>Count</th>
                <th>Remarks</th>
                <th></th>
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
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.10.0/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
  const population_form =  $('form[name="population_form"]');
  const remove_edit_button = $('i[name="remove_edit_button"]');
  const card_title =  $('h5[name="card_title"]');

  const population_record_table =  $('table[name="population_record_table"]').DataTable({
      ajax: `/administrator/get_population_record`,
      columns: [
          {data: 'year'},
          {data: 'baranggay_name'},
          {data: function(d){
            if(d.group == "1"){
              return "Male";
            }else if(d.group == "2"){
              return "Female";
            }else if(d.group == "3"){
              return "Senior Citizen";
            }
          }},
          {data: 'count'},
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

</script>

@endsection