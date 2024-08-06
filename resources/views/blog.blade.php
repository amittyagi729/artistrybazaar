@extends('layouts.app', ['body_class' => 'home-page'])
@section('title') Blogs - Trends and Inspiration for Handicraft - ArtistryBazaar Inc. @stop
@section('meta_description') Read useful insights on Handicraft and artisanal products. Discover trends, tips, and inspiration for your creative journey of décor accessories. Learn More! @stop
@section('meta_keywords') Blogs @stop

@section('content')
<main class="container py-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="path_to_your_image1.jpg" alt="Blog Post 1" class="card-img-top img-fluid" style="height: 300px;">
                <div class="card-body">
                    <h2 class="card-title">Blog Post Title 1</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius libero, id ultricies eros elementum sit amet.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="path_to_your_image2.jpg" alt="Blog Post 2" class="card-img-top img-fluid" style="height: 300px;">
                <div class="card-body">
                    <h2 class="card-title">Blog Post Title 2</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius libero, id ultricies eros elementum sit amet.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="path_to_your_image3.jpg" alt="Blog Post 3" class="card-img-top img-fluid" style="height: 300px;">
                <div class="card-body">
                    <h2 class="card-title">Blog Post Title 3</h2>
                    <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius libero, id ultricies eros elementum sit amet.</p>
                    <a href="#" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Add more blog posts as needed -->
</main>
@endsection