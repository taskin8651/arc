@extends('custom.master')

@section('content')
<div id="smooth-content">

    <!-- Breadcrumb Area -->
    <div class="breadcrumb-bg project-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="breadcrumb-title">
                        <h1>{{ $project->title }}</h1>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

 
    <!-- Project Details -->
    <div class="single-project-section pt-60 pb-60">
        <div class="container">
            <div class="row">
                <div class="project-details-wrapper">                    
                    <div class="row">
                        <!-- Left Content -->
                        <div class="col-xl-9">
                            <div class="project-details">
                                <h2>Project Overview</h2>
                                <p>{!! $project->description !!}</p>
                            </div>
                        </div>

                        <!-- Right Info -->
                        <div class="col-xl-3">
                            <div class="project-info-wrap">
                                @if($project->year)
                                    <div class="project-info">
                                        <h6>Year:</h6>
                                        <p>{{ $project->year }}</p>
                                    </div>
                                @endif
                                @if($project->client_name)
                                    <div class="project-info">
                                        <h6>Client:</h6>
                                        <p>{{ $project->client_name }}</p>
                                    </div>
                                @endif
                                @if(optional($project->category)->name)
                                    <div class="project-info">
                                        <h6>Category:</h6>
                                        <p>{{ $project->category->name }}</p>
                                    </div>
                                @endif
                                @if($project->location)
                                    <div class="project-info">
                                        <h6>Location:</h6>
                                        <p>{{ $project->location }}</p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Gallery Images -->
                    <div class="project-details-img mt-4">
                        <div class="row mt-30">
                           
                            @if($project->gallery_1)
                                <div class="col-xl-6 mb-4">
                                    <img src="{{ $project->gallery_1->url }}" alt="{{ $project->title }}" class="img-fluid rounded">
                                </div>
                            @endif

                            @if($project->gallery_2)
                                <div class="col-xl-6 mb-4">
                                    <img src="{{ $project->gallery_2->url }}" alt="{{ $project->title }}" class="img-fluid rounded">
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Counter Section -->
                    <div class="counter-section section-padding pt-60 pb-60">
                        <div class="container">
                            <div class="row gx-5">
                                @if($project->site_area)
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="single-counter-box highlights">
                                        <p class="counter-number">
                                            <span class="purecounter" data-purecounter-duration="1" data-purecounter-end="{{ $project->site_area }}">{{ $project->site_area }}</span>
                                        </p>
                                        <h6>Site Area</h6>
                                    </div>
                                </div>
                                @endif
                                
                                @if($project->project_space)
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="single-counter-box">
                                        <p class="counter-number">
                                            <span class="purecounter" data-purecounter-duration="1" data-purecounter-end="{{ $project->project_space }}">{{ $project->project_space }}</span>
                                        </p>
                                        <h6>Project Space</h6>
                                    </div>
                                </div>
                                @endif

                                @if($project->total_manpower)
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="single-counter-box">
                                        <p class="counter-number">
                                            <span class="purecounter" data-purecounter-duration="1" data-purecounter-end="{{ $project->total_manpower }}">{{ $project->total_manpower }}</span><span class="operator">+</span>
                                        </p>
                                        <h6>Total Manpower</h6>
                                    </div>
                                </div>
                                @endif

                                @if($project->estimate_cost)
                                <div class="col-lg-3 col-md-3 col-sm-6">
                                    <div class="single-counter-box">
                                        <p class="counter-number">
                                            <span class="purecounter" data-purecounter-duration="1" data-purecounter-end="{{ $project->estimate_cost }}">{{ $project->estimate_cost }}</span><span class="operator">$</span>
                                        </p>
                                        <h6>Estimate Cost</h6>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Design Concept -->
                    @if($project->short_description)
                        <h3>Design Concept</h3>
                        <p>{!! nl2br(e($project->short_description)) !!}</p>
                    @endif

                    <!-- Conclusion -->
                    @if($project->conclusion)
                        <h3>Conclusion</h3>
                        <p>{!! nl2br(e($project->conclusion)) !!}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
