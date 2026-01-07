@extends('custom.master')


@section('content')
    
    <div id="smooth-content">

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-bg team-bg">
        <div class="overlay-4"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="breadcrumb-title">
                        <h1>Our Gallery</h1>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

   

    <!-- Team Section -->
    <div id="team-2" class="team-section section-padding pb-30">
        <div class="container">
            <div class="row">
                
                
               
                       @forelse($galleries as $member)
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 wow fadeInUp" data-wow-delay=".2s">
                        <div class="single-team-item">
                            <div class="team-img">
                                @if($member->image_1)
                                    <img src="{{ $member->image_1->url }}" alt="{{ $member->name }}">
                                @else
                                    <img src="{{ asset('assets/img/team/placeholder.jpg') }}" alt="{{ $member->name }}">
                                @endif
                            </div>
                            <div class="team-info">
                                <h5>{{ $member->name }}</h5>
                                <hr>
                                <p>{!! $member->descrption ?? 'Position not specified' !!}</p>
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

@endsection