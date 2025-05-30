@extends('layouts.admin-layout')
@section('content')
    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row">
            <div class="col-lg-12 mb-5">
                <div class="swiper-container mySwiper iq-width overflow-hidden mx-auto">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img class="img-fluid w-100 rounded" src="{{ asset('admin-assets/images/swiper/01.jpg') }}" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid w-100 rounded" src="{{ asset('admin-assets/images/swiper/02.jpg') }}" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid w-100 rounded" src="{{ asset('admin-assets/images/swiper/03.jpg') }}" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid w-100 rounded" src="{{ asset('admin-assets/images/swiper/04.jpg') }}" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid w-100 rounded" src="{{ asset('admin-assets/images/swiper/05.jpg') }}" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid w-100 rounded" src="{{ asset('admin-assets/images/swiper/06.jpg') }}" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid w-100 rounded" src="{{ asset('admin-assets/images/swiper/07.jpg') }}" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid w-100 rounded" src="{{ asset('admin-assets/images/swiper/08.jpg') }}" alt="image" />
                        </div>
                        <div class="swiper-slide">
                            <img class="img-fluid w-100 rounded" src="{{ asset('admin-assets/images/swiper/09.jpg') }}" alt="image" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-5">
                <div class="card rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="mb-0">Browse Books</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="{{ url('shop/category-page') }}" class="btn btn-primary view-more">View More</a>
                        </div>
                    </div>

                    <div class="p-5 row gy-5">
                        <!-- Book 1 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/01.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">Reading on the World</h4>
                                            <a class="mb-1 line-clip-1">Jhone Steben</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$100</del></span>
                                                <h6 class="mb-0"><b>$89</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 2 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/02.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">The Catcher in the Rye</h4>
                                            <a class="mb-1 line-clip-1">Fritz Wold</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$120</del></span>
                                                <h6 class="mb-0"><b>$99</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 3 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/03.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">Little Black Book</h4>
                                            <a class="mb-1 line-clip-1">John Klok</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$150</del></span>
                                                <h6 class="mb-0"><b>$129</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 4 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/04.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">Take On The Risk</h4>
                                            <a class="mb-1 line-clip-1">George Strong</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$120</del></span>
                                                <h6 class="mb-0"><b>$100</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 5 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/05.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">Absteact On Background</h4>
                                            <a class="mb-1 line-clip-1">JIchae Semos</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$105</del></span>
                                                <h6 class="mb-0"><b>$99</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 6 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/06.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">Find The Wave Book</h4>
                                            <a class="mb-1 line-clip-1">Fidel Martin</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$110</del></span>
                                                <h6 class="mb-0"><b>$100</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 7 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/07.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">See the More Story</h4>
                                            <a class="mb-1 line-clip-1">Jules Boutin</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$89</del></span>
                                                <h6 class="mb-0"><b>$79</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 8 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/08.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">The Wikde Book</h4>
                                            <a class="mb-1 line-clip-1">Kusti Franti</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$99</del></span>
                                                <h6 class="mb-0"><b>$89</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 9 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/09.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">Conversion Erik Routley</h4>
                                            <a class="mb-1 line-clip-1">Argele Intili</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$100</del></span>
                                                <h6 class="mb-0"><b>$79</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 10 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/10.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">The Leo Dominica</h4>
                                            <a class="mb-1 line-clip-1">Henry Jurk</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$120</del></span>
                                                <h6 class="mb-0"><b>$99</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 11 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/11.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">By The Editbeth Jat</h4>
                                            <a class="mb-1 line-clip-1">David King</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$160</del></span>
                                                <h6 class="mb-0"><b>$149</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Book 12 -->
                        <div class="col-sm-6 col-md-4 col-lg-3">
                            <div class="browse-bookcontent">
                                <div class="p-0">
                                    <div class="d-flex align-items-center">
                                        <div class="col-6 position-relative p-0 img-shadow">
                                            <a href="#" tabindex="-1" class="">
                                                <img src="{{ asset('admin-assets/images/browse-books/12.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                            </a>
                                            <div class="view-book">
                                                <a href="{{ url('shop/book-page') }}" class="btn view-book-btn">View Book</a>
                                            </div>
                                        </div>
                                        <div class="col-6 px-3">
                                            <h4 class="mb-1 line-clip-2">The Crucial Decade</h4>
                                            <a class="mb-1 line-clip-1">Attilio Marzi</a>
                                            <div class="d-block line-height font-size-19">
                                    <span class="text-warning">
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                        <i class="ph-fill ph-star"></i>
                                    </span>
                                            </div>
                                            <div class="price d-flex align-items-center mb-2">
                                                <span class="pe-1"><del>$99</del></span>
                                                <h6 class="mb-0"><b>$89</b></h6>
                                            </div>
                                            <div class="iq-product-action">
                                                <a href="#" class="btn btn-small-icon fs-1 cart-btn bg-primary-subtle">
                                                    <i class="ri-shopping-cart-2-fill text-primary fs-5"></i>
                                                </a>
                                                <a href="#" class="btn btn-small-icon ms-2 fs-1 wishlist-btn bg-danger-subtle">
                                                    <i class="ri-heart-fill text-danger fs-5"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-5 iq-featured">
                <div class="card rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="mb-0">Featured Books</h4>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                This Week
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-eye mr-2"></i> View</a></li>
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-trash mr-2"></i> Delete</a></li>
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-pencil-simple mr-2"></i> Edit</a></li>
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-printer mr-2"></i> Print</a></li>
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-file-arrow-down mr-2"></i> Download</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="p-5">
                        <div class="row align-items-center">
                            <div class="col-sm-5">
                                <a href="#" tabindex="-1">
                                    <img src="{{ asset('admin-assets/images/page-img/featured-book.png') }}" class="img-fluid rounded w-100" alt="" />
                                </a>
                            </div>
                            <div class="col-sm-7">
                                <h4 class="mb-2 mt-2 mt-md-0">Casey Christie night book into find...</h4>
                                <p class="mb-2">Author: Gheg origin</p>
                                <div class="mb-2">
                        <span class="font-size-12 text-warning">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                                </div>
                                <span class="text-dark mb-3 d-block">Lorem Ipsum is simply dummy test in find a of the printing and typeset ing industry into end.</span>
                                <button type="submit" class="btn btn-primary">Learn More</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-5">
                <div class="card rounded-3 card mb-0">
                    <div class="card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="mb-0">Featured Writer</h4>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent; border: none;">
                                This Week
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-eye mr-2"></i> View</a></li>
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-trash mr-2"></i> Delete</a></li>
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-pencil-simple mr-2"></i> Edit</a></li>
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-printer mr-2"></i> Print</a></li>
                                <li><a class="dropdown-item d-flex align-items-center gap-1" href="#"><i class="ph ph-file-arrow-down mr-2"></i> Download</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-0 align-items-center overflow-auto" style="max-height: 380px;">
                            <!-- Writer 1 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/01.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Brandon Guidelines</h6>
                                    <small class="mb-0">Publish Books: <b>2831</b></small>
                                </div>
                            </div>

                            <!-- Writer 2 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/02.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Hugh Millie-Yate</h6>
                                    <small class="mb-0">Publish Books: <b>432</b></small>
                                </div>
                            </div>

                            <!-- Writer 3 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/03.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Nathaneal Down</h6>
                                    <small class="mb-0">Publish Books: <b>5471</b></small>
                                </div>
                            </div>

                            <!-- Writer 4 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/04.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Thomas R. Toe</h6>
                                    <small class="mb-0">Publish Books: <b>8764</b></small>
                                </div>
                            </div>

                            <!-- Writer 5 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/05.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Druid Wensleydale</h6>
                                    <small class="mb-0">Publish Books: <b>8987</b></small>
                                </div>
                            </div>

                            <!-- Writer 6 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/06.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Natalya Undgrowth</h6>
                                    <small class="mb-0">Publish Books: <b>2831</b></small>
                                </div>
                            </div>

                            <!-- Writer 7 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/07.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Desmond Eagle</h6>
                                    <small class="mb-0">Publish Books: <b>4324</b></small>
                                </div>
                            </div>

                            <!-- Writer 8 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/08.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Lurch Schpellchek</h6>
                                    <small class="mb-0">Publish Books: <b>012</b></small>
                                </div>
                            </div>

                            <!-- Writer 9 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/09.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Natalya Undgrowth</h6>
                                    <small class="mb-0">Publish Books: <b>2831</b></small>
                                </div>
                            </div>

                            <!-- Writer 10 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/10.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Natalya Undgrowth</h6>
                                    <small class="mb-0">Publish Books: <b>2831</b></small>
                                </div>
                            </div>

                            <!-- Writer 11 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/11.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Natalya Undgrowth</h6>
                                    <small class="mb-0">Publish Books: <b>2831</b></small>
                                </div>
                            </div>

                            <!-- Writer 12 -->
                            <div class="col-sm-6 d-flex mb-3 align-items-center">
                                <a href="#" class="me-3">
                                    <img src="{{ asset('admin-assets/images/avatars/01.jpg') }}" alt="" class="img-fluid avatar-60 rounded-circle">
                                </a>
                                <div class="mt-1">
                                    <h6 class="mb-0">Natalya Undgrowth</h6>
                                    <small class="mb-0">Publish Books: <b>2831</b></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="card rounded-3">
                    <div class="card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="mb-0">Favorite Reads</h4>
                        </div>
                        <div class="iq-card-header-toolbar d-flex align-items-center">
                            <a href="{{ url('shop/category-page') }}" class="btn btn-primary view-more">View More</a>
                        </div>
                    </div>
                    <div class="p-2">
                        <div class="position-relative swiper-container swiper swiper-card h-50" data-slide="3" data-laptop="3"
                             data-tab="2" data-mobile="1" data-mobile-sm="1" data-autoplay="true" data-loop="true"
                             data-navigation="true" data-pagination="true">
                            <ul class="p-0 swiper-wrapper m-0 list-inline favorite-slider">
                                <!-- Favorite Read 1 -->
                                <li class="swiper-slide p-4">
                                    <div class="">
                                        <div class="p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="position-relative p-0 img-shadow">
                                                    <a href="#" tabindex="-1" class="">
                                                        <img src="{{ asset('admin-assets/images/favorite/01.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                                    </a>
                                                </div>
                                                <div class="col-6 px-3">
                                                    <h4 class="mb-1 line-clip-2">Every Book is a new Wonderful Travel..</h4>
                                                    <a class="mb-1 line-clip-1">Author : Pedro Araez</a>
                                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                                        <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                                            <span>Reading</span>
                                                            <span class="me-4">78%</span>
                                                        </div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-info" data-toggle="progress-bar" role="progressbar" style="width: 78px" aria-valuenow="78" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-dark read-now" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Favorite Read 2 -->
                                <li class="swiper-slide p-4">
                                    <div class="">
                                        <div class="p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="position-relative p-0 img-shadow">
                                                    <a href="#" tabindex="-1" class="">
                                                        <img src="{{ asset('admin-assets/images/favorite/02.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                                    </a>
                                                </div>
                                                <div class="col-6 px-3">
                                                    <h4 class="mb-1 line-clip-2">Casey Christie night book into find...</h4>
                                                    <a class="mb-1 line-clip-1">Author : Michael klock</a>
                                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                                        <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                                            <span>Reading</span>
                                                            <span class="me-4">78%</span>
                                                        </div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-warning" data-toggle="progress-bar" role="progressbar" style="width: 78px" aria-valuenow="78" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-dark read-now" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Favorite Read 3 -->
                                <li class="swiper-slide p-4">
                                    <div class="">
                                        <div class="p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="position-relative p-0 img-shadow">
                                                    <a href="#" tabindex="-1" class="">
                                                        <img src="{{ asset('admin-assets/images/favorite/03.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                                    </a>
                                                </div>
                                                <div class="col-6 px-3">
                                                    <h4 class="mb-1 line-clip-2">The Secret to English Busy People..</h4>
                                                    <a class="mb-1 line-clip-1">Author : Daniel Ace</a>
                                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                                        <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                                            <span>Reading</span>
                                                            <span class="me-4">78%</span>
                                                        </div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-success" data-toggle="progress-bar" role="progressbar" style="width: 78px" aria-valuenow="78" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-dark read-now" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                                <!-- Favorite Read 4 -->
                                <li class="swiper-slide p-4">
                                    <div class="">
                                        <div class="p-0">
                                            <div class="d-flex align-items-center">
                                                <div class="position-relative p-0 img-shadow">
                                                    <a href="#" tabindex="-1" class="">
                                                        <img src="{{ asset('admin-assets/images/favorite/04.jpg') }}" class="img-fluid rounded w-100" alt="" />
                                                    </a>
                                                </div>
                                                <div class="col-6 px-3">
                                                    <h4 class="mb-1 line-clip-2">The adventures of Robins books...</h4>
                                                    <a class="mb-1 line-clip-1">Author : Luka Afton</a>
                                                    <div class="iq-progress-bar-linear d-inline-block w-100">
                                                        <div class="d-flex justify-content-between align-items-center text-dark font-size-13">
                                                            <span>Reading</span>
                                                            <span class="me-4">78%</span>
                                                        </div>
                                                        <div class="progress" style="height: 6px">
                                                            <div class="progress-bar bg-danger" data-toggle="progress-bar" role="progressbar" style="width: 78px" aria-valuenow="78" aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-dark read-now" tabindex="-1">Read Now<i class="ri-arrow-right-s-line"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
