@extends('custom.master')


@section('content')
    <div id="smooth-content">

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-bg contact-bg">
        <div class="overlay-3"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb-title">
                        <h1>Contact Us</h1>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    

    <!-- Contact Section  -->
    <div class="contact-section section-padding pt-0">
        <div class="container">                        
            <div class="row mt-60">
                <div class="col-xl-5 col-lg-5">
                    <div class="contact-text">
                        <p>Have a question about our services or want to get started on you design project? We are here to help! Fill out the contact form below and one of our team members will get back to you within 24 hours. Alternatively, you can reach out to us via phone or email using the contact information provided below. We can't wait to hear from you!</p>
                    </div>
                </div>
                <div class="offset-xl-1 col-xl-6 offset-lg-1 col-lg-6">
                    <div class="subimit-form-wrap">
                        <div class="section-title">
                            <h2>Submit Form <span><i class="las la-arrow-right"></i></span></h2>
                        </div>
                       <form action="{{ route('contact.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Your Name" required>
    <input type="email" name="email" placeholder="Email" required>
    <input type="tel" name="phone" placeholder="Phone Number">
    <input type="text" name="degination" placeholder="Designation">
    <input type="text" name="subject" placeholder="Subject">
    <textarea name="message" cols="30" rows="10" placeholder="Message" required></textarea>
    <input type="submit" value="Submit">
</form>

                    </div>
                </div>
            </div>
          <div class="contact-info-wrap">
    <div class="row mt-60">
        <!-- Google Map -->
        <div class="col-xl-6">
            <div class="google-map">
                <iframe 
                    src="{{ $settings->loction_url ?? 'https://www.google.com/maps' }}" 
                    width="600" 
                    height="600" 
                    style="border:0;" 
                    allowfullscreen 
                    loading="lazy" 
                    referrerpolicy="no-referrer-when-downgrade">
                </iframe>        
            </div>
        </div>

        <!-- Contact Info -->
        <div class="col-xl-6">
            <div class="contact-info" style="justify-content: normal;">
                <div class="section-title">
                    <h2>Contact Info <span><i class="las la-arrow-right"></i></span></h2>
                </div>

                <div class="contact-info-inner">
                    <div class="single-contact-info">
                        <p>Email</p>
                        <h4>{{ $settings->email ?? 'info@example.com' }}</h4>
                    </div>
                    <div class="single-contact-info">
                        <p>Phone</p>
                        <h4>{{ $settings->phone ?? '(000) 000-0000' }}</h4>
                    </div>
                    <div class="single-contact-info">
                        <p>Address</p>
                        <h4>{{ $settings->address ?? 'No Address Available' }}</h4>
                    </div>  

                    <div class="social-area">
                        @if($settings->facebook_url)
                            <a href="{{ $settings->facebook_url }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        @endif
                        @if($settings->instagram_url)
                            <a href="{{ $settings->instagram_url }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        @endif
                        @if($settings->linkedin_url)
                            <a href="{{ $settings->linkedin_url }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        @endif
                        @if($settings->google_analytics_code)
                            <a href="{{ $settings->google_analytics_code }}" target="_blank"><i class="fab fa-google"></i></a>
                        @endif
                    </div>                          
                </div>
            </div>
        </div>
    </div>        
</div>
         
        </div>
    </div>
@endsection