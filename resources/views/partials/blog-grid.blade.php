@foreach ($posts as $post)
    <div class="col-md-4">
        <div class="card pb-2 shadow-none home-blog-card">
            <a target="_blank" href="http://blog.artistrybazaar.com/{{ $post->post_name }}">
                <div class="bg-image sellerproduct rounded-0" data-mdb-ripple-color="light">
                    <img width="454" height="385"
                        src="{{ $post->attachment()->orderBy('ID', 'desc')->first()->guid ?? null }}" alt=""
                        class="w-100 object-cover" loading="lazy" />
                    <div class="hover-overlay">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </div>
                </div>
                <span class="category-p blog-date">{{ date('d M Y', strtotime(@$post->post_date)) }}</span>
            </a>
            <div class="card-body p-2 mt-5 text-center">
                <div class="text-reset sellertitle">
                    <a target="_blank" href="http://blog.artistrybazaar.com/{{ $post->post_name }}">
                        <h4 class="card-title fs-5 text-black">{{ Str::limit(@$post->title, '30') }}</h4>
                    </a>
                    <p class="card-text text-black">{!! Str::limit(strip_tags(@$post->content), '70') !!}</p>
                </div>
                <a target="_blank" href="http://blog.artistrybazaar.com/{{ $post->post_name }}"
                    class="btn btn-lg shadow-none text-black small-font p-0 mt-2 fw-semibold text-decoration-underline text-capitalize">Read
                    more <span class="d-none">details</span></a>
            </div>
        </div>
    </div>
@endforeach
