@extends('themes/' . $theme_directory . '/layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7 mx-auto">
                <main class="content rounded mt-4">
                    <h3>Contact us</h3>

                    @if (session('success'))
                        @include('themes/' . $theme_directory . '/partials/success')
                    @endif

                    <form method="post" action="{{ route('contact.submit') }}" id="contactForm" class="contact-form"
                        accept-charset="utf-8" novalidate="novalidate">
                        @csrf

                        <div class="form-group @error('name') has-error @enderror">
                            <label for="name" class="form-label mb-0 fw-bold text-muted">Name</label>
                            <input type="text" value="{{ old('name') }}" name="name" id="name" class="form-control"
                                placeholder="e. g. John Smith">
                            @error('name')
                                <p class="invalid-feedback" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group @error('email') has-error @enderror">
                            <label for="email" class="form-label mb-0 fw-bold text-muted">Email</label>
                            <input type="email" value="{{ old('email') }}" name="email" id="email" class="form-control"
                                placeholder="e. g. john.smith@gmail.com">
                            @error('email')
                                <p class="invalid-feedback" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group @error('phone') has-error @enderror">
                            <label for="phone" class="form-label mb-0 fw-bold text-muted">Phone Number</label>
                            <input type="text" value="{{ old('phone') }}" name="phone" id="phone" class="form-control"
                                placeholder="Use digits only">
                            @error('phone')
                                <p class="invalid-feedback" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group @error('message') has-error @enderror">
                            <label for="message" class="form-label mb-0 fw-bold text-muted">Message</label>
                            <textarea name="message" id="message" cols="30" rows="5" class="form-control"
                                placeholder="Your message in plain text">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="invalid-feedback" role="alert">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <input type="submit" value="Send" class="btn btn-md btn-success w-100">
                        </div>
                    </form>
                </main>
            </div>
        </div>
    </div>
@endsection
