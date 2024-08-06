@extends('admin.layouts.master')
@section('title') {{ $title = "Address Type" }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> {{ $title }}</h1>
            <p>{{ $title }}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#newAddressType">
                New Address Type
            </button>
            @include('admin.addresses.addressesModal.addresstypemodal')
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
                                    <th>
                                    </th>
                                    <th>Sr.No.</th>
                                    <th>Address Type</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($addresslist as $key => $address)
                                    <tr>
                                        <td><input type="checkbox" class="checkboxall" value="{{ $address->id }}"></td>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $address->name }}</td>
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
    @include('admin.addresses.addressesModal.edit-addresstypemodal')
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
        $(".address-type-set").click(function(event) {
            event.preventDefault();
            var addresstypeIdVal = $(this).data('id');
            var userURL = "addresstypes/info/" + addresstypeIdVal;
            $.ajax({
                url: userURL,
                type: 'GET',
                dataType: 'json',
                success: function(response) {
                    var checkbox = $('#edit-is_active');
                    checkbox.prop('checked', response.data.is_active === 1);
                    $("#edit-name").val(response.data.name);
                    $("#edit-addressTypeId").val(response.data.id);
                    $('#editAddressType').modal('show');
                }
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
