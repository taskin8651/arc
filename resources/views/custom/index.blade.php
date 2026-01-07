  
@extends('custom.master')
@section('content')
    <div id="smooth-content">

    <!-- Hero Area -->
    <div id="home-2" class="homepage-slides owl-carousel">
        <div class="single-slide-item d-flex align-items-center" data-background="assets/img/slider/1.jpg">
            <div class="overlay-3"></div>                
            <div class="hero-area-content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-8 wow fadeInUp animated" data-wow-delay=".2s">
                            <div class="project-info-wrapper">
                                <div class="project-title">
                                    <h6>Feature Project / 2025</h6>
                                    <h1 class="text-white">Kaave Academy</h1>
                                </div>                                
                            </div>                                                            
                            <div class="project-slogan">
                                    <h3 class="text-white">Beyound Architecture. Creating Experience.</h3>
                            </div>                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide-item d-flex align-items-center" data-background="assets/img/slider/2.jpg">
            <div class="overlay-3"></div>                
            <div class="hero-area-content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-8 wow fadeInUp animated" data-wow-delay=".2s">
                            <div class="project-info-wrapper">
                                <div class="project-title">
                                    <h6>Feature Project / 2025</h6>
                                    <h1 class="text-white">Bungalow</h1>
                                </div>                                
                            </div>                                                            
                            <div class="project-slogan">
                                <h3 class="text-white">Beyound Architecture. Creating Experience.</h3>
                            </div>                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-slide-item d-flex align-items-center" data-background="assets/img/slider/3.jpg">
            <div class="overlay-3"></div>                     
            <div class="hero-area-content">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-8 wow fadeInUp animated" data-wow-delay=".2s">
                            <div class="project-info-wrapper">
                                <h6>Feature Project / 2025</h6>
                                <h1 class="text-white">Casa Palermo</h1>
                            </div>                                                            
                            <h3 class="text-white">Beyound Architecture. Creating Experience.</h3>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- About Section -->
    <div class="about-section gray-bg section-padding">
        <div class="container">            
            <div class="row">
                <div class="col-xl-5 col-lg-5 col-md-8">
                    <div class="section-title">
                        <h6 class="sub-title">Who we are</h6>
                        <h2>Meet The <br> Studio</h2>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7 col-md-7">
                    <div class="about-content-wrap">                                                        
                        <p class="p-xl wow tpfadeUp">Archinix is an award-winning modern architecture firm based in London. We specialize in contemporary design through our signature Natural Modern approach. We involves in many different disciplines including urban planning, landscape architecture, interior design, civil engineering, structural engineering.
                        </p>
                        <a class="link-text mt-30 wow tpfadeUp" href="/about">More About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Section  -->
    <div class="service-section section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7">
                    <div class="section-title">
                        <h6 class="sub-title">Our Services</h6>
                        <h2>Building The Future</h2>
                    </div>
                </div>
            </div>
           <div class="row">
    <div class="service-slider owl-carousel">
        @foreach ($services as $service)
            <div class="single-service-wrap">
                <div class="service-icon">
                    {{-- If you’re storing an image in media library --}}
                    @if($service->image)
                        <img src="{{ $service->image->url }}" alt="{{ $service->title }}" style="width:100%;height:180px;">
                    @else
                        {{-- Optional fallback icon --}}
                        <i class="flaticon-architecture"></i>
                    @endif
                </div>

                <h4 class="service-title">{{ $service->title }}</h4>

                <p class="service-content">
                    {{ Str::limit($service->short_description, 150) }}
                </p>

                {{-- Optional: "Read More" link --}}
                <!-- <a href="{{ route('services.show', $service->slug) }}" class="btn btn-sm btn-outline-primary mt-2">
                    Read More
                </a> -->
            </div>
        @endforeach
    </div>
</div>

        </div>
    </div>

    <!-- Scrolling text area  -->
    <div class="feature_slider_wrap border-top border-bottom pt-60 pb-60">
        <div class="feature_item">
            <h2><img src="assets/img/asterisk-dark.png" alt="feat-icon">Design for Sustainability</h2>            
            <h2 class="stroke"><img src="assets/img/asterisk-dark.png" alt="feat-icon">Innovative Design</h2>            
            <h2><img src="assets/img/asterisk-dark.png" alt="feat-icon">Experienced Team</h2>            
            <h2 class="stroke"><img src="assets/img/asterisk-dark.png" alt="feat-icon">Honesty & Integrity</h2>            
            <h2><img src="assets/img/asterisk-dark.png" alt="feat-icon">24/7 Accessibility</h2>            
            <h2 class="stroke"><img src="assets/img/asterisk-dark.png" alt="feat-icon">Quality Craftsmanship</h2>                        
        </div>        
    </div>

    <!-- Project Section -->
    <div id="project-2" class="project-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-7 col-md-9">
                    <div class="section-title">
                        <h6>Showcase</h6>
                        <h2>Featured work</h2>                    
                    </div>                    
                </div>
            </div>
        </div>
        <div class="container">
        <div class="project-slider owl-carousel">
    @foreach ($projects as $project)
        <div class="single-project-item bg-cover" 
             data-background="{{ $project->gallery ? $project->gallery->url : asset('assets/img/default.jpg') }}">
            <div class="project-inner">
                <a href="{{ route('projects.show', $project->slug) }}" class="project-icon">
                    <i class="las la-plus"></i>
                </a>
                <div class="hover-info">
                    <h4>
                        {{ $project->title }}
                        <span>{{ $project->category->name ?? '' }}</span>
                    </h4>
                </div>
            </div>
        </div>
    @endforeach
