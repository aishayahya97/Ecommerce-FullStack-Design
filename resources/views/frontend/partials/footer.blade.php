<footer class="bg-white">
    <div class="container mt-4">

        <div class="row g-4 align-items-start">

            <!-- Column 1: Brand -->
            <div class="col-12 col-md-2">
                <img src="{{ asset('assets/Layout/Brand/logo-colored.png') }}" style="height:35px">
                <p class="small text-muted mt-2">
                    Best information about company<br>
                    goes here but now lorem ipsum is.
                </p>
                <div class="d-flex gap-3 mt-3">
                    <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
                </div>
            </div>

            <!-- Column 2: About -->
            <div class="col-6 col-md-2">
                <h6 class="fw-bold mb-2">About</h6>
                <ul class="list-unstyled small">
                    <li><a href="/about" class="text-muted text-decoration-none">About Us</a></li>
                    <li><a href="/stores" class="text-muted text-decoration-none">Find Store</a></li>
                    <li><a href="/categories" class="text-muted text-decoration-none">Categories</a></li>
                    <li><a href="/blogs" class="text-muted text-decoration-none">Blogs</a></li>
                </ul>
            </div>

            <!-- Column 3: Partnership -->
            <div class="col-6 col-md-2">
                <h6 class="fw-bold mb-2">Partnership</h6>
                <ul class="list-unstyled small">
                    <li><a href="/partner-program" class="text-muted text-decoration-none">Partner Program</a></li>
                    <li><a href="/affiliate" class="text-muted text-decoration-none">Affiliate</a></li>
                    <li><a href="/cooperate" class="text-muted text-decoration-none">Cooperate</a></li>
                    <li><a href="/supplier-register" class="text-muted text-decoration-none">Suppliers</a></li>
                </ul>
            </div>

            <!-- Column 4: Information -->
            <div class="col-6 col-md-2">
                <h6 class="fw-bold mb-2">Information</h6>
                <ul class="list-unstyled small">
                    <li><a href="/terms" class="text-muted text-decoration-none">Terms & Conditions</a></li>
                    <li><a href="/privacy" class="text-muted text-decoration-none">Privacy Policy</a></li>
                    <li><a href="/refund" class="text-muted text-decoration-none">Refund Policy</a></li>
                    <li><a href="/shipping" class="text-muted text-decoration-none">Shipping Info</a></li>
                </ul>
            </div>

            <!-- Column 5: Help -->
            <div class="col-6 col-md-2">
                <h6 class="fw-bold mb-2">Help</h6>
                <ul class="list-unstyled small">
                    <li><a href="/help-center" class="text-muted text-decoration-none">Help Center</a></li>
                    <li><a href="/faqs" class="text-muted text-decoration-none">FAQs</a></li>
                    <li><a href="/contact" class="text-muted text-decoration-none">Contact Support</a></li>
                </ul>
            </div>

            <!-- Column 6: For Users + Get App -->
            <div class="col-12 col-md-2">
                <div class="row">
                    <div class="col-6">
                        <h6 class="fw-bold mb-2">For users</h6>
                        <ul class="list-unstyled small">
                            <li><a href="/login" class="text-muted text-decoration-none">Login</a></li>
                            <li><a href="/register" class="text-muted text-decoration-none">Register</a></li>
                            <li><a href="/settings" class="text-muted text-decoration-none">Settings</a></li>
                            <li><a href="/orders" class="text-muted text-decoration-none">My Orders</a></li>
                        </ul>
                    </div>

                    <div class="col-6">
                        <h6 class="fw-bold mb-2">Get app</h6>
                        <div class="d-flex flex-column">
                            <img src="{{asset('assets/Layout/Misc/Group.png') }}" width="120" class="mb-2">
                            <img src="{{ asset('assets/Layout/Misc/market-button.png') }}" width="120">
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Bottom Bar -->
    <div class="w-100 mt-5 mb-3" style="background-color:#f0f0f0; padding:15px 30px;">
    <div class="container d-flex justify-content-between align-items-center text-muted small">
        <div>© 2023 Ecommerce.</div>
        <div class="d-flex align-items-center gap-2">
            <img src="{{ asset('assets/Layout1/Image/flags/US@2x.png') }}" width="25" height="18">
            <span>English</span>
            <!-- Scroll to top link -->
            <a href="#" id="scrollTop">
                <img src="{{ asset('assets/Layout/Form/input-group/Icon/control/Vector2.png') }}" width="12" height="10">
            </a>
        </div>
    </div>
</div>

</footer>






<script src="{{ asset('assets/js/script.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>