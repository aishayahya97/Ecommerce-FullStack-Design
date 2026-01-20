@php($title = 'My Cart')
@include('frontend.partials.header')



@section('content')
<div class="container my-5">
    <h4 class="fw-bold mb-3">My cart ({{ $carts->count() }})</h4>

    <div class="row">
        <!-- LEFT CART -->
        <div class="col-lg-8 bg-white p-4 rounded">
            @forelse($carts as $cart)
                @if($cart->product)
                <div class="cart-item d-flex border rounded p-3 mb-3">
                    <img 
    src="{{ isset($cart->product->images->first()->image) ? asset('storage/' . $cart->product->images->first()->image) : asset('assets/Layout/alibaba/Image/cloth/Bitmap.png') }}" 
    class="me-3 rounded border bg-light" 
    style="width:100px;height:100px;object-fit:cover;"
>

                    <div class="flex-grow-1">
                        <p class="fw-semibold mb-1">{{ $cart->product->name }}</p>
                        <small class="text-muted">Seller: {{ $cart->product->supplier->name ?? 'Unknown' }}</small>
                        <div class="mt-3 d-flex gap-2">
                            <form method="POST" action="{{ route('cart.remove',$cart->id) }}">@csrf @method('DELETE')
                                <button class="btn btn-outline-danger btn-sm">Remove</button>
                            </form>
                            <form method="POST" action="{{ route('cart.saveLater',$cart->id) }}">@csrf
                                <button class="btn btn-outline-primary btn-sm">Save for later</button>
                            </form>
                        </div>
                    </div>
                    <div class="text-end">
                        <p class="fw-bold">${{ number_format($cart->product->price * $cart->quantity,2) }}</p>
                        <form method="POST" action="{{ route('cart.update', $cart->id) }}">
    @csrf

    <select name="quantity"
            class="form-select form-select-sm"
            onchange="this.form.submit()">

        @for($i=1;$i<=10;$i++)
            <option value="{{ $i }}"
                {{ $cart->quantity == $i ? 'selected' : '' }}>
                Qty: {{ $i }}
            </option>
        @endfor

    </select>
</form>
                    </div>
                </div>
                 
                @endif
            @empty
                <p>Your cart is empty.</p>
            @endforelse
            <!-- Back to shop & Remove All -->
<div class="d-flex justify-content-between mb-3">
        <a class="btn btn-primary" href="{{ route('products.index') }}">
        ⬅ Back to shop
    </a>

    <form action="{{ route('cart.clear') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-outline-primary">
        Remove All
    </button>
</form>

</div>
        </div>
        
           

        

        <!-- RIGHT SUMMARY -->
        <div class="col-lg-4">
            <div class="card p-4 mb-3 shadow-sm">
                <form method="POST" action="{{ route('cart.applyCoupon') }}">@csrf
                    <h6 class="fw-bold">Have a coupon?</h6>
                    <div class="input-group mt-2">
                        <input name="coupon_code" class="form-control" placeholder="Add coupon">
                        <button class="btn btn-primary">Apply</button>
                    </div>
                </form>
            </div>

            <div class="card p-4 shadow-sm">
                <div class="d-flex justify-content-between"><span>Subtotal:</span><b>${{ number_format($subtotal,2) }}</b></div>
                <div class="d-flex justify-content-between"><span>Discount:</span><b class="text-success">-${{ number_format($discount,2) }}</b></div>
                <div class="d-flex justify-content-between mb-2"><span>Tax:</span><b>${{ number_format($tax,2) }}</b></div>
                <hr>
                <div class="d-flex justify-content-between fw-bold"><span>Total:</span><span>${{ number_format($total,2) }}</span></div>
                <form method="POST" action="{{ route('checkout.process') }}">@csrf
                    <button class="btn btn-success w-100 mt-3">Checkout</button>
                </form>

                <div class="d-flex gap-2 justify-content-center mt-3">
                    <img src="{{ asset('assets/Image/payment-card/card-images 1.png') }}" style="height:28px">
                    <img src="{{ asset('assets/Image/payment-card/card-images 2.png') }}" style="height:28px">
                    <img src="{{ asset('assets/Image/payment-card/card-images 3.png') }}" style="height:28px">
                    <img src="{{ asset('assets/Image/payment-card/card-images 4.png') }}" style="height:28px">
                    <img src="{{ asset('assets/Image/payment-card/card-image 5.webp') }}" style="height:28px">
                </div>
            </div>
        </div>
    </div>

    <!-- SAVED FOR LATER -->
@if($savedForLater->count())
<div class="bg-white p-4 mt-5 rounded">
    <h5 class="fw-bold mb-3">Saved for later</h5>

    <div class="row g-3">
        @foreach($savedForLater as $item)
            @if($item->product)
            <div class="col-md-3">
                <div class="card border-0 h-100 d-flex flex-column">

                    <!-- IMAGE -->
                    <div class="saved-img-wrapper">
                        <img
                            src="{{ $item->product->images->first()
                                ? asset('storage/'.$item->product->images->first()->image)
                                : asset('assets/Image/no-image.png') }}"
                            class="img-fluid"
                        >
                    </div>

                    <!-- CONTENT -->
                    <div class="p-2 d-flex flex-column flex-grow-1 text-center">
                        <p class="fw-bold mb-1 mt-2">
                            ${{ $item->product->price }}
                        </p>

                        <small class="text-muted mb-3">
                            {{ $item->product->name }}
                        </small>

                        <!-- BUTTON FIXED AT BOTTOM -->
                        <form action="{{ route('cart.move', $item->id) }}" method="POST" class="mt-auto">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary w-100">
                                Move to Cart
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            @endif
        @endforeach
    </div>
</div>
@endif

    <!-- SERVICES (Secure Payment, Customer Support, Free Delivery) -->
    <div class="row mt-5 g-4">
        <div class="col-md-3 d-flex align-items-center">
            <div class="icon-circle me-3"><i class="fas fa-lock"></i></div>
            <div>
                <p class="mb-0 fw-semibold">Secure payment</p>
                <small class="text-muted">Have you ever finally just</small>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
            <div class="icon-circle me-3"><i class="fas fa-headset"></i></div>
            <div>
                <p class="mb-0 fw-semibold">Customer support</p>
                <small class="text-muted">Have you ever finally just</small>
            </div>
        </div>
        <div class="col-md-3 d-flex align-items-center">
            <div class="icon-circle me-3"><i class="fas fa-bus"></i></div>
            <div>
                <p class="mb-0 fw-semibold">Free delivery</p>
                <small class="text-muted">Have you ever finally just</small>
            </div>
        </div>
    </div>


    <!-- Blue Banner -->
    <div class="blue-banner text-white p-5 mt-5 rounded d-flex align-items-center justify-content-between flex-wrap">
        <div><h5 class="mb-1">Super discount on more than 100 USD</h5><p class="mb-0">Have you ever finally just write dummy info</p></div>
        <a href="{{ route('product.index') }}" class="btn btn-warning">Shop now</a>
    </div>
</div>




@include('frontend.partials.footer')

