@extends('admin.layouts.master')
@section('title') {{ $title = "Shipping Prices" }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"> {{ $title }}</i></h1>
            <p>{{ $title }}</p>
        </div>
        <x-add-entity-button-component url="{{ url('/admin/shipping/method/create') }}" text="New Shipping Price"/>
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
                                    <th>Sr. No</th>
                                    <th>Weight</th>
                                    <th>Price</th>
                                    <th>Country</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($price as $key => $value)
                                   <tr>
                                    <td><input type="checkbox" class="checkboxall" value="{{ $value->id }}"></td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $value->weight }}</td>
                                    <td>{{ $value->price }}</td>
                                    <td>{{getCountry($value->country_id)->name }}</td>
                                    <td><button type="button" data-id="{{ $value->id }}" id="edit-value-type"
                                        class="btn btn-primary value-type-set"><i class="fa fa-pencil-square"
                                            aria-hidden="true"></i></button>
                                </td>
                                   </tr>
                               @endforeach
                            </tbody>
                        </table>
                        <x-feature-controls-component exportUrl="{{ url('admin/addresses/addresstypes/exportdata') }}" />
                        <a class="export" href="{{ url('admin/shipping/price/import_excel') }}"><i
                            class="fa fa-file-excel-o  text-success ml-2 mr-2"></i>Import
                    </a>
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
