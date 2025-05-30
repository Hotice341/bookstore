@extends('layouts.app')

@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{ asset('assets/images/background/bg3.jpg') }});">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>{{ __('Reset Password') }}</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"> Home</a></li>
                            <li class="breadcrumb-item">{{ __('Reset Password') }}</li>
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
                            <form method="POST" action="{{ route('password.reset.post', ['id' => $id]) }}">
                                @csrf
                                <h4 class="text-secondary">{{ __('Reset Password') }}</h4>
                                <p class="font-weight-600">Set new password for email: <b>{{ $email }}</b></p>

                                @if($errors->has('password'))
                                    <!-- Danger alert -->
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        @if($errors->has('password'))
                                            {{ $errors->first('password') }}
                                        @endif
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <input type="hidden" name="id" id="userId" value="{{ $id }}">

                                <div class="mb-3">
                                    <label class="label-title">PASSWORD *</label>
                                    <input id="password" type="text" class="form-control @error('password') is-invalid @enderror" name="password" value="{{ old('password') }}" required autocomplete="password" autofocus placeholder="Your Password">
                                </div>

                                <div class="mb-3">
                                    <label class="label-title" for="password_confirmation">CONFIRM PASSWORD *</label>
                                    <input id="password_confirmation" type="text" class="form-control" name="password_confirmation" required autocomplete="new-password" autofocus placeholder="Confirm Password">
                                </div>

                                <div class="text-left">
                                    <a class="btn btn-outline-secondary btnhover m-r10" href="{{ route('login') }}">Back</a>
                                    <button type="submit" class="btn btn-primary btnhover">{{ __('Reset Password') }}</button>
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
