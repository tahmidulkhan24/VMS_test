<?php include('admin_navbar.php'); ?>
<div class="main-content p-4" style="margin-top:70px;">
  <div class="container-fluid">
    <h3 class="fw-bold text-dark mb-4 animate__animated animate__fadeInDown">Dashboard Overview</h3>

    <!-- Dashboard Cards -->
    <div class="row g-4">
      <!-- Total Vehicles -->
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-primary mx-auto mb-3">
            <i class="bi bi-truck fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark counter">12</h3>
          <p class="text-muted mb-0">Total Vehicles</p>
        </div>
      </div>

      <!-- Available -->
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-success mx-auto mb-3">
            <i class="bi bi-check-circle fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark counter">7</h3>
          <p class="text-muted mb-0">Available</p>
        </div>
      </div>

      <!-- Booked -->
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-warning mx-auto mb-3">
            <i class="bi bi-calendar2-check fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark counter">3</h3>
          <p class="text-muted mb-0">Booked</p>
        </div>
      </div>

      <!-- Maintenance -->
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-danger mx-auto mb-3">
            <i class="bi bi-tools fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark counter">2</h3>
          <p class="text-muted mb-0">Under Maintenance</p>
        </div>
      </div>
    </div>

    <div class="row g-4 mt-4">
      <!-- Users -->
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-info mx-auto mb-3">
            <i class="bi bi-people-fill fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark counter">25</h3>
          <p class="text-muted mb-0">Total Users</p>
        </div>
      </div>

      <!-- Drivers -->
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-secondary mx-auto mb-3">
            <i class="bi bi-person-badge fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark counter">10</h3>
          <p class="text-muted mb-0">Drivers</p>
        </div>
      </div>

      <!-- Pending -->
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-primary mx-auto mb-3">
            <i class="bi bi-clipboard-check fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark counter">6</h3>
          <p class="text-muted mb-0">Pending Approvals</p>
        </div>
      </div>

      <!-- Active Bookings -->
      <div class="col-md-3 col-sm-6">
        <div class="dash-card text-center border-0 p-4 rounded-4 shadow-sm">
          <div class="icon-wrapper bg-gradient-success mx-auto mb-3">
            <i class="bi bi-activity fs-2 text-white"></i>
          </div>
          <h3 class="fw-bold mb-0 text-dark counter">14</h3>
          <p class="text-muted mb-0">Active Bookings</p>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Dashboard Styles -->
<style>
  .dash-card {
    background: #fff;
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .dash-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 12px 25px rgba(0, 0, 0, 0.1);
  }

  .dash-card::before {
    content: '';
    position: absolute;
    top: -40%;
    left: -40%;
    width: 120%;
    height: 120%;
    background: linear-gradient(135deg, rgba(37,99,235,0.15), rgba(255,255,255,0.1));
    transform: rotate(45deg);
    opacity: 0;
    transition: opacity 0.4s ease;
  }

  .dash-card:hover::before {
    opacity: 1;
  }

  .icon-wrapper {
    width: 60px;
    height: 60px;
    border-radius: 15px;
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    animation: pop 0.5s ease;
  }

  /* Gradient color helpers */
  .bg-gradient-primary {
    background: linear-gradient(135deg, #2563eb, #60a5fa);
  }

  .bg-gradient-success {
    background: linear-gradient(135deg, #10b981, #6ee7b7);
  }

  .bg-gradient-warning {
    background: linear-gradient(135deg, #f59e0b, #fcd34d);
  }

  .bg-gradient-danger {
    background: linear-gradient(135deg, #ef4444, #f87171);
  }

  .bg-gradient-info {
    background: linear-gradient(135deg, #06b6d4, #67e8f9);
  }

  .bg-gradient-secondary {
    background: linear-gradient(135deg, #6b7280, #9ca3af);
  }

  @keyframes pop {
    from { transform: scale(0.8); opacity: 0.3; }
    to { transform: scale(1); opacity: 1; }
  }

  /* Counter animation */
  .counter {
    animation: fadeInUp 0.7s ease forwards;
    opacity: 0;
  }

  @keyframes fadeInUp {
    0% { transform: translateY(20px); opacity: 0; }
    100% { transform: translateY(0); opacity: 1; }
  }

  /* Responsive */
  @media (max-width: 768px) {
    .dash-card { margin-bottom: 1rem; }
    .icon-wrapper { width: 55px; height: 55px; }
  }
</style>

<!-- Counter Animation Script -->
<script>
  document.addEventListener("DOMContentLoaded", () => {
    const counters = document.querySelectorAll('.counter');
    counters.forEach(counter => {
      const updateCount = () => {
        const target = +counter.innerText;
        const count = +counter.getAttribute('data-count') || 0;
        const increment = target / 40;

        if (count < target) {
          counter.setAttribute('data-count', count + increment);
          counter.innerText = Math.ceil(count + increment);
          setTimeout(updateCount, 20);
        } else {
          counter.innerText = target;
        }
      };
      updateCount();
    });
  });
</script>
