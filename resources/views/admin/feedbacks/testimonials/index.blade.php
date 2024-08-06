@extends('admin.layouts.master')
@section('title') {{ $title = "Testimonials" }}
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> {{ $title }}</h1>
            <p>{{ $title }}</p>
        </div>
        <x-add-entity-button-component url="{{ url('admin/feedback/testimonials/create') }}" text="New Testimonial" />
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
                                    <th>Name</th>
                                    <th>Email Address</th>
                                    <th>Message</th>
                                    <th>Approved</th>
                                    <th>Product</th>
                                    <th>Product SKU</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($testimonials as $key => $testimonial )
                                <tr>
                                    <td><input type="checkbox" class="checkboxall" value="{{ $testimonial->id }}"></td>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $testimonial->name }}</td>
                                    <td>{{ $testimonial->email }}</td>
                                    <td>{{ $testimonial->message }}</td>
                                    <td>{{ $testimonial->approved ? 'Yes' : 'No'}}</td>
                                    <td>{{ getproduct($testimonial->product_id)->title}}</td>
                                    <td>{{ getproduct($testimonial->product_id)->sku}}</td>
                                    <td><button type="button" data-id="{{ $testimonial->id }}" id="edit-testimonial-type"
                                            class="btn btn-primary testimonial-type-set"><i class="fa fa-pencil-square"
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
