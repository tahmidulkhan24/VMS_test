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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg theme-col">
        <div class="container-fluid">
            <!-- Logo -->
            <a class="navbar-brand d-flex align-items-center" href="index.php">
                <img src="img/logo2.png" alt="logo" class="img-fluid me-2" style="max-height:50px;">
            </a>

            <!-- Toggler -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Collapse menu -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Menu -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 d-flex align-items-center">
                    <li class="nav-item me-3">
                        <a href="index.php" class="btn btn-outline-theme-border me-2 btn-animate btn-m">Home</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="my_booking.php" class="btn btn-outline-theme-border me-2 btn-animate btn-m">My Booking</a>
                    </li>
                    <li class="nav-item me-3">
                        <a href="vehicle.php" class="btn btn-outline-theme-border me-2 btn-animate btn-m">Vehicles</a>
                    </li>
                </ul>

                <!-- Buttons -->
                <div class="d-flex ms-lg-3 mt-2 mt-lg-0 align-items-center">
                    <?php if ($user_id): ?>
                        <!-- Notifications Dropdown -->
                        <div class="dropdown me-3 notification-dropdown">
                            <a class="btn btn-outline-theme-border btn-animate btn-m me-2 position-relative" href="?mark_read=true" role="button" id="notifMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                Notifications <i class="bi bi-bell-fill fs-5"></i>
                                <?php if ($unread_count > 0): ?>
                                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                        <?= $unread_count ?>
                                    </span>
                                <?php endif; ?>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end shadow p-2" aria-labelledby="notifMenu">
                                <li class="dropdown-header fw-bold text-dark">Notifications</li>
                                <li><hr class="dropdown-divider"></li>
                                <?php if (empty($notifications)): ?>
                                    <li class="text-center text-muted p-2">No notifications</li>
                                <?php else: ?>
                                    <?php foreach ($notifications as $note): ?>
                                        <li>
                                            <div class="dropdown-item notification-item <?= $note['status'] === 'Unread' ? 'notification-unread' : '' ?>">
                                                <?= htmlspecialchars($note['message']) ?><br>
                                                <span class="notification-time"><?= date('M d, h:i A', strtotime($note['created_at'])) ?></span>
                                            </div>
                                        </li>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <li><hr class="dropdown-divider"></li>
                                <li class="text-center">
                                <a class="dropdown-item text-info" href="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>?mark_read=1">Mark all as read</a></li>

                            </ul>
                        </div>

                        <!-- User Dropdown -->
                        <div class="dropdown">
                            <button class="btn btn-dark dropdown-toggle d-flex align-items-center" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                <?php echo htmlspecialchars($_SESSION['name']); ?>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
                                <li><a class="dropdown-item btn-animate" href="profile.php">Profile</a></li>
                                <li><a class="dropdown-item btn-animate" href="my_booking.php">My Bookings</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php else: ?>
                        <!-- When not logged in -->
                        <a href="user_login.php" class="btn btn-outline-dark me-2 btn-animate">Login</a>
                        <a href="user_signup.php" class="btn btn-dark btn-animate">Sign Up</a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </nav>

    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
