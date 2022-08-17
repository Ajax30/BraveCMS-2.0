@extends('themes/' .$theme_directory . '/layout')

@section('content')

  <!-- content
    ================================================== -->
    <section class="s-content">

      <div class="row">
          <div class="column large-12">

              <article class="s-content__entry">

                  <div class="s-content__media">
                      <img src="{{ asset('themes/' . $theme_directory . '/images/contact.jpg') }}" alt="Get In Touch">
                  </div> <!-- end s-content__media -->

                  <div class="s-content__entry-header">
                      <h1 class="s-content__title">Get In Touch With Us.</h1>
                  </div> <!-- end s-content__entry-header -->

                  <div class="s-content__primary">

                      <div class="s-content__page-content">

                          <div class="row block-large-1-2 block-tab-full s-content__blocks">
                              <div class="column">
                                  <h4>Email us</h4>
                                  <p>You can email us at <a href="maito:{{ $owner_email }}">{{ $owner_email }}</a></p>
                              </div>

                              <div class="column">
                                  <h4>Social </h4>
                                  <p>Find us on <a href="{{ $facebook }}" target="_blank">Facebook</a></p> 
                              </div>
                          </div> <!-- end s-content__blocks -->

													@if (session('success')) 
														<p class="text-success with-success">Your message was sent</p>
													@endif

                          <form method="POST" action="{{ route('contact.submit') }}" class="s-content__form @if (session('error')) with-errors @endif" novalidate>
														@csrf
                              <fieldset>
																<div class="form-field">
																	<input type="text" class="h-full-width h-remove-bottom" placeholder="Name" name="name" id="name" value="{{ old('name') }}" required>
																	
																	@error('name')
																		<p class="help-block text-danger">{{ $message }}</p>
																	@enderror
																</div>
															
																<div class="form-field">
																	<input type="text" class="h-full-width h-remove-bottom" placeholder="Email Address" name="email" id="email" value="{{ old('email') }}" required>

																	@error('email')
																		<p class="help-block text-danger">{{ $message }}</p>
																	@enderror
																</div>

																<div class="form-field">
																	<input type="text" class="h-full-width h-remove-bottom" placeholder="Phone Number" name="phone" id="phone" value="{{ old('phone') }}" required>
																	
																	@error('phone')
																		<p class="help-block text-danger">{{ $message }}</p>
																		@enderror
																</div>

																<div class="message form-field">
																	<textarea class="h-full-width" placeholder="Message" name="message" id="message" required>
																		{{ old('message') }}
																	</textarea>

																	@error('message')
																		<p class="help-block text-danger">{{ $message }}</p>
																	@enderror
																</div>

																<br>
																<button type="submit" class="submit btn btn--primary h-full-width">Submit</button>
                              </fieldset>
                          </form> <!-- end form -->

                      </div> <!-- end s-entry__page-content -->

                  </div> <!-- end s-content__primary -->
              </article> <!-- end entry -->

          </div> <!-- end column -->
      </div> <!-- end row -->

    </section><!-- end s-content -->

@endsection