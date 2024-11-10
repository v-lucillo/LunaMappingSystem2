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
                  <input type="text" class="form-control" name ="produced" placeholder="(e.g 200)">
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
    
@endsection