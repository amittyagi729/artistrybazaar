@extends('admin.layouts.master')
@section('title')Countries @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> Countries</h1>
            <p>Countries</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addCountry">
                Add New Country
            </button>
            @include('admin.location.locationModals.countriesmodal')
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
                                    <th>Name</th>
                                    <th>ISO Code</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countries as $key => $country)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $country->name }}</td>
                                        <td>{{ $country->iso_code }}</td>
                                        <td>{{ $country->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td><button type="button" data-id="{{ $country->id }}" id ="edit-country" class="btn btn-primary country-set"><i
                                                    class="fa fa-pencil-square" aria-hidden="true"></i></button>
                                            <a class="delete" href="{{ url('admin/location/country/delete') }}/{{ $country->id }}"
                                                data-confirm="Are you sure to delete this item? Please note states and cities associated with this will also be deleted."><i
                                                    class="fa fa-trash  text-danger ml-2"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Edit Country Model --}}
    @include('admin.location.locationModals.editcountriesmodal')

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
<script>
    $(".country-set").click(function(event){
        event.preventDefault();
        var countryIdVal = $(this).data('id');
        var userURL = "country/info/"+countryIdVal;
            $.ajax({
                url: userURL,
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    console.log(data);
        $("#edit-name").val(data.name);
        $("#edit-countryId").val(data.id);
        $("#edit-iso_code").val(data.iso_code);
        $('#editCountry').modal('show');
                }
            });
 
       });
        
       
</script>
@stop
