@extends('layouts.app')

@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{ asset('assets/images/background/bg3.jpg') }});">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Forgot Password</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"> Home</a></li>
                            <li class="breadcrumb-item">Forgot Password</li>
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
                            <form method="POST" action="{{ route('forgot-password.post') }}">
                                @csrf
                                <h4 class="text-secondary">FORGOT PASSWORD ?</h4>
                                <p class="font-weight-600">We will send you an otp to reset your password. </p>

                                @if (session('status'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('status') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if($errors->has('email'))
                                    <!-- Danger alert -->
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @if($errors->has('email'))
                                            {{ $errors->first('email') }}
                                        @endif
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="mb-3">
                                    <label class="label-title">E-MAIL *</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Your Email Id">
                                </div>

                                <div class="text-left">
                                    <a class="btn btn-outline-secondary btnhover m-r10" href="{{ route('login') }}">Back</a>
                                    <button type="submit" class="btn btn-primary btnhover">{{ __('Send Password Reset Otp') }}</button>
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
