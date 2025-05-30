@extends('layouts.app')

@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{ asset('assets/images/background/bg3.jpg') }});">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>{{ __('Verify Your Otp') }}</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"> Home</a></li>
                            <li class="breadcrumb-item">{{ __('Verify Your Otp') }}</li>
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
                            <form method="POST" action="{{ route('password.confirm.post', ['id' => $id]) }}">
                                @csrf
                                <h4 class="text-secondary">{{ __('Verify Otp') }}</h4>
                                <p class="font-weight-600">We have sent a code to <b>{{ $email }}</b></p>

                                @if($errors->has('code.*'))
                                    <!-- Danger alert -->
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @if($errors->has('code.*'))
                                            {{ $errors->first('code.*') }}
                                        @endif
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <input type="hidden" name="id" id="userId" value="{{ $id }}">

                                <!-- Input box -->
                                <div class="autotab d-flex justify-content-between gap-1 gap-sm-3 mb-2" id="phoneInput">
                                    <div class="otp-container">
                                        <label for="otp-1" class="visually-hidden">OTP digit 1</label>
                                        <input type="text" name="code[]" pattern="[0-9]*" inputmode="numeric" maxlength="1" class="form-control form-control-lg @error('code.*') is-invalid @enderror text-center p-3 otp-input" id="otp-1" aria-label="Enter OTP digit 1" style="font-weight: 800">
                                    </div>

                                    <div class="otp-container">
                                        <label for="otp-2" class="visually-hidden">OTP digit 2</label>
                                        <input type="text" name="code[]" pattern="[0-9]*" inputmode="numeric" maxlength="1" class="form-control form-control-lg @error('code.*') is-invalid @enderror text-center p-3 otp-input" id="otp-2" disabled aria-label="Enter OTP digit 2" style="font-weight: 800">
                                    </div>

                                    <div class="otp-container">
                                        <label for="otp-3" class="visually-hidden">OTP digit 3</label>
                                        <input type="text" name="code[]" pattern="[0-9]*" inputmode="numeric" maxlength="1" class="form-control form-control-lg @error('code.*') is-invalid @enderror text-center p-3 otp-input" id="otp-3" disabled aria-label="Enter OTP digit 3" style="font-weight: 800">
                                    </div>

                                    <div class="otp-container">
                                        <label for="otp-4" class="visually-hidden">OTP digit 4</label>
                                        <input type="text" name="code[]" pattern="[0-9]*" inputmode="numeric" maxlength="1" class="form-control form-control-lg @error('code.*') is-invalid @enderror text-center p-3 otp-input" id="otp-4" disabled aria-label="Enter OTP digit 4" style="font-weight: 800">
                                    </div>
                                </div>

                                <!-- Button link -->
                                <div class="d-sm-flex d-flex justify-content-between small mb-4">
                                    <span>Didn't get a code?</span>
                                    <a id="resendOtp" class="btn btn-sm btn-link text-black p-0 text-decoration-underline mb-0">Click to resend</a>
                                </div>

                                <div class="d-flex flex-column align-items-center">
                                    <button type="submit" class="btn btn-primary btnhover w-100">Verify and Proceed</button>
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
