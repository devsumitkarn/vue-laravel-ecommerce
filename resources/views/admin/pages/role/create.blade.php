@extends('admin.layout.main')
@section('title', 'Roles Create')
@section('content')
    <div class="row">
        <div class="col-xl-9 mx-auto">
            <h6 class="mb-0 text-uppercase">Roles Create</h6>
            <hr />
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('roles.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Name<span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="name" placeholder="Enter role name"
                                value="{{ old('name') }}">
                            @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label mb-3">Permissions (Multiple)</label>
                            @foreach ($groupedPermissions as $module => $permissions)
                                <div class="col-md-12 col-lg-12 mb-4">
                                    <div class="border rounded shadow-sm p-4 bg-light h-100 module-card">
                                        <h5 class="text-primary mb-3 text-capitalize border-bottom pb-2">
                                            {{ $module }} Module
                                        </h5>

                                        <div class="d-flex flex-wrap">
                                            @foreach ($permissions as $permission)
                                                <div class="me-4 mb-3">
                                                    <div class="form-check custom-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="permission_id[]"
                                                            value="{{ $permission->id }}" id="perm-{{ $permission->id }}">
                                                        <label class="form-check-label text-capitalize"
                                                            for="perm-{{ $permission->id }}">
                                                            {{ str_replace('-', ' ', $permission->name) }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>



                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Create Role</button>
                            <a href="{{ route('roles.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
