@extends('layouts.app')

@section('content')
	<div class="card shadow-sm">
		<div class="card-header d-flex justify-content-between px-2">
			<span class="align-self-center">{{ __('Pages') }}</span>
			<a href="{{ route('dashboard.pages.new') }}" title="Add a new page" class="btn btn-sm btn-success">
				<i class="fa-solid fa-circle-plus"></i> Add page
			</a>
		</div>
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-hover mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th class="w-50">Title</th>
							<th class="text-end">Actions</th>
						</tr>
					</thead>
					@if ($pages)
					<tbody>
						@foreach ($pages as $index => $page)
						<tr>
							<td>{{ $per_page * ($current_page - 1) + $index + 1 }}</td>
							<td>{{ $page->title }}</td>
							<td class="text-end">
								<div class="btn-group btn-group-sm">
									<a href="{{ route('dashboard.pages.edit', [$page->id]) }}" class="btn btn-success">
										<i class="fa-solid fa-pen-to-square"></i> Edit
									</a>

									<a href="{{ route('dashboard.pages.delete', [$page->id]) }}" class="btn btn-success" onclick="return confirm('Delete this page?')" title="Delete article">
										<i class="fa-solid fa-trash"></i> Delete
									</a>
								</div>
							</td>
						</tr>
						@endforeach
					</tbody>
					@endif
				</table>
			</div>
		</div>
		@if ($pages_count > 10)
		<div class="card-footer">
			{!! $pages->withQueryString()->links() !!}
		</div>
		@endif
	</div> 
@endsection
