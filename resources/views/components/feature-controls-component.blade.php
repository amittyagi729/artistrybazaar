<div>
    <label for="checkAll">
        <input type="checkbox" id="ckbCheckAll" class="ml-2">
        Check all
    </label>
    <button class="delete-data "
        data-confirm="Are you sure to delete this item? Please note states and cities associated with this will also be deleted."><i
            class="fa fa-trash  text-danger ml-2 mr-2"></i>Delete
    </button>
    <button class="undo-data"
        data-confirm="Are you sure to delete this item? Please note states and cities associated with this will also be deleted."><i
            class="fa fa-undo  text-primary ml-2 mr-2"></i>Undo
    </button>
    <a class="export" href="{{ $exportUrl }}"><i
            class="fa fa-file-excel-o  text-success ml-2 mr-2"></i>Export
    </a>
</div>
