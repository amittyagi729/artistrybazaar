<div class="modal fade" id="new-revenue" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Annual Revenue</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="titleForm" action="{{ url('/admin/buyer/manage/revenue/store') }}" method="POST">
                    @csrf
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Revenue</label>
                        <input type="text" class="form-control" name="name" id="name"
                            placeholder="Enter New Title" required>
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
