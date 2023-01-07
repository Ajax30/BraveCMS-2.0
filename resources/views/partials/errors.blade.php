<div class="container">
  @if(request()->routeIs('login'))
  <div class="row justify-content-center">  
    <div class="col-md-6">
  @endif
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
      <p class="my-0 text-center">{{ session('error') }}</p>
    </div>
  @if(request()->routeIs('login'))
    </div>
  </div>
  @endif
</div>