@extends('layouts.app')
@section('content')
    <div class="page-content bg-grey">
        <section class="content-inner-1">
            <div class="container">
                <div class="row book-grid-row style-4 m-b60">
                    <div class="col">
                        <div class="dz-box">
                            <div class="dz-media">
                                <img src="{{ $book->cover_image ? asset('uploads/books-cover/' . $book->cover_image) : 'https://placehold.co/124x124/000000/FFF?text=Cover+Image' }}" alt="book">
                            </div>

                            <div class="dz-content">
                                <div class="dz-header">
                                    <h3 class="title">{{ $book->title }}</h3>
                                    <div class="shop-item-rating">
                                        <div class="d-lg-flex d-sm-inline-flex d-flex align-items-center">
                                            <ul class="dz-rating">
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-yellow"></i></li>
                                                <li><i class="flaticon-star text-muted"></i></li>
                                            </ul>
                                            <h6 class="m-b0">4.0</h6>
                                        </div>
                                        <div class="social-area">
                                            <ul class="dz-social-icon style-3">
                                                <li><a href="https://www.facebook.com/dexignzone" target="_blank"><i class="fa-brands fa-facebook-f"></i></a></li>
                                                <li><a href="https://twitter.com/dexignzones" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                                                <li><a href="https://www.whatsapp.com/" target="_blank"><i class="fa-brands fa-whatsapp"></i></a></li>
                                                <li><a href="https://www.google.com/intl/en-GB/gmail/about/" target="_blank"><i class="fa-solid fa-envelope"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="dz-body">
                                    <div class="book-detail">
                                        <ul class="book-info">
                                            <li>
                                                <div class="writer-info">
                                                    <img src="{{ $profilePictureUrl }}" alt="book">
                                                    <div>
                                                        <span>Written by</span>{{ $book->authors }}
                                                    </div>
                                                </div>
                                            </li>
                                            <li><span>Publisher</span>{{ $book->publisher }}</li>
                                            <li><span>Year</span>{{ $book->publication_year }}</li>
                                        </ul>
                                    </div>

                                    <p class="text-1">
                                        {{ $book->description }}
                                    </p>

                                    <div class="book-footer">
                                        <div class="price">
                                            <h5>₦{{ number_format($book->price) }}</h5>
                                        </div>

                                        <form action="{{ route('pay') }}" method="POST">
                                            @csrf

                                            <div class="product-num">
                                                <div class="quantity btn-quantity style-1 me-3">
                                                    <input type="number" value="1" min="1" name="quantity" class="form-control" style="display: block;border: 1px solid #000000;">
                                                </div>
                                                <input type="hidden" name="book_id" value="{{ $book->id }}">
                                                <button type="submit" class="btn btn-primary btnhover btnhover2">
                                                    <i class="flaticon-shopping-cart-1"></i>
                                                    <span>Buy Book</span>
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xl-8">
                        <div class="product-description tabs-site-button">
                            <ul class="nav nav-tabs">
                                <li><a class="active">Book Details</a></li>
                            </ul>

                            <table class="table border book-overview">
                                <tr>
                                    <th>Book Title</th>
                                    <td>{{ $book->title }}</td>
                                </tr>

                                <tr>
                                    <th>Author</th>
                                    <td>{{ $book->authors }}</td>
                                </tr>

                                <tr>
                                    <th>ISBN</th>
                                    <td>(ISBN13: {{ $book->isbn }})</td>
                                </tr>

                                <tr>
                                    <th>Date Published</th>
                                    <td>{{ $book->publication_year }}</td>
                                </tr>

                                <tr>
                                    <th>Publisher</th>
                                    <td>{{ $book->publisher }}</td>
                                </tr>

                                <tr>
                                    <th>Pages</th>
                                    <td>{{ $book->pages }} pages</td>
                                </tr>

                                <tr class="tags">
                                    <th>Category</th>
                                    <td>
                                        <a href="javascript:void(0);" class="badge">{{ $book->category->name }}</a>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="col-xl-4 mt-5 mt-xl-0">
                        <div class="widget">
                            <h4 class="widget-title">Related Books</h4>
                            <div class="row">

                                @foreach($relatedBooks as $book)
                                    <div class="col-xl-12 col-lg-6">
                                        <div class="dz-shop-card style-5">
                                            <div class="dz-media">
                                                <img src="{{ $book->cover_image ? asset('uploads/books-cover/' . $book->cover_image) : 'https://placehold.co/124x124/000000/FFF?text=Cover+Image' }}" alt="">
                                            </div>

                                            <div class="dz-content">
                                                <h5 class="subtitle">{{ $book->title }}</h5>

                                                <ul class="dz-tags">
                                                    <li>{{ $book->category->name }}</li>
                                                </ul>

                                                <div class="price">
                                                    <span class="price-num">₦{{ number_format($book->price) }}</span>
                                                </div>

                                                <a href="{{ route('books.details', $book->id) }}" class="btn btn-outline-primary btn-sm btnhover btnhover2">
                                                    <i class="flaticon-shopping-cart-1 me-2"></i> View Book
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
