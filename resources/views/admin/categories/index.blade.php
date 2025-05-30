@extends('layouts.admin-layout')
@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb bg-light-subtle p-3 rounded-2">
            <li class="breadcrumb-item">
                <a href="{{ route('admin.dashboard') }}">
                    <svg width="14" height="14" class="me-2 mb-1" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M8.15722 19.7714V16.7047C8.1572 15.9246 8.79312 15.2908 9.58101 15.2856H12.4671C13.2587 15.2856 13.9005 15.9209 13.9005 16.7047V16.7047V19.7809C13.9003 20.4432 14.4343 20.9845 15.103 21H17.0271C18.9451 21 20.5 19.4607 20.5 17.5618V17.5618V8.83784C20.4898 8.09083 20.1355 7.38935 19.538 6.93303L12.9577 1.6853C11.8049 0.771566 10.1662 0.771566 9.01342 1.6853L2.46203 6.94256C1.86226 7.39702 1.50739 8.09967 1.5 8.84736V17.5618C1.5 19.4607 3.05488 21 4.97291 21H6.89696C7.58235 21 8.13797 20.4499 8.13797 19.7714V19.7714" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    </svg>Home
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">{{ $title }}</li>
        </ol>
    </nav>

    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row ">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="mb-0">{{ $title }}</h4>
                        </div>

                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="{{ route('categories.create') }}" class="btn btn-primary">Add New Category</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="custom-table-effect table-responsive custom-table-search ">
                            <table class=" mb-0 table table-bordered custom-datatable-border" id="datatable" data-toggle="data-table">
                                <thead class="">
                                    <tr class="bg-white">
                                        <th scope="col" class="border-bottom bg-primary text-white">No</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Category Name</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Added</th>
                                        <th scope="col" class="border-bottom bg-primary text-white">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($categories as $category)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>
                                            <td>{{ $category->created_at->format('jS F, Y') }}</td>
                                            <td>
                                                <div class="d-flex gap-1 align-items-center list-user-action">
                                                    <a class="bg-success-subtle rounded" data-toggle="tooltip" data-placement="top" title="Edit" href="{{ route('categories.edit', $category->id) }}">
                                                        <i class="ph ph-pencil-simple text-success custom-ph-icons"></i>
                                                    </a>

                                                    <!-- Delete Button -->
                                                    <a class="bg-danger-subtle delete-category rounded cursor-pointer" data-id="{{ $category->id }}" data-toggle="tooltip" data-placement="top" title="Delete">
                                                        <i class="ph ph-trash text-danger custom-ph-icons"></i>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Load jQuery before Bootstrap -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            // Delete category handler
            $(document).on('click', '.delete-category', function(e) {
                e.preventDefault();
                const id = $(this).data('id');
                const url = "{{ route('categories.destroy', ':id') }}".replace(':id', id);
                const token = "{{ csrf_token() }}";

                Swal.fire({
                    title: "Are you sure you want to delete?",
                    text: "This action cannot be undone.",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "Cancel"
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                "_token": token,
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Error!',
                                    xhr.responseJSON.message || 'Failed to delete category.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
