<!DOCTYPE html>
<html lang="en" dir="ltr" data-startbar="light" data-bs-theme="light">

<head>
    <meta charset="utf-8" />
    <title>Admin & Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('backend/assets/images/favicon.ico') }}">
    <link rel="stylesheet" href="{{ asset('backend/assets/libs/jsvectormap/css/jsvectormap.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- App css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/libs/simple-datatables/style.css') }}" rel="stylesheet" type="text/css" />
    <!-- Sweet Alert -->
    <link href="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('backend/assets/libs/animate.css/animate.min.css') }}" rel="stylesheet" type="text/css">

<body>

    <!-- Top Bar Start -->
    <div class="topbar d-print-none">
        <div class="container-xxl">
            <nav class="topbar-custom d-flex justify-content-between" id="topbar-custom">


                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li>
                        <button class="nav-link mobile-menu-btn nav-icon" id="togglemenu">
                            <i class="iconoir-menu-scale"></i>
                        </button>
                    </li>

                    <li class="mx-3 welcome-text">
                        <h3 class="mb-0 fw-bold text-truncate">Hello, {{ optional(Auth::user())->name ?? 'Guest' }}</h3>
                        <h6 class="mb-0 fw-normal text-muted text-truncate fs-14">Here's your overview this week.</h6>
                    </li>


                </ul>
                <ul class="topbar-item list-unstyled d-inline-flex align-items-center mb-0">
                    <li class="hide-phone app-search">
                        <form role="search" action="#" method="get">
                            <input type="search" name="search" class="form-control top-search mb-0"
                                placeholder="Search here...">
                            <button type="submit"><i class="iconoir-search"></i></button>
                        </form>
                    </li>
                    <li class="dropdown">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown" href="#"
                            role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend/assets/images/flags/us_flag.jpg') }}" alt=""
                                class="thumb-sm rounded-circle">
                        </a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="#"><img
                                    src="{{ asset('backend/assets/images/flags/us_flag.jpg') }}" alt=""
                                    height="15" class="me-2">English</a>
                            <a class="dropdown-item" href="#"><img
                                    src="{{ asset('backend/assets/images/flags/spain_flag.jpg') }}" alt=""
                                    height="15" class="me-2">Spanish</a>
                            <a class="dropdown-item" href="#"><img
                                    src="{{ asset('backend/assets/images/flags/germany_flag.jpg') }}" alt=""
                                    height="15" class="me-2">German</a>
                            <a class="dropdown-item" href="#"><img
                                    src="{{ asset('backend/assets/images/flags/french_flag.jpg') }}" alt=""
                                    height="15" class="me-2">French</a>
                        </div>
                    </li>
                    <!--end topbar-language-->

                    <li class="topbar-item">
                        <a class="nav-link nav-icon" href="javascript:void(0);" id="light-dark-mode">
                            <i class="icofont-moon dark-mode"></i>
                            <i class="icofont-sun light-mode"></i>
                        </a>
                    </li>

                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <i class="icofont-bell-alt"></i>
                            <span class="alert-badge"></span>
                        </a>
                        <div class="dropdown-menu stop dropdown-menu-end dropdown-lg py-0">

                            <h5 class="dropdown-item-text m-0 py-3 d-flex justify-content-between align-items-center">
                                Notifications <a href="#" class="badge text-body-tertiary badge-pill">
                                    <i class="iconoir-plus-circle fs-4"></i>
                                </a>
                            </h5>
                            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-1" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mx-0 active" data-bs-toggle="tab" href="#All"
                                        role="tab" aria-selected="true">
                                        All <span
                                            class="badge bg-primary-subtle text-primary badge-pill ms-1">24</span>
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mx-0" data-bs-toggle="tab" href="#Projects" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        Projects
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link mx-0" data-bs-toggle="tab" href="#Teams" role="tab"
                                        aria-selected="false" tabindex="-1">
                                        Team
                                    </a>
                                </li>
                            </ul>
                            <div class="ms-0" style="max-height:230px;" data-simplebar>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="All" role="tabpanel"
                                        aria-labelledby="all-tab" tabindex="0">
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-wolf fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed
                                                    </h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing and
                                                        industry.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">10 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-apple-swift fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Meeting with designers
                                                    </h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a
                                                        reader.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">40 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-birthday-cake fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">UX 3 Task complete.</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">1 hr ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-drone fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed
                                                    </h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a
                                                        reader.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-user fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Payment Successfull</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                    </div>
                                    <div class="tab-pane fade" id="Projects" role="tabpanel"
                                        aria-labelledby="projects-tab" tabindex="0">
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">40 min ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-birthday-cake fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">UX 3 Task complete.</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">1 hr ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-drone fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed
                                                    </h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a
                                                        reader.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-user fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Payment Successfull</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                    </div>
                                    <div class="tab-pane fade" id="Teams" role="tabpanel"
                                        aria-labelledby="teams-tab" tabindex="0">
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">1 hr ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-drone fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Your order is placed
                                                    </h6>
                                                    <small class="text-muted mb-0">It is a long established fact that a
                                                        reader.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                        <!-- item-->
                                        <a href="#" class="dropdown-item py-3">
                                            <small class="float-end text-muted ps-2">2 hrs ago</small>
                                            <div class="d-flex align-items-center">
                                                <div
                                                    class="flex-shrink-0 bg-primary-subtle text-primary thumb-md rounded-circle">
                                                    <i class="iconoir-user fs-4"></i>
                                                </div>
                                                <div class="flex-grow-1 ms-2 text-truncate">
                                                    <h6 class="my-0 fw-normal text-dark fs-13">Payment Successfull</h6>
                                                    <small class="text-muted mb-0">Dummy text of the printing.</small>
                                                </div>
                                                <!--end media-body-->
                                            </div>
                                            <!--end media-->
                                        </a>
                                        <!--end-item-->
                                    </div>
                                </div>

                            </div>
                            <!-- All-->
                            <a href="pages-notifications.html" class="dropdown-item text-center text-dark fs-13 py-2">
                                View All <i class="fi-arrow-right"></i>
                            </a>
                        </div>
                    </li>

                    <li class="dropdown topbar-item">
                        <a class="nav-link dropdown-toggle arrow-none nav-icon" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt=""
                                class="thumb-lg rounded-circle">
                        </a>
                        <div class="dropdown-menu dropdown-menu-end py-0">
                            <div class="d-flex align-items-center dropdown-item py-2 bg-secondary-subtle">
                                <div class="flex-shrink-0">
                                    <img src="{{ asset('backend/assets/images/users/avatar-1.jpg') }}" alt=""
                                        class="thumb-md rounded-circle">
                                </div>
                                <div class="flex-grow-1 ms-2 text-truncate align-self-center">
                                    <h6 class="my-0 fw-medium text-dark fs-13">William Martin</h6>
                                    <small class="text-muted mb-0">Front End Developer</small>
                                </div>
                                <!--end media-body-->
                            </div>
                            <div class="dropdown-divider mt-0"></div>
                            <small class="text-muted px-2 pb-1 d-block">Account</small>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-user fs-18 me-1 align-text-bottom"></i> Profile</a>
                            <a class="dropdown-item" href="pages-faq.html"><i
                                    class="las la-wallet fs-18 me-1 align-text-bottom"></i> Earning</a>
                            <small class="text-muted px-2 py-1 d-block">Settings</small>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-cog fs-18 me-1 align-text-bottom"></i>Account Settings</a>
                            <a class="dropdown-item" href="pages-profile.html"><i
                                    class="las la-lock fs-18 me-1 align-text-bottom"></i> Security</a>
                            <a class="dropdown-item" href="pages-faq.html"><i
                                    class="las la-question-circle fs-18 me-1 align-text-bottom"></i> Help Center</a>
                            <div class="dropdown-divider mb-0"></div>
                            <!-- <a class="dropdown-item text-danger" href="{{ asset('backend/auth-login.html') }}"><i
                                    class="las la-power-off fs-18 me-1 align-text-bottom"></i> Logout</a> -->
                            <a class="dropdown-item text-danger" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="las la-power-off fs-18 me-1 align-text-bottom"></i>{{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <!--end topbar-nav-->
            </nav>
            <!-- end navbar-->
        </div>
    </div>
    <!-- Top Bar End -->
    <!-- leftbar-tab-menu -->
    <div class="startbar d-print-none">
        <!--start brand-->
        <div class="brand">
            <a href="{{ asset('backend/ecommerce-index.html') }}" class="logo">
                <span>
                    <img src="{{ asset('backend/assets/images/logo-sm.png') }}" alt="logo-small" class="logo-sm">
                </span>
                <span class="">
                    <img src="{{ asset('backend/assets/images/logo-light.png') }}" alt="logo-large"
                        class="logo-lg logo-light">
                    <img src="{{ asset('backend/assets/images/logo-dark.png') }}" alt="logo-large"
                        class="logo-lg logo-dark">
                </span>
            </a>
        </div>
        <!--end brand-->
        <!--start startbar-menu-->
        <div class="startbar-menu">
            <div class="startbar-collapse" id="startbarCollapse" data-simplebar>
                <div class="d-flex align-items-start flex-column w-100">
                    <!-- Navigation -->
                    <ul class="navbar-nav mb-auto w-100">
                        <li class="menu-label pt-0 mt-0">
                            <!-- <small class="label-border">
                                <div class="border_left hidden-xs"></div>
                                <div class="border_right"></div>
                            </small> -->
                            <span>Main Menu</span>
                        </li>
                        {{-- User Management --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarUserManagement" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarUserManagement">
                                <i class="iconoir-user-circle menu-icon"></i>
                                <span>User Management</span>
                            </a>
                            <div class="collapse" id="sidebarUserManagement">
                                <ul class="nav flex-column ms-2">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.index') }}">All
                                            Users</a>
                                    </li>
                                    <!-- Add User -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.create') }}">Add
                                            User</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!--end nav-item-->

                        {{-- Authentication --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarAuthentication" data-bs-toggle="collapse"
                                role="button" aria-expanded="false" aria-controls="sidebarAuthentication">
                                <i class="iconoir-fingerprint-lock-circle menu-icon"></i>
                                <span>Authentication</span>
                            </a>
                            <div class="collapse " id="sidebarAuthentication">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Log in</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ asset('backend/auth-recover-pw.html') }}">Re-Password</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ asset('backend/auth-lock-screen.html') }}">Lock
                                            Screen</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link"
                                            href="{{ asset('backend/auth-maintenance.html') }}">Maintenance</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ asset('backend/auth-404.html') }}">Error 404</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ asset('backend/auth-500.html') }}">Error 500</a>
                                    </li>
                                    <!--end nav-item-->
                                </ul>
                                <!--end nav-->
                            </div>
                            <!--end startbarAuthentication-->
                        </li>
                        <!--end nav-item-->

                        {{-- Branches --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarBranches" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarBranches">
                                <i class="iconoir-shop-four-tiles menu-icon"></i>
                                <span>Branches</span>
                            </a>
                            <div class="collapse " id="sidebarBranches">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">All Branches</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Add Branch</a>
                                    </li>
                                </ul>
                                <!--end nav-->
                            </div>
                            <!--end startbarAuthentication-->
                        </li>
                        <!--end nav-item-->

                        {{-- Suppliers --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarSuppliers" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarSuppliers">
                                <i class="iconoir-user-badge-check menu-icon"></i>
                                <span>Suppliers</span>
                            </a>
                            <div class="collapse" id="sidebarSuppliers">
                                <ul class="nav flex-column ms-2">
                                    <!-- All Suppliers (Parent of second dropdown) -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#allSuppliersSubmenu" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="allSuppliersSubmenu">
                                            All Suppliers
                                            <i class="bi bi-chevron-down float-end"></i>
                                        </a>
                                        <div class="collapse" id="allSuppliersSubmenu">
                                            <ul class="nav flex-column ms-3">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        Supplier 1
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        Supplier 2
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">
                                                        Supplier 3
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <!-- Add Supplier -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Add
                                            Suppliers</a>
                                    </li>
                                </ul>
                            </div>
                            <!--end startbarsupplier-->
                        </li>
                        <!--end nav-item-->

                        {{-- products --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarCategories" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarCategories">
                                <i class="iconoir-gift menu-icon"></i>
                                <span>Products</span>
                            </a>
                            <div class="collapse" id="sidebarCategories">
                                <ul class="nav flex-column ms-2">
                                    <!-- All Users (Parent of second dropdown) -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#CategorySubmenu" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="CategorySubmenu">
                                            All Categories
                                            <i class="bi bi-chevron-down float-end"></i>
                                        </a>
                                        <div class="collapse" id="CategorySubmenu">
                                            <ul class="nav flex-column ms-3">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Laptops</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Desktops</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Monitors</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Keyboards</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Components</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <!-- Add category -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Add Category</a>
                                    </li>
                                </ul>
                            </div>
                            <!--end startbarBranches-->
                        </li>
                        <!--end nav-item-->

                        {{-- Purchase Order --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarPurchase" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarPurchase">
                                <i class="iconoir-apple-wallet menu-icon"></i>
                                <span>Purchase Order</span>
                            </a>
                            <div class="collapse " id="sidebarPurchase">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Create Purchase Order</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Payment Record </a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ asset('backend/auth-recover-pw.html') }}">Track
                                            Delivery Status</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ asset('backend/auth-lock-screen.html') }}">
                                            Receive Items</a>
                                    </li>
                                    <!--end nav-item-->
                                </ul>
                                <!--end nav-->
                            </div>
                            <!--end startbarBranches-->
                        </li>
                        <!--end nav-item-->

                        {{-- Stock --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarHeadstock" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarHeadstock">
                                <i class="iconoir-drawer menu-icon"></i>
                                <span>Head Stocks</span>
                            </a>
                            <div class="collapse " id="sidebarHeadstock">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">Stock in</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">Stock out</a>
                                    </li>
                                    <!--end nav-item-->
                                </ul>
                                <!--end nav-->
                            </div>
                            <!--end startbarBranches-->
                        </li>
                        <!--end nav-item-->

                        {{-- Distribute --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarDistribute" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarDistribute">
                                <i class="iconoir-truck-green menu-icon"></i>
                                <span>Distribute</span>
                            </a>
                            <div class="collapse " id="sidebarDistribute">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">To Campus 1</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">To Campus 2</a>
                                    </li>
                                    <!--end nav-item-->
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">To Campus 3</a>
                                    </li>
                                    <!--end nav-item-->
                                </ul>
                                <!--end nav-->
                            </div>
                            <!--end startbarBranches-->
                        </li>
                        <!--end nav-item-->

                        {{-- Reports --}}
                        <li class="nav-item">
                            <a class="nav-link" href="#sidebarReports" data-bs-toggle="collapse" role="button"
                                aria-expanded="false" aria-controls="sidebarReports">
                                <i class="iconoir-page-edit menu-icon"></i>
                                <span>Reports</span>
                            </a>
                            <div class="collapse" id="sidebarReports">
                                <ul class="nav flex-column ms-2">
                                    <!-- All Users (Parent of second dropdown) -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#ReportSubmenu" data-bs-toggle="collapse"
                                            role="button" aria-expanded="false" aria-controls="ReportSubmenu">
                                            All Reports
                                            <i class="bi bi-chevron-down float-end"></i>
                                        </a>
                                        <div class="collapse" id="ReportSubmenu">
                                            <ul class="nav flex-column ms-3">
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Stock
                                                        Report</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Purchase Report</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" href="#">Distribution
                                                        Report</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>

                                    <!-- Add User -->
                                    <li class="nav-item">
                                        <a class="nav-link" href="#">Damaged/Missing Items</a>
                                    </li>
                                </ul>
                            </div>
                            <!--end startbarBranches-->
                        </li>
                        <!--end nav-item-->

                    </ul>
                    <!--end navbar-nav--->


                    <div class="update-msg text-center">
                        <div
                            class="d-flex justify-content-center align-items-center thumb-lg update-icon-box  rounded-circle mx-auto">
                            <i class="iconoir-peace-hand h3 align-self-center mb-0 text-primary"></i>
                        </div>
                        <h5 class="mt-3">Mannat Themes</h5>
                        <p class="mb-3 text-muted">Rizz is a high quality web applications.</p>
                        <a href="javascript: void(0);" class="btn text-primary shadow-sm rounded-pill">Upgrade your
                            plan</a>
                    </div>
                </div>
            </div>
            <!--end startbar-collapse-->
        </div>
        <!--end startbar-menu-->
    </div>
    <!--end startbar-->
    <div class="startbar-overlay d-print-none"></div>
    <!-- end leftbar-tab-menu-->

    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            @yield('content')
            <!--Start Footer-->

            <footer class="footer text-center text-sm-start d-print-none">
                <div class="container-xxl">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-0 rounded-bottom-0">
                                <div class="card-body">
                                    <p class="text-muted mb-0">
                                        ©
                                        <script>
                                            document.write(new Date().getFullYear())
                                        </script>
                                        Rizz
                                        <span class="text-muted d-none d-sm-inline-block float-end">
                                            Crafted with
                                            <i class="iconoir-heart text-danger"></i>
                                            by Mannatthemes</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

            <!--end footer-->
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Javascript  -->
    <!-- vendor js -->

    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('backend/assets/data/stock-prices.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jsvectormap/js/jsvectormap.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/jsvectormap/maps/world.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/index.init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/datatable.init.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/form-validation.js') }}"></script>
    <!-- Sweet-Alert  -->
    <script src="{{ asset('backend/assets/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/pages/sweet-alert.init.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('backend/assets/js/pages/ecommerce-index.init.js') }}"></script>
    


</body>
<!--end body-->

</html>
