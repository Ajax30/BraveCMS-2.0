@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">{{ __('Dashboard') }}</div>

        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif  

            <div class="row g-4">
                {{-- Total Articles --}}
                <div class="col-md-4">
                    <div class="card shadow-sm border rounded bg-white">
                        <div class="card-body text-center">
                            <h5 class="card-title text-primary">
                                <i class="fas fa-newspaper fa-lg me-2"></i>Articles
                            </h5>
                            <p class="display-6">{{ $articleCount ?? '0' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Total Views --}}
                <div class="col-md-4">
                    <div class="card shadow-sm border rounded bg-white">
                        <div class="card-body text-center">
                            <h5 class="card-title text-success">
                                <i class="fas fa-eye fa-lg me-2"></i>Views
                            </h5>
                            <p class="display-6">{{ $totalViews ?? '0' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Published Today --}}
                <div class="col-md-4">
                    <div class="card shadow-sm border rounded bg-white">
                        <div class="card-body text-center">
                            <h5 class="card-title text-warning">
                                <i class="fas fa-calendar-day fa-lg me-2"></i>Published Today
                            </h5>
                            <p class="display-6">{{ $publishedToday ?? '0' }}</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
