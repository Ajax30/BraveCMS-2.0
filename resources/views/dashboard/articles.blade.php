@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
					<div class="card">
						<div class="card-header px-2">{{ __('Articles') }}</div>
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead>
										<tr>
											<th>Title</th>
											<th>Author</th>
											<th>Category</th>
											<th>Publication date</th>
											<th class="text-end">Actions</th>
										</tr>
									</thead>
									@if ($articles)
									<tbody>
										@foreach ($articles as $article)
										<tr>
											<td>{{ $article->title }}</td>
											<td>{{ $article->user->first_name }} {{ $article->user->last_name }}</td>
											<td>{{ $article->category->name }}</td>
											<td>{{ date('jS M Y', strtotime($article->created_at)) }}</td>
											<td class="text-end">
												<div class="btn-group btn-group-sm">
													<a href="#" class="btn btn-primary">View</a>
													<a href="#" class="btn btn-primary">Edit</a>

													<a href="{{ route('dashboard.articles.delete', [$article->id]) }}" class="btn btn-primary" onclick="return confirm('Delete this article?')" title="Delete article">
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
						<div class="card-footer">
							{!! $articles->withQueryString()->links() !!}
						</div>
					</div>
        </div>
    </div>
</div>
@endsection
