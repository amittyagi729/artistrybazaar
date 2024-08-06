@extends('admin.layouts.master')
@section('title')
    {{ $title = 'Shipment Tracking' }}
@endsection
@section('content')
    <div class="app-title">
        <div>
            <h1><i class="fa fa-th-list"> {{ $title }}</i></h1>
            <p>{{ $title }}</p>
        </div>
        <x-add-entity-button-component url="{{ url('/admin/shipping/method/create') }}" text="New Shipping Method" />
    </div>
    <div class="row">
        <div class="col-md-6">
            <form action="{{ url('/') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="po_id">PO ID:</label>
                    <input type="text" name="po_id" id="po_id" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="product_id">Product ID:</label>
                    <input type="text" name="product_id" id="product_id" class="form-control">
                </div>

                <div class="form-group">
                    <label for="quantity_shipped">Quantity Shipped:</label>
                    <input type="number" name="quantity_shipped" id="quantity_shipped" class="form-control" step="0.01">
                </div>

                <div class="form-group">
                    <label for="shipment_date">Shipment Date:</label>
                    <input type="date" name="shipment_date" id="shipment_date" class="form-control">
                </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="shipment_agency">Shipment Agency:</label>
                <input type="text" name="shipment_agency" id="shipment_agency" class="form-control">
            </div>

            <div class="form-group">
                <label for="tracking_number">Tracking Number:</label>
                <input type="text" name="tracking_number" id="tracking_number" class="form-control">
            </div>

            <div class="form-group">
                <label for="shipping_date">Shipping Date:</label>
                <input type="datetime-local" name="shipping_date" id="shipping_date" class="form-control">
            </div>

            <div class="form-group">
                <label for="payment_received">Payment Received:</label>
                <input type="text" name="payment_received" id="payment_received" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="payment_history_id">Payment History ID:</label>
                <input type="text" name="payment_history_id" id="payment_history_id" class="form-control">
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create</button>
            </div>
            </form>
        </div>
    </div>
@endsection
