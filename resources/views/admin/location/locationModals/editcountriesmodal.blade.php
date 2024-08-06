<div class="modal fade" id="editCountry" tabindex="-1" role="dialog" aria-labelledby="editCountry" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Country</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ url('/admin/location/country/edit') }}" method="POST">
                @csrf
                <input type='hidden' name='countryId' id="edit-countryId">
                <div class="form-group">
                  <label for="exampleInputEmail1">Country Name</label>
                  <input type="text" class="form-control" name="name" id="edit-name" placeholder="Enter Country Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputPassword1">ISO Code</label>
                  <input type="text" class="form-control" name="iso_code" id="edit-iso_code" placeholder="Enter ISO Code" maxlength="3" required>
                </div>
                <div class="form-check">
                  <input type="checkbox" checked class="form-check-input" name="is_active" id="is_active">
                  <label class="form-check-label" for="is_active">Active</label>
                </div>
                <button type="submit" class="btn btn-primary mt-3">Submit</button>
              </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>