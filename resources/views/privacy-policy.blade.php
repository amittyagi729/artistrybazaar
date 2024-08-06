@extends('layouts.app', ['body_class' => 'home-page'])
@section('title') JskCraft @stop
@section('meta_description') JskCraft @stop
@section('meta_keywords') JskCraft @stop

@section('content')
<main class="container py-5">
    <h2 class="text-center mb-4">Privacy Policy</h2>
    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-body">
                    <h3 class="card-title">Information Collection and Use</h3>
                    <p class="card-text">
                        We collect certain personal information when you visit our website or make a purchase. This information is used to process your orders, improve our services, and provide a personalized experience for our customers.
                    </p>
                    <p class="card-text">
                        Rest assured that your personal information is kept secure and will not be shared with third parties without your consent.
                    </p>
                </div>
            </div>
           
            <!-- Add more sections to your privacy policy as needed -->
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h3 class="card-title">Other Links</h3>
                    <ul class="list-group">
                        <li class="list-group-item"><a href="#">Terms of Service</a></li>
                        <li class="list-group-item"><a href="#">Refund Policy</a></li>
                        <li class="list-group-item"><a href="#">FAQs</a></li>
                        <!-- Add more links as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection