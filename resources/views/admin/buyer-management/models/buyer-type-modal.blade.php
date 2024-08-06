<div class="modal fade" id="new-type" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Buyer Type</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                    <form id="titleForm" action="{{ url('/admin/buyer/manage/type/store') }}" method="POST">
                        @csrf
                    
                        <div class="form-group">
                            <label for="name">Name:</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="max_users">Max Users:</label>
                            <input type="number" name="max_users" id="max_users" class="form-control" required>
                        </div>
                    
                        <div class="form-group">
                            <label for="buyer_flag">Buyer Flag:</label>
                            <input type="text" name="buyer_flag" id="buyer_flag" class="form-control">
                        </div>
                    
                        <div class="form-group">
                            <label for="display_order">Display Order:</label>
                            <input type="number" name="display_order" id="display_order" class="form-control">
                        </div>
                    
                        <div class="form-check">
                            <input type="checkbox" checked class="form-check-input" name="is_active" value="1"
                                id="is_active">
                            <label class="form-check-label" for="is_active">Active</label>
                        </div>
                    
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary mt-2">Create</button>
                        </div>
                    </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
