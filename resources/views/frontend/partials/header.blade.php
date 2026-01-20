<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $title ?? 'Home' }}</title>


    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">


    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
@yield('content')

<body>

<!-- ================= HEADER ================= -->
<nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom py-3">
    <div class="container">

        <!-- Logo -->
        <a class="navbar-brand fw-bold" href="{{ route('frontend.home') }}">
            <img src="{{ asset('assets/Layout/Brand/logo-colored.png') }}" alt="Logo" style="height:30px;">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Search -->
<div class="collapse navbar-collapse" id="navMenu">
    <form class="d-flex w-100 mt-2 mt-lg-0 mx-lg-3"
          method="GET"
          action="{{ route('products.index') }}">

        <!-- Search text -->
        <input class="form-control"
               type="search"
               name="q"
               value="{{ request('q') }}"
               placeholder="Search products">

        <!-- Category dropdown -->
        <select class="form-select"
                name="category_id"
                style="width:180px;">
            <option value="">All Categories</option>

            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>

        <button class="btn btn-primary">Search</button>
    </form>
</div>


        <!-- Right Icons -->
        <div class="d-flex gap-3 navbar-icons mt-2 mt-lg-0 ms-lg-4">

            <!-- Profile -->
            <div class="nav-icon dropdown">
                <i class="fas fa-user"></i>

                @auth
                    <a href="#" class="dropdown-toggle text-decoration-none"
                       data-bs-toggle="dropdown">
                        {{ auth()->user()->name }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('orders.index') }}">Orders</a></li>
                        <li><a class="dropdown-item" href="{{ route('wishlist.index') }}">Wishlist</a></li>
                        <li><a class="dropdown-item" href="{{ route('settings') }}">Settings</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button class="dropdown-item">Logout</button>
                            </form>
                        </li>
                    </ul>
                @else
                    <a href="{{ route('login') }}" class="text-decoration-none">Login</a>
                @endauth
            </div>

            <!-- Messages -->
            <div class="nav-icon dropdown">
                <i class="fa-solid fa-envelope"></i>
                <a href="#" class="dropdown-toggle text-decoration-none"
                   data-bs-toggle="dropdown">Messages</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="{{ route('order.updates') }}">Order Updates</a></li>
                    <li><a class="dropdown-item" href="{{ route('seller.chats') }}">Seller Chats</a></li>
                </ul>
            </div>

            <!-- Wishlist -->
            <div class="nav-icon">
                <i class="fa-solid fa-heart"></i>
                <a href="{{ route('wishlist.index') }}">Wishlist</a>
            </div>

            <!-- Cart -->
            <div class="nav-icon">
                <i class="fa-solid fa-cart-shopping"></i>
                <a href="{{ route('cart.index') }}">My Cart</a>
            </div>

        </div>
    </div>
</nav>
<!-- Category Bar -->
 <div class="bg-white border-bottom py-2">
  <div class="container d-flex justify-content-between align-items-center flex-wrap">

    <!-- Left: Category Links -->
    <div class="d-flex gap-4 category-bar flex-wrap py-2">
      <a href="{{ route('frontend.home') }}" class="text-dark small text-decoration-none">Home</a>
      <a href="{{ route('product.index') }}" class="text-dark small text-decoration-none">Products</a>
      <a href="#" class="text-dark small text-decoration-none">Categories</a>
      <a href="#" class="text-dark small text-decoration-none">Deals</a>
    </div>

    <!-- Right: Language, Currency, Ship To -->
    <div class="d-flex align-items-center gap-3">
      <!-- Language & Currency -->
      <div class="custom-dropdown">
        <div class="dropdown-header d-flex align-items-center gap-1" onclick="toggleDropdown(this)">
          <span class="small selected-value">English, USD</span>
          <img src="{{ asset('assets/Layout/Form/input-group/Icon/control/Vector.png') }}" alt="arrow" class="arrow" width="12" height="10">
        </div>
        <div class="dropdown-menu">
          <div class="dropdown-item" onclick="selectOption(this)">English, USD</div>
          <div class="dropdown-item" onclick="selectOption(this)">French, EUR</div>
          <div class="dropdown-item" onclick="selectOption(this)">German, EUR</div>
        </div>
      </div>

      <!-- Ship To -->
      <div class="custom-dropdown">
        <div class="dropdown-header d-flex align-items-center gap-1" onclick="toggleDropdown(this)">
          <span class="small selected-value">Ship to</span>
          <img src="{{asset ('assets/Layout/Form/input-group/Icon/control/Vector.png') }}" alt="arrow" class="arrow" width="12" height="10">
        </div>
        <div class="dropdown-menu">
          <div class="dropdown-item" onclick="selectOption(this)">
            <img src="{{ asset('assets/assets/Layout1/Image/flags/US@2x.png') }}" width="20"> United States
          </div>
          <div class="dropdown-item" onclick="selectOption(this)">
            <img src="{{ asset('assets/assets/Layout1/Image/flags/DE@2x.png') }}" width="20"> Germany
          </div>
          <div class="dropdown-item" onclick="selectOption(this)">
            <img src="{{ asset('assets/assets/Layout1/Image/flags/FR@2x.png') }}" width="20"> France
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Horizontal line under this section -->
  <hr class="mt-1 mb-0" style="border: 1px solid #e0e0e0;">
</div>

