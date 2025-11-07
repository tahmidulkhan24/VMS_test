<?php
    include('user_auth.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cholo - My Bookings</title>

<?php
    include('navbar.php');
?>
</head>
<style>
.bg-col {
  background-color: #91f9ffff !important;
  color: var(--theme-text) !important;
}
/* Card hover effect */
.book-card {
    transition: all 0.3s ease-in-out;
}

.book-card:hover {
    transform: translateY(-8px);
    border: 1px solid  #f8f8f8ff;
    background: #dadcdfff ;
}
</style>
<?php
$user_id = $_SESSION['user_id'];

// --- User info ---

$user_sql = "SELECT name, email, phone, address, role, status FROM user WHERE user_id = ?";
$stmt = $db->prepare($user_sql);
if (!$stmt) {
    die("SQL prepare failed (user): " . $db->error);
}
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_result = $stmt->get_result();
$user = $user_result->fetch_assoc();


// --- Booking history ---

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
<div class="container col-8 mt-4 text-center theme-bg theme-border shadow-lg rounded-3" 
     style="background: #b0eefeff">
    <h2 class="m-2">My Booking</h2>
</div>
<div class="container  text-center mt-2  text-align shadow-md rounded-3">
       <div class="row">
        <div class="card-box">
            <h4 class="m-4">📊 Bookings Stats</h4>
             <div class="row text-center mt-2">
            <!-- Total Bookings -->
            <div class="col-md-3 mt-3">
                <div class="card shadow-lg  book-card rounded-3 p-3">
                    <h6 class="fw-bold">Total Bookings</h6>
                    <span class="badge fs-5 text-dark " style="background-color:  #8de1f9ff;"> 
                        12
                    </span>
                </div>
            </div>
            <!-- ctive Bookings -->
            <div class="col-md-3 mt-3">
                <div class="card shadow-lg  book-card rounded-3 p-3">
                    <h6 class="fw-bold">Active Bookings</h6>
                    <span class="badge fs-5 text-dark" 
                          style="background: #8de1f9ff">
                        1
                    </span>
                </div>
            </div>
            <!-- Pending Requests -->
            <div class="col-md-3 mt-3">
                <div class="card shadow-lg  book-card rounded-3 p-3">
                    <h6 class="fw-bold">Pending Requests</h6>
                    <span class="badge fs-5 text-dark" 
                          style="background:#8de1f9ff">
                        2
                    </span>
                </div>
            </div>
            <!-- This Month -->
            <div class="col-md-3 mt-3">
                <div class="card shadow-lg  book-card rounded-3 p-3">
                    <h6 class="fw-bold">This Month</h6>
                    <span class="badge fs-5 text-dark" 
                          style="background: #8de1f9ff;">
                        5 trips
                    </span>
                </div>
            </div>
        </div>
    </div>
</div>

<!--booking table-->

<?php
   include('book_history.php');
?>

<script>
const urlParams = new URLSearchParams(window.location.search);
if (urlParams.get('msg') === 'booking_success') {
  Swal.fire({
    icon: 'success',
    title: 'Booking Successful!',
    text: 'Your vehicle booking was successful.',
    confirmButtonColor: '#0d6efd',
    timer: 2500,
    showConfirmButton: false
  });
}
</script>