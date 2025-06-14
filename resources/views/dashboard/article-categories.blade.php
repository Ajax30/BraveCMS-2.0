@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header d-flex justify-content-between px-2">
            <span class="align-self-center">{{ __('Categories') }}</span>
            <a href="{{ route('dashboard.categories.new') }}" title="Add a new category" class="btn btn-sm btn-success">
                <i class="fa-solid fa-circle-plus"></i> Add category
            </a>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Category</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    @if ($categories)
                        <tbody>
                            @foreach ($categories as $index => $category)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-end">
                                        <div class="btn-group btn-group-sm">
                                            <a href="{{ route('dashboard.categories.edit', [$category->id]) }}"
                                                class="btn btn-success">
                                                <i class="fa-solid fa-pen-to-square"></i> Edit
                                            </a>

                                            <a href="{{ route('dashboard.categories.delete', [$category->id]) }}"
                                                class="btn btn-success" onclick="return confirm('Delete this category?')"
                                                title="Delete article">
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
        @if ($category_count > 10)
            <div class="card-footer">
                {!! $categories->withQueryString()->links() !!}
            </div>
        @endif
    </div>
@endsection
