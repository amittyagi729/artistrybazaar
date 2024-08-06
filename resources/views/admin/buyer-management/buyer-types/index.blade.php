@extends('admin.layouts.master')
@section('title')  {{ $title = "Buyer Type" }} @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> {{ $title }}</h1>
            <p>{{ $title }}</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#new-type">
                Add New Buyer Type
            </button>
            @include('admin.buyer-management.models.buyer-type-modal')
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
                                    <th>Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($buyers as $key => $buyer)
                                <tr>
                                    <td><input type="checkbox" class="checkboxall" value="{{ $buyer->id }}"></td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $buyer->name }}</td>
                                    <td>{{ $buyer->is_active ? 'Active' : 'Inactive' }}</td>
                                    <td><button type="button" data-id="{{ $buyer->id }}" id="edit-buyer-type"
                                        class="btn btn-primary buyer-type-set"><i class="fa fa-pencil-square"
                                            aria-hidden="true"></i></button>
                                </td>
                                @endforeach
                            </tbody>
                        </table>
                        <x-feature-controls-component exportUrl="{{ url('admin/addresses/addresstypes/exportdata') }}" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('admin.buyer-management.models.edit-buyer-title-modal')
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
