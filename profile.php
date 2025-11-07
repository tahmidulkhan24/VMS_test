<?php
include('user_auth.php');

$user_id = $_SESSION['user_id'];

 // User info 

$user_sql = "SELECT name, email, phone, address, role, status FROM user WHERE user_id = ?";
$stmt = $db->prepare($user_sql);
if (!$stmt) {
    die("SQL prepare failed (user): " . $db->error);
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$user = $user_result->fetch_assoc();

if (isset($_GET['msg']) && $_GET['msg'] === 'booking_success') {
    echo "<p style='color:white; background-color : green; text-align:center; margin:20px 500px; padding:10px; border-radius:15px; font-weight : bold'>Booking successfully added!</p>";
}

// Booking history 

$book_sql = "SELECT b.booking_id, v.model AS vehicle_name, b.start_date, b.end_date, b.purpose, b.status, b.approved_date
             FROM bookings b
             JOIN vehicle v ON b.vehicle_id = v.vehicle_id
             WHERE b.user_id = ?
             ORDER BY b.booking_id DESC";
$stmt = $db->prepare($book_sql);
if (!$stmt) {
    die("SQL prepare failed (bookings): " . $db->error);
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$bookings = $stmt->get_result();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($user['name']); ?></title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>
<?php
   include('navbar.php');
?>
<body>

<?php if (isset($_GET['msg']) && $_GET['msg'] === 'profile_updated'): ?>
  <div class="alert alert-success alert-dismissible fade show text-center mx-auto mt-3 w-50 shadow-sm" role="alert">
    <i class="bi bi-check-circle me-1"></i> Profile updated successfully!
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<script>
setTimeout(() => {
  const alert = document.querySelector('.alert');
  if (alert) alert.remove();
}, 2500);
</script>

<div class="container my-5">
  <div class="profile-card">
  <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
    <div class="d-flex align-items-center mb-3 mb-md-0">
      <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['name']); ?>&background=0D8ABC&color=fff&size=60"
           class="avatar me-3" alt="User Avatar">
      <div>
        <h3 class="mb-0"><?php echo htmlspecialchars($user['name']); ?></h3>
        <span class="badge bg-secondary text-capitalize"><?php echo htmlspecialchars($user['role']); ?></span>
      </div>
    </div>

    <!--  Edit Profile Button -->
    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editProfileModal">
      <i class="bi bi-pencil-square me-1"></i>Edit Profile
    </button>

  </div>
  <?php if ($user): ?>
    <div class="row g-3">
      <div class="col-md-6"><strong>Email:</strong> <?php echo htmlspecialchars($user['email']); ?></div>
      <div class="col-md-6"><strong>Phone:</strong> <?php echo htmlspecialchars($user['phone']); ?></div>
      <div class="col-md-6"><strong>Address:</strong> <?php echo htmlspecialchars($user['address']); ?></div>
      <div class="col-md-6"><strong>Status:</strong>
        <?php if ($user['status'] === 'active'): ?>
          <span class="badge bg-success">Active</span>
        <?php else: ?>
          <span class="badge bg-danger">Inactive</span>
        <?php endif; ?>
      </div>
    </div>

    <!--  Logout  -->
    <div class="text-center mt-4">
      <a href="logout.php" class="btn btn-outline-danger px-4">
        <i class="bi bi-box-arrow-right me-1"></i>Logout
      </a>
    </div>

  <?php else: ?>
    <p class="text-danger">User information not found.</p>
  <?php endif; ?>
</div>

<!-- EDIT PROFILE MODAL SECTION -->


<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg rounded-4">

      <div class="modal-header border-0 pb-0">
        <h5 class="modal-title fw-bold text-primary" id="editProfileModalLabel">
          <i class="bi bi-person-gear me-2"></i>Edit Your Profile
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="update_profile.php" method="POST" class="needs-validation" novalidate>
        <div class="modal-body pt-3 pb-1">

          <input type="hidden" name="user_id" value="<?php echo htmlspecialchars($user_id); ?>">

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="name" name="name"
              value="<?php echo htmlspecialchars($user['name']); ?>" placeholder="Name" required>
            <label for="name"><i class="bi bi-person me-1"></i>Name</label>
            <div class="invalid-feedback">Please enter your name.</div>
          </div>

          <div class="form-floating mb-3">
            <input type="email" class="form-control rounded-3" id="email" name="email"
              value="<?php echo htmlspecialchars($user['email']); ?>" placeholder="Email" required>
            <label for="email"><i class="bi bi-envelope me-1"></i>Email</label>
            <div class="invalid-feedback">Please provide a valid email.</div>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="phone" name="phone"
              value="<?php echo htmlspecialchars($user['phone']); ?>" placeholder="Phone">
            <label for="phone"><i class="bi bi-telephone me-1"></i>Phone</label>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control rounded-3" id="address" name="address"
              value="<?php echo htmlspecialchars($user['address']); ?>" placeholder="Address">
            <label for="address"><i class="bi bi-geo-alt me-1"></i>Address</label>
          </div>
        </div>

        <div class="modal-footer border-0 pt-0">
          <button type="button" class="btn btn-outline-danger px-4" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn- btn-primary px-4">
            <i class="bi bi-floppy2 me-1"></i>Save Changes
          </button>
        </div>
      </form>

    </div>
  </div>
</div>


<?php
   include('book_history.php');
?>


<script>
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('msg') === 'profile_updated') {
  Swal.fire({
    icon: 'success',
    title: 'Changes Saved!',
    text: 'Your profile was updated successfully.',
    confirmButtonColor: '#0d6efd',
    timer: 2500,
    showConfirmButton: false
  });
}
</script>



</body>