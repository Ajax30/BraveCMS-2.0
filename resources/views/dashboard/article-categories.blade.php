@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
					<div class="card">
						<div class="card-header px-2">{{ __('Categories') }}</div>
						<div class="card-body p-0">
							<div class="table-responsive">
								<table class="table mb-0">
									<thead>
										<tr>
											<th>ID</th>
											<th>Category</th>
											<th class="text-end">Actions</th>
										</tr>
									</thead>
									@if ($categories)
									<tbody>
										@foreach ($categories as $category)
										<tr>
											<td>{{ $category->id }}</td>
											<td>{{ $category->name }}</td>
											<td class="text-end">
												<div class="btn-group btn-group-sm">
													<a href="#" class="btn btn-primary">View</a>
													<a href="#" class="btn btn-primary">Edit</a>
													<a href="#" class="btn btn-primary">Delete</a>
												</div>
											</td>
										</tr>
										@endforeach
									</tbody>
									@endif
								</table>
							</div>
						</div>
						@if (count($categories) >= 10)
						<div class="card-footer">
							{!! $categories->withQueryString()->links() !!}
						</div>
						@endif
					</div>
        </div>
    </div>
</div>
@endsection
