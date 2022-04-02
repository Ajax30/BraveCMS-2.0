			<div class="dashboard-footer">
				<p class="m-0 text-center">&copy; My Company. All rights reserved</p>
			</div> 
		</div>
		<script>
			var APP_URL = "{{ env("APP_URL") }}";
		</script>
		@if(request()->routeIs(['dashboard.articles.new', 'dashboard.articles.edit', 'dashboard.pages.new', 'dashboard.pages.edit']))
			<script>CKEDITOR.replace('content');</script>
		@endif

	</body>
</html>
