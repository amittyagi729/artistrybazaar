@extends('admin.layouts.master')
@section('title'){{ $title = "Create New Address" }} @endsection
@section('header_styles')
<link rel="stylesheet" href="{{ asset('/assets/css/custom-css/select-option.css') }}">
<link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">
<link href="
https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css
" rel="stylesheet">
@endsection
@section('content')
<div class="app-title">
  <div>
      <h1><i class="fa fa-th-list"> {{ $title }}</i></h1>
      <p>{{ $title }}</p>
  </div>
  <ul class="app-breadcrumb breadcrumb">
      <div class="tile-footer">
         <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
      </div>
   </ul>
</div>
    <div>
        <form action="{{ url('/admin/addresses/addresslist/store') }}" method="POST">
          @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputPassword4">Search with Email</label><br>
                    <div class="select-input">
                        <input type="text" id="userSelection" placeholder="Search">
                        <input type="hidden" id="user-id" name="user_id">
                        <ul class="select-options">
                          @foreach ($users as $user)
                          <li value={{ $user->id }}>{{ $user->email }}</li> 
                          @endforeach
                        </ul>
                      </div>
                </div>
                <div class="form-group col-md-4">
                  <label for="addressType">Address Type</label><br>
                  <select id="country" name="address_type" class="country-class form-control">
                    <option value="">Select an option</option>
                    @foreach ($addresslist as $list)
                        <option value="{{ $list->id }}">{{ $list->name }}</option>
                    @endforeach
                </select>
                </div>
                <div class="form-group col-md-4">
                  <label for="address">Street Number</label>
                  <input type="text" class="form-control" name="street_number" id="inputAddress" placeholder="1234 Main St">
                </div>
            </div>
            <div class="form-group">
                <label for="address">Address <span class="required-field">*</span></label>
                <input type="text" class="form-control" name="address_line1" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Address 2</label>
                <input type="text" class="form-control" name="address_line2" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="exampleInputPassword1">Country <span class="required-field">*</span></label>
                  <select id="country" name="country_id" class="country-class form-control">
                      <option value="">Select an option</option>
                      @foreach ($countries as $country)
                          <option value="{{ $country->id }}">{{ $country->name }}</option>
                      @endforeach
                  </select>
                </div>
                <div class="form-group col-md-3 state-class">
                    <label for="inputState">State<span class="required-field">*</span></label>
                    <select id="state_id" name="state_id" class="state_id-class form-control">
                      <option value="">Please select a Country</option>
                  </select>
                </div>
                <div class="form-group col-md-4 city-class">
                  <label for="inputCity">City<span class="required-field">*</span></label>
                  <select id="city_id" name="city_id" class="city_id-class form-control">
                    <option value="">Please select a State</option>
                </select>
              </div>
                <div class="form-group col-md-2">
                    <label for="inputZip">Zip<span class="required-field">*</span></label>
                    <input type="text" name="zip_code" class="form-control" id="inputZip">
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" class="form-check-input" name="is_default" value="1"
                  id="is_active">
              <label class="form-check-label" for="is_default">Mark as Default Address</label>
                </div>
            </div>
            <div class="form-group">
                <div class="form-check">
                  <input type="checkbox" checked class="form-check-input" name="is_active" value="1"
                  id="is_active">
              <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
            <x-submit-button text="Submit" />
        </form>
    </div>
@endsection
@section('footer_scripts')
<script src="
https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js
"></script>
<script src="{{ asset('/assets/js/customJs/stateDropdown.js') }}"></script>
<script src="{{ asset('/assets/js/customJs/selectOption.js') }}"></script>
<script>
  initializeFunction('select-options', 'userSelection', 'user-id');
</script>
<script>
  $(document).ready(function() {
    $(".country-class").change(function() {
    var stateIdVal = $(this).val();
    var stateClassSelector = '.state-class';
    var param = "getStates";
    getStatesData(stateIdVal, successCallback, errorCallback,stateClassSelector,param);
  });


  $(document).on("change", ".state_id-class", function() {
    var stateIdVal = $(this).val();
    var stateClassSelector = '.city-class';
    var param = "getCity";
    getStatesData(stateIdVal, successCallback, errorCallback, stateClassSelector, param);
  });
  });
</script>
@stop
