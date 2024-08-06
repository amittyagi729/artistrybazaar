@extends('admin.layouts.master')
@section('title') {{ $title = "Shipping Methods" }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"> {{ $title }}</i></h1>
            <p>{{ $title }}</p>
        </div>
        <x-add-entity-button-component url="{{ url('/admin/shipping/method/create') }}" text="New Shipping Method"/>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="productTable">
                            <thead>
                                <tr>
                                    <th>Sr. No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Rate</th>
                                    <th>Duration</th>
                                    <th>Minimum Order Value</th>
                                    <th>Maximum Order Value</th>
                                    <th>Handling Fee</th>
                                    <th>Priority</th>
                                    <th>Has Insurance</th>
                                    <th>Tracking URL</th>
                                    <th>Weight Limit</th>
                                    <th>Max Length</th>
                                    <th>Max Width</th>
                                    <th>Max Height</th>
                                    <th>Min Delivery Days</th>
                                    <th>Max Delivery Days</th>
                                    <th>Additional Fees</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
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
@stop
