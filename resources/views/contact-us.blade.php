@extends('layouts.app', ['body_class' => 'home-page'])
@section('title') JskCraft @stop
@section('meta_description') JskCraft @stop
@section('meta_keywords') JskCraft @stop

@section('content')
<main class="container py-5">
    <h2 class="text-center mb-4">Contact Us</h2>
    <div class="row">
        <div class="col-md-5">
            <img src="path/to/big-image.jpg" class="img-fluid mb-4" alt="Big Image">
        </div><!-- Centering the form -->
                <div class="col-md-6">
                    <form>
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="subject">Subject</label>
                            <input type="text" class="form-control" id="subject" placeholder="Subject">
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea class="form-control" id="message" rows="5" placeholder="Your Message"></textarea>
                        </div>
                        <div class="text-center"> <!-- Centering the submit button -->
                            <button type="submit" class="btn btn-primary mt-3">Submit</button> <!-- Adding space above the submit button -->
                        </div>
                    </form>
                </div>
    </div>
</main>
@endsection