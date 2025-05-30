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
            <li class="breadcrumb-item active" aria-current="page">{{ $title }} - {{ $book->title }}</li>
        </ol>
    </nav>

    <div class="content-inner container-fluid pb-0" id="page_layout">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-8 col-lg-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center position-relative">
                        <div class="iq-header-title">
                            <h4 class="mb-0">{{ $title }} - {{ $book->title }}</h4>
                        </div>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('books.update', $book->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-12 mb-5">
                                    <div class="form-group">
                                        <label class="mb-2">Cover Image:</label>
                                        <input type="file" class="form-control p-2 bg-white border" name="cover_image" id="hidden-input">
                                        @error('cover_image')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <img id="preview" src="{{ $book->cover_image ? asset('uploads/books-cover/' . $book->cover_image) : 'https://placehold.co/124x124/000000/FFF?text=Cover+Image' }}" class="img-fluid rounded" width="124" height="124" style="object-fit: cover; border-radius: 10px; border: 1px solid #dee2e6;" alt="{{ $book->title }} cover image" onerror="this.onerror=null; this.src='https://placehold.co/124x124/000000/FFF?text=Cover+Image'">
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">Book Name:</label>
                                        <input type="text" class="form-control p-2 bg-white border @error('title') is-invalid @enderror" name="title" value="{{ old('title', $book->title) }}" placeholder="Book Title">
                                        @error('title')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label>Book Category:</label>
                                        <select class="select2-basic-single form-control @error('category_id') is-invalid @enderror" name="category_id">
                                            <option value="">Select Category</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}"{{ old('category_id', $book->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">Book Author:</label>
                                        <input type="text" class="form-control p-2 bg-white border @error('authors') is-invalid @enderror" name="authors" value="{{ old('authors', $book->authors) }}" placeholder="Authors">
                                        @error('authors')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">ISBN:</label>
                                        <input type="text" class="form-control p-2 bg-white border @error('isbn') is-invalid @enderror" name="isbn" value="{{ old('isbn', $book->isbn) }}" placeholder="Book ISBN">
                                        @error('isbn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">Quantity:</label>
                                        <input type="text" class="form-control p-2 bg-white border @error('quantity') is-invalid @enderror" name="quantity" value="{{ old('quantity', $book->quantity) }}" placeholder="Quantity Of Books">
                                        @error('quantity')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">Price:</label>
                                        <input type="text" class="form-control p-2 bg-white border @error('price') is-invalid @enderror" name="price" value="{{ old('price', $book->price) }}" placeholder="0.00">
                                        @error('price')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">Publication Year:</label>
                                        <input type="text" class="form-control p-2 bg-white border @error('publication_year') is-invalid @enderror" name="publication_year" value="{{ old('publication_year', $book->publication_year) }}" placeholder="Book Publication Year">
                                        @error('publication_year')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">Publisher:</label>
                                        <input type="text" class="form-control p-2 bg-white border @error('publisher') is-invalid @enderror" name="publisher" value="{{ old('publisher', $book->publisher) }}" placeholder="Book Publisher">
                                        @error('publisher')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">Edition:</label>
                                        <input type="text" class="form-control p-2 bg-white border @error('edition') is-invalid @enderror" name="edition" value="{{ old('edition', $book->edition) }}" placeholder="Book Edition">
                                        @error('edition')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">Pages:</label>
                                        <input type="text" class="form-control p-2 bg-white border @error('pages') is-invalid @enderror" name="pages" value="{{ old('pages', $book->pages) }}" placeholder="Number Of Pages">
                                        @error('pages')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-12 mb-2">
                                    <div class="form-group">
                                        <label class="mb-2">Book Description:</label>
                                        <textarea type="text" name="description" class="form-control bg-white border @error('isbn') is-invalid @enderror" placeholder="Description">{{ old('description', $book->description) }}</textarea>
                                        @error('description')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
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
@endsection
