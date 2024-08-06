@extends('admin.layouts.master')
@section('title') {{ $title = "Create Shipping Methods" }} @endsection
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fa fa-th-list"> {{ $title }}</i></h1>
        <p>{{ $title }}</p>
    </div>
    <ul class="app-breadcrumb breadcrumb">
        <div class="tile-footer">
           <a href="{{ url()->previous() }}" class="btn btn-danger">Back</a>
        </div>
     </ul>
</div>
<form action="{{ url('/admin/shipping/method/store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="description">Description:</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="rate">Rate:</label>
                <input type="number" name="rate" id="rate" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="duration">Duration:</label>
                <input type="text" name="duration" id="duration" class="form-control">
            </div>

            <div class="form-group">
                <label for="minimum_order_value">Minimum Order Value:</label>
                <input type="number" name="minimum_order_value" id="minimum_order_value" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="maximum_order_value">Maximum Order Value:</label>
                <input type="number" name="maximum_order_value" id="maximum_order_value" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="handling_fee">Handling Fee:</label>
                <input type="number" name="handling_fee" id="handling_fee" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="has_insurance">Has Insurance:</label>
                <input type="checkbox" name="has_insurance" id="has_insurance" value="1">
            </div>

            <div class="form-group">
                <label for="tracking_url">Tracking URL:</label>
                <input type="checkbox" name="tracking_url" id="tracking_url" value="1">
            </div>

            <div class="form-group">
                <label for="is_active">Is Active:</label>
                <input type="checkbox" name="is_active" id="is_active" value="1" checked>
            </div>

        </div>

        <div class="col-md-6">
           

            

            <div class="form-group">
                <label for="weight_limit">Weight Limit:</label>
                <input type="number" name="weight_limit" id="weight_limit" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="max_length">Max Length:</label>
                <input type="number" name="max_length" id="max_length" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="max_width">Max Width:</label>
                <input type="number" name="max_width" id="max_width" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="max_height">Max Height:</label>
                <input type="number" name="max_height" id="max_height" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="min_delivery_days">Min Delivery Days:</label>
                <input type="number" name="min_delivery_days" id="min_delivery_days" class="form-control">
            </div>

            <div class="form-group">
                <label for="max_delivery_days">Max Delivery Days:</label>
                <input type="number" name="max_delivery_days" id="max_delivery_days" class="form-control">
            </div>

            <div class="form-group">
                <label for="additional_fees">Additional Fees:</label>
                <input type="number" name="additional_fees" id="additional_fees" class="form-control" step="0.01">
            </div>

            <div class="form-group">
                <label for="priority">Priority:</label>
                <input type="text" name="priority" id="priority" class="form-control">
            </div>
            
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create</button>
    </div>
</form>

@endsection