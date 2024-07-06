@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Manage Permissions</h2>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.update-permissions') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="role">Select Role:</label>
            <select name="role_id" id="role" class="form-control">
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="permissions">Select Permissions:</label>
            <select name="permissions[]" id="permissions" class="form-control" multiple>
                @foreach ($permissions as $permission)
                    <option value="{{ $permission->id }}">{{ $permission->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Permissions</button>
    </form>
</div>
@endsection
