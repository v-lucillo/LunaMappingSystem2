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
                <th>Business Type</th>
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
    </div>

  </div>
@endsection


@section('js')
    <!-- create_agri_record -->
<script type="text/javascript">
  const agri_form =  $('form[name="agri_form"]');
  const remove_edit_button = $('i[name="remove_edit_button"]');
  const card_title =  $('h5[name="card_title"]');

  const agri_record_table =  $('table[name="agri_record_table"]').DataTable({
      ajax: `/administrator/get_agri_record`,
      columns: [
          {data: 'baranggay_name'},
          {data: 'business_type_name'},
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


  $('button[name="create_agri_record"]').on('click', function(){
    $.ajax({
      url: `/administrator/create_agri_record`,
      data: agri_form.serializeArray(),
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
    $('select[name="business_type"]').val(data.business_type).change();
    $('select[name="measurement"]').val(data.measurement).change();
    $('select[name="baranngay"]').val(data.baranngay).change();
    $('textarea[name="remarks"]').val(data.remarks);


    // let lat  =  data.coordinates.split("Lat: ")[1];
    // let long =  data.coordinates.split("Long: ")[1].split(" -")[0];
    // marker.setLngLat([long, lat]);

  });



</script>
@endsection