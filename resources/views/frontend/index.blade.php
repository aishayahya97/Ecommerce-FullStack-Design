@include('frontend.partials.header')

<!-- ================= BANNER SECTION ================= -->
<div class="container p-4 bg-white rounded mb-5" style="margin-top:20px;">
  <div class="row g-3">

    <!-- ================= LEFT : CATEGORIES ================= -->
    <div class="col-md-2">
      <ul class="list-unstyled category-list" style="font-size:18px;">

        @foreach($categories as $category)
          <li class="mb-2 {{ request('category') == $category->slug ? 'active-category' : '' }}">
            <a href="{{ route('product.index', ['category' => $category->slug]) }}"
               class="text-dark text-decoration-none">
              {{ $category->name }}
            </a>
          </li>
        @endforeach

      </ul>
    </div>

    <!-- ================= CENTER : BANNER SLIDER ================= -->
    <div class="col-lg-7">
      <div id="bannerSlider" class="carousel slide banner"
           data-bs-ride="carousel" data-bs-interval="3000">

        <div class="carousel-inner">

          @foreach($bannerProducts as $key => $product)
            <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
              <div class="slide-content"
                   style="background-image:url('{{ asset('assets/Image/backgrounds/Banner-board-800x420 2.png') }}');">

                <h3>
                  <span style="font-weight:300;">
                    {{ $product->category->name ?? 'Trending' }}
                  </span><br>

                  <span style="font-weight:700;">
                    {{ $product->name }}
                  </span>
                </h3>

                <a href="{{ route('product.show', $product->slug) }}"
                   class="btn btn-light btn-sm mt-3">
                  View Product
                </a>
              </div>
            </div>
          @endforeach

        </div>
      </div>
    </div>

    <!-- ================= RIGHT : USER BOX ================= -->
    <div class="col-md-3">

      <!-- USER CARD -->
      <div class="p-3 rounded text-center" style="background-color:#d7e8f8;">
        <div class="d-flex align-items-center gap-3 mb-3">
          <img src="{{ asset('assets/Image/149071.png') }}"
               class="rounded-circle"
               style="width:45px;height:45px;object-fit:cover;">

          <div class="text-start">
            @auth
              <p class="mb-0 fw-semibold">
                Hi {{ auth()->user()->name }} 👋
              </p>
            @else
              <p class="mb-0 fw-semibold">
                Hi User,<br> Let's get started
              </p>
            @endauth
          </div>
        </div>

        <!-- ALWAYS SHOW BUTTONS -->
        <div class="d-flex flex-column gap-2">
          <a href="{{ route('register') }}" class="btn btn-primary w-100">
            Join Now
          </a>
          <a href="{{ route('login') }}" class="btn btn-outline-primary w-100">
            Login
          </a>
        </div>
      </div>

      <!-- OFFER BOX 1 -->
      <div class="p-2 rounded text-center mt-3"
           style="background-color:#FFA500;color:white;">
        <h5 class="fw-bold mb-1">
          Get US $10 off <br>
          with a new <br>
          supplier
        </h5>
      </div>

      <!-- OFFER BOX 2 -->
      <div class="p-3 rounded text-center mt-3"
           style="background-color:#8bbed6;">
        <h6 class="fw-bold mb-1">
          Send quotes with <br>
          supplier <br>
          preferences
        </h6>
      </div>

    </div>
  </div>
</div>
<!-- ================= END BANNER SECTION ================= -->



