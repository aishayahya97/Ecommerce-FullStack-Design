/* ===== Countdown JS ===== */
const targetDate = new Date("2025-12-31T00:00:00").getTime();

function updateCountdown() {
  const now = new Date().getTime();
  const distance = targetDate - now;

  if (distance < 0) return; // Countdown ended

  const days = Math.floor(distance / (1000 * 60 * 60 * 24));
  const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  const seconds = Math.floor((distance % (1000 * 60)) / 1000);

  document.getElementById("days").innerHTML = `${days}<br>Days`;
  document.getElementById("hours").innerHTML = `${hours}<br>Hours`;
  document.getElementById("minutes").innerHTML = `${minutes}<br>Min`;
  document.getElementById("seconds").innerHTML = `${seconds}<br>Sec`;
}

// Initial call & update every second
updateCountdown();
setInterval(updateCountdown, 1000);


/* ===== Accordion JS ===== */
document.querySelectorAll(".accordion-header").forEach(header => {
  header.addEventListener("click", function () {
    this.classList.toggle("active");
    const content = this.nextElementSibling;
    content.style.display = (content.style.display === "block") ? "none" : "block";
  });
});


/* ===== Price Range Slider JS ===== */
function updateSlider() {
  const minRange = document.getElementById("minRange");
  const maxRange = document.getElementById("maxRange");
  const minPrice = document.getElementById("minPrice");
  const maxPrice = document.getElementById("maxPrice");
  const rangeFill = document.getElementById("rangeFill");

  let minVal = parseInt(minRange.value);
  let maxVal = parseInt(maxRange.value);

  if (minVal > maxVal - 50) {
    minVal = maxVal - 50;
    minRange.value = minVal;
  }
  if (maxVal < minVal + 50) {
    maxVal = minVal + 50;
    maxRange.value = maxVal;
  }

  minPrice.value = minVal;
  maxPrice.value = maxVal;

  const percent1 = (minVal / 1000) * 100;
  const percent2 = (maxVal / 1000) * 100;

  rangeFill.style.left = percent1 + "%";
  rangeFill.style.width = (percent2 - percent1) + "%";
}


/* ===== Auto-scroll Recommended Carousel ===== */
const autoScrollInterval = 50; // interval in ms
const scrollAmount = 1;        // pixels per interval

document.querySelectorAll('.recommended-carousel').forEach(carousel => {
  let scrollPos = 0;
  let direction = 1; // 1: right, -1: left

  // Auto-scroll function
  const scrollFunc = () => {
    if (scrollPos + carousel.clientWidth >= carousel.scrollWidth) direction = -1;
    if (scrollPos <= 0) direction = 1;
    scrollPos += scrollAmount * direction;
    carousel.scrollLeft = scrollPos;
  };

  const interval = setInterval(scrollFunc, autoScrollInterval);

  // Pause on hover
  carousel.addEventListener("mouseenter", () => clearInterval(interval));
  carousel.addEventListener("mouseleave", () => setInterval(scrollFunc, autoScrollInterval));
});


function toggleDropdown(element) {
    // Close other open dropdowns
    document.querySelectorAll('.custom-dropdown').forEach(dd => {
      if(dd !== element.parentElement) dd.classList.remove('open');
    });

    // Toggle clicked dropdown
    element.parentElement.classList.toggle('open');
  }

  function selectOption(item) {
    const dropdown = item.closest('.custom-dropdown');
    const headerValue = dropdown.querySelector('.selected-value');

    // Set selected value
    headerValue.innerHTML = item.innerHTML;

    // Close dropdown
    dropdown.classList.remove('open');
  }

  // Close dropdown if clicked outside
  document.addEventListener('click', function(e) {
    if(!e.target.closest('.custom-dropdown')) {
      document.querySelectorAll('.custom-dropdown').forEach(dd => dd.classList.remove('open'));
    }
  });

  
    document.getElementById('scrollTop').addEventListener('click', function(e) {
        e.preventDefault(); // link ka default behavior roko
        window.scrollTo({
            top: 0,
            behavior: 'smooth' // smooth scroll
        });
    });

    document.querySelectorAll('.toggle-header').forEach(header => {
    header.addEventListener('click', () => {
        const target = header.nextElementSibling; // Collapse element
        const bsCollapse = new bootstrap.Collapse(target, {
            toggle: true
        });
        // Arrow rotate
        const icon = header.querySelector('i');
        icon.classList.toggle('fa-rotate-180');
    });
});
document.querySelectorAll('.toggle-header').forEach(header => {
    header.addEventListener('click', () => {
        const target = document.querySelector('#brandsContent'); // Collapse element
        const bsCollapse = new bootstrap.Collapse(target, {
            toggle: true
        });
        // Rotate arrow
        const icon = header.querySelector('i');
        icon.classList.toggle('fa-rotate-180');
    });
});

document.querySelectorAll('.toggle-header').forEach(header => {
    header.addEventListener('click', () => {
        const target = header.nextElementSibling; // Collapse element
        const bsCollapse = new bootstrap.Collapse(target, {
            toggle: true
        });
        // Arrow rotate
        const icon = header.querySelector('i');
        icon.classList.toggle('fa-rotate-180');
    });
});

document.querySelectorAll('.toggle-header').forEach(header => {
    header.addEventListener('click', () => {
        const target = header.nextElementSibling; // Collapse element
        const bsCollapse = new bootstrap.Collapse(target, {
            toggle: true
        });
        // Arrow rotate
        const icon = header.querySelector('i');
        icon.classList.toggle('fa-rotate-180');
    });
});

document.querySelectorAll('.toggle-header').forEach(header => {
    header.addEventListener('click', () => {
        const target = header.nextElementSibling; // Collapse element
        const bsCollapse = new bootstrap.Collapse(target, { toggle: true });
        // Arrow rotate
        const icon = header.querySelector('i');
        icon.classList.toggle('fa-rotate-180');
    });
});

document.querySelectorAll('.toggle-header').forEach(header => {
    header.addEventListener('click', () => {
        const target = header.nextElementSibling; // Collapse element
        const bsCollapse = new bootstrap.Collapse(target, { toggle: true });
        // Arrow rotate
        const icon = header.querySelector('i');
        icon.classList.toggle('fa-rotate-180');
    });
});


$('.recommended-carousel').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    arrows: true,
    dots: false,
    infinite: false,
    responsive: [
        { breakpoint: 1200, settings: { slidesToShow: 4 } },
        { breakpoint: 992, settings: { slidesToShow: 3 } },
        { breakpoint: 768, settings: { slidesToShow: 2 } },
        { breakpoint: 576, settings: { slidesToShow: 1 } },
    ]
});

document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.product-heart').forEach(heart => {
        heart.addEventListener('click', function() {
            heart.classList.toggle('liked');
        });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const hearts = document.querySelectorAll('.product-heart');

    hearts.forEach(heart => {
        heart.addEventListener('click', function() {
            const productId = this.dataset.productId;

            fetch('/cart/add/' + productId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({ quantity: 1 })
            })
            .then(response => response.json())
            .then(data => {
                if(data.success){
                    this.style.color = 'red'; // Heart red
                    console.log('Added to cart:', data.cart);
                }
            })
            .catch(err => console.error(err));
        });
    });
});


// ================= ADD TO CART (Heart / Button) =================
document.addEventListener('click', function (e) {

    // ADD TO CART
    if (e.target.classList.contains('add-to-cart')) {
        e.preventDefault();

        let productId = e.target.dataset.product;

        fetch(`/cart/add/${productId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                alert('Product added to cart');
            }
        });
    }

    // SAVE FOR LATER
    if (e.target.classList.contains('save-for-later')) {
        e.preventDefault();
        let cartId = e.target.dataset.cart;

        fetch(`/cart/save/${cartId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => location.reload());
    }

    // MOVE TO CART
    if (e.target.classList.contains('move-to-cart')) {
        e.preventDefault();
        let saveId = e.target.dataset.save;

        fetch(`/cart/move/${saveId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Accept': 'application/json'
            }
        })
        .then(res => res.json())
        .then(data => location.reload());
    }
});

// ================= UPDATE QUANTITY =================
document.querySelectorAll('.quantity-select').forEach(select => {
    select.addEventListener('change', function () {
        let cartId = this.dataset.cartId;
        let qty = this.value;

        fetch(`/cart/${cartId}`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ quantity: qty })
        }).then(() => location.reload());
    });
});





