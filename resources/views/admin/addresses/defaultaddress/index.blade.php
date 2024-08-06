@extends('admin.layouts.master')
@section('title')Default Addresses @endsection
@section('content')
<div class="app-title">
    <div>
      <h1><i class="fa fa-th-list"></i> Default Addresses</h1>
      <p>Default Addresses</p>
    </div>
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
                   <th>User</th>
                    <th>Street Address</th>
                    <th>Address Line1</th>
                    <th>Address Line2</th>
                    <th>City</th>
                     <th>Region</th>
                     <th>Zip Code</th>
                     <th>Country</th>
                     <th>Address Type</th>
                     <th>Status</th>
                     <th>Action</th>
                </tr>
              </thead>
              <tbody>
               
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('footer_scripts')
<script>
$(document).ready(function() {
    $('#productTable').DataTable( {
    "lengthMenu": [
            [25, 50, 75, -1],
            [25, 50, 75, 'All'],
        ],
    });
});
</script>
@stop