@extends('layouts.app', ['body_class' => 'home-page'])
@section('title') Blog @stop
@section('meta_description') Blog @stop
@section('meta_keywords') Blog @stop

@section('content')
<main class="container py-5">
    <div class="row">
        <div class="col-md-6">
            <img src="path/to/blog-image.jpg" class="img-fluid mb-4" alt="Blog Image">
        </div>
        <div class="col-md-6">
            <h2 class="mb-4">Blog Post Title</h2>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel metus et mauris gravida facilisis eget eget nulla. Sed faucibus magna id nisl placerat suscipit. Nulla facilisi. Donec euismod metus et efficitur sodales. Vestibulum finibus risus vel purus mollis fermentum. Aliquam dignissim nunc quis leo commodo, nec ullamcorper nulla varius. Nunc suscipit, quam ac venenatis consectetur, neque mauris blandit ex, in luctus nisl nulla euismod orci. Curabitur rhoncus turpis non nulla pellentesque, id fermentum est tristique. Ut ac purus vitae purus malesuada gravida. Curabitur venenatis odio in mi hendrerit, vitae suscipit velit vulputate.
            </p>
        </div>
    </div>
</main>
@endsection