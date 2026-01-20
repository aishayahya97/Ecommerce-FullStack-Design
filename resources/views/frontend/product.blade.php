@include('frontend.partials.header')

@include('frontend.partials.sidebar')

        <!-- RIGHT CONTENT -->
    <div style="flex:1; min-width:300px; margin-top: 60px;">

        <!-- TOP BAR -->
        <div class="d-flex justify-content-between mb-3 p-3 bg-white border rounded custom-container">
            <h6 class="mb-0">12,911 items in Mobile accessory</h6>
            <div class="d-flex align-items-center gap-3">
                <div class="form-check m-0">
                    <input class="form-check-input" type="checkbox" id="verifiedOnly">
                    <label class="form-check-label" for="verifiedOnly">Verified only</label>
                </div>
                <select class="form-select form-select-sm" style="width:120px;">
                    <option>Featured</option>
                    <option>Popular</option>
                    <option>Newest</option>
                </select>
            </div>
        </div>
        

           
    <div class="d-flex justify-content-between align-items-center mb-3 p-2 ">
        
        <div class="d-flex align-items-center">
 </div>
    </div>

    <!-- Filter Tags -->
    <div class="mb-5" style="margin-top: -30px;">
        <span class="badge bg-light text-dark border me-1 badge-blue-border">Samsung ✕</span>
        <span class="badge bg-light text-dark border me-1 badge-blue-border">Apple ✕</span>
        <span class="badge bg-light text-dark border me-1 badge-blue-border">Poco ✕</span>
        <span class="badge bg-light text-dark border me-1 badge-blue-border">Metallic ✕</span>
        <span class="badge bg-light text-dark border me-1 badge-blue-border">4 star ✕</span>

        <a href="#" class="text-decoration-none ms-2">Clear all filter</a>
    </div>
    
    <!-- PRODUCT GRID -->
    <div class="row g-3" style="margin-top:20px;">

    <!-- Product Card 1 -->
    <div class="col-12 col-md-4">
        <div class="card border-0 shadow-sm p-2" style="height:405px;">
            <img src="assets/Image/tech/image 33.png" class="card-img-top" alt="">

            <!-- Solid line -->
            <hr class="my-2">

            <div class="card-body p-0 pt-2">
                <!-- Price + Heart Row -->
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 me-2">$99.50</h6>
                        <p class="mb-0 text-decoration-line-through small text-muted">$128.00</p>
                    </div>
                    <span style="color:#007bff; 
                                 font-size:16px; 
                                 border:1px solid #d1d2d3; 
                                 background-color: #f8f9fa; 
                                 padding:2px 6px; 
                                 border-radius:4px; 
                                 cursor:pointer;">
                        &#10084;
                    </span>
                </div>

                <!-- Star Rating -->
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="ms-2 small text-muted">3.0</span>
                </div>

                <!-- Product Name -->
                <p class="small text-muted mb-0">
                    GoPro HERO6 4K Action Camera – Black
                </p>
            </div>
        </div>
    </div>

    <!-- Product Card 2 -->
    <div class="col-12 col-md-4">
        <div class="card border-0 shadow-sm p-2" style="height:405px;">
            <img src="assets/Image/tech/image 33.png" class="card-img-top" alt="">
            <hr class="my-2">
            <div class="card-body p-0 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 me-2">$99.50</h6>
                        <p class="mb-0 text-decoration-line-through small text-muted">$128.00</p>
                    </div>
                    <span style="color:#007bff; 
                                 font-size:16px; 
                                 border:1px solid #d1d2d3; 
                                 background-color: #f8f9fa; 
                                 padding:2px 6px; 
                                 border-radius:4px; 
                                 cursor:pointer;">
                        &#10084;
                    </span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="ms-2 small text-muted">3.0</span>
                </div>
                <p class="small text-muted mb-0">
                    GoPro HERO6 4K Action Camera – Black
                </p>
            </div>
        </div>
    </div>

    <!-- Product Card 3 -->
    <div class="col-12 col-md-4">
        <div class="card border-0 shadow-sm p-2" style="height:405px;">
            <img src="assets/Image/tech/image 23.png" class="card-img-top" alt="">
            <hr class="my-2">
            <div class="card-body p-0 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 me-2">$99.50</h6>
                        <p class="mb-0 text-decoration-line-through small text-muted">$128.00</p>
                    </div>
                    <span style="color:#007bff; 
                                 font-size:16px; 
                                 border:1px solid #d1d2d3; 
                                 background-color: #f8f9fa; 
                                 padding:2px 6px; 
                                 border-radius:4px; 
                                 cursor:pointer;">
                        &#10084;
                    </span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="ms-2 small text-muted">3.0</span>
                </div>
                <p class="small text-muted mb-0">
                    GoPro HERO6 4K Action Camera – Black
                </p>
            </div>
        </div>
    </div>

    <!-- Product Card 4 -->
    <div class="col-12 col-md-4 mt-3">
        <div class="card border-0 shadow-sm p-2" style="height:405px;">
            <img src="assets/Image/tech/image 32.png" class="card-img-top" alt="">
            <hr class="my-2">
            <div class="card-body p-0 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 me-2">$99.50</h6>
                        <p class="mb-0 text-decoration-line-through small text-muted">$128.00</p>
                    </div>
                    <span style="color:#007bff; 
                                 font-size:16px; 
                                 border:1px solid #d1d2d3; 
                                 background-color: #f8f9fa; 
                                 padding:2px 6px; 
                                 border-radius:4px; 
                                 cursor:pointer;">
                        &#10084;
                    </span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="ms-2 small text-muted">3.0</span>
                </div>
                <p class="small text-muted mb-0">
                    GoPro HERO6 4K Action Camera – Black
                </p>
            </div>
        </div>
    </div>

    <!-- Product Card 5 -->
    <div class="col-12 col-md-4 mt-3">
        <div class="card border-0 shadow-sm p-2" style="height:405px;">
            <img src="assets/Image/tech/6.png" class="card-img-top" alt="">
            <hr class="my-2">
            <div class="card-body p-0 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 me-2">$99.50</h6>
                        <p class="mb-0 text-decoration-line-through small text-muted">$128.00</p>
                    </div>
                    <span style="color:#007bff; 
                                 font-size:16px; 
                                 border:1px solid #d1d2d3; 
                                 background-color: #f8f9fa; 
                                 padding:2px 6px; 
                                 border-radius:4px; 
                                 cursor:pointer;">
                        &#10084;
                    </span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="ms-2 small text-muted">3.0</span>
                </div>
                <p class="small text-muted mb-0">
                    GoPro HERO6 4K Action Camera – Black
                </p>
            </div>
        </div>
    </div>

    <!-- Product Card 6 -->
    <div class="col-12 col-md-4 mt-3">
        <div class="card border-0 shadow-sm p-2" style="height:405px;">
            <img src="assets/Image/tech/image 33.png" class="card-img-top" alt="">
            <hr class="my-2">
            <div class="card-body p-0 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 me-2">$99.50</h6>
                        <p class="mb-0 text-decoration-line-through small text-muted">$128.00</p>
                    </div>
                    <span style="color:#007bff; 
                                 font-size:16px; 
                                 border:1px solid #d1d2d3; 
                                 background-color: #f8f9fa; 
                                 padding:2px 6px; 
                                 border-radius:4px; 
                                 cursor:pointer;">
                        &#10084;
                    </span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="ms-2 small text-muted">3.0</span>
                </div>
                <p class="small text-muted mb-0">
                    GoPro HERO6 4K Action Camera – Black
                </p>
            </div>
        </div>
    </div>

    <!-- Product Card 7 -->
    <div class="col-12 col-md-4 mt-3">
        <div class="card border-0 shadow-sm p-2" style="height:408px;">
            <img src="assets/Image/tech/image 34.png" class="card-img-top mt-5" alt="">
            <hr class="my-2">
            <div class="card-body p-0 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 me-2">$99.50</h6>
                        <p class="mb-0 text-decoration-line-through small text-muted">$128.00</p>
                    </div>
                    <span style="color:#007bff; 
                                 font-size:16px; 
                                 border:1px solid #d1d2d3; 
                                 background-color: #f8f9fa; 
                                 padding:2px 6px; 
                                 border-radius:4px; 
                                 cursor:pointer;">
                        &#10084;
                    </span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="ms-2 small text-muted">3.0</span>
                </div>
                <p class="small text-muted mb-0">
                    GoPro HERO6 4K Action Camera – Black
                </p>
            </div>
        </div>
    </div>

    <!-- Product Card 8 -->
    <div class="col-12 col-md-4 mt-3">
        <div class="card border-0 shadow-sm p-2" style="height:405px;">
            <img src="assets/Image/tech/image 86.png" class="card-img-top" alt="">
            <hr class="my-2">
            <div class="card-body p-0 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 me-2">$99.50</h6>
                        <p class="mb-0 text-decoration-line-through small text-muted">$128.00</p>
                    </div>
                    <span style="color:#007bff; 
                                 font-size:16px; 
                                 border:1px solid #d1d2d3; 
                                 background-color: #f8f9fa; 
                                 padding:2px 6px; 
                                 border-radius:4px; 
                                 cursor:pointer;">
                        &#10084;
                    </span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="ms-2 small text-muted">3.0</span>
                </div>
                <p class="small text-muted mb-0">
                    GoPro HERO6 4K Action Camera – Black
                </p>
            </div>
        </div>
    </div>

    <!-- Product Card 9 -->
    <div class="col-12 col-md-4 mt-3">
        <div class="card border-0 shadow-sm p-2" style="height:405px;">
            <img src="assets/Image/tech/image 33.png" class="card-img-top" alt="">
            <hr class="my-2">
            <div class="card-body p-0 pt-2">
                <div class="d-flex justify-content-between align-items-center mb-2">
                    <div class="d-flex align-items-center">
                        <h6 class="fw-bold mb-0 me-2">$99.50</h6>
                        <p class="mb-0 text-decoration-line-through small text-muted">$128.00</p>
                    </div>
                    <span style="color:#007bff; 
                                 font-size:16px; 
                                 border:1px solid #d1d2d3; 
                                 background-color: #f8f9fa; 
                                 padding:2px 6px; 
                                 border-radius:4px; 
                                 cursor:pointer;">
                        &#10084;
                    </span>
                </div>
                <div class="d-flex align-items-center mb-2">
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">★</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="text-warning me-1">☆</span>
                    <span class="ms-2 small text-muted">3.0</span>
                </div>
                <p class="small text-muted mb-0">
                    GoPro HERO6 4K Action Camera – Black
                </p>
            </div>
        </div>
    </div>

    

</div>

        </div>

    </div>
</div>
</div>
<div class="d-flex justify-content-end align-items-center gap-2 mt-3" style="margin-right: 100px;">

    <!-- Show Dropdown -->
    <select class="form-select form-select-sm" style="width:80px;">
        <option>10</option>
        <option>20</option>
        <option>30</option>
    </select>

    <!-- Pagination -->
    <ul class="pagination mb-0">
        <li class="page-item">
            <a class="page-link" href="#" style="font-size: 28px; padding: 6px 12px;">‹</a>
        </li>
        <li class="page-item active">
            <a class="page-link" href="#">1</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">2</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#">3</a>
        </li>
        <li class="page-item">
            <a class="page-link" href="#" style="font-size: 28px; padding: 6px 12px;">›</a>
        </li>
    </ul>
</div>


<!-- Subscribe Newsletter -->
<div class="container-fluid rounded mt-3 mb-0 my-5" style="font-family: poppins, sans-serif;">
    <div class="p-4 text-center" style="background-color: #f0f0f0;">
        <h5 class="fw-bold">Subscribe on our newsletter</h5>
        <p class="text-muted small">Get daily news on upcoming offers from many suppliers all over the world</p>

        <div class="d-flex justify-content-center gap-2 mt-3 flex-wrap">
            <input type="email" class="form-control w-auto" style="min-width:250px" placeholder="Email">
            <button class="btn btn-primary px-4">Subscribe</button>
        </div>
    </div>
</div>

@include('frontend.partials.footer')
