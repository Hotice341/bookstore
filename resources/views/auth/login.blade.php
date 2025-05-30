@extends('layouts.app')

@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{ asset('assets/images/background/bg3.jpg') }});">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Login</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"> Home</a></li>
                            <li class="breadcrumb-item">Login</li>
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
                <div class="row">
                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="login-area">
                            <div class="tab-content">
                                <h4>NEW CUSTOMER</h4>
                                <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
                                <a class="btn btn-primary btnhover m-r5 button-lg radius-no" href="{{ route('sign-up') }}">CREATE AN ACCOUNT</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-6 mb-4">
                        <div class="login-area">
                            <div class="tab-content nav">
                                <form method="POST" action="{{ route('login') }}" class="tab-pane active col-12">
                                    @csrf
                                    <h4 class="text-secondary">LOGIN</h4>
                                    <p class="font-weight-600">If you have an account with us, please log in.</p>

                                    @if($errors->has('email') || $errors->has('password'))
                                        <!-- Danger alert -->
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                        <label class="label-title">{{ __('Email Address') }} *</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email Address">
                                    </div>

                                    <div class="mb-4">
                                        <label class="label-title">{{ __('Password') }} *</label>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password">
                                    </div>

                                    <div class="mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="text-left">
                                        <button type="submit" class="btn btn-primary btnhover me-2">login</button>
                                        @if (Route::has('forgot-password'))
                                            <a href="{{ route('forgot-password') }}" class="m-l5">
                                                <i class="fas fa-unlock-alt"></i> {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Product END -->
        </section>
        <!-- contact area End-->
@endsection
