@extends('custom.master')


@section('content')
    <div id="smooth-content">

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-bg blog-bg">
        <div class="overlay-4"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="breadcrumb-title">
                        <h1>Blogs Details</h1>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

   
   
    <!-- Blog Details Page -->
    <div class="blog-details-page">
        <div class="container">
            <div class="row gx-5 justify-content-around">
                <div class="col-xl-4 col-lg-4 order-2 order-lg-1">
                    <div class="mt-30">
                        <div class="search-bar-wrap d-flex">
                            <input type="search" placeholder="search">
                            <i class="fal fa-search"></i>
                        </div>
                      
                        <div class="latest-post-wrap mt-3">
                            <h5>Latest Post</h5>
                            @foreach($recentBlogs as $recent)
<div class="single-latest-post">
    <div class="latest-post-content">
        <div class="post-tag">
            <p>{{ $recent->slug ?? 'General' }}</p>
        </div>
        <div class="post-title">
            <h3>
                <a href="{{ route('blog.show', $recent->slug) }}">
                    {{ \Illuminate\Support\Str::limit($recent->title, 50) }}
                </a>
            </h3>
        </div>
        <div class="blog-info">
            <div class="blog-author">
                <p>by {{ $recent->author_name ?? 'Admin' }}</p>
            </div>
            <div class="blog-date">
                <p>{{ $recent->created_at->format('M d, Y') }}</p>
            </div>
        </div>
    </div>
</div>
@endforeach

                           </div>
                    </div>
                </div>
              <div class="col-xl-8 col-lg-8 order-1 order-lg-2 mt-30">
    <div class="section-title">
        <h2>{{ $blog->title }} <span><i class="las la-arrow-right"></i></span></h2>
    </div>
    <hr>
    <div class="blog-meta">
        <div class="blog-info">
            <span>{{ $blog->author_name ?? 'Admin' }}</span>
            <span>{{ $blog->created_at->format('F d, Y') }}</span>
        </div>
        <div class="blog-comments">
            <p>{{ $blog->slug ?? 0 }}</p>
        </div>
    </div>
    <div class="blog-featured-img mt-30">
        @if($blog->gallary)
            <img src="{{ $blog->gallary->url }}" alt="{{ $blog->title }}">
        @else
            <img src="{{ asset('assets/img/placeholder.jpg') }}" alt="{{ $blog->title }}">
        @endif
    </div>
     <div class="blog-content">
          <h3>{{$blog->title}}</h3>
    <div class="blog-content">
        {!! $blog->content !!}
    </div>
    </div>
    

    {{-- Related Images --}}
    <div class="blog-related-img mt-60">
        <div class="row">
            @if($blog->gallary_1)
            <div class="col-xl-4 col-lg-4 col-md-4 mb-30">
                <img src="{{ $blog->gallary_1->url }}" alt="">
            </div>
            @endif
            @if($blog->gallary_2)
            <div class="col-xl-4 col-lg-4 col-md-4 mb-30">
                <img src="{{ $blog->gallary_2->url }}" alt="">
            </div>
            @endif
            @if($blog->gallary_3)
            <div class="col-xl-4 col-lg-4 col-md-4 mb-30">
                <img src="{{ $blog->gallary_3->url }}" alt="">
            </div>
            @endif
        </div>
    </div>


    {{-- Quote --}}
    @if($blog->quotes)
    <div class="blog-quote-text mt-60">
        <div class="quote-sign">
            <img src="{{ asset('assets/img/straight-quotes.png') }}" alt="">
        </div>
        <h3>{{ $blog->quotes }}</h3>
    </div>
    @endif

   
</div>


            </div>
        </div>
    </div>
@endsection