@extends('layouts.app')
@section('content')
    <div class="page-content">
        <!-- inner page banner -->
        <div class="dz-bnr-inr overlay-secondary-dark dz-bnr-inr-sm" style="background-image:url({{ asset('assets/images/background/bg3.jpg') }});">
            <div class="container">
                <div class="dz-bnr-inr-entry">
                    <h1>Blogs</h1>
                    <nav aria-label="breadcrumb" class="breadcrumb-row">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/"> Home</a></li>
                            <li class="breadcrumb-item">Blogs</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- inner page banner End-->

        <!-- Blog Large -->
        <section class="content-inner-1 bg-img-fix">
            <div class="container">

                <div class="row">
                    @forelse($blogs as $blog)
                        <div class="col-xl-6 col-lg-6">
                            <div class="dz-blog style-1 bg-white m-b30">
                                <div class="dz-media dz-img-effect zoom">
                                    <img src="{{ $blog->image }}" alt="">
                                </div>

                                <div class="dz-info">
                                    <h4 class="dz-title">
                                        <a href="{{ route('blogs.details', $blog->id) }}">{{ $blog->title }}</a>
                                    </h4>

                                    <p class="m-b0">
                                        {{ Str::limit($blog->content, 150, '...') }}
                                        <a href="{{ route('blogs.details', $blog->id) }}" class="text-primary">Read More</a>
                                    </p>

                                    <div class="dz-meta meta-bottom">
                                        <ul class="border-0 pt-0">
                                            <li class="post-date">
                                                <i class="far fa-calendar fa-fw m-r10"></i>
                                                {{ $blog->created_at->format('j F, Y') }}
                                            </li>
                                            <li class="post-author">
                                                <i class="far fa-user fa-fw m-r10"></i>By
                                                <a href="javascript:void(0);">
                                                    {{ $blog->user->name }}
                                                </a>
                                            </li>

                                            <li class="post-comment">
                                                <a href="javascript:void(0);">
                                                    <i class="far fa-comment-alt fa-fw"></i>
                                                    <span>{{ $blog->category->name }}</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-xl-12 col-lg-12">
                            <div class="dz-blog style-1 bg-white m-b30">
                                <div class="dz-media dz-img-effect zoom">
                                    <img src="https://placehold.co/600x400/000000/FFF?text=No+Blogs+Found" alt="">
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                {{ $blogs->links('vendor.pagination.bootstrap-5') }}
            </div>
        </section>
    </div>
@endsection