</div>

        </div>
    </div>

    <!-- Process Section -->
    <div id="process-2" class="process-section section-padding pt-0 pb-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-5 col-lg-5">
                    <div class="section-title">
                        <h6>The Process</h6>
                        <h2>We Build with Integrity</h2>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-7">
                    <div class="row mt-40">
                        <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay=".2s">
                            <div class="single-process-wrap">
                                <div class="process-num">
                                    <span>01</span>
                                </div>
                                <h4>Concept <br>Design_</h4>
                                <p>Interior Design is the art and science of enhancing the interiors, sometimes including exterior, of a course</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay=".4s">
                            <div class="single-process-wrap">
                                <div class="process-num">
                                    <span>02</span>
                                </div>
                                <h4>Schematic <br>Design_</h4>
                                <p>Interior Design is the art and science of enhancing the interiors, sometimes including exterior, of a course</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay=".6s">
                            <div class="single-process-wrap">
                                <div class="process-num">
                                    <span>03</span>
                                </div>
                                <h4>Construction <br>Drawings_</h4>
                                <p>Interior Design is the art and science of enhancing the interiors, sometimes including exterior, of a course</p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 wow fadeInUp animated" data-wow-delay=".8s">
                            <div class="single-process-wrap">
                                <div class="process-num">
                                    <span>04</span>
                                </div>
                                <h4>Project <br>Administration_</h4>
                                <p>Interior Design is the art and science of enhancing the interiors, sometimes including exterior, of a course</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Video Section  -->
    <div class="video-section">
        <div class="overlay"></div>
        <div class="video-inner-box">            
            <div class="play-btn">
                <a href="https://www.youtube.com/watch?v=uySn1BZiWWs" class="video-play-btn mfp-iframe"><i class="fa-solid fa-play"></i></a>
            </div>           
        </div>        
    </div>   
    
    <!-- Team Section -->
<div id="team-2" class="team-section gray-bg section-padding pb-70">
    <div class="container">

        <!-- Section Title -->
        <div class="row mb-50">
            <div class="col-xl-6 col-lg-6">
                <div class="section-title">
                    <h6>The Team</h6>
                    <h2>Meet Our Professionals</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @forelse($teamMembers as $member)
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".2s">
                    <div class="single-team-item">
                        <div class="team-img">
                            <img src="{{ $member->photo->url ?? asset('assets/img/team/placeholder.jpg') }}" alt="{{ $member->name }}">
                        </div>
                        <div class="team-info">
                            <h5>{{ $member->name }}</h5>
                            <hr>
                            <p>[{{ $member->designation ?? 'Position not specified' }}]</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <h5>No team members found.</h5>
                </div>
            @endforelse
        </div>

    </div>
</div>

    <!-- Testimonial Section  -->
    <div id="testimonial-2" class="testimonial-section section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-10 col-lg-10 text-center">
                    <div class="section-title">
                        <h6>Testimonial</h6>
                        <h2>Our Clients Saying</h2>
                    </div>
                </div>                
            </div>
         <div class="row mt-40">
    <div class="testimonial-carousel owl-carousel">
        @foreach ($testimonials as $testimonial)
            <div class="single-testimonial-item">
                <div class="testimonial-img mb-30">
                    @if($testimonial->photo)
                        <img src="{{ $testimonial->photo->url }}" alt="{{ $testimonial->client_name }}">
                    @else
                        <img src="{{ asset('assets/img/default-avatar.jpg') }}" alt="Default">
                    @endif
                </div>

                <p>“{{ $testimonial->review }}”</p>

                <div class="separator"></div>

                <div class="testimonial-author">
                    <h6>{{ $testimonial->client_name }}</h6>
                    <p>{{ $testimonial->designation }}</p>
                </div>
            </div>
        @endforeach
    </div>
</div>

        </div>
    </div>

    <!-- CTA Area  -->
    <section class="cta-img-area img-scale" data-background="assets/img/cta-bg-2.jpg">
        <div class="overlay-3"></div>
        <div class="cta-inner text-center">            
            <div class="section-title">
                <div class="heading-animation">
                    <h2 class="text-white">The best builds start <br> before the build</h2>
                </div>
                <a href="/contact" class="theme-btn white-btn mt-30">Contact Us</a>
            </div>            
        </div>
    </section>

    <!-- Blog Section -->
    <div class="blog-section section-padding pb-70">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-8">
                    <div class="section-title">
                        <h6>Read Articles</h6>
                        <h2>Latest Post</h2>
                    </div>
                </div>
                
            </div>
          <div class="row mt-40">
    @foreach ($blogPosts as $post)
        <div class="col-xl-4 col-lg-4 col-md-6 col-12 wow fadeInUp animated" data-wow-delay="200ms">
            <div class="single-blog-item">
                <div class="blog-bg">
                    @if($post->gallary)
                        <img src="{{ $post->gallary->url }}" alt="{{ $post->title }}">
                    @else
                        <img src="{{ asset('assets/img/blog/default.jpg') }}" alt="Blog Image">
                    @endif
                </div>

                <div class="blog-content">
                    <div class="blog-meta">
                        <p>
                            {{ $post->created_at->format('F d, Y') }}
                        </p>
                    </div>

                    <h3>
                        <a href="{{ route('blog.show', $post->slug) }}">
                            {!! nl2br(e(Str::limit($post->title, 60))) !!}
                        </a>
                    </h3>

                    <div class="blog-info">
                        <div class="blog-author">
                            <p>by Admin</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
        
        </div>
     </div>

   @endsection