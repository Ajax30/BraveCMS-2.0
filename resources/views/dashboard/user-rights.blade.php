@extends('layouts.app')

@section('content')
  <div class="card shadow-sm">
    <div class="card-header">{{ __('User roles') }}</div>
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-hover mb-0">
          <thead>
            <tr>
              <th>First name</th>
              <th>Last name</th>
              <th>Role</th>
              <th class="w-25 text-end">Actions</th>
            </tr>
          </thead>
          <tbody>
            @if (count($users))
              @foreach ($users as $user)
                <tr>
                  <td class="w-25">{{ $user->first_name }}</td>
                  <td class="w-25">{{ $user->last_name }}</td>
                  <td class="w-25">{{ $user->role->label }}</td>
                  <td class="w-25">
                    <div class="btn-group btn-group-sm w-100">
                      <a href="{{ route('change-role', [$user->id]) }}" class="btn btn-primary">
                        <i class="fa-solid fa-pen-to-square"></i> Change role
                      </a>

                      @if (boolval($user->active))
                        <a href="{{ route('ban-user', [$user->id]) }}" class="btn btn-primary" title="Ban this user">
                          <i class="fa-solid fa-times"></i> Ban
                        </a>
                      @else
                        <a href="{{ route('activate-user', [$user->id]) }}" class="btn btn-primary" title="Ban this user">
                          <i class="fa-solid fa-check"></i> Activate
                        </a>
                      @endif
                    </div> 
                  </td>
                </tr>
              @endforeach
            @else
            <tr>
              <td colspan="6" class="text-danger text-center">
                No users found
              </td>
            </tr>	
            @endif
          </tbody>
        </table>
      </div>
    </div>
    @if ($users_count > 10)
      <div class="card-footer">
        {!! $users->withQueryString()->links() !!}
      </div>
		@endif
  </div>
@endsection