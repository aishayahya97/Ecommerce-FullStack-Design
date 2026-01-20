
<!-- Sidebar Start -->
<div class="container my-4" style="margin-bottom: 50px;">
    <div class="d-flex flex-wrap gap-3">

        <!-- Sidebar -->
        <div class="sidebar">

    {{-- Breadcrumb --}}
    <div style="display:flex; align-items:center; font-size:14px; color:#6c757d; gap:8px; white-space:nowrap;">
        <a href="{{ route('home') }}" class="text-muted text-decoration-none">
            Home <span>›</span>
        </a>
        @if(isset($parentCat) && $parentCat)
            <a href="{{ route('category.products', $parentCat->slug) }}" class="text-muted text-decoration-none">
                {{ $parentCat->name }} <span>›</span>
            </a>
        @endif
        @if(isset($category))
            <span class="fw-medium text-dark">{{ $category->name }}</span>
        @endif
    </div>

    <hr class="sidebar-separator">

    {{-- Categories --}}
    @php
        $topCategories = $categories->take(6);
        $remainingCategories = $categories->slice(6);
        $selectedCategories = request()->category ?? [];
        if(!is_array($selectedCategories)) $selectedCategories = [$selectedCategories];
    @endphp
    <div class="mb-3">
        <h5 class="d-flex justify-content-between align-items-center mb-2 toggle-header" style="cursor:pointer;">
            Categories <i class="fas fa-chevron-down"></i>
        </h5>

        <form method="GET" action="{{ route('products.index') }}">
            <div class="collapse show">
                {{-- Top 6 --}}
                @foreach($topCategories as $cat)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="category[]" value="{{ $cat->id }}"
                               onchange="this.form.submit()"
                               {{ in_array($cat->id, $selectedCategories) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $cat->name }}</label>
                    </div>
                @endforeach

                {{-- Remaining --}}
                <div id="extraCategories" class="d-none">
                    @foreach($remainingCategories as $cat)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="category[]" value="{{ $cat->id }}"
                                   onchange="this.form.submit()"
                                   {{ in_array($cat->id, $selectedCategories) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $cat->name }}</label>
                        </div>
                    @endforeach
                </div>

                @if($remainingCategories->count())
                    <a href="#" id="toggleExtraCategories">See All</a>
                @endif
            </div>
        </form>
    </div>

    <hr class="sidebar-separator">

    {{-- Brands --}}
    @php
        $topBrands = $brands->take(6);
        $remainingBrands = $brands->slice(6);
        $selectedBrands = request()->brand ?? [];
        if(!is_array($selectedBrands)) $selectedBrands = [$selectedBrands];
    @endphp
    <div class="mb-3">
        <h5 class="d-flex justify-content-between align-items-center mb-2 toggle-header" style="cursor:pointer;">
            Brands <i class="fas fa-chevron-down"></i>
        </h5>

        <form method="GET" action="{{ route('products.index') }}">
            <div class="collapse show">
                @foreach($topBrands as $brand)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="brand[]" value="{{ $brand->id }}"
                               onchange="this.form.submit()"
                               {{ in_array($brand->id, $selectedBrands) ? 'checked' : '' }}>
                        <label class="form-check-label">{{ $brand->name }}</label>
                    </div>
                @endforeach

                <div id="extraBrands" class="d-none">
                    @foreach($remainingBrands as $brand)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="brand[]" value="{{ $brand->id }}"
                                   onchange="this.form.submit()"
                                   {{ in_array($brand->id, $selectedBrands) ? 'checked' : '' }}>
                            <label class="form-check-label">{{ $brand->name }}</label>
                        </div>
                    @endforeach
                </div>

                @if($remainingBrands->count())
                    <a href="#" id="toggleExtraBrands">See All</a>
                @endif
            </div>
        </form>
    </div>

    <hr class="sidebar-separator">

    {{-- Features --}}
    <div class="mb-3">
        <h5 class="d-flex justify-content-between align-items-center mb-2 toggle-header" style="cursor:pointer;">
            Features <i class="fas fa-chevron-down"></i>
        </h5>
        <form method="GET" action="{{ route('products.index') }}">
            <div class="collapse" id="featuresContent">
                @foreach($features as $feature)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="feature[]" value="{{ $feature }}"
                               onchange="this.form.submit()">
                        <label class="form-check-label">{{ $feature }}</label>
                    </div>
                @endforeach
            </div>
        </form>
    </div>

    <hr class="sidebar-separator">

    {{-- Conditions --}}
    <div class="mb-3">
        <h5 class="d-flex justify-content-between align-items-center mb-2 toggle-header" style="cursor:pointer;">
            Condition <i class="fas fa-chevron-down"></i>
        </h5>
        <form method="GET" action="{{ route('products.index') }}">
            <div class="collapse" id="conditionContent">
                @foreach($conditions as $condition)
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" name="condition[]" value="{{ $condition }}"
                               onchange="this.form.submit()">
                        <label class="form-check-label">{{ $condition }}</label>
                    </div>
                @endforeach
            </div>
        </form>
    </div>

    <hr class="sidebar-separator">

    {{-- Ratings --}}
    <div class="mb-3">
        <h5 class="d-flex justify-content-between align-items-center mb-2 toggle-header" style="cursor:pointer;">
            Ratings <i class="fas fa-chevron-down"></i>
        </h5>
        <form method="GET" action="{{ route('products.index') }}">
            <div class="collapse" id="ratingsContent">
                @foreach($ratings as $rating)
                    <div class="form-check mb-1">
                        <input class="form-check-input" type="checkbox" name="rating[]" value="{{ $rating }}"
                               onchange="this.form.submit()">
                        <label class="form-check-label">
                            @for($i=1;$i<=$rating;$i++)
                                <span class="text-warning">&#9733;</span>
                            @endfor
                            @for($i=$rating+1;$i<=5;$i++)
                                <span class="text-secondary">&#9733;</span>
                            @endfor
                        </label>
                    </div>
                @endforeach
            </div>
        </form>
    </div>
