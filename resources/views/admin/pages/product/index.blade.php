@extends('admin.layout.main')
@section('title', 'Products List')
@section('content')
    <div class="page-breadcrumb row align-items-center mb-3">
        <div class="col-md-6 col-12 d-flex align-items-center">
            <div class="breadcrumb-title pe-3">Tables</div>
            <div class="ps-3 d-none d-md-block">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Table</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="col-md-6 col-12 text-md-end text-start mt-2 mt-md-0">
            <a href="{{ route('products.create') }}" class="btn btn-primary">
                <i class="bx bx-plus"></i> Add New Product
            </a>
        </div>
    </div>


    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Status</th>
                            <th>Created At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{ $product->product_name }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="status" role="switch"
                                            id="flexSwitchCheckChecked" style="width: 35px;"
                                            onchange="checkBox(this,event,'Do you want to change the status','No', 'No',{{ $product->id }})"
                                            data-productID="{{ $product->id }}"
                                            @if ($product->status == true) checked @endif>
                                    </div>
                                </td>

                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <div class="d-flex order-actions">
                                        <a href="{{ route('products.edit', $product->id) }}" class=""><i
                                                class='bx bxs-edit'></i></a>

                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn sm btn-danger" class="ms-3"><i
                                                    class='bx bxs-trash'></i></button>
                                        </form>
                                    </div>
                                </td>

                            </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>status</th>
                            <th>Created At</th>
                            <td>Actions</td>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function checkBox(checkbox, event, confirmationMessage, deleteText, dontDeleteText, productID) {
            Swal.fire({
                title: "Do you want to change the status?",
                showDenyButton: true,
                confirmButtonText: "Save",
                denyButtonText: `Don't save`
            }).then((result) => {
                if (result.isConfirmed) {
                    let isChecked = checkbox.checked;
                    let status = isChecked ? false : true;

                    if (checkbox.checked) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Switched ON',
                            text: 'The switch is now turned ON!',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            icon: 'warning',
                            title: 'Switched OFF',
                            text: 'The switch is now turned OFF!',
                            timer: 1500,
                            showConfirmButton: false
                        });
                    }

                    $.ajax({
                        url: "{{ route('status.checked') }}",
                        type: 'POST',
                        data: {
                            status: status,
                            _token: '{{ csrf_token() }}',
                            product: productID
                        },
                        success: function(response) {
                            $('#currentStatus').text(response.status.charAt(0).toUpperCase() + response
                                .status.slice(1));
                        },
                        error: function() {
                            alert('An error occurred.');
                        }
                    });
                } else if (result.isDenied) {
                    checkbox.checked = !checkbox.checked;
                    Swal.fire({
                        icon: 'info',
                        title: 'Action Canceled',
                        text: 'The switch was not changed.',
                        timer: 1500,
                        showConfirmButton: false
                    });
                }
            });
        }
    </script>

@endsection
