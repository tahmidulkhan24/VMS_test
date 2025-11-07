<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Don’t Wait - Cholo</title>
  <link rel="icon" type="image/png" href="img/icon4.png">
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
  <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<?php
    include('navbar.php');
?>
<body>
  

  <section class="hero d-flex align-items-center text-center position-relative" 
         style="height: 100vh; background: linear-gradient(135deg, #0D8ABC, #1CB5E0); overflow: hidden;">

  <div class="hero-bg position-absolute top-0 start-0 w-100 h-100" 
       style="background: url('img/hero.png') center center / cover no-repeat; opacity: 0.2; z-index: 1;"></div>

  <div class="container position-relative z-index-2" data-aos="fade-up">
    <div class="row justify-content-center align-items-center">
      
      <!-- Text -->
      <div class="col-lg-6 text-lg-start text-center text-white">
        <h1 class="fw-bold mb-3">
          Manage Your <span class="highlight">Journey</span><br>
          With Confidence & Ease
        </h1>
        <p class="lead mb-4">
          Cholo helps you book and manage vehicles — all in one smooth, reliable platform.
        </p>
        <div class="d-flex justify-content-lg-start justify-content-center gap-3">
          <a href="booking_vehicle.php" class="btn btn-primary btn-lg px-4">
            <i class="fa-solid fa-car me-2"></i>Book Now
          </a>
          <a href="about.php" class="btn btn-outline-light btn-lg px-4">
            <i class="fa-solid fa-circle-info me-2"></i>Learn More
          </a>
        </div>
      </div>

      <!-- Inline Hero Image -->
      <div class="col-lg-6 d-none d-lg-block text-end">
        <img src="img/hero_side.png" alt="Car" class="img-fluid" style="max-height: 500px;">
      </div>

    </div>

    <!-- Scroll Indicator -->
    <div class="scroll-indicator mt-5 text-white">
      <i class="fa-solid fa-angles-down fa-2x"></i>
    </div>
  </div>
</section>

<!-- FEATURES -->
<section class="features py-5">
  <div class="container text-center">
    <h2 data-aos="fade-up" class="mb-5">Why Choose Cholo?</h2>
    <div class="row g-4">
      <div class="col-12 col-md-4" data-aos="fade-right">
        <div class="feature-box p-4 h-100">
          <i class="fa-solid fa-car fa-2x mb-3"></i>
          <h5>Wide Vehicle Range</h5>
          <p>From cars to trucks, explore our extensive fleet suited for any purpose.</p>
        </div>
      </div>
      <div class="col-12 col-md-4" data-aos="fade-up">
        <div class="feature-box p-4 h-100">
          <i class="fa-solid fa-shield-halved fa-2x mb-3"></i>
          <h5>Trusted & Secure</h5>
          <p>Our system ensures verified drivers, safe payments, and secure bookings.</p>
        </div>
      </div>
      <div class="col-12 col-md-4" data-aos="fade-left">
        <div class="feature-box p-4 h-100">
          <i class="fa-solid fa-bolt fa-2x mb-3"></i>
          <h5>Fast & Reliable</h5>
          <p>Experience lightning-fast booking, seamless tracking, and top-notch service.</p>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- STATS -->
<section class="stats py-5 text-center">
  <div class="container">
    <div class="row g-4">
      <div class="col-6 col-md-3" data-aos="zoom-in">
        <h3 class="counter display-6 fw-bold" data-target="500">0</h3>
        <p>Successful Bookings</p>
      </div>
      <div class="col-6 col-md-3" data-aos="zoom-in">
        <h3 class="counter display-6 fw-bold" data-target="100">0</h3>
        <p>Vehicles Available</p>
      </div>
      <div class="col-6 col-md-3" data-aos="zoom-in">
        <h3 class="counter display-6 fw-bold" data-target="300">0</h3>
        <p>Happy Customers</p>
      </div>
      <div class="col-6 col-md-3" data-aos="zoom-in">
        <h3 class="counter display-6 fw-bold" data-target="50">0</h3>
        <p>Partner Drivers</p>
      </div>
    </div>
  </div>
</section>

<!-- BANNER -->
<section class="banner my-5">
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-12 col-md-10 col-lg-8 text-center">
        <img src="img/banner_hero.png" alt="Banner Image"
             class="img-fluid rounded-3 shadow-sm w-100"
             style="max-width: 800px;">
      </div>
    </div>
  </div>
</section>

<!-- TESTIMONIALS -->
<section class="testimonials py-5">
  <div class="container text-center">
    <h2 data-aos="fade-up" class="mb-5">What Our Users Say</h2>
    <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner mt-4">
        <div class="carousel-item active">
          <div class="testimonial-card mx-auto col-12 col-md-6 p-4 rounded-3">
            <img src="img/profile.png" alt="User 1" class="rounded-circle mb-3" style="width:80px; height:80px;">
            <p>“Booking a car has never been this easy. Cholo makes travel stress-free!”</p>
            <h6>— Labib </h6>
          </div>
        </div>
        <div class="carousel-item">
          <div class="testimonial-card mx-auto col-12 col-md-6 p-4 rounded-3">
            <img src="img/profile.png" alt="User 2" class="rounded-circle mb-3" style="width:80px; height:80px;">
            <p>“Reliable and fast service! I always use Cholo for my business trips.”</p>
            <h6>— Asif</h6>
          </div>
        </div>
        <div class="carousel-item">
          <div class="testimonial-card mx-auto col-12 col-md-6 p-4 rounded-3">
            <img src="img/profile.png" alt="User 3" class="rounded-circle mb-3" style="width:80px; height:80px;">
            <p>“Loved the user experience. Smooth, transparent, and trustworthy!”</p>
            <h6>— Shoab</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- CALL TO ACTION -->
<section class="stats py-5 text-center">
  <div class="container">
    <div class="banner-content p-4" data-aos="zoom-in">
      <h2 class="mb-3 text-dark">Ready to Start Your Journey?</h2>
      <p class="mb-4 text-dark">Join thousands of satisfied users who trust Cholo for their vehicle booking needs.</p>
      <a href="booking_vehicle.php" class="btn btn-primary btn-lg px-4">
        <i class="fa-solid fa-car me-2"></i>Book Your Vehicle Now
      </a>
    </div>
  </div>
</section>

   
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>
    // Initialize AOS
    AOS.init();

    const counters = document.querySelectorAll('.counter');
    const speed = 300; 

    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.getAttribute('data-target');
        const count = +counter.innerText;
        const increment = target / speed;

        if (count < target) {
          counter.innerText = Math.ceil(count + increment);
          setTimeout(updateCount, 10);
        } else {
          counter.innerText = target;
        }
      };
      updateCount();
    });
  </script>
   <?php include('footer.php'); ?>
</body>

</html>

