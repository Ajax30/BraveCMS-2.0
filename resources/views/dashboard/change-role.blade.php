@extends('layouts.app')

@section('content')
    <div class="card shadow-sm">
        <div class="card-header">Change {{ $user->first_name }}'s role</div>
        <div class="card-body">
            <form method="POST" action="{{ route('update-role', [$user->id]) }}" novalidate>
                @csrf
                <div class="row mb-2">
                    <label for="role" class="col-md-12">{{ __('Role') }}</label>

                    <div class="col-md-12 @error('role_id') has-error @enderror">

                        <select name="role_id" id="role" class="form-control @error('role_id') is-invalid @enderror">
                            @foreach ($roles as $role)
                                <option value="{{ $role->id }}" {{ $role->id == $user->role->id ? 'selected' : '' }}>
                                    {{ $role->label }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row mb-0">
                    <div class="col-md-12">
                        <button type="submit" class="w-100 btn btn-success">{{ __('Save') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