<!-- Deals & Offers Section -->
<div class="container my-3 custom-container">
  <div class="d-flex">

    <!-- Left: Deals & Offers Box -->
    <div style="max-width: 300px;" class="flex-shrink-0">
      <div class="p-3 bg-white shadow-sm h-100" style="border:1px solid #ddd;">
        <div class="text-center mb-3">
          <h6 class="fw-bold mb-0">Deals and Offers</h6>
          <p class="mb-0">Hygiene and equipment</p>
        </div>

        <!-- Countdown Section -->
        <div class="container my-4">
          <div class="d-flex justify-content-center" style="gap:9px;">
            <div id="days" class="countdown-box">0<br>Days</div>
            <div id="hours" class="countdown-box">0<br>Hours</div>
            <div id="minutes" class="countdown-box">0<br>Min</div>
            <div id="seconds" class="countdown-box">0<br>Sec</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Right: Deals Product Boxes -->
    <div class="d-flex flex-grow-1" style="gap:0;"> 

      @foreach($deals as $deal)
        <div class="flex-fill">
          <a href="{{ route('product.show', $deal->slug) }}" class="text-decoration-none text-dark">
            <div class="card p-3 text-center shadow-sm h-100" style="border:1px solid #ddd;">
              
              <img
    src="{{ $deal->images->first()
            ? asset('storage/'.$deal->images->first()->image)
            : asset('assets/default-product.png') }}"
    alt="{{ $deal->name }}"
    style="width:100px; height:100px; object-fit:cover; display:block; margin:auto;"
>

              
              <p class="mt-2 fw-bold mb-1">{{ $deal->name }}</p>
              
              @if($deal->discount_price)
                @php
                    $discount = round((($deal->price - $deal->discount_price) / $deal->price) * 100);
                @endphp
                <span class="discount-badge d-block mx-auto">-{{ $discount }}%</span>
              @endif

            </div>
          </a>
        </div>
      @endforeach

    </div>

  </div>
</div>



<section class="container py-4 custom-container">

    <!-- UPPER ROW -->
    <div class="row gx-0 gy-4">

        <!-- LEFT top banner -->
        <div class="col-lg-3">
            <div class="category-box p-0 position-relative">
                <img
                    src="{{ $topBanner->images->first()
                            ? asset('storage/'.$topBanner->images->first()->image)
                            : asset('assets/default-product.png') }}"
                    alt="Top Banner Image" style="height:267px;"
                >

                <div class="overlay-text text-black">
                    <h6 class="fw-bold">{{ $topBanner->name }}</h6>
                    <a href="{{ route('product.show', $topBanner->slug) }}" 
                       class="btn btn-sm mt-4" style="background-color:#fff;">
                        Source now
                    </a>
                </div>
            </div>
        </div>

        <!-- RIGHT top 8 boxes -->
        <div class="col-lg-9">
            <div class="row g-0">

                @foreach($topProducts as $product)
                    <div class="col-6 col-md-3">
                        <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-dark">
                            <div class="item-card shadow-sm position-relative p-3" 
                                 style="height: 132px; background-color: #fff;">

                                <!-- TEXT TOP LEFT -->
                                <div class="item-text position-absolute" style="top: 10px; left: 10px;">
                                    <p class="mb-1 fw-semibold">{{ $product->name }}</p>
                                    <small class="text-muted">From <br> USD {{ $product->price }}</small>
                                </div>

                                <!-- IMAGE BOTTOM RIGHT -->
                                <img
                                  src="{{ $product->images->first()
                                          ? asset('storage/'.$product->images->first()->image)
                                          : asset('assets/default-product.png') }}"
                                  class="item-img position-absolute"
                                  style="bottom: 10px; right: 10px; width: 80px; height: auto;"
                                  alt="{{ $product->name }}"
                              >

                            </div>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>

    </div>




    <!-- ================= LOWER ROW ================= -->
<div class="row gx-0 gy-4 mt-3">

    <!-- LEFT lower banner -->
    <div class="col-lg-3">
        <div class="category-box p-0 position-relative">
            <img
              src="{{ $lowerBanner->images->first()
                      ? asset('storage/'.$lowerBanner->images->first()->image)
                      : asset('assets/default-product.png') }}"
              class="img-fluid" style="height:267px;"
              alt="{{ $lowerBanner->name }}"
          >

            <div class="overlay-text text-black">
                <h6 class="fw-bold">{{ $lowerBanner->name }}</h6>
                <a href="{{ route('product.show', $lowerBanner->slug) }}" 
                   class="btn btn-sm mt-4" style="background-color: #eee;">
                    Source now
                </a>
            </div>
        </div>
    </div>

    <!-- RIGHT lower 8 boxes -->
    <div class="col-lg-9">
        <div class="row g-0">

            @foreach($lowerProducts as $product)
                <div class="col-6 col-md-3">
                    <a href="{{ route('product.show', $product->slug) }}" class="text-decoration-none text-dark">
                        <div class="item-card shadow-sm position-relative p-3" style="height: 132px; background-color: #fff;">

                            <!-- TEXT TOP LEFT -->
                            <div class="item-text position-absolute" style="top: 10px; left: 10px;">
                                <p class="mb-1 fw-semibold">{{ $product->name }}</p>
                                <small class="text-muted">From <br> USD {{ $product->price }}</small>
                            </div>

                            <!-- IMAGE BOTTOM RIGHT -->
                            <img
                              src="{{ $product->images->first()
                                      ? asset('storage/'.$product->images->first()->image)
                                      : asset('assets/default-product.png') }}"
                              class="item-img position-absolute"
                              style="bottom: 10px; right: 10px; width: 80px; height: auto;"
                              alt="{{ $product->name }}"
                          >

                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>

</div>


</section>

  








<!-- Supplier Request Box -->
<div class="container my-5 custom-container">
    <div class="row p-4 bg-primary text-white rounded g-3">
        <!-- Left Text -->
        <div class="col-md-6">
            <h4 class="fw-bold">An easy way to send <br> requests to all suppliers</h4>
            <p>
                Save time and reach multiple suppliers.
                Save time and reach multiple suppliers.
                Save time and reach multiple suppliers.
                Save time and reach multiple suppliers.
            </p>
        </div>

        <!-- Right Form -->
        <div class="col-md-6 bg-white text-dark p-4 rounded">
            <h6 class="fw-bold mb-3">Send quote to suppliers</h6>

            <!-- Alert Messages -->
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Form -->
            <form action="{{ route('supplier-request.store') }}" method="POST">
                @csrf
                <input type="text" name="item_name" class="form-control mb-2" placeholder="What item you need?" required>
                <textarea name="details" class="form-control mb-2" rows="2" placeholder="More details"></textarea>
                <div class="d-flex gap-2">
                    <input type="number" name="quantity" class="form-control" placeholder="Quantity" required>
                    <select name="unit" class="form-select">
                        <option value="Pcs">Pcs</option>
                        <option value="Kg">Kg</option>
                        <option value="Litre">Litre</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100 mt-3">Send inquiry</button>
            </form>
        </div>
    </div>
</div>




<div class="container my-2 custom-container">
  <!-- Heading -->
  <h4 class="fw-bold mb-3">Recommended Items</h4>

  <div class="swiper recommended-swiper">
    <div class="swiper-wrapper">

      @foreach($products as $product)
      <div class="swiper-slide">
        <a href="{{ route('product.show', $product->slug) }}">
          <div class="product-card shadow-sm position-relative">
            <img
              src="{{ $product->images->first()
                      ? asset('storage/'.$product->images->first()->image)
                      : asset('assets/Layout/alibaba/Image/default.png') }}"
              class="product-img mx-auto d-block"
              alt="{{ $product->name }}"
>

            <div class="product-text position-absolute">
              <p class="fw-bold mb-1">${{ $product->price }}</p>
              <p class="small text-muted">{{ Str::limit($product->name, 35) }}</p>
            </div>
          </div>
        </a>
      </div>
      @endforeach

    </div>

    </div>
    </div>
<!-- Swiper CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>

