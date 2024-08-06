<div class="modal fade" id="addCity" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New City</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cityForm" action="{{ url('/admin/location/cities/create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputPassword1">Country</label>
                        <select id="country" name="country_id" class="country-class form-control">
                            <option value="">Select an option</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>

                        <div id="state-name" class="state-class">
                            <label for="exampleInputPassword1">State</label>
                            <select id="state_id" name="state_id" class="state_id-class form-control">
                                <option value="">Please select a Country</option>
                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">City</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter City Name">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Zip Code</label>
                        <input type="text" class="form-control" name="zip_code" id="zip_code"
                            placeholder="Enter Zip Code">
                    </div>
                    <div class="form-check">
                        <input type="checkbox" checked class="form-check-input" name="is_active" value="1"
                            id="is_active">
                        <label class="form-check-label" for="is_active">Active</label>
                    </div>
                    <button id="submitForm" type="submit" class="btn btn-primary mt-3">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
