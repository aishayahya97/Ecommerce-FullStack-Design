@php($title = 'Product-detail')
@include('frontend.partials.header')



<div class="container my-4" style="max-width: 1180px;">

    <!-- TOP SECTION: IMAGE + DETAILS + SUPPLIER -->
    <div class="bg-white p-3 rounded shadow-sm" style="border:1px solid #ddd;">
        <div class="row g-4">

            <!-- LEFT: Image + Details -->
            <div class="col-lg-8">
                <div class="row g-3">

                    <!-- Product Images -->
                    <div class="col-md-5 bg-white shadow-sm">
                <img id="main-product-img" 
                    src="{{ asset('storage/' . ($product->images->first()->image ?? 'assets/Layout/alibaba/Image/cloth/Bitmap.png')) }}" 
                    class="img-fluid rounded mb-3" 
                    style="width: 380px; border:1px solid #ddd;">

                <div class="d-flex gap-2 flex-wrap">
                    @foreach($product->images as $img)
                        <img src="{{ asset('storage/' . $img->image) }}" 
                            class="thumb-img" 
                            onclick="document.getElementById('main-product-img').src='{{ asset('storage/' . $img->image) }}';" 
                            style="width: 70px; cursor: pointer;">
                    @endforeach
    </div>
</div>



                    <!-- Product Details -->
                    <div class="col-md-7">
                        <p class="text-success small fw-semibold">
                            {{ $product->stock > 0 ? '✔ In stock' : 'Out of stock' }}
                        </p>
                        <h4 class="fw-bold mb-1">{{ $product->name }}</h4>

                        <!-- Rating Row -->
                        <div class="d-flex align-items-center mb-3">
                            @for($i=0; $i<5; $i++)
                                <i class="fas fa-star me-1" style="color:#FF8A00;"></i>
                            @endfor
                            <span class="fw-bold me-4" style="color:#FF8A00;">{{ $product->rating ?? '0.0' }}</span>

                            <i class="fas fa-comment-dots me-1 text-secondary"></i>
                            <span class="text-secondary me-3">{{ $product->reviews_count ?? 0 }} reviews</span>

                            <i class="fas fa-shopping-cart me-1 text-secondary"></i>
                            <span class="text-secondary">{{ $product->sold_count ?? 0 }} sold</span>
                        </div>

                        <!-- Price Box -->
                        <div class="price-box p-2 rounded mb-3">
                            <div class="row text-center">
                                <div class="col">
                                    <h6 class="text-danger fw-bold">${{ $product->price_small ?? '0.00' }}</h6>
                                    <small>50–100 pcs</small>
                                </div>
                                <div class="col border-start border-end">
                                    <h6 class="fw-bold">${{ $product->price_medium ?? '0.00' }}</h6>
                                    <small>100–700 pcs</small>
                                </div>
                                <div class="col">
                                    <h6 class="fw-bold">${{ $product->price_large ?? '0.00' }}</h6>
                                    <small>700+ pcs</small>
                                </div>
                            </div>
                        </div>

                        <!-- Product Info -->
                        <div class="product-info small text-secondary">
                            <p><span class="label-text">Price:</span> <span class="value-text">{{ $product->price ?? 'Negotiable' }}</span></p>
                            <hr class="my-2">
                            <p><span class="label-text">Color:</span> <span class="value-text">{{ $product->color ?? '-' }}</span></p>
                            <p><span class="label-text">Discount:</span> <span class="value-text">{{ $product->discount_price ?? '-' }}</span></p>
                            <p><span class="label-text">Rating:</span> <span class="value-text">{{ $product->rating ?? '-' }}</span></p>
                            <hr class="my-2">
                            <p><span class="label-text">Stock:</span> <span class="value-text">{{ $product->stock ?? '-' }}</span></p>
                            <p><span class="label-text">warranty:</span> <span class="value-text">{{ $product->warranty ?? '-' }}</span></p>
                            <p><span class="label-text">size:</span> <span class="value-text">{{ $product->size ?? '-' }}</span></p>
                            <hr class="my-2">
                        </div>

                    </div>

                </div>
            </div>

            <!-- RIGHT: Supplier -->
