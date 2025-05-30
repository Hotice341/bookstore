@extends('layouts.app')

@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{ asset('assets/images/background/bg3.jpg') }});">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Registration</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"> Home</a></li>
                            <li class="breadcrumb-item">Registration</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- inner page banner End-->

        <!-- contact area -->
        <section class="content-inner shop-account">
            <!-- Product -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="login-area">
                            <form method="POST" action="{{ route('create-user') }}">
                                @csrf

                                <h4 class="text-secondary">Registration</h4>
                                <p class="font-weight-600">If you don't have an account with us, please Register.</p>

                                @if($errors->has('name') || $errors->has('email') || $errors->has('password'))
                                    <!-- Danger alert -->
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @if($errors->has('name'))
                                            {{ $errors->first('name') }}
                                        @endif

                                        @if($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @endif

                                        @if($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @endif
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="mb-4">
                                    <label class="label-title">{{ __('Fullname') }} *</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autocomplete="name" autofocus placeholder="Fullname">
                                </div>

                                <div class="mb-4">
                                    <label class="label-title">{{ __('Email Address') }} *</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" placeholder="Email Address">
                                </div>

                                <div class="mb-4">
                                    <label class="label-title">{{ __('Password') }} *</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="Password">
                                </div>

                                <div class="mb-4">
                                    <label class="label-title">{{ __('Confirm Password') }} *</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                                </div>

                                <div class="mb-5">
                                    <small>Your personal data will be used to support your experience throughout this website, to manage access to your account, and for other purposes described in our <a href="#">privacy policy</a>.</small>
                                </div>

                                <div class="text-left">
                                    <button type="submit" class="btn btn-primary btnhover w-100 me-2">{{ __('Register') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product END -->
        </section>
        <!-- contact area End-->
    </div>
@endsection
