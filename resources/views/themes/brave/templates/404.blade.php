@extends('themes/' . $theme_directory . '/layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <main class="centered-content">
                    <div class="page-content">
                        <h1 class="text-center">{{ $title }}</h1>
                        <p class="text-center text-muted">{{ $subtitle }}</p>
                    </div>
                </main>
            </div>
        </div>
    </div>
@endsection
