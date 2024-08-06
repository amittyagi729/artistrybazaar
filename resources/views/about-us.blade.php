@extends('layouts.app', ['body_class' => 'home-page'])
@section('title') JskCraft @stop
@section('meta_description') JskCraft @stop
@section('meta_keywords') JskCraft @stop

@section('content')
<main class="container py-5">
    <h1 class="text-center mb-4">Our Team</h1>
    <div class="row">
        <div class="col-md-6">
            <div class="team-member d-flex align-items-center mb-4">
                <img src="path_to_your_image.jpg" alt="Team Member 1" class="rounded-circle me-3" style="width: 100px; height: 100px;">
                <div class="info">
                    <h2>John Doe</h2>
                    <p>Co-Founder & CEO</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius libero, id ultricies eros elementum sit amet.</p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="team-member d-flex align-items-center mb-4">
                <img src="path_to_your_image.jpg" alt="Team Member 2" class="rounded-circle me-3" style="width: 100px; height: 100px;">
                <div class="info">
                    <h2>Jane Smith</h2>
                    <p>Co-Founder & CTO</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed euismod varius libero, id ultricies eros elementum sit amet.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Add more team members as needed -->
</main>
@endsection