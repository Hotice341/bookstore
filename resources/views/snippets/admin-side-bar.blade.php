<aside class="sidebar sidebar-base " id="first-tour" data-toggle="main-sidebar" data-sidebar="responsive">
    <div class="sidebar-header d-flex align-items-center justify-content-start position-relative">
        <a href="{{ route('admin.dashboard') }}" class="navbar-brand">
            <!--Logo start-->
            <div class="logo-main">
                <img class="logo-normal img-fluid" src="{{ asset('admin-assets/images/logo.png') }}" height="30" alt="logo" />
                <img class="logo-color img-fluid" src="{{ asset('admin-assets/images/logo-white.png') }}" height="30" alt="logo" />
                <img class="logo-mini img-fluid" src="{{ asset('admin-assets/images/logo-mini.png') }}" alt="logo" />
                <img class="logo-mini-white img-fluid" src="{{ asset('admin-assets/images/logo-mini-white.png') }}" alt="logo" />
            </div>
            <!--logo End-->
        </a>

        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg class="icon-20 icon-arrow" width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M15.5 19L8.5 12L15.5 5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>

    <div class="sidebar-body pt-0 pb-3 data-scrollbar">
        <div class="sidebar-list">
            <!-- Sidebar Menu Start -->
            <ul class="navbar-nav iq-main-menu" id="sidebar-menu">
                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#">
                        <span class="default-icon">Main Pages</span>
                        <i class="sidenav-mini-icon">-</i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ isActive('admin.dashboard') }}" aria-current="page" href="{{ route('admin.dashboard') }}">
                        <i class="icon" data-bs-toggle="tooltip" title="Home Page" data-bs-placement="right">
                            <i class="ph-duotone ph-house"></i>
                        </i>
                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Home Page" data-bs-placement="right">HP</i>
                        <span class="item-name">Home Page</span>
                    </a>
                </li>

                <li class="nav-item iq-drop">
                    <a class="nav-link" data-bs-toggle="collapse" href="#user" role="button" aria-expanded="false">
                        <i class="icon" data-bs-toggle="tooltip" title="User" data-bs-placement="right">
                            <i class="ph-duotone ph-user"></i>
                        </i>

                        <span class="item-name">User</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>

                    <ul class="sub-nav collapse" id="user" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ isActive('admin.users') }}" aria-current="page" href="{{ route('admin.users') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="User List" data-bs-placement="right">
                                    <i class="ph-duotone ph-rows"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="User List" data-bs-placement="right">UL</i>
                                <span class="item-name">User List</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item iq-drop">
                    <a class="nav-link" data-bs-toggle="collapse" href="#category" role="button" aria-expanded="false">
                        <i class="icon" data-bs-toggle="tooltip" title="Admin" data-bs-placement="right">
                            <i class="ph-duotone ph-squares-four"></i>
                        </i>

                        <span class="item-name">Category</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>

                    <ul class="sub-nav collapse" id="category" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ isActive('categories.index') }}" aria-current="page" href="{{ route('categories.index') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="Category List" data-bs-placement="right">
                                    <i class="ph-duotone ph-list-plus"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Category List" data-bs-placement="right">CL</i>
                                <span class="item-name">Category Lists</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ isActive('categories.create') }}" aria-current="page" href="{{ route('categories.create') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="Add Category" data-bs-placement="right">
                                    <i class="ri-add-circle-fill"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Add Category" data-bs-placement="right">AC</i>
                                <span class="item-name">Add Category</span>
                            </a>
                        </li>

                    </ul>
                </li>

                <li class="nav-item iq-drop">
                    <a class="nav-link" data-bs-toggle="collapse" href="#books" role="button" aria-expanded="false">
                        <i class="icon" data-bs-toggle="tooltip" title="Admin" data-bs-placement="right">
                            <i class="ph-duotone ph-book-bookmark"></i>
                        </i>
                        <span class="item-name">Books</span>
                        <i class="right-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" class="icon-18" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                            </svg>
                        </i>
                    </a>
                    <ul class="sub-nav collapse" id="books" data-bs-parent="#sidebar-menu">
                        <li class="nav-item">
                            <a class="nav-link {{ isActive('books.index') }}" aria-current="page" href="{{ route('books.index') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="Book List" data-bs-placement="right">
                                    <i class="ph-duotone ph-list-plus"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Category List" data-bs-placement="right">BL</i>
                                <span class="item-name">Book Lists</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ isActive('books.create') }}" aria-current="page" href="{{ route('books.create') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="Add Book" data-bs-placement="right">
                                    <i class="ph-duotone ph-book-bookmark"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Add Book" data-bs-placement="right">AB</i>
                                <span class="item-name">Add Book</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link {{ isActive('books.trashed') }}" aria-current="page" href="{{ route('books.trashed') }}">
                                <i class="icon" data-bs-toggle="tooltip" title="Add Book" data-bs-placement="right">
                                    <i class="ph-duotone ph-book-bookmark"></i>
                                </i>
                                <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Add Book" data-bs-placement="right">AB</i>
                                <span class="item-name">Trashed Books</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li>
                    <hr class="hr-horizontal">
                </li>

                <li class="nav-item static-item">
                    <a class="nav-link static-item disabled" href="#">
                        <span class="default-icon">Pages</span>
                        <i class="sidenav-mini-icon">-</i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ isActive('transactions.index') }}" aria-current="page" href="{{ route('transactions.index') }}">
                        <i class="icon" data-bs-toggle="tooltip" title="Home Page" data-bs-placement="right">
                            <i class="ph-duotone ph-list-bullets"></i>
                        </i>
                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Home Page" data-bs-placement="right">HP</i>
                        <span class="item-name">Transactions</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link {{ isActive('books.orders') }}" aria-current="page" href="{{ route('books.orders') }}">
                        <i class="icon" data-bs-toggle="tooltip" title="Home Page" data-bs-placement="right">
                            <i class="ph-duotone ph-book-bookmark"></i>
                        </i>
                        <i class="sidenav-mini-icon" data-bs-toggle="tooltip" title="Home Page" data-bs-placement="right">HP</i>
                        <span class="item-name">Book Orders</span>
                    </a>
                </li>
            </ul>
            <!-- Sidebar Menu End -->
        </div>

        <div class="p-3 iq-membership">
            <img src="{{ asset('admin-assets/images/page-img/side-bkg.png') }}" alt="book" class="img-fluid">
            <button class="btn w-100 btn-primary mt-4">Become Membership</button>
        </div>
    </div>
</aside>
