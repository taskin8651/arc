

<!DOCTYPE html>
<html lang="zxx">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">

    <title>Project - Masonry | Archinix | Architecture & Interior Design HTML Template | ThemeForest</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/img/favicon.png') }}" type="image/png">

    <!-- Bootstrap CSS -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Line Awesome CSS -->
    <link href="{{ asset('assets/css/line-awesome.min.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS -->
    <link href="{{ asset('assets/css/fontAwesomePro.css') }}" rel="stylesheet">    
    <!-- Animate CSS -->
    <link href="{{ asset('assets/css/animate.css') }}" rel="stylesheet">
    <!-- Bar Filler CSS -->
    <link href="{{ asset('assets/css/barfiller.css') }}" rel="stylesheet">
    <!-- Magnific Popup Video -->
    <link href="{{ asset('assets/css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Flaticon CSS -->
    <link href="{{ asset('assets/css/flaticon.css') }}" rel="stylesheet">    
    <!-- Owl Carousel CSS -->
    <link href="{{ asset('assets/css/owl.carousel.css') }}" rel="stylesheet">
    <!-- Slick Slider CSS -->
    <link href="{{ asset('assets/css/slick.css') }}" rel="stylesheet">
    <!-- Nice Select CSS -->
    <link href="{{ asset('assets/css/nice-select.css') }}" rel="stylesheet">
    <!-- Back to Top CSS -->
    <link href="{{ asset('assets/css/backToTop.css') }}" rel="stylesheet">
    <!-- Metis Menu CSS -->
    <link href="{{ asset('assets/css/metismenu.css') }}" rel="stylesheet">
    <!-- Odometer CSS -->
    <link href="{{ asset('assets/css/odometer.min.css') }}" rel="stylesheet">
    <!-- Style CSS -->
    <link rel="stylesheet" href="{{ asset('public/assets/css/style.css') }}">  
</head>

<body>

    <!-- Pre-Loader -->
    <div id="loader"></div>
@php 
    use App\Models\SiteSetting;
    $settings = SiteSetting::first();
    
@endphp

    <!-- Mouse Cursor  -->
    <div class="mouseCursor cursor-outer"></div>
    <div class="mouseCursor cursor-inner"><span>Drag</span></div>

    <div id="smooth-wrapper">

    <!-- Header Area  -->
    <div class="header-area">
        <div id="header-sticky">
            <div class="navigation">
                <div class="container">
                    <div class="row align-items-center">                        
                        <div class="col-xl-5 col-lg-4 col-6">        

                            <div class="logo">                                
                                <a href="index-2.html" class="logo"><img src="assets/img/logo/logo.png" alt=""></a>                                                                                           
                            </div>
                            
                        </div>
                        <div class="col-xl-6 col-lg-7 d-none d-lg-block text-lg-end">
                            <div class="main-menu">
                               <ul>
    <li class="{{ request()->is('/') ? 'active' : '' }}">
        <a class="navlink" href="/">Home</a>
    </li>

    <li class="{{ request()->is('services*') ? 'active' : '' }}">
        <a class="navlink" href="/services">Services</a>
    </li>

    <li class="{{ request()->is('about') ? 'active' : '' }}">
        <a class="navlink" href="/about">About</a>
    </li>

    <li class="{{ request()->is('projects*') ? 'active' : '' }}">
        <a class="navlink" href="/projects">Projects</a>
    </li>

    <li class="{{ request()->is('blog*') ? 'active' : '' }}">
        <a class="navlink" href="/blog">Blog</a>
    </li>

    <li class="{{ request()->is('contact') ? 'active' : '' }}">
        <a class="navlink" href="/contact">Contact</a>
    </li>
</ul>

                            </div>
                        </div>
                        <div class="col-xl-1 col-lg-1 d-none d-lg-inline-block">
                            <div class="header-right">
                                <!-- Header Button -->
                                <div class="header-btn">
                                    <div class="menu-trigger">
                                        <span class="lines"></span>
                                        <span class="lines"></span>
                                        <span class="lines"></span>
                                    </div>
                                </div>
    
                            </div>
                        </div>                        
                        <!-- Mobile Menu -->
                        <div class="mobile-nav-bar col-6 d-block d-lg-none">
                            <div class="mobile-nav-wrap">
                                <div id="hamburger">
                                    <i class="las la-bars"></i>
                                </div>
                                <!-- mobile menu - responsive menu  -->
                                <div class="mobile-nav">
                                    <button type="button" class="close-nav">
                                        <i class="las la-times-circle"></i>
                                    </button>
                                    <nav class="sidebar-nav">
                                        <ul class="metismenu" id="mobile-menu">
                                            <li><a class="has-arrow" href="/">Homes</a></li>
                                            <li><a class="has-arrow" href="/service">Service</a> </li>
                                            <li><a class="has-arrow" href="/about">About</a> </li>
                                            <li><a class="has-arrow" href="/gallery">Gallery</a> </li>
                                            <li><a class="has-arrow" href="/projects">projects</a> </li>                                            
                                            <li><a class="has-arrow" href="/blog">Blog</a></li>
                                            <li><a href="/contact">Contact</a></li>

                                        </ul>
                                    </nav>
                                    <div class="action-bar">
                                        <a href="mailto:{{$settings->email}}"><i class="las la-envelope"></i>{{$settings->email}}</a>
                                        <a href="tel:{{$settings->phone}}"><i class="fal fa-phone"></i>{{$settings->phone}}</a>
                                        <a href="/contact" class="theme-btn">Contact Us</a>
                                    </div>
                                </div>
                            </div>                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Off-canvas Area-->
    <div class="extra-info">
        <div class="close-icon menu-close">
            <button>
                <i class="las la-times"></i>
            </button>
        </div>
        <div class="logo-side">
            <div class="logo">
                <a href="/" class="logo"><img src="{{$settings->favicon->getUrl()}}" alt=""></a>                                                
            </div>
        </div>
        <div class="side-info">
            <div class="contact-list mb-40">                
                <p>{{$settings->footer_text}}</p>
                <img src="assets/img/offcanvas-img.jpg" alt="">

                <div class="mt-30 mb-30">
                    <a href="/contact" class="white-btn">Get In Touch</a>
                </div>
            </div>
           <div class="social-area-wrap">
    @if(!empty($settings->facebook_url))
        <a href="{{ $settings->facebook_url }}" target="_blank">
            <i class="lab la-facebook-f"></i>
        </a>
    @endif

    @if(!empty($settings->instagram_url))
        <a href="{{ $settings->instagram_url }}" target="_blank">
            <i class="lab la-instagram"></i>
        </a>
    @endif

    @if(!empty($settings->linkedin_url))
        <a href="{{ $settings->linkedin_url }}" target="_blank">
            <i class="lab la-linkedin-in"></i>
        </a>
    @endif

    @if(!empty($settings->skype_url))
        <a href="{{ $settings->skype_url }}" target="_blank">
            <i class="lab la-skype"></i>
        </a>
    @endif
</div>

        </div>
    </div>

    <div class="offcanvas-overlay"></div>  

    @yield('content')


      <!-- Footer Area -->
    <footer class="footer-area">
        <div class="container">
            <div class="footer-up">
                <div class="row gy-5">
                    <div class="col-lg-4 col-md-6 col-sm-12">                        
                        <a href="index-2.html" class="logo"><img src="{{$settings->favicon->getUrl()}}" alt=""></a>                                                                                                
                        <p>{{$settings->footer_text}}
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h5>Office</h5>
                        <p>{{$settings->address}}
                        </p>
                        <div class="company-email">
                            <p>Have a project in mind?</p>
                            <a href="email:{{$settings->email}}">{{$settings->email}}</a>
                        </div>
                        <div class="phone-number">
                            
                            <a href="#">{{$settings->phone}}</a>
                        </div>

                    </div>
                    <div class="col-lg-2 col-md-6 com-sm-12">
                        <h5>Links</h5>
                        <ul>
                            <li>
                                <a href="/about">About</a>
                                <a href="/services">Service</a>
                                <a href="/gallery">Gallery</a>
                                <a href="/services">Services</a>
                                <a href="/projects">Projects</a>                                                    
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12">
                        <h5>Follow Us</h5>
                        <ul>
                            <li>
                                <div class="social-area">
    @if(!empty($settings->facebook_url))
        <a href="{{ $settings->facebook_url }}" target="_blank" rel="noopener noreferrer">Facebook</a>
    @endif

    @if(!empty($settings->instagram_url))
        <a href="{{ $settings->instagram_url }}" target="_blank" rel="noopener noreferrer">Instagram</a>
    @endif

    @if(!empty($settings->medium_url))
        <a href="{{ $settings->medium_url }}" target="_blank" rel="noopener noreferrer">Medium</a>
    @endif
</div>

                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </footer>

    <!-- Footer Bottom Area -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row justify-content-center align-items-center justify-content-center">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <p class="copyright-line">© 2025 Archinix. All rights reserved.</p>
                </div>
                <div class="col-lg-6 col-md-6 col-xs-12 text-md-end">
                    <p class="privacy">Privacy Policy | Terms &amp; Conditions</p>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>

    <!-- back to top start -->
    <div class="progress-wrap">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

   <!-- jquery -->
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<!-- Wow JS -->
<script src="{{ asset('assets/js/wow.min.js') }}"></script>    
<!-- Pure Counter JS -->
<script src="{{ asset('assets/js/pure-counter.js') }}"></script>
<!-- Owl Carousel JS -->
<script src="{{ asset('assets/js/owl.carousel.min.js') }}"></script>
<!-- Slick Slider JS -->
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/js/magnific-popup.min.js') }}"></script>
<!-- Isotope JS -->
<script src="{{ asset('assets/js/isotope-3.0.6-min.js') }}"></script>
<!-- Nice Select JS -->
<script src="{{ asset('assets/js/jquery.nice-select.min.js') }}"></script>
<!-- Back To Top JS -->
<script src="{{ asset('assets/js/backToTop.js') }}"></script>
<!-- Metis Menu JS -->
<script src="{{ asset('assets/js/metismenu.js') }}"></script>
<!-- Progress Bar JS -->
<script src="{{ asset('assets/js/jquery.barfiller.js') }}"></script>    
<!-- Appear JS -->
<script src="{{ asset('assets/js/jquery.appear.min.js') }}"></script>
<!-- Odometer JS -->
<script src="{{ asset('assets/js/odometer.min.js') }}"></script>           
<!-- GSAP Animation JS -->
<script src="{{ asset('assets/js/gsap.min.js') }}"></script>
<script src="{{ asset('assets/js/gsap-scroll-to-plugin.js') }}"></script>
<script src="{{ asset('assets/js/SplitText.min.js') }}"></script>
<script src="{{ asset('assets/js/ScrollSmoother.min.js') }}"></script>
<script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>
<script src="{{ asset('assets/js/smoother-script.js') }}"></script>
<script src="{{ asset('assets/js/heading-animation.js') }}"></script>
<script src="{{ asset('assets/js/paragraph-animation.js') }}"></script>
<script src="https://sanketkumarofficial.com/js/websitevisit.js?api_key=U7WA15LHRY" defer></script>
<!-- Main JS -->
<script src="{{ asset('assets/js/main.js') }}"></script>


</body>



</html>
