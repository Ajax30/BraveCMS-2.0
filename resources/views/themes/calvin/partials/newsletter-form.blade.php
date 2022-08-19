<div class="column large-3 medium-6 tab-12 s-footer__subscribe">
	<h5>Sign Up for Newsletter</h5>
	<p>Signup to get updates on articles, interviews and events.</p>

	<div id="messags" class="is-hidden h-text-center">
		<div class="success is-hidden alert-box alert-box--success">You need to confirm subsciption</div>
		<div class="notnew is-hidden alert-box alert-box--error">This email already exists</div>
		<div class="fail is-hidden alert-box alert-box--error">Sorry, the newsletter subscription filed</div>
</div>

	<div class="subscribe-form">
		<form method="POST" action="{{ route('newsletter.subscribe') }}" id="newsletterForm" mclass="group" novalidate>
			@csrf
			<input type="email" value="" name="subscriber_email" class="email" placeholder="Your Email Address" required> 
			<input type="submit" name="subscribe" value="Subscribe">
		</form>
	</div>
</div><!-- end s-footer__subscribe -->