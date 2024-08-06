@extends('admin.layouts.master')
@section('title') {{ $title = "Address List" }}
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> {{ $title }}</h1>
            <p>{{ $title }}</p>
        </div>
        <x-add-entity-button-component url="{{ url('admin/addresses/addresslist/create') }}" text="New Address List" />
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="productTable">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Sr.No.</th>
                                    <th>User</th>
                                    <th>Street Address</th>
                                    <th>Address Line1</th>
                                    <th>Address Line2</th>
                                    <th>City</th>
                                    <th>Region</th>
                                    <th>Zip Code</th>
                                    <th>Country</th>
                                    <th>Address Type</th>
                                    <th>Default Address</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addresses as $key=>$address)
                                    <tr>
                                        <td><input type="checkbox" class="checkboxall" value="{{ $address->id }}"></td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ getUser($address->user_id)->first_name ?? null }}</td>
                                        <td>{{ $address->streer_name }}</td>
                                        <td>{{ $address->address_line1 }}</td>
                                        <td>{{ $address->address_line2 }}</td>
                                        <td>{{ getCity($address->city_id)->name ?? null }}</td>
                                        <td>{{ getState($address->state_id)->name ?? null }}</td>
                                        <td>{{ $address->zip_code }}</td>
                                        <td>{{ getCountry($address->country_id)->name ?? null }}</td>
                                        <td>{{ getAddressType($address->address_type)->name ?? null }}</td>
                                        <td>{{ $address->is_default ? 'Yes' : 'No' }}</td>
                                        <td>{{ $address->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td><button type="button" data-id="{{ $address->id }}" id="edit-address-type"
                                                class="btn btn-primary address-type-set"><i class="fa fa-pencil-square"
                                                    aria-hidden="true"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <x-feature-controls-component exportUrl="{{ url('admin/addresses/addresstypes/exportdata') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer_scripts')
    <script src="{{ asset('/assets/js/customJs/checkbox.js') }}"></script>
    <script src="{{ asset('/assets/js/customJs/ajaxPostRequest.js') }}"></script>
    <script src="{{ asset('/assets/js/customJs/featureControls.js') }}"></script>
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
          
          deleteData("addresstypes/delete");

          undoData("addresstypes/undo");
      });
  </script>
@stop
