<!-- comments
================================================== -->
<div class="comments-wrap">
		<div id="comments" class="row">
			<div class="column large-12">
				@if ($comments)
					<h3>
						@if (count($comments) === 0)
							No comments for this article yet
						@else
							{{ count($comments) }} comemnt{{ count($comments) > 1 ? 's': ''}}
						@endif
					</h3>
					<!-- START commentlist -->
					<ol class="commentlist">
						@foreach ($comments as $comment)
						<li class="depth-1 comment">
							<div class="comment__avatar">
								<img class="avatar" src="{{ asset('images/avatars/' . $comment->user->avatar) }}" alt="" width="50" height="50">
							</div>
							<div class="comment__content">
								<div class="comment__info">
									<div class="comment__author">{{ $comment->user->first_name }} {{ $comment->user->last_name }}</div>
									<div class="comment__meta">
										<div class="comment__time">{{ date('jS M Y', strtotime($comment->created_at)) }}</div>
										<div class="comment__reply">
											<a class="comment-reply-link" href="#0">Reply</a>
										</div>
									</div>
								</div>
								<div class="comment__text">
									<p>{{ $comment->body }}</p>
								</div>
							</div>
						</li>
						@endforeach
					</ol>
				@endif
				<!-- END commentlist -->
			</div>
			<!-- end col-full -->
		</div>
		<!-- end comments -->
		<div class="row comment-respond">
			<!-- START respond -->
			<div id="respond" class="column">
				<h3>
					Add Comment 
					<span>Your email address will not be published.</span>
				</h3>
				<form name="contactForm" id="contactForm" method="post" action="" autocomplete="off">
					<fieldset>
						<div class="form-field">
							<input name="cName" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Name" value="" type="text">
						</div>
						<div class="form-field">
							<input name="cEmail" id="cEmail" class="h-full-width h-remove-bottom" placeholder="Your Email" value="" type="text">
						</div>
						<div class="form-field">
							<input name="cWebsite" id="cWebsite" class="h-full-width h-remove-bottom" placeholder="Website" value="" type="text">
						</div>
						<div class="message form-field">
							<textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Your Message"></textarea>
						</div>
						<br>
						<input name="submit" id="submit" class="btn btn--primary btn-wide btn--large h-full-width" value="Add Comment" type="submit">
					</fieldset>
				</form>
				<!-- end form -->
			</div>
			<!-- END respond-->
		</div>
		<!-- end comment-respond -->
	</div>
	<!-- end comments-wrap -->