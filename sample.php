<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo</title>
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
          Cholo helps you book, track, and manage vehicles — all in one smooth, reliable platform.
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
  <section class="features">
    <div class="container">
      <h2 data-aos="fade-up">Why Choose Cholo?</h2>
      <div class="row g-4">
        <div class="col-md-4" data-aos="fade-right">
          <div class="feature-box">
            <i class="fa-solid fa-car"></i>
            <h5>Wide Vehicle Range</h5>
            <p>From cars to trucks, explore our extensive fleet suited for any purpose.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-up">
          <div class="feature-box">
            <i class="fa-solid fa-shield-halved"></i>
            <h5>Trusted & Secure</h5>
            <p>Our system ensures verified drivers, safe payments, and secure bookings.</p>
          </div>
        </div>
        <div class="col-md-4" data-aos="fade-left">
          <div class="feature-box">
            <i class="fa-solid fa-bolt"></i>
            <h5>Fast & Reliable</h5>
            <p>Experience lightning-fast booking, seamless tracking, and top-notch service.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- STATS -->
  <section class="stats">
    <div class="container">
      <div class="row g-4">
        <div class="col-md-3" data-aos="zoom-in">
          <h3 class="counter" data-target="500">0</h3>
          <p>Successful Bookings</p>
        </div>
        <div class="col-md-3" data-aos="zoom-in">
          <h3 class="counter" data-target="100">0</h3>
          <p>Vehicles Available</p>
        </div>
        <div class="col-md-3" data-aos="zoom-in">
          <h3 class="counter" data-target="300">0</h3>
          <p>Happy Customers</p>
        </div>
        <div class="col-md-3" data-aos="zoom-in">
          <h3 class="counter" data-target="50">0</h3>
          <p>Partner Drivers</p>
        </div>
      </div>
    </div>
  </section>

  <!-- TESTIMONIALS -->
  <section class="testimonials">
    <div class="container">
      <h2 data-aos="fade-up">What Our Users Say</h2>
      <div id="testimonialCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner mt-4">
          <div class="carousel-item active">
            <div class="testimonial-card mx-auto col-md-6">
              <img src="img/user1.jpg" alt="User 1">
              <p>“Booking a car has never been this easy. Cholo makes travel stress-free!”</p>
              <h6>— Ayesha Rahman</h6>
            </div>
          </div>
          <div class="carousel-item">
            <div class="testimonial-card mx-auto col-md-6">
              <img src="img/user2.jpg" alt="User 2">
              <p>“Reliable and fast service! I always use Cholo for my business trips.”</p>
              <h6>— Tanvir Hasan</h6>
            </div>
          </div>
          <div class="carousel-item">
            <div class="testimonial-card mx-auto col-md-6">
              <img src="img/user3.jpg" alt="User 3">
              <p>“Loved the user experience. Smooth, transparent, and trustworthy!”</p>
              <h6>— Rafiul Islam</h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

   

  <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
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

