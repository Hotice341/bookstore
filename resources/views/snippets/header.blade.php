<header class="site-header mo-left header style-1">
    <!-- Main Header -->
    <div class="header-info-bar">
        <div class="container clearfix">
            <!-- Website Logo -->
            <div class="logo-header logo-dark">
                <a href="/"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
            </div>

            <!-- EXTRA NAV -->
            <div class="extra-nav">
                <div class="extra-cell">
                    <ul class="navbar-nav header-right">
                        <li class="nav-item">
                            <a class="nav-link" href="wishlist.html">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"/></svg>
                                <span class="badge">21</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="nav-link box cart-btn">
                                <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                                <span class="badge">5</span>
                            </button>
                            <ul class="dropdown-menu cart-list">
                                <li class="cart-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="books-detail.html">
                                                <img alt="" class="media-object" src="{{ asset('assets/images/books/small/pic1.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="dz-title"><a href="books-detail.html" class="media-heading">Real Life</a></h6>
                                            <span class="dz-price">$28.00</span>
                                            <span class="item-close">&times;</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="cart-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="books-detail.html">
                                                <img alt="" class="media-object" src="{{ asset('assets/images/books/small/pic2.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="dz-title"><a href="books-detail.html" class="media-heading">Home</a></h6>
                                            <span class="dz-price">$28.00</span>
                                            <span class="item-close">&times;</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="cart-item">
                                    <div class="media">
                                        <div class="media-left">
                                            <a href="books-detail.html">
                                                <img alt="" class="media-object" src="{{ asset('assets/images/books/small/pic3.jpg') }}">
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <h6 class="dz-title"><a href="books-detail.html" class="media-heading">Such a fun age</a></h6>
                                            <span class="dz-price">$28.00</span>
                                            <span class="item-close">&times;</span>
                                        </div>
                                    </div>
                                </li>
                                <li class="cart-item text-center">
                                    <h6 class="text-secondary">Totle = $500</h6>
                                </li>
                                <li class="text-center d-flex">
                                    <a href="shop-cart.html" class="btn btn-sm btn-primary me-2 btnhover w-100">View Cart</a>
                                    <a href="shop-checkout.html" class="btn btn-sm btn-outline-primary btnhover w-100">Checkout</a>
                                </li>
                            </ul>
                        </li>
                        @auth
                            <li class="nav-item dropdown profile-dropdown ms-4">
                                <a class="nav-link" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ Auth::user()->profile && Auth::user()->profile->profile_picture ? asset('profile/' . Auth::user()->profile->profile_picture) : 'https://placehold.co/124x124/000000/FFF?text=' . substr(Auth::user()->name, 0, 1) }}" alt="/">
                                    <div class="profile-info">
                                        <h6 class="title">{{ Auth::user()->name }}</h6>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                </a>
                                <div class="dropdown-menu py-0 dropdown-menu-end">
                                    <div class="dropdown-header">
                                        <h6 class="m-0">{{ Auth::user()->name }}</h6>
                                        <span>{{ Auth::user()->email }}</span>
                                    </div>
                                    <div class="dropdown-body">
                                        <a href="{{ route('user.profile') }}" class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M12 6c1.1 0 2 .9 2 2s-.9 2-2 2-2-.9-2-2 .9-2 2-2m0 10c2.7 0 5.8 1.29 6 2H6c.23-.72 3.31-2 6-2m0-12C9.79 4 8 5.79 8 8s1.79 4 4 4 4-1.79 4-4-1.79-4-4-4zm0 10c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z"/></svg>
                                                <span class="ms-2">Profile</span>
                                            </div>
                                        </a>

                                        <a href="shop-cart.html" class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49c.37-.66-.11-1.48-.87-1.48H5.21l-.94-2H1v2h2l3.6 7.59-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2 2-.9 2-2-.9-2-2-2z"/></svg>
                                                <span class="ms-2">My Order</span>
                                            </div>
                                        </a>
                                        <a href="wishlist.html" class="dropdown-item d-flex justify-content-between align-items-center ai-icon">
                                            <div>
                                                <svg xmlns="http://www.w3.org/2000/svg" height="20px" viewBox="0 0 24 24" width="20px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M16.5 3c-1.74 0-3.41.81-4.5 2.09C10.91 3.81 9.24 3 7.5 3 4.42 3 2 5.42 2 8.5c0 3.78 3.4 6.86 8.55 11.54L12 21.35l1.45-1.32C18.6 15.36 22 12.28 22 8.5 22 5.42 19.58 3 16.5 3zm-4.4 15.55l-.1.1-.1-.1C7.14 14.24 4 11.39 4 8.5 4 6.5 5.5 5 7.5 5c1.54 0 3.04.99 3.57 2.36h1.87C13.46 5.99 14.96 5 16.5 5c2 0 3.5 1.5 3.5 3.5 0 2.89-3.14 5.74-7.9 10.05z"/></svg>
                                                <span class="ms-2">Wishlist</span>
                                            </div>
                                        </a>
                                    </div>
                                    <div class="dropdown-footer">
                                        <a class="btn btn-primary w-100 btnhover btn-sm" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </li>
                        @endauth
                    </ul>
                </div>
            </div>

            <!-- header search nav -->
            <div class="header-search-nav">
                <form class="header-item-search">
                    <div class="input-group search-input">
                        <select class="default-select">
                            <option>Category</option>
                            <option>Photography </option>
                            <option>Arts</option>
                            <option>Adventure</option>
                            <option>Action</option>
                            <option>Games</option>
                            <option>Movies</option>
                            <option>Comics</option>
                            <option>Biographies</option>
                            <option>Children’s Books</option>
                            <option>Historical</option>
                            <option>Contemporary</option>
                            <option>Classics</option>
                            <option>Education</option>
                        </select>
                        <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search Books Here">
                        <button class="btn" type="button"><i class="flaticon-loupe"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Main Header End -->

    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix">
            <div class="container clearfix">
                <!-- Website Logo -->
                <div class="logo-header logo-dark">
                    <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt="logo"></a>
                </div>

                <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>

                <!-- EXTRA NAV -->
                <div class="extra-nav">
                    <div class="extra-cell">
                        @auth
                            @if(Auth::user()->role_as == 1)
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary btnhover">Dashboard</a>
                                <a href="{{ route('logout') }}" class="btn btn-secondary btnhover" style="cursor: pointer;" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>

                                <form action="{{ route('logout') }}" method="post" style="display: none;" id="logout-form">
                                    @csrf
                                </form>
                            @elseif(Auth::user()->role_as == 0)
                                <a href="{{ route('user.dashboard') }}" class="btn btn-primary btnhover">Dashboard</a>
                                <a href="{{ route('logout') }}" class="btn btn-secondary btnhover" style="cursor: pointer;" onclick="event.preventDefault(); document.getElementById('logout-form').submit()">Logout</a>

                                <form action="{{ route('logout') }}" method="post" style="display: none;" id="logout-form">
                                    @csrf
                                </form>
                            @endif
                        @endauth

                        @guest
                            <a href="{{ route('sign-in') }}" class="btn btn-primary btnhover">Login</a>
                            <a href="{{ route('sign-up') }}" class="btn btn-secondary btnhover">Register</a>
                        @endguest
                    </div>
                </div>

                <!-- Main Nav -->
                <div class="header-nav navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                    <div class="logo-header logo-dark">
                        <a href="index.html"><img src="{{ asset('assets/images/logo.png') }}" alt=""></a>
                    </div>

                    <form class="search-input">
                        <div class="input-group">
                            <input type="text" class="form-control" aria-label="Text input with dropdown button" placeholder="Search Books Here">
                            <button class="btn" type="button"><i class="flaticon-loupe"></i></button>
                        </div>
                    </form>

                    <ul class="nav navbar-nav">
                        <li><a href="/">Home</a></li>
                        <li class="sub-menu-down">
                            <a href="javascript:void(0);">
                                <span>Categories</span>
                            </a>
                            <ul class="sub-menu">
                                @foreach($frontendCategories as $category)
                                    <li>
                                        <a href="{{ route('category.details', $category->slug) }}"><span>{{ $category->name }}</span></a>
                                    </li>
                                @endforeach

                                <hr>

                                <li>
                                    <a href="about-us.html"><span>View All</span></a>
                                </li>
                            </ul>
                        </li>
                        <li><a href="{{ route('books') }}">Books</a></li>
                        <li><a href="{{ route('blogs') }}">Blogs</a></li>
                        <li><a href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Header End -->

</header>
