<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body {
            background: #f4f6f9;
        }
        .sidebar {
            width: 250px;
            min-height: 100vh;
        }
        .sidebar a {
            color: #cfd8dc;
            padding: 10px 15px;
            display: block;
            border-radius: 6px;
            text-decoration: none;
            transition: all 0.2s;
        }
        /* Hover effect */
        .sidebar a:hover {
            background: #495057;
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
        }
        /* Active link effect */
        .sidebar a.active {
            background: #0d6efd; /* Bootstrap primary blue */
            color: #fff;
            box-shadow: 0 0 10px rgba(0, 123, 255, 0.7);
        }
        .topbar {
            height: 65px;
            border-bottom: 1px solid #dee2e6;
        }
    </style>
</head>
<body>

<div class="d-flex">

    <!-- ========== SIDEBAR ========== -->
    <aside class="sidebar bg-dark p-3">
        <h4 class="text-white mb-4">Admin Panel</h4>

        <ul class="nav flex-column gap-1">
            <li>
                <a href="{{ route('admin.dashboard') }}"
                   class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line me-2"></i> Dashboard
                </a>
            </li>

            <li>
                <a href="{{ route('admin.categories.index') }}"
                   class="{{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <i class="fa-solid fa-list me-2"></i> Categories
                </a>
            </li>

            <li>
                <a href="{{ route('admin.brands.index') }}"
                   class="{{ request()->routeIs('admin.brands*') ? 'active' : '' }}">
                    <i class="fa-solid fa-tag me-2"></i> Brands
                </a>
            </li>

            <li>
                <a href="{{ route('admin.sellers.index') }}"
                   class="{{ request()->routeIs('admin.sellers*') ? 'active' : '' }}">
                    <i class="fa-solid fa-store me-2"></i> Sellers
                </a>
            </li>

            <li>
                <a href="{{ route('admin.products.index') }}"
                   class="{{ request()->routeIs('admin.products*') ? 'active' : '' }}">
                    <i class="fa-solid fa-box me-2"></i> Products
                </a>
            </li>

            <li>
                <a href="{{ route('admin.orders.index') }}"
                   class="{{ request()->routeIs('admin.orders*') ? 'active' : '' }}">
                    <i class="fa-solid fa-cart-shopping me-2"></i> Orders
                </a>
            </li>

            <li>
                <a href="{{ route('admin.coupons.index') }}"
                   class="{{ request()->routeIs('admin.coupons*') ? 'active' : '' }}">
                    <i class="fa-solid fa-ticket me-2"></i> Coupons
                </a>
            </li>

            <li>
                <a href="{{ route('admin.carts.index') }}"
                   class="{{ request()->routeIs('admin.carts*') ? 'active' : '' }}">
                    <i class="fa-solid fa-cart-shopping me-2"></i> Carts
                </a>
            </li>

            <li>
                <a href="{{ route('admin.payments') }}"
                   class="{{ request()->routeIs('admin.payments*') ? 'active' : '' }}">
                    <i class="fa-solid fa-money-bill-wave me-2"></i> Payments
                </a>
            </li>
        </ul>
    </aside>

    <!-- ========== MAIN AREA ========== -->
    <div class="flex-grow-1">

        <!-- ===== TOP HEADER ===== -->
        <header class="topbar bg-dark d-flex justify-content-between align-items-center px-4">
            <h5 class="mb-0 fw-semibold text-white">
                @yield('page_title', 'Admin Dashboard')
            </h5>

            <div class="dropdown">
    <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle"
       data-bs-toggle="dropdown">

        <img src="{{ auth()->user()->user_img
            ? asset('storage/' . auth()->user()->user_img)
            : 'https://ui-avatars.com/api/?name=' . auth()->user()->name }}"
            class="rounded-circle me-2"
            width="40" height="40">

        <span class="fw-semibold text-white">
            {{ auth()->user()->name }}
        </span>
    </a>

    <ul class="dropdown-menu dropdown-menu-end">
    <li>
        <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
            Profile
        </a>
    </li>
    <li>
        <a class="dropdown-item" href="{{ route('admin.profile.change-password') }}">
            Change Password
        </a>
    </li>
    <li><hr class="dropdown-divider"></li>
    <li>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button class="dropdown-item text-danger">Logout</button>
        </form>
    </li>
</ul>

</div>

        </header>

        <!-- ===== PAGE CONTENT ===== -->
        <main class="p-4">
            @yield('content')
        </main>

    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
