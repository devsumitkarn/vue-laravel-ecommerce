@extends('admin.layout.main')
@section('title', 'Roles Update')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Permission Update</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Name:</label>
                            <input type="text" class="form-control" name="name" placeholder="Enter role name"
                                value="{{ $permission->name }}">
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Update Permission</button>
                            <a href="{{ route('permissions.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
