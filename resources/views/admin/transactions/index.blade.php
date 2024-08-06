@extends('admin.layouts.master')
@section('title'){{ $title = "Transactions" }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> {{ $title }}</h1>
            <p>{{ $title }}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCurrency">
               New Order
            </button>
        </ul>
        @include('admin.pricing.models.currenciesmodal')
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
                                    <th>Customer Name</th>
                                    <th>Customer Email</th>
                                    <th>Status</th>
                                    <th>Total Price</th>
                                    <th>Shipping Address</th>
                                    <th>Billing Address</th> 
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                        <x-feature-controls-component exportUrl="{{ url('admin/currencies/exportdata') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Country Model --}}
    @include('admin.location.locationModals.editcountriesmodal')

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
            
            deleteData("currencies/delete");
  
            undoData("currencies/undo");
        });
    </script>
@stop