<div class="col-lg-4">
    <div class="p-3 rounded shadow-sm" style="border:1px solid #ddd;">

        <!-- Supplier Heading with Avatar -->
        <div class="d-flex align-items-center mb-2">
            <div class="avatar-box me-2">
                <span class="avatar-letter">
                    {{ $product->supplier ? strtoupper(substr($product->supplier->name,0,1)) : 'A' }}
                </span>
            </div>
            <div>
                <h6 class="fw-bold mb-0">Supplier</h6>
                <small class="d-block">{{ $product->supplier->name ?? 'Default Supplier' }}</small>
            </div>
        </div>

        <hr>

        <!-- Location -->
        <div class="d-flex align-items-center mb-1">
            <img src="{{ $product->supplier->country_flag ?? asset('assets/Layout1/Image/flags/US@2x.png') }}" width="20" class="me-2">
            <small class="text-secondary">{{ $product->supplier->country ?? 'USA' }}, {{ $product->supplier->city ?? 'Unknown' }}</small>
        </div>

        <!-- Verified -->
        <div class="d-flex align-items-center mb-1">
            <i class="fas fa-check-circle text-secondary me-2"></i>
            <small class="text-secondary">Verified Seller</small>
        </div>

        <!-- Worldwide -->
        <div class="d-flex align-items-center mb-3">
            <i class="fas fa-globe text-secondary me-2"></i>
            <small class="text-secondary">Worldwide shipping</small>
        </div>

        <!-- Buttons -->
        <button class="btn btn-primary w-100 mb-2">Send inquiry</button>
        <button class="btn btn-outline-secondary w-100">Seller’s profile</button>

        <!-- Save for later -->
       <form action="{{ route('product.saveForLater', $product->id) }}" method="POST" class="mt-3">
    @csrf
    <button type="submit" class="btn btn-outline-primary d-flex align-items-center">
        <i class="fas fa-heart me-2 text-danger"></i> Save for Later
    </button>
</form>


    </div>
</div>

                    

                </div>
            </div>

        




    <!-- GAP BETWEEN TOP AND BOTTOM SECTIONS -->
<div class="my-4"></div>

