@extends('admin.layout.main')
@section('title', 'Roles List')
@section('content')
    <div class="page-breadcrumb row align-items-center mb-3">
        <div class="col-md-6 col-12 d-flex align-items-center">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3 d-none d-md-block">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Permission Table</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-md-6 col-12 text-md-end text-start mt-2 mt-md-0">
            <a href="{{ route('permissions.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add New Permission
            </a>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Permisson Name</th>
                            <th>Guard Name</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($permissions as $permission)
                            <tr>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->guard_name }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('permissions.edit', $permission->id) }}" class=""><i class='bx bxs-edit'></i></a>

                                        <form action="{{ route('permissions.destroy', $permission->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn sm btn-danger" class="ms-3"><i class='bx bxs-trash'></i></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Permission Name</th>
                            <th>Guard Name</th>
                            <th>Created At</th>
                            <td>Actions</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