<script>
  const swiper = new Swiper(".recommended-swiper", {
    slidesPerView: 5,       
    spaceBetween: 15,
    grid: {
      rows: 2,               
      fill: 'row'
    },
    loop: true,              
    autoplay: {
      delay: 3000,          
      disableOnInteraction: false
    },
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev"
    },
    breakpoints: {
      1200: { slidesPerView: 5 },
      992:  { slidesPerView: 4 },
      768:  { slidesPerView: 3 },
      576:  { slidesPerView: 2 },
      0:    { slidesPerView: 1 }
    }
  });
</script>



  





  



<!-- Our Extra Services -->
<div class="container my-5 custom-container">
    <h5 class="fw-bold mb-3">Our extra services</h5>

    <div class="row g-3">

        <!-- Card 1 -->
        <div class="col-12 col-md-3">
            <div class="card border-0 shadow-sm service-card position-relative">
                <img src="assets/Image/backgrounds/Mask group.png" class="card-img-top" alt="">
                
                <!-- ICON BOTTOM-RIGHT -->
                <div class="card-icons">
                    <i class="fas fa-search"></i>
                </div>

                <div class="card-body">
                    <h6 class="fw-bold mb-1">Source from <br>industry hubs</h6>
                </div>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="col-12 col-md-3">
            <div class="card border-0 shadow-sm service-card position-relative">
                <img src="assets/Image/backgrounds/Mask group (1).png" class="card-img-top" alt="">
                <div class="card-icons">
                    <i class="fas fa-cogs"></i>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-1">Customize your <br>product</h6>
                </div>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="col-12 col-md-3">
            <div class="card border-0 shadow-sm service-card position-relative">
                <img src="assets/Image/backgrounds/image 106.png" class="card-img-top" alt="">
                <div class="card-icons">
                    <i class="fa fa-paper-plane"></i>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-1">Fast, reliable shipping<br> by ocean or air</h6>
                </div>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="col-12 col-md-3">
            <div class="card border-0 shadow-sm service-card position-relative">
                <img src="assets/Image/backgrounds/image 107.png" class="card-img-top" alt="">
                <div class="card-icons">
                    <i class="fas fa-eye"></i>
                </div>
                <div class="card-body">
                    <h6 class="fw-bold mb-1">Product monitoring<br> and inspection</h6>
                </div>
            </div>
        </div>

    </div>
</div>






<!-- Suppliers By Region -->
<div class="container my-5">
    <h5 class="fw-bold mb-4">Suppliers by region</h5>

    <div class="d-flex flex-wrap justify-content-between">
        <!-- Item 1 -->
        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/AE@2x.png" width="40" class="me-2">
            <div>
                <div>Arabic Emirates</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>

        <!-- Item 2 -->
        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/icon.png" width="40" class="me-2">
            <div>
                <div>Australia</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>

        <!-- Item 3 -->
        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/US@2x.png" width="40" class="me-2">
            <div>
                <div>United States</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>

        <!-- Item 4 -->
        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/RU@2x.png" width="40" class="me-2">
            <div>
                <div>Russia</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>

        <!-- Item 5 -->
        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/IT@2x.png" width="40" class="me-2">
            <div>
                <div>Italy</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>

        <!-- Row 2 -->
        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/DE@2x.png" width="40" class="me-2">
            <div>
                <div>Denmark</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>

        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/FR@2x.png" width="40" class="me-2">
            <div>
                <div>France</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>

        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/AE@2x.png" width="40" class="me-2">
            <div>
                <div>Arabic Emirates</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>

        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/CN@2x.png" width="40" class="me-2">
            <div>
                <div>China</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>

        <div class="d-flex align-items-center mb-3" style="width: 18%;">
            <img src="assets/Layout1/Image/flags/GB@2x.png" width="40" class="me-2">
            <div>
                <div>Great Britain</div>
                <div class="text-muted">shopname.ae</div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid rounded mt-3 mb-0 my-5">
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








