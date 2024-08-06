@extends('admin.layouts.master')
@section('title')States @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> States</h1>
            <p>States</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCity">
                Add New City
            </button>
            @include('admin.location.locationModals.citymodal')
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="productTable">
                            <thead>
                                <tr>
                                    <th>Sr.No.</th>
                                    <th>City</th>
                                    <th>Zip Code</th>
                                    <th>State</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($cities as $key => $city)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ $city->zip_code }}</td>
                                    <td>{{ getState($city->state_id)->name }}</td>
                                    <td>{{ getCountry($city->country_id)->name }}</td>
                                    <td>{{ $city->is_active ? 'Active' : 'Inactive' }}</td>
                                    <td><button type="button" data-id="{{ $city->id }}" id="edit-city"
                                            class="btn btn-primary city-set"><i class="fa fa-pencil-square"
                                                aria-hidden="true"></i></button>
                                        <a class="delete"
                                            href="{{ url('admin/location/city/delete') }}/{{ $city->id }}"
                                            data-confirm="Are you sure to delete this item? Please note cities associated with this will also be deleted."><i
                                                class="fa fa-trash  text-danger ml-2"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <a class="export" href="{{ url('admin/locations/cities/import_excel') }}"><i
                            class="fa fa-file-excel-o  text-success ml-2 mr-2"></i>Import
                    </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Country Model --}}
    @include('admin.location.locationModals.editcitymodal')

@endsection
@section('footer_scripts')
<script src="{{ asset('/assets/js/customJs/stateDropdown.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#productTable').DataTable({
                "lengthMenu": [
                    [25, 50, 75, -1],
                    [25, 50, 75, 'All'],
                ],
            });
        });
    </script>
    <script>
      $(document).ready(function() {

  $(".country-class").change(function() {
    var stateIdVal = $(this).val();
    var stateClassSelector = '.state-class';
    var param = "getStates";
    getStatesData(stateIdVal, successCallback, errorCallback,stateClassSelector,param);
  });

  $(".city-set").click(function(event) {
            event.preventDefault();
            var cityIdVal = $(this).data('id');
            var userURL = "city/info/" + cityIdVal;
            $.ajax({
                url: userURL,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    if (result.status === 'success') {
                        $("#edit-name").val(result.data.name);
                        getStatesData(result.data.state_id, successCallback, errorCallback);
                        $('#edit-country').val(result.data.country_id);
                        $('.state_id-class').val(result.data.state_id);
                        $('#edit-zip_code').val(result.data.zip_code);
                        $('#edit-cityId').val(result.data.id);
                        $('#editCity').modal('show');
                    }
                },
                error: function(xhr, status, error) {
                    alert("Something went wrong");
                    // Handle error response here
                }

            });

        });
        
});

      
    </script>
    <script>
        $("#submitForm").click(function(e) {
            e.preventDefault();
            var country_id = $("#country").val();
            var state_id = $("#state_id").val();
            var name = $("#name").val();
            if (country_id != "" && name != "" && state_id != "") {
                $("#cityForm").submit();
            } else {
                alert("Please input required fields");
            }
        });
    </script>
@stop
