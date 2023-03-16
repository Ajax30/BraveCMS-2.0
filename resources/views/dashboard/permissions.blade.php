@extends('layouts.app')

@section('content')
  <div class="card shadow-sm">
    <div class="card-header">{{ __('Available permissions') }}</div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th>#</th>
              <th>Role</th>
              <th>Permissions</th>
            </tr>
          </thead>
          <tbody>
            @if (count($roles))
              @foreach ($roles as $index => $role)
                <tr>
                  <td>{{ $index + 1 }}</td>
                  <td class="text-nowrap">{{ $role->label }}</td>
                  <td>
                    @foreach ($role->permissions as $permission)
                      <span class="badge bg-info">{{ $permission->slug }}</span>
                    @endforeach
                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection