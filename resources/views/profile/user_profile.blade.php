@extends('layouts.app')
@section('content')
    <div class="page-content bg-white">
        <!-- contact area -->
        <div class="content-block">
            <!-- Browse Jobs -->
            <section class="content-inner bg-white">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-3 col-lg-4 m-b30">
                            <div class="sticky-top">
                                <div class="shop-account">
                                    <div class="account-detail text-center">
                                        <div class="profile-container">
                                            <div class="my-image">
                                                <a href="javascript:void(0);">
                                                    <img id="preview" alt="" src="{{ $user->profile && $user->profile->profile_picture ? asset('profile/' . $user->profile->profile_picture) : 'https://placehold.co/124x124/000000/FFF?text=' . substr($user->name, 0, 1) }}">
                                                    @if ($user->profile?->profile_picture)
                                                        <div id="delete-icon" class="delete-icon">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                                <path d="M3 6h18"></path>
                                                                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6"></path>
                                                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                                <line x1="10" y1="11" x2="10" y2="17"></line>
                                                                <line x1="14" y1="11" x2="14" y2="17"></line>
                                                            </svg>
                                                        </div>
                                                    @endif
                                                </a>
                                            </div>
                                        </div>

                                        @if ($user->profile?->profile_picture)
                                            <form id="remove-profile-picture-form" action="{{ route('user.profile.delete') }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endif

                                        <style>
                                            .delete-icon {
                                                position: absolute;
                                                top: 0;
                                                left: 0;
                                                width: 100%;
                                                height: 100%;
                                                display: flex;
                                                align-items: center;
                                                justify-content: center;
                                                background-color: rgba(0, 0, 0, 0.5);
                                                border-radius: 50%;
                                                opacity: 0;
                                                transition: opacity 0.3s ease;
                                                color: white;
                                            }

                                            .my-image:hover .delete-icon {
                                                opacity: 1;
                                                cursor: pointer;
                                            }

                                            .delete-icon svg {
                                                width: 32px;
                                                height: 32px;
                                            }
                                        </style>

                                        <div class="account-title">
                                            <div class="">
                                                <h4 class="m-b5"><a href="javascript:void(0);">{{ $user->name }}</a></h4>
                                                <p class="m-b0"><a href="javascript:void(0);">{{ $user->email }}</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <ul class="account-list">
                                        <li>
                                            <a href="my-profile.html" class="active"><i class="far fa-user" aria-hidden="true"></i>
                                                <span>Profile</span></a>
                                        </li>

                                        <li>
                                            <a href="shop-cart.html"><i class="flaticon-shopping-cart-1"></i>
                                                <span>My Cart</span></a>
                                        </li>

                                        <li>
                                            <a href="wishlist.html"><i class="far fa-heart" aria-hidden="true"></i>
                                                <span>Wishlist</span></a>
                                        </li>

                                        <li>
                                            <a href="books-grid-view.html"><i class="fa fa-briefcase" aria-hidden="true"></i>
                                                <span>Shop</span></a>
                                        </li>

                                        <li>
                                            <a href="shop-login.html"><i class="fas fa-sign-out-alt" aria-hidden="true"></i>
                                                <span>Log Out</span></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-9 col-lg-8 m-b30">
                            <div class="shop-bx shop-profile">
                                <div class="shop-bx-title clearfix">
                                    <h5 class="text-uppercase">Profile Information </h5>
                                </div>
                                <form action="{{ route('user.profile.edit') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    @if($errors->has('name') || $errors->has('phone') || $errors->has('address') || $errors->has('bio'))
                                        <!-- Danger alert -->
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @if($errors->has('name'))
                                                {{ $errors->first('name') }}
                                            @endif
                                            @if($errors->has('phone'))
                                                {{ $errors->first('phone') }}
                                            @endif
                                            @if($errors->has('address'))
                                                {{ $errors->first('address') }}
                                            @endif
                                            @if($errors->has('bio'))
                                                {{ $errors->first('bio') }}
                                            @endif
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div class="row m-b30">
                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="hidden-input" class="form-label">Profile Picture:</label>
                                                <input type="file" name="profile_picture" class="form-control" id="hidden-input">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Fullname</label>
                                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" placeholder="Fullname" value="{{ old('name', $user->name) }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="Email Address" value="{{ $user->email }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label for="phone" class="form-label">Phone</label>
                                                <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" placeholder="Phone Number" value="{{ old('phone', $user->profile->phone ?? '') }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="address" class="form-label">Address</label>
                                                <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" placeholder="Address" value="{{ old('address', $user->profile->address ?? '') }}">
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">
                                                <label for="bio" class="form-label">Bio</label>
                                                <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" rows="5" name="bio">{{ old('bio', $user->profile->bio ?? '') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-lg-12 col-md-12">
                                            <button type="submit" class="btn btn-primary btnhover">Save Settings</button>
                                        </div>
                                    </div>
                                </form>

                                <div class="shop-bx-title clearfix">
                                    <h5 class="text-uppercase">Password Update</h5>
                                </div>

                                <form action="{{ route('user.profile.password') }}" method="POST">
                                    @csrf

                                    @if($errors->has('current_password') || $errors->has('password') || $errors->has('password_confirmation'))
                                        <!-- Danger alert -->
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            @if($errors->has('current_password'))
                                                {{ $errors->first('current_password') }}
                                            @endif

                                            @if($errors->has('password'))
                                                {{ $errors->first('password') }}
                                            @endif

                                            @if($errors->has('password_confirmation'))
                                                {{ $errors->first('password_confirmation') }}
                                            @endif
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <div class="row">
                                        <div class="col-lg-12 col-md-12">
                                            <div class="mb-3">
                                                <label class="label-title">{{ __('Current Password') }} *</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="current_password" autocomplete="new-password" placeholder="Password">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="label-title">{{ __('New Password') }} *</label>
                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password" placeholder="New Password">
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-md-6">
                                            <div class="mb-3">
                                                <label class="label-title">{{ __('Confirm Password') }} *</label>
                                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password" placeholder="Confirm Password">
                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary btnhover">Update Password</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Browse Jobs END -->
        </div>
    </div>
@endsection

<script>
    // Preview Logo Images
    document.addEventListener('DOMContentLoaded', function() {
        // Preview
        const Input = document.getElementById('hidden-input');
        const Preview = document.getElementById('preview');

        if (Input && Preview) {
            Input.addEventListener('change', function() {
                previewImage(this, Preview);
            });
        }

        // Image Preview Function
        function previewImage(input, previewElement) {
            const file = input.files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    previewElement.src = e.target.result;
                }

                reader.readAsDataURL(file);
            }
        }
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteIcon = document.getElementById('delete-icon');

        if (deleteIcon) {
            deleteIcon.addEventListener('click', function(e) {
                e.preventDefault();
                e.stopPropagation();

                if(confirm('Are you sure you want to delete your profile picture?')) {
                    // Submit the form when the user confirms
                    const form = document.getElementById('remove-profile-picture-form');
                    if (form) {
                        form.submit();
                    } else {
                        console.error('Form not found');
                    }
                }
            });
        }
    });
</script>
