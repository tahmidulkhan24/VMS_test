<?php
    include_once('notification.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cholo</title>
    <link rel="icon" type="image/png" href="img/icon4.png">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <!-- 🌐 FINAL THEME NAVBAR -->
    <nav class="navbar navbar-expand-lg">
        <div class="container-fluid d-flex align-items-center">
            <!-- 🏠 Logo (Left Side) -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="img/logo2.png" alt="logo" class="me-2">
                
            </a>

            <!-- 📱 Mobile Menu Toggle -->
            <button class="navbar-toggler text-dark" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="bi bi-list fs-2"></i>
            </button>

            <!-- 📋 Navbar Content -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- 🔵 Center Navigation Buttons -->
                <ul class="navbar-nav navbar-nav-center mb-2 mb-lg-0 align-items-center">
                    <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="my_booking.php" class="nav-link">My Booking</a></li>
                    <li class="nav-item"><a href="vehicle.php" class="nav-link">Vehicles</a></li>
                </ul>

                <!-- 🔐 Right Side (User / Notification / Auth) -->
                <div class="d-flex align-items-center ms-lg-3 mt-2 mt-lg-0">
                    <?php if ($user_id): ?>
                        <!-- 🔔 Notification Dropdown -->
                        <div class="dropdown me-3 notification-dropdown">
                            <a class="btn btn-modern-outline position-relative" href="?mark_read=true" role="button" id="notifMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell-fill fs-5"></i>
                                <?php if ($unread_count > 0): ?>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?= $unread_count ?>
                                    </span>
                                <?php endif; ?>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end p-2" aria-labelledby="notifMenu">
                                <li class="dropdown-header fw-bold text-dark">Notifications</li>
                                <li><hr class="dropdown-divider"></li>
                                <?php if (empty($notifications)): ?>
                                    <li class="text-center text-muted p-2">No notifications</li>
                                <?php else: ?>
                                    <?php foreach ($notifications as $note): ?>
                                        <li>
                                            <div class="dropdown-item <?= $note['status'] === 'Unread' ? 'fw-bold' : '' ?>">
                                                <?= htmlspecialchars($note['message']) ?><br>
                                                <small class="text-muted"><?= date('M d, h:i A', strtotime($note['created_at'])) ?></small>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li class="text-center">
                                    <a class="dropdown-item text-primary" href="?mark_read=1">Mark all as read</a>
                                </li>
                            </ul>
                        </div>

                        <!-- 👤 User Menu -->
                        <div class="dropdown">
                            <button class="btn btn-modern-primary dropdown-toggle d-flex align-items-center" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo htmlspecialchars($_SESSION['name']); ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                <li><a class="dropdown-item" href="profile.php"><i class="bi bi-person me-2"></i>Profile</a></li>
                                <li><a class="dropdown-item" href="my_booking.php"><i class="bi bi-calendar-check me-2"></i>My Bookings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                            </ul>
                        </div>

                    <?php else: ?>
                        <!-- 🔓 When Not Logged In -->
                        <a href="user_login.php" class="btn btn-modern-outline me-2">Login</a>
                        <a href="user_signup.php" class="btn btn-modern-primary">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
