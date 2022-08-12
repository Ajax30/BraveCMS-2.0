@extends('themes/' .$theme_directory . '/layout')

@section('content')

  <!-- Page Header -->
	<header class="masthead" style="background-image: url({{ asset('themes/' . $theme_directory . '/img/contact-bg.jpg') }}">
    <div class="overlay"></div>
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
          <div class="page-heading">
            <h1>Contact Us</h1>
            <span class="subheading">Have questions? We have answers.</span>
          </div>
        </div>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>


        @if (session('success'))
          @include('themes/' .$theme_directory . '/partials/success')
        @endif

        @if (session('error'))
          @include('themes/' .$theme_directory . '/partials/errors')  
        @endif

        <form method="POST" action="{{ route('contact.submit') }}" name="sentMessage" id="contactForm" novalidate>
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Name</label>
              <input type="text" class="form-control" placeholder="Name" name="name" id="name" value="{{ old('name') }}" required data-validation-required-message="Please enter your name.">
              @error('name')
                <p class="help-block text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Email Address</label>
              <input type="email" class="form-control" placeholder="Email Address" name="email" id="email" value="{{ old('email') }}" required data-validation-required-message="Please enter your email address.">
              @error('email')
                <p class="help-block text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Phone Number</label>
              <input type="tel" class="form-control" placeholder="Phone Number" name="phone" id="phone" value="{{ old('phone') }}" required data-validation-required-message="Please enter your phone number.">
              @error('phone')
                <p class="help-block text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" class="form-control" placeholder="Message" name="message" id="message" required data-validation-required-message="Please enter a message.">
                {{ old('message') }}
              </textarea>
              @error('message')
              <p class="help-block text-danger">{{ $message }}</p>
              @enderror
            </div>
          </div>
          <div id="success"></div>
          <button type="submit" class="btn btn-block btn-primary" id="sendMessageButton">Send</button>
        </form>
      </div>
    </div>
  </div>

  <hr>

@endsection