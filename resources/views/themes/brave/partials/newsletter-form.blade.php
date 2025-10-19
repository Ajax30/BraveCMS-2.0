<div class="newsletter">
    <h3>Subscribe to our newsletter</h3>
    <div id="messages" class="is-hidden">
      <div class="alert alert-danger alert-dismissible px-2 notnew is-hidden">
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
            <p class="mb-0 small text-center">This email already exists!</p>
        </div>

        <div class="alert alert-success alert-dismissible px-2 success is-hidden">
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
            <p class="mb-0 small text-center">You need to confirm subscription!</p>
        </div>

        <div class="alert alert-danger alert-dismissible px-2 fail is-hidden">
            <button type="button" class="btn-close btn-sm" data-bs-dismiss="alert"></button>
            <p class="mb-0 small text-center">Sorry, the newsletter subscription filed!</p>
        </div>
    </div>

    <form method="POST" action="{{ route('newsletter.subscribe') }}" id="newsletterForm" novalidate>
        @csrf
        <div class="form-group">
            <input type="email" name="subscriber_email" id="email" class="form-control form-control-sm"
                placeholder="Email address" required>
                <p id="emailValidationMsg" class="position-absolute text-danger is-hidden">Please enter a valid email address!</p>
        </div>
        <div class="form-group">
            <input type="submit" value="Subscribe" class="btn btn-sm btn-success w-100">
        </div>
    </form>
</div>
