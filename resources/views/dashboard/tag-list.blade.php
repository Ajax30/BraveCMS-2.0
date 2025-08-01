@extends('layouts.app')

@section('content')
	<div class="card shadow-sm">
		<div class="card-header d-flex justify-content-between px-2">
			<span class="align-self-center">{{ __('Tags') }}</span>
			<a href="{{ route('dashboard.tags.new') }}" title="Add a new tag" class="btn btn-sm btn-success">
				<i class="fa-solid fa-circle-plus"></i> Add tag
			</a>
		</div>
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-hover mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th>Tag</th>
							<th class="text-end">Actions</th>
						</tr>
					</thead>
					@if ($tags)
					<tbody>
						@foreach ($tags as $index => $tag)
						<tr>
							<td>{{  $tags->firstItem() + $index }}</td>
							<td>{{ $tag->name }}</td>
							<td class="text-end">
								<div class="btn-group btn-group-sm">
									<a href="{{ route('dashboard.tags.edit', [$tag->id]) }}" class="btn btn-success">
										<i class="fa-solid fa-pen-to-square"></i> Edit
									</a>

									<a href="{{ route('dashboard.tags.delete', [$tag->id]) }}" class="btn btn-success" onclick="return confirm('Delete this tag?')" title="Delete article">
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
		@if ($tag_count > 10)
		<div class="card-footer">
			{!! $tags->withQueryString()->links() !!}
		</div>
		@endif
	</div> 
@endsection
