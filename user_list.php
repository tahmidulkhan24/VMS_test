<?php
include_once('controller.php');
include_once('admin_auth.php');
$db = connection();

$limit = 8; 
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$start = ($page - 1) * $limit;

$count_sql = "SELECT COUNT(*) AS total_user FROM user WHERE role='user'";
$count_result = $db->query($count_sql);
$total_user = $count_result->fetch_assoc()['total_user'];

$count_sql2 = "SELECT COUNT(*) AS total_online FROM user_session WHERE status ='online'";
$count_result2 = $db->query($count_sql2);
$total_online = $count_result2->fetch_assoc()['total_online'];

$total_pages = ceil($total_user / $limit);

$sql = "SELECT u.*, us.status AS session_status, us.last_activity_time
        FROM user u
        LEFT JOIN user_session us ON u.user_id = us.user_id
        WHERE u.role='user'
        ORDER BY u.user_id DESC
        LIMIT $start, $limit";
$result = $db->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel - User List</title>
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
<link href="css/style.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<?php include('admin_navbar.php'); ?>
<body class="bg-light">

<div class="container my-5">

  <!-- Header -->
  <div class="p-4 rounded-4 mb-4 text-white" style="background: linear-gradient(90deg, #0D8ABC, #1CB5E0);">
    <div class="d-flex align-items-center justify-content-between">
      <div>
        <h3 class="fw-bold mb-1"><i class="bi bi-people-fill me-2"></i>User List</h3>
          <span class="badge bg-light text-dark rounded-pill me-2">Total Users: <?php echo $total_user; ?></span>
          <span class="badge bg-info text-dark rounded-pill">Online Users: <?php echo $total_online; ?></span>
      </div>
    </div>
  </div>

  <!-- User Table -->
  <div class="user-list bg-white shadow-sm rounded-4 p-4">
    <div class="row fw-semibold text-dark mb-3 px-2">
      <div class="col-3">Name</div>
      <div class="col-3">Email</div>
      <div class="col-2">Phone</div>
      <div class="col-2">Account Status</div>
      <div class="col-2">Action</div>
    </div>

    <?php if($result->num_rows > 0): ?>
      <?php while($user = $result->fetch_assoc()): ?>
        <div class="row align-items-center py-3 border-top">
          
          <!-- Name and Active Status -->
          <div class="col-3 d-flex align-items-center">
            <img src="https://ui-avatars.com/api/?name=<?php echo urlencode($user['name']); ?>&background=0D8ABC&color=fff&size=40" class="rounded-circle me-3" alt="avatar">
            <div>
              <div class="fw-semibold"><?php echo htmlspecialchars($user['name']); ?></div>
              <?php if(isset($user['session_status']) && $user['session_status'] === 'online'): ?>
                <small class="text-success d-flex align-items-center">
                  <span style="width:8px;height:8px;background-color:#28a745;border-radius:50%;display:inline-block;margin-right:5px;"></span> Online
                </small>
              <?php else: ?>
                <small class="text-muted d-flex align-items-center">
                  <span style="width:8px;height:8px;background-color:gray;border-radius:50%;display:inline-block;margin-right:5px;"></span> Offline
                </small>
              <?php endif; ?>
            </div>
          </div>

          <!-- Email -->
          <div class="col-3"><?php echo $user['email']; ?></div>

          <!-- Phone -->
          <div class="col-2"><?php echo $user['phone']; ?></div>

          <!-- Account Status / Last Activity -->
          <div class="col-2 d-flex flex-column align-items-start justify-content-center">
            <?php if($user['status'] == 'active'): ?>
              <span class="badge bg-success rounded-pill mb-1">Active</span>
            <?php else: ?>
              <span class="badge bg-danger rounded-pill mb-1">Inactive</span>
            <?php endif; ?>
            <small class="text-muted">
              Last Activity: <?php echo $user['last_activity_time'] ?? 'N/A'; ?>
            </small>
          </div>

          <!-- Action Column -->
          <div class="col-2 d-flex align-items-center">
            <?php if($user['status'] == 'active'): ?>
              <a href="disable.php?id=<?php echo $user['user_id'];?>" class="btn btn-outline-danger btn-sm rounded-pill">Disable</a>
            <?php else: ?>
              <a href="enable.php?id=<?php echo $user['user_id'];?>" class="btn btn-outline-success btn-sm rounded-pill">Enable</a>
            <?php endif; ?>
          </div>

        </div>
      <?php endwhile; ?>
    <?php else: ?>
      <div class="row py-3">
        <div class="col-12 text-center text-muted">No users found.</div>
      </div>
    <?php endif; ?>
  </div>

  <!-- Pagination -->
  <?php if($total_pages > 1): ?>
    <nav aria-label="User list pagination">
      <ul class="pagination justify-content-center mt-4">
        <li class="page-item <?php if($page <= 1) echo 'disabled'; ?>">
          <a class="page-link" href="?page=<?php echo $page-1; ?>">&laquo;</a>
        </li>
        <?php for($i = 1; $i <= $total_pages; $i++): ?>
          <li class="page-item <?php if($i == $page) echo 'active'; ?>">
            <a class="page-link" href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
          </li>
        <?php endfor; ?>
        <li class="page-item <?php if($page >= $total_pages) echo 'disabled'; ?>">
          <a class="page-link" href="?page=<?php echo $page+1; ?>">&raquo;</a>
        </li>
      </ul>
    </nav>
  <?php endif; ?>

</div>

<!-- SweetAlert2 -->
<script>
const URLparams = new URLSearchParams(window.location.search);
const msg = URLparams.get('msg');
if (msg === 'user_enabled') {
    Swal.fire({ icon: 'success', title: 'Success', text: 'User status Enabled.', timer: 1500, showConfirmButton: false });
} else if (msg === 'user_disabled') {
    Swal.fire({ icon: 'success', title: 'Success', text: 'User has been disabled.', timer: 1500, showConfirmButton: false });
} else if (msg === 'error') {
    Swal.fire({ icon: 'error', title: 'Error', text: 'An error occurred while updating user status.', timer: 1500, showConfirmButton: false });
}
</script>

</body>
</html>
