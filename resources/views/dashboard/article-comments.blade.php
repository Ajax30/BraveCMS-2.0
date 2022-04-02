@extends('layouts.app')

@section('content')
	<div class="card shadow-sm">
		<div class="card-header d-flex justify-content-between px-2">
			<span class="align-self-center">{{ __('Comments') }}</span>
			</a>
		</div>
		<div class="card-body p-0">
			<div class="table-responsive">
				<table class="table table-hover mb-0">
					<thead>
						<tr>
							<th>#</th>
							<th>Comment</th>
							<th>Author</th>
							<th>Article</th>
							<th>Date</th>
							<th class="text-end">Actions</th>
						</tr>
					</thead>
					@if ($comments)
					<tbody>
						@foreach ($comments as $index => $comment)
						<tr>
							<td>{{ $per_page * ($current_page - 1) + $index + 1 }}</td>
							<td>{{ $comment->body }}</td>
							<td>{{ $comment->user->first_name }} {{ $comment->user->last_name }}</td>
							<td>{{ $comment->article->title }}</td>
							<td>{{ date('jS M Y', strtotime($comment->created_at)) }}</td>
							<td class="text-end">
								<div class="btn-group btn-group-sm">
									{{-- <a href="{{ route('dashboard.comments.status', [$comment->id]) }}" class="btn btn-primary">
										<i class="fa-solid fa-pen-to-square"></i> Aprove
									</a> --}}

									<a href="{{ route('dashboard.comments.delete', [$comment->id]) }}" class="btn btn-primary" onclick="return confirm('Delete this comment?')" title="Delete comment">
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
		@if($comments->hasPages())
		<div class="card-footer">
			{!! $comments->withQueryString()->links() !!}
		</div>
		@endif
	</div> 
@endsection
