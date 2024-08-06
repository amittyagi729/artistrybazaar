@extends('layouts.app', ['body_class' => 'home-page'])
@section('title'){{ $indexableData->title ?? null }} @stop
@section('meta_description') {{ $indexableData->description ?? null }} @stop
@section('meta_keywords') Blogs @stop

@section('content')

    <style>
        body {
            font-family: var(--font-primary);
        }

        .cover-image {
            width: 100%;
            max-height: 500px;
            /* Set the maximum height for the cover image */
            object-fit: cover;
            /* Make sure the image covers the container */
        }

        .post-content {
            font-size: 15px;
            line-height: 1.6;
            margin-top: 20px;
            font-family: var(--font-primary);
        }

        .bload-main {
            margin-top: 50px !important;
            font-size: 1.7rem !important;
        }

        .author {
            color: #ca4f4f;
            /* Red color for the author's name */
            font-family: var(--font-primary);
            /* Replace 'AwesomeFont' with your desired font */
        }
    </style>

    <main class="container blogmain-sec">
        <article class="p-3">
            <h1 class="bload-main bloghead">{{ $post->title ?? null }}</h1>
            <p>{{ date('F j, Y', strtotime($post->post_date ?? null)) }}</p>
            <img src="{{ $post->attachment()->orderBy('ID', 'desc')->first()->guid ?? null }}" alt="Blog Post Cover"
                class="cover-image">
            <div class="post-content" style="text-align: justify">
                {!! $post->content ?? null !!}
            </div>
        </article>
    </main>
@endsection
