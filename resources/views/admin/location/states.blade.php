@extends('admin.layouts.master')
@section('title')States @endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"></i> States</h1>
            <p>States</p>
        </div>
        <ul class="app-breadcrumb breadcrumb side">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addState">
                Add New State
            </button>
            @include('admin.location.locationModals.statemodal')
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
                                    <th>Code</th>
                                    <th>Country</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($states as $key => $state)
                                    <tr>
                                        <td>{{ $key + 1 }}</td>
                                        <td>{{ $state->name }}</td>
                                        <td>{{ $state->code }}</td>
                                        <td>{{ getCountry($state->country_id)->name }}</td>
                                        <td>{{ $state->is_active ? 'Active' : 'Inactive' }}</td>
                                        <td><button type="button" data-id="{{ $state->id }}" id="edit-state"
                                                class="btn btn-primary state-set"><i class="fa fa-pencil-square"
                                                    aria-hidden="true"></i></button>
                                            <a class="delete"
                                                href="{{ url('admin/location/state/delete') }}/{{ $state->id }}"
                                                data-confirm="Are you sure to delete this item? Please note cities associated with this will also be deleted."><i
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
    @include('admin.location.locationModals.editstatesmodal')

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
        $(".submit-form").click(function(e) {
            e.preventDefault();
            var country_id = $("edit-#country").val();
            var name = $("#edit-name").val();
            var code = $("#edit-code").val();
            if (country_id != "" && name != "" && code != "") {
                $("#edit-stateForm").submit();
            } else {
                alert("Please input required fields");
            }
        });
    </script>
    <script>
        $(".state-set").click(function(event) {
            event.preventDefault();
            var stateIdVal = $(this).data('id');
            var userURL = "state/info/" + stateIdVal;
            $.ajax({
                url: userURL,
                type: 'GET',
                dataType: 'json',
                success: function(result) {
                    console.log(result);
                    if (result.status === 'success') {
                        $("#edit-name").val(result.data.name);
                        $("#edit-code").val(result.data.code);
                        $('#edit-country').val(result.data.country_id);
                        $("#edit-stateId").val(result.data.id);
                        $('#editState').modal('show');
                    }
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                    // Handle error response here
                }

            });

        });
    </script>
@stop
