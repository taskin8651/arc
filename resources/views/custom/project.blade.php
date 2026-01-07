@extends('custom.master')

@section('content')
<div id="smooth-content">

    <!-- Breadcrumb -->
    <div class="breadcrumb-bg project-bg">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="breadcrumb-title">
                        <h1>Projects</h1>                        
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Projects -->
    <div class="project-section section-padding pt-60">
        <div class="container">            

            <!-- Category Filter -->
            <div class="row">
                <ul id="menu-filter" class="project-menu mb-0">
                    <li class="list-inline-item">
                        <a href="{{ route('custom.projects') }}" 
                           class="{{ !$categoryId ? 'active' : '' }}">Show All</a>
                    </li>
                    @foreach($categories as $cat)
                        <li class="list-inline-item">
                            <a href="{{ route('custom.projects', ['category_id' => $cat->id]) }}" 
                               class="{{ $categoryId == $cat->id ? 'active' : '' }}">
                                {{ $cat->name }} <span>({{ $cat->projects_count }})</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

            <!-- Projects Grid -->
            <div class="row mt-30">
                @forelse($projects as $project)
                    <div class="col-lg-4 col-md-6 col-sm-6 mb-4">
                        <a href="{{ route('projects.show', $project->slug) }}" class="img-zoom">
                            <div class="project-box">
                                <div class="project-img">
                                    @if($project->gallery)
                                        <img src="{{ $project->gallery->url }}" 
                                             class="img-fluid mx-auto d-block" 
                                             alt="{{ $project->title }}">
                                    @else
                                        <img src="{{ asset('assets/img/placeholder.jpg') }}" 
                                             class="img-fluid mx-auto d-block" 
                                             alt="{{ $project->title }}">
                                    @endif
                                </div>
                                <div class="project-detail">
                                    <h4 class="mb-0">{{ $project->title }}</h4>
                                    <p class="mb-3">{{ optional($project->category)->name }}</p>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <h5>No projects found.</h5>
                    </div>
                @endforelse
            </div>

        </div>
    </div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Restore normal link behavior for project category links
    document.querySelectorAll('#menu-filter a').forEach(link => {
        link.addEventListener('click', function(e) {
            // Allow normal navigation
            e.stopPropagation(); // Prevent other JS interference
            window.location.href = this.getAttribute('href');
        });
    });
});
</script>
@endsection

@push('scripts')

@endpush
