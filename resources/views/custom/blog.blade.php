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
                        <h1>Blogs</h1>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    
    <!-- Blog Page -->
    <div id="blog_page" class="hero-area">
        <div class="container">                   
            <div class="row mt-40">
                @forelse($blogs as $blog)
                <div class="col-xl-4 col-lg-4 col-md-6 col-12">
                    <div class="single-blog-item mt-30">
                        <div class="blog-bg">
                            @if($blog->gallary)
                                <img src="{{ $blog->gallary->url }}" alt="{{ $blog->title }}">
                            @else
                                <img src="{{ asset('assets/img/placeholder.jpg') }}" alt="{{ $blog->title }}">
                            @endif
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <p>{{ $blog->slug ?? 'General' }}</p>
                            </div>
                            <h3>
                                <a href="{{ route('blog.show', $blog->id) }}">
                                    {{ \Illuminate\Support\Str::limit($blog->title, 50) }}
                                </a>
                            </h3>
                            <div class="blog-info">
                                <div class="blog-author">
                                    <p>by {{ $blog->author_name ?? 'Admin' }}</p>
                                </div>
                                <div class="blog-date">
                                    <p>{{ $blog->created_at->format('F d, Y') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12 text-center py-5">
                    <h5>No blogs found.</h5>
                </div>
                @endforelse
            </div>

            <!-- Pagination -->
            <div class="row mt-40">
                <div class="col-12">
                    {{ $blogs->links('vendor.pagination.custom') }} <!-- Use a custom Tailwind/Bootstrap pagination view if needed -->
                </div>
            </div>
        </div>                
    </div>

@endsection