</div>

{{-- JS --}}
<script>
    // Toggle extra categories/brands
    document.getElementById('toggleExtraCategories')?.addEventListener('click', e=>{
        e.preventDefault();
        document.getElementById('extraCategories').classList.toggle('d-none');
        e.target.textContent = document.getElementById('extraCategories').classList.contains('d-none') ? 'See All' : 'Show Less';
    });

    document.getElementById('toggleExtraBrands')?.addEventListener('click', e=>{
        e.preventDefault();
        document.getElementById('extraBrands').classList.toggle('d-none');
        e.target.textContent = document.getElementById('extraBrands').classList.contains('d-none') ? 'See All' : 'Show Less';
    });

    document.getElementById('toggleExtraFeatures')?.addEventListener('click', e=>{
        e.preventDefault();
        document.getElementById('extraFeatures').classList.toggle('d-none');
        e.target.textContent = document.getElementById('extraFeatures').classList.contains('d-none') ? 'See All' : 'Show Less';
    });


    // Collapse arrow rotation
    document.querySelectorAll('.toggle-header').forEach(header=>{
        header.addEventListener('click', ()=>{
            const icon = header.querySelector('i');
            icon.classList.toggle('fa-rotate-180');
        });
    });
</script>
<script>
document.querySelectorAll('.toggle-header').forEach(header => {

    header.addEventListener('click', function () {

        // next element (form ke andar collapse div)
        const collapseDiv = this.nextElementSibling.querySelector('.collapse');

        if (!collapseDiv) return;

        // bootstrap collapse instance
        const bsCollapse = new bootstrap.Collapse(collapseDiv, {
            toggle: true
        });

        // arrow rotate
        const icon = this.querySelector('i');
        icon.classList.toggle('rotate');
    });

});
</script>

<style>
.toggle-header i {
    transition: transform 0.3s ease;
}
.toggle-header i.rotate {
    transform: rotate(180deg);
}
</style>


<style>
    .fa-chevron-down { transition: transform 0.3s; }
</style>
