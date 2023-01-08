@extends('layouts.app')

@section('content')
  <div class="card shadow-sm">
      <div class="card-header">{{ __('Settings') }}</div>
      <div class="card-body">
          <form action="{{ route('dashboard.settings.update') }}" method="post" novalidate>
            @csrf

            <div class="row mb-2">
              <label for="site_name" class="col-md-12">{{ __('Site title') }}</label>

              <div class="col-md-12 @error('site_name') has-error @enderror">
                  <input id="site_name" type="text" placeholder="Site title" class="form-control @error('site_name') is-invalid @enderror" name="site_name" value="{{ old('site_name', $settings->site_name) }}" autocomplete="site_name" autofocus>

                  @error('site_name')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="row mb-2">
              <label for="tagline" class="col-md-12">{{ __('Tag line') }}</label>

              <div class="col-md-12 @error('tagline') has-error @enderror">
                  <input id="tagline" type="text" placeholder="Tag line" class="form-control @error('tagline') is-invalid @enderror" name="tagline" value="{{ old('tagline', $settings->tagline) }}" autocomplete="tagline" autofocus>

                  @error('tagline')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="row mb-2">
              <label for="owner_name" class="col-md-12">{{ __('Owner name') }}</label>
          
              <div class="col-md-12 @error('owner_name') has-error @enderror">
                  <input id="owner_name" type="text" placeholder="Owner name" class="form-control @error('owner_name') is-invalid @enderror" name="owner_name" value="{{ old('owner_name', $settings->owner_name) }}" autocomplete="owner_name" autofocus>
          
                  @error('owner_name')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
              </div>
            </div>

            <div class="row mb-2">
              <label for="owner_email" class="col-md-12">{{ __('Owner email') }}</label>
          
              <div class="col-md-12 @error('owner_email') has-error @enderror">
                  <input id="owner_email" type="text" placeholder="Owner email" class="form-control @error('owner_email') is-invalid @enderror" name="owner_email" value="{{ old('owner_email', $settings->owner_email) }}" autocomplete="owner_email" autofocus>
      
                  @error('owner_email')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="row mb-2">
              <label for="twitter" class="col-md-12">{{ __('Twitter') }}</label>
          
              <div class="col-md-12 @error('twitter') has-error @enderror">
                  <input id="twitter" type="text" placeholder="Twitter" class="form-control @error('twitter') is-invalid @enderror" name="twitter" value="{{ old('twitter', $settings->twitter) }}" autocomplete="twitter" autofocus>
      
                  @error('twitter')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="row mb-2">
              <label for="facebook" class="col-md-12">{{ __('Facebook') }}</label>
          
              <div class="col-md-12 @error('facebook') has-error @enderror">
                  <input id="facebook" type="text" placeholder="Facebook" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{ old('facebook', $settings->facebook) }}" autocomplete="facebook" autofocus>
      
                  @error('facebook')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

            <div class="row mb-2">
              <label for="instagram" class="col-md-12">{{ __('Instagram') }}</label>
          
              <div class="col-md-12 @error('instagram') has-error @enderror">
                  <input id="instagram" type="text" placeholder="Instagram" class="form-control @error('instagram') is-invalid @enderror" name="instagram" value="{{ old('instagram', $settings->instagram) }}" autocomplete="instagram" autofocus>
      
                  @error('instagram')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
              </div>
            </div>

              <div class="row mb-2">
                <label for="theme" class="col-md-12">{{ __('Theme directory') }}</label>
            
                <div class="col-md-12 @error('theme_directory') has-error @enderror">
                      
                  <select name="theme_directory" id="theme" class="form-control @error('theme_directory') is-invalid @enderror">
                    <option value="">Pick a theme</option>
                    @foreach($themes as $theme)
                      <option value="{{ $theme->slug }}" {{ $theme->slug == $settings->theme_directory  ? 'selected' : '' }}>{{ $theme->name }}</option>
                    @endforeach
                  </select>
          
                    @error('theme_directory')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
              </div>

            <div class="row mb-1">
              <div class="d-flex pb-2">
                <input type="checkbox" name="is_cookieconsent" id="is_cookieconsent" {{ $settings->is_cookieconsent == 1 ? 'checked' : '' }}>

                <label class="px-1" for="is_cookieconsent">{{ __('Ask for cookie consent?') }}</label>
              </div>
            </div>

            <div class="row mb-1">
              <div class="d-flex pb-2">
                  <input type="checkbox" name="is_infinitescroll" id="is_infinitescroll" {{ $settings->is_infinitescroll == 1 ? 'checked' : '' }}>
          
                  <label class="px-1" for="is_infinitescroll">{{ __('Infinite scroll for the article comments?') }}</label>
              </div>
          </div>

            <div class="form-group d-flex mb-0 mt-2">
                <div class="w-50 pe-1">
                  <input type="submit" name="submit" value="Save" class="w-100 btn btn-primary">
                </div>
                <div class="w-50 ps-1">
                  <a href="{{route('dashboard.settings')}}" class="w-100 btn btn-primary">Cancel</a>
                </div>
            </div>
          </form>
      </div>
  </div>
@endsection