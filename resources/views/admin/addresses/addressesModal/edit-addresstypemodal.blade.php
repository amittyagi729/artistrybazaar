<div class="modal fade" id="editAddressType" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Address Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cityForm" action="{{ url('/admin/addresses/addresstypes/edit') }}" method="POST">
                    @csrf
                    <input type='hidden' name='addressTypeId' id="edit-addressTypeId">
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Address Type</label>
                        <input type="text" class="form-control" name="name" id="edit-name"
                            placeholder="Enter New Address Type" required>
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="is_active"
                            id="edit-is_active">
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