<!-- BOTTOM SECTION: Tabs + You May Like / Related Products -->
<div class="row g-4">

    <!-- LEFT: Tabs -->
    <div class="col-lg-8">
        <div class="bg-white shadow-sm rounded p-3" style="border:1px solid #ddd;">
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#desc">Description</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#reviews">Reviews</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#shipping">Shipping</button>
                </li>
                <li class="nav-item">
                    <button class="nav-link" data-bs-toggle="tab" data-bs-target="#seller">About seller</button>
                </li>
            </ul>

            <div class="tab-content border p-3 border-top-0 bg-white">

                <!-- DESCRIPTION -->
                <div class="tab-pane fade show active" id="desc">
                    <p class="small text-secondary">
                        {!! $product->description ?? 'No description available.' !!}
                    </p>

                    <table class="table small table-bordered">
                        <tr>
                            <td class="table-label">Description</td>
                            <td>{{ $product->description ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="table-label">Price</td>
                            <td>{{ $product->price ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="table-label">Discount Price</td>
                            <td>{{ $product->discount_price ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="table-label">Stock</td>
                            <td>{{ $product->stock ?? 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td class="table-label">Rating</td>
                            <td>{{ $product->rating ?? 'N/A' }}</td>
                        </tr>
                    </table>

                    @if($product->features)
                    <ul class="small" style="list-style: none; padding-left: 0; margin-left: 0;">
                        @foreach($product->features as $feature)
                            <li>✔ {{ $feature }}</li>
                        @endforeach
                    </ul>
                    @endif
                </div>

                <!-- REVIEWS -->
                <div class="tab-pane fade" id="reviews">
                    @if($product->reviews && $product->reviews->count() > 0)
                        @foreach($product->reviews as $review)
                            <div class="mb-2">
                                <strong>{{ $review->user->name ?? 'Anonymous' }}</strong>:
                                <span class="small text-secondary">{{ $review->comment }}</span>
                            </div>
                        @endforeach
                    @else
                        <p class="small text-secondary">No reviews yet.</p>
                    @endif
                </div>

                <!-- SHIPPING -->
                <div class="tab-pane fade" id="shipping">
                    <p class="small text-secondary">
                        {!! $product->shipping_info ?? 'Shipping details not provided.' !!}
                    </p>
                </div>

                <!-- SELLER -->
                <div class="tab-pane fade" id="seller">
                    @if($product->supplier)
                        <p class="small text-secondary">
                            {{ $product->supplier->name ?? 'Unknown Supplier' }} <br>
                            {{ $product->supplier->country ?? 'Country not specified' }}, 
                            {{ $product->supplier->city ?? 'City not specified' }}
                        </p>
                    @else
                        <p class="small text-secondary">Supplier information not available.</p>
                    @endif
                </div>

            </div>
        </div>
    </div>




        <!-- RIGHT: You May Like -->
<div class="col-lg-4">
    <div class="bg-white shadow-sm rounded p-3 mb-4" style="border:1px solid #ddd;">

        <h6 class="fw-bold mb-3">You may like</h6>

        @forelse($youMayLike as $item)
            <div class="d-flex gap-2 @if(!$loop->last) border-bottom pb-2  @elseif($loop->iteration == count($youMayLike) - 1) mb-3 @endif">
                
                <!-- Product Image -->
                <a href="{{ route('product.show', $item->slug) }}">
                    <img
                        src="{{ $item->images->first()
                                ? asset('storage/'.$item->images->first()->image)
                                : asset('assets/Layout/alibaba/Image/placeholder.png') }}"
                        class="you-like-img"
                        alt="{{ $item->name }}"
                    >

                </a>

                <!-- Product Info -->
                <div>
                    <a href="{{ route('product.show', $item->slug) }}" class="text-decoration-none text-dark">
                        <p class="small fw-semibold mb-1">{{ $item->name }}</p>
                    </a>
                    <small>${{ number_format($item->selling_price, 2) }}</small>
                </div>
            </div>
        @empty
            <p class="small text-muted">No products available.</p>
        @endforelse

    </div>
</div>

<div class="container mt-4 bg-white">
  <h5 class="fw-bold mt-3">Related Products</h5>

  <div class="row g-3">

    @forelse($relatedProducts as $prod)
      <div class="col-6 col-md-2">
        <div class="card text-center border-0">
          <!-- Image Card -->
          <div class="p-2 border rounded">
            <img
    src="{{ $prod->images->first()
            ? asset('storage/'.$prod->images->first()->image)
            : asset('assets/Layout/alibaba/Image/placeholder.png') }}"
    class="card-img-top related-img"
    alt="{{ $prod->name }}">



          </div>
          <!-- Text Card -->
          <div class="mt-1 p-2 bg-white rounded">
            <div class="fw-semibold">{{ $prod->name }}</div>
            <div class="text-primary small">
              ${{ $prod->price }}{{ $prod->discount_price ? ' - $' . $prod->discount_price : '' }}
            </div>
            <a href="{{ route('product.show', $prod->slug) }}" class="stretched-link"></a>
          </div>
        </div>
      </div>
    @empty
      <p class="text-secondary">No related products found.</p>
    @endforelse

  </div>
</div>



<!-- Blue Banner -->
<div class="blue-banner text-white p-5 mt-5  mb-5 rounded d-flex flex-wrap" style="align-items: center;">
    <div class="me-3 ">
        <h5 class="mb-1">Super discount on more than 100 USD</h5>
        <p class="mb-0">Have you ever finally just write dummy info</p>
    </div>
    <div class="gap-4" style="margin-left:590px">
        <a href="{{ route('product.index') }}" class="btn btn-warning">Shop now</a>
    </div>
</div>
</div>
</div>


@include('frontend.partials.footer')






















