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
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="mb-0">{{ $title }}</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('categories.store') }}" method="POST">
                            @csrf

                            @if($errors->has('name'))
                                <!-- Danger alert -->
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    @if($errors->has('name'))
                                        {{ $errors->first('name') }}
                                    @endif
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <div class="form-group">
                                <label class="mb-4">{{ __('Category Name') }} *</label>
                                <input id="name" type="text" class="form-control @error('email') is-invalid @enderror p-2 bg-white border" name="name" value="{{ old('name') }}" autocomplete="off" autofocus placeholder="Category Name">
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary w-100">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
