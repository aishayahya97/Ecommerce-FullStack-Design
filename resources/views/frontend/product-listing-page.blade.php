@php($title = 'Product')
@include('frontend.partials.header')

@include('frontend.partials.sidebar')


<!-- RIGHT CONTENT -->
<div style="flex:1; min-width:300px; margin-top: 60px;">

    <!-- TOP BAR -->
    <form method="GET" id="filterForm">
        <div class="d-flex justify-content-between mb-3 p-3 bg-white border rounded custom-container">

            <!-- LEFT TEXT -->
            <h6 class="mb-0">
                {{ $products->total() }} items
                @isset($category)
                    in {{ $category->name }}
                @endisset
            </h6>

            <!-- RIGHT FILTERS -->
            <div class="d-flex align-items-center gap-3">

                <!-- Verified only -->
                <div class="form-check m-0">
                    <input 
                        class="form-check-input"
                        type="checkbox"
                        name="verified"
                        value="1"
                        id="verifiedOnly"
                        onchange="document.getElementById('filterForm').submit()"
                        {{ request('verified') ? 'checked' : '' }}
                    >
                    <label class="form-check-label" for="verifiedOnly">
                        Verified only
                    </label>
                </div>

                <!-- Sort -->
                <select 
                    name="sort"
                    class="form-select form-select-sm"
                    style="width:120px;"
                    onchange="document.getElementById('filterForm').submit()"
                >
                    <option value="featured" {{ request('sort')=='featured' ? 'selected' : '' }}>
                        Featured
                    </option>
                    <option value="popular" {{ request('sort')=='popular' ? 'selected' : '' }}>
                        Popular
                    </option>
                    <option value="newest" {{ request('sort')=='newest' ? 'selected' : '' }}>
                        Newest
                    </option>
                </select>

            </div>
        </div>
    </form>

        <!-- PRODUCT GRID -->
<div class="d-flex flex-column gap-3 custom-container bg-white">

@forelse($products as $product)

<div class="d-flex border rounded shadow-sm p-3 gap-3 align-items-start position-relative" style="border:1px solid #ced4da;">

    <form method="POST"
      action="{{ route('cart.add', $product->id) }}"
      style="position:absolute; top:8px; right:8px;">
    @csrf

    <button type="submit"
            style="border:none; background:#f8f9fa;
                   color:#dc3545; font-size:16px;
                   border:1px solid #d1d2d3;
                   padding:1px 6px; cursor:pointer;">
        &#10084;
    </button>
</form>



    <!-- Image Left -->
    <img
    src="{{ isset($product->images->first()->image) ? asset('storage/' . $product->images->first()->image) : asset('assets/Image/no-image.png') }}"
    alt="{{ $product->name }}"
    style="width:150px; height:150px; object-fit:cover; border-radius:5px;"
>


    <!-- Text Right -->
    <div style="flex:1;">
        <h6 class="mb-1">{{ $product->name }}</h6>

        <div class="mb-1">
            @if($product->discount_price)
                <span class="text-muted text-decoration-line-through">
                    ${{ number_format($product->price,2) }}
                </span>
                <span class="fw-bold ms-2">
                    ${{ number_format($product->discount_price,2) }}
                </span>
            @else
                <span class="fw-bold">
                    ${{ number_format($product->price,2) }}
                </span>
            @endif
        </div>

        <div class="d-flex align-items-center gap-2 mb-1">
            <span style="color:#ffc107;">⭐⭐⭐⭐⭐</span>
            <span class="text-muted">({{ $product->rating ?? '7.5' }})</span>
            <span class="text-muted">{{ $product->orders_count ?? 0 }} orders</span>
            <span class="text-success">Free Shipping</span>
        </div>

        <p class="mb-1 small text-muted">
            {{ Str::limit($product->description, 140) }}
        </p>

        <div class="d-flex justify-content-between align-items-center mt-1">
            <a href="{{ route('product.show',$product->slug) }}"
               class="text-decoration-none fw-semibold">
                View Details
            </a>
        </div>
    </div>
</div>

@empty
<p class="text-center text-muted py-4">
    No products found
</p>
@endforelse

</div>
<div class="d-flex justify-content-end mt-4">
    {{ $products->links('pagination::bootstrap-5') }}
</div>
</div>
</div>
</div>
</div>
<!-- Subscribe Newsletter -->
<div class="container-fluid rounded mt-3  my-5 mb-5">
    <div class="p-4 text-center" style="background-color: #f0f0f0;">
        <h5 class="fw-bold">Subscribe on our newsletter</h5>
        <p class="text-muted small">Get daily news on upcoming offers from many suppliers all over the world</p>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('newsletter.subscribe') }}" method="POST" class="d-flex justify-content-center gap-2 mt-3 flex-wrap">
            @csrf
            <input type="email" name="email" class="form-control w-auto" style="min-width:250px" placeholder="Email" required>
            <button type="submit" class="btn btn-primary px-4">Subscribe</button>
        </form>
    </div>
</div>
@include('frontend.partials.footer')
