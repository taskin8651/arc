@extends('custom.master')

@section('content')
    
    <div id="smooth-content">


    <!-- Breadcrumb Area -->
    <div class="breadcrumb-bg service-bg">
        <div class="overlay-3"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb-title">
                        <h1>Our Services</h1>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Service Section  -->
    <div class="service-section section-padding">
        <div class="container">            
            <div class="row">
            
                 @forelse($services as $service)
                <div class="col-xl-4 col-lg-4 col-md-6">
                    <div class="single-service-wrap">
                        <div class="service-icon">
                            @if($service->image)
                                    <img src="{{ $service->image->url }}" 
                                         alt="{{ $service->title }}" 
                                         class="img-fluid" 
                                         style="width: 100%; height: 180px;">
                                @else
                                    <i class="flaticon-architecture fs-1 text-primary"></i>
                                @endif                          
                        </div>
                        <h4 class="service-title">{{ $service->title }}</h4>
                        <p class="service-content">{{ $service->short_description }} </p>
                    </div>
                </div>
                 @empty
                    <div class="col-12 text-center py-5">
                        <h5>No active services found.</h5>
                    </div>
                @endforelse
                
              
            </div>
        </div>
    </div>

    <!-- Feature Line -->
    <div class="feature_wrap">
        <div class="feature_item_one" data-background="assets/img/feature-bg.jpg">
            <h5>Construction Project</h5>
            <h5>Interior Design</h5>
            <h5>Concept Drawings</h5>
            <h5>Building Venture</h5>
        </div>
    </div>
    
    <!-- Feature Section -->
    <div class="feature-section section-padding pb-90">
        <div class="container">
            <div class="row gx-5">
                <div class="col-xl-5 col-lg-4">
                    <div class="section-title">
                        <h6>Core Feature</h6>
                        <h2>Building The Future</h2>                        
                    </div>
                </div>
                <div class="col-xl-7 col-lg-8">
                    <div class="row gx-5 gy-5 feature-wrap">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay=".2s">
                            <div class="single-feature-item">
                                <div class="single-feat-inner">
                                    <div class="icon-wrap">
                                        <i class="flaticon-architecture"></i>
                                    </div>
                                    <div class="service-title">
                                        <h4>Schematic</h4>
                                    </div>                        
                                </div>
                                <p>In dignissim libero et tincidunt congue. Mauris sed tellus lectus. Duis at consect Lorem, ipsum dolor. quam. </p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay=".4s">
                            <div class="single-feature-item">
                                <div class="single-feat-inner">
                                    <div class="icon-wrap">
                                        <i class="flaticon-home"></i>
                                    </div>
                                    <div class="service-title">
                                        <h4>Concept</h4>
                                    </div>                        
                                </div>
                                <p>In dignissim libero et tincidunt congue. Mauris sed tellus lectus. Duis at consect Lorem, ipsum dolor. quam. </p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay=".6s">
                            <div class="single-feature-item">
                                <div class="single-feat-inner">
                                    <div class="icon-wrap">
                                        <i class="flaticon-floor-plan"></i>
                                    </div>
                                    <div class="service-title">
                                        <h4>Floor Planning</h4>
                                    </div>                        
                                </div>
                                <p>In dignissim libero et tincidunt congue. Mauris sed tellus lectus. Duis at consect Lorem, ipsum dolor. quam. </p>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 wow fadeInUp animated" data-wow-delay=".8s">
                            <div class="single-feature-item">
                                <div class="single-feat-inner">
                                    <div class="icon-wrap">
                                        <i class="flaticon-sketch"></i>
                                    </div>
                                    <div class="service-title">
                                        <h4>Landscape</h4>
                                    </div>                        
                                </div>
                                <p>In dignissim libero et tincidunt congue. Mauris sed tellus lectus. Duis at consect Lorem, ipsum dolor. quam.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Award Section  -->
    <!-- <div class="award-section section-padding pt-0">
        <div class="container">
            <div class="award-wrap">
                <div class="row mt-30 mb-30">
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-award-item">
                            <div class="award-icon">
                                <i class="las la-arrow-right"></i>
                            </div>
                            <div class="award-info">
                                <p>2024</p>
                                <h3>AIA Award</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-award-item">
                            <div class="award-icon">
                                <i class="las la-arrow-right"></i>
                            </div>
                            <div class="award-info">
                                <p>2022</p>
                                <h3>ASID Award</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="single-award-item">
                            <div class="award-icon">
                                <i class="las la-arrow-right"></i>
                            </div>
                            <div class="award-info">
                                <p>2000</p>
                                <h3>Leed Gold Certify</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Process Section -->
     <div class="process-section section-padding pt-0">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4">
                    <div class="section-title">
                        <div>
                            <h6>How We Do</h6>
                            <h2>Our Process</h2>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row mt-40">
                <div class="process-wrapper owl-carousel">
                    <div class="single-process-item">
                        <div class="process-up">
                            <div class="process-num">
                                <span>01</span>
                            </div>
                            <div class="process-icon">
                                <i class="las la-dot-circle"></i>
                            </div>
                        </div>
                        <div class="process-down">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vitae in quam, sed neque ex necessitatibus ipsam, atque vel quod temporibus expedita.</p>
                            <h4>Initial Consultation</h4>
                        </div>
                    </div>
                    <div class="single-process-item">
                        <div class="process-up">
                            <div class="process-num">
                                <span>02</span>
                            </div>
                            <div class="process-icon">
                                <i class="las la-dot-circle"></i>
                            </div>
                        </div>
                        <div class="process-down">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vitae in quam, sed neque ex necessitatibus ipsam, atque vel quod temporibus expedita.</p>
                            <h4>Design Concept</h4>
                        </div>
                    </div>
                    <div class="single-process-item">
                        <div class="process-up">
                            <div class="process-num">
                                <span>03</span>
                            </div>
                            <div class="process-icon">
                                <i class="las la-dot-circle"></i>
                            </div>
                        </div>
                        <div class="process-down">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vitae in quam, sed neque ex necessitatibus ipsam, atque vel quod temporibus expedita.</p>
                            <h4>Construction</h4>
                        </div>
                    </div>
                    <div class="single-process-item">
                        <div class="process-up">
                            <div class="process-num">
                                <span>04</span>
                            </div>
                            <div class="process-icon">
                                <i class="las la-dot-circle"></i>
                            </div>
                        </div>
                        <div class="process-down">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vitae in quam, sed neque ex necessitatibus ipsam, atque vel quod temporibus expedita.</p>
                            <h4>Final Work-Through</h4>
                        </div>
                    </div>
                    <div class="single-process-item">
                        <div class="process-up">
                            <div class="process-num">
                                <span>05</span>
                            </div>
                            <div class="process-icon">
                                <i class="las la-dot-circle"></i>
                            </div>
                        </div>
                        <div class="process-down">
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, vitae in quam, sed neque ex necessitatibus ipsam, atque vel quod temporibus expedita.</p>
                            <h4>Follow Up</h4>
                        </div>
                    </div>
                </div>                
            </div>
        </div>
     </div>

    <!-- Testimonial Section -->
    <div id="testimonial-1" class="testimonial-section section-padding pt-0 pb-90">
        <div class="container">            
            <div class="row">
                <div class="testimonial-wrapper owl-carousel">
                    @foreach($testimonials as $testimonial)
                    <div class="single-testimonial-item">
                        <div class="testimonial-img-wrap">
                            <img src="{{$testimonial->photo->getUrl()}}" alt="">
                        </div>
                        <div class="testimonial-content-wrap">
                            <div class="testimonial-text">
                                <p>"{{$testimonial->review}}”</p>
                            </div>
                            <div class="testimonial-author">
                                <h6>{{$testimonial->client_name}}</h6>
                                <p>{{$testimonial->designation}}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    
                </div>

            </div>
        </div>
    </div>
@endsection