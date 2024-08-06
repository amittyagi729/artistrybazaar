@extends('layouts.app', ['body_class' => 'home-page'])
@section('title')  @stop
@section('meta_description')  @stop
@section('meta_keywords')  @stop

@section('content')
    <main class="container py-5">
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Order Cancellation:</h2>
                <p class="card-text">
                    To cancel your order, please contact our customer service team at +91-9041-08-8746 (9AM - 6PM) or send
                    an email to artistry.bazaar@gmail.com. If your order has already been shipped, please do not accept the
                    shipment and inform our customer service team accordingly. </p>
                <p class="card-text">
                    You will receive a shipment confirmation
                    email once your order has been dispatched.
                </p>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Returns Policy:</h2>
                <p class="card-text">
                    We accept returns under the following circumstances:</p>
                <p class="card-text"> If the delivered item is damaged.</p>
                <p class="card-text"> If the delivered item is incorrect.</p>
                <p class="card-text">If the customer has a valid reason for returning the product.</p>
                <p class="card-text">
                    Please note that the customer must bear the shipping charges for returning the product without a valid
                    reason.
                </p>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Damaged Items:</h2>
                <p class="card-text">
                    If you receive a damaged item, please contact us within 48 hours of receiving the package. Please make a
                    note of the damage on the courier's copy of the airway bill, and take a copy of the airway bill for your
                    records.</p>
                <p class="card-text"> Notify us immediately and send us images of the damaged item. We will discuss a
                    replacement, refund or credit with you. If you choose a replacement, please ship the item back to us in
                    its original packaging. Once we receive the returned item, we will send a replacement at no additional
                    cost. The cost of returning the damaged item will be borne by you initially, but we will refund this
                    cost once we confirm that the item was damaged in transit.</p>

            </div>
        </div>
        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Wrong Items:</h2>
                <p class="card-text">
                    If you receive an item that is not as per your order, please contact us within 48 hours of receiving the
                    package. Please provide us with your order number, invoice number, and the consignment number of the
                    courier's airway bill. We will discuss a replacement, refund or credit with you. If you choose a
                    replacement, please ship the item back to us in its original packaging. Once we receive the returned
                    item and confirm that it is in good condition, we will send you the originally ordered item at no
                    additional cost. The cost of returning the wrong item will be borne by you initially, but we will refund
                    this cost once we confirm that the item was not as per your order.</p>

            </div>
        </div>

        <div class="card mb-4">
            <div class="card-body">
                <h2 class="card-title">Refund Policy:</h2>
                <p class="card-text">
                    Refunds are processed within 15 days of ArtistryBazaar LLP receiving the returned goods. The refund will
                    be made through Net Banking, Debit Card or Credit Card, and will be transferred back into the bank
                    account from which the payment was made.
            </div>
        </div>
    </main>
@endsection
