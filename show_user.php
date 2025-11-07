<?php
    include_once('including_files.php');  
    include_once('controller.php');
    include_once('admin_navbar.php');

    $db = connection();

    //database theke user der role jader 'user' eder row gulo select kora
    $stmt = $db->prepare("SELECT user_id, name, email, phone, address FROM user WHERE role = ? ORDER BY user_id DESC");
    $role = 'user';
    $stmt->bind_param("s", $role);
    $stmt->execute();
    $result = $stmt->get_result();
    $users = $result->fetch_all(MYSQLI_ASSOC); // ei line e shob info gulo akbare fetch kora hoyeche and akta array tei rakha hoyeche
    $stmt->close();
?>
<style>
  .elevate { box-shadow: 0 10px 24px rgba(0,0,0,.06); border: 1px solid rgba(0,0,0,.06); }
  .card-title { font-weight: 700; letter-spacing: .2px; }
  .table-responsive { max-height: 540px; overflow: auto; }
  .table thead th { position: sticky; top: 0; z-index: 1; background: #111827; color:#fff; }
  .table-hover tbody tr:hover { background: rgba(0,0,0,.03); }
  .search-input { border-radius: 999px; padding-left: 1rem; }
</style>

<div class="container my-1">
  <div class="card elevate rounded-4 overflow-hidden">
    <div class="card-header bg-dark text-white d-flex flex-wrap align-items-center justify-content-between">
      <h5 class="card-title mb-0">Registered Users</h5>
      <input id="tableSearch" type="text" class="form-control form-control-sm search-input"
             placeholder="Search by name..." style="max-width: 260px;">
    </div>

    <div class="card-body p-0">
      <div class="table-responsive">
        <table id="usersTable" class="table table-hover align-middle mb-0">
          <thead>
            <tr>
              <th style="min-width:70px">ID</th>
              <th style="min-width:220px">Name</th>
              <th style="min-width:220px">Email</th>
              <th style="min-width:160px">Phone</th>
              <th style="min-width:200px">Address</th>
              <th style="min-width:140px" class="text-end pe-4">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($users as $u): ?>
            <tr>
              <td class="text-muted"><?=$u['user_id'] ?></td>
              <td class="user-name"><?= $u['name'] ?></td>
              <td><?= $u['email'] ?></td>
              <td><?= $u['phone'] ?? '' ?></td>       
              <td><?= $u['address'] ?? '' ?></td>
              <td class="text-end pe-4">
                <div class="btn-group btn-group-sm">
                  <a href="update_user.php?id=<?= urlencode($u['user_id']) ?>" class="btn btn-outline-secondary">Update</a> 
                  <a href="delete_user.php?id=<?= urlencode($u['user_id']) ?>"
                     class="btn btn-outline-danger"
                     onclick="return confirm('Delete this user?');">Delete</a> 
                </div>
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="card-footer bg-light text-center py-2">
      <small class="text-muted">Showing <?= count($users) ?> users</small> 
    </div>
  </div>
</div>

<script>
  
  (function () {
    const input = document.getElementById('tableSearch');
    const rows  = Array.from(document.querySelectorAll('#usersTable tbody tr'));
    input.addEventListener('input', function () {
      const q = this.value.trim().toLowerCase();
      rows.forEach(tr => {
        const name = tr.querySelector('.user-name')?.innerText.toLowerCase() || '';
        tr.style.display = name.includes(q) ? '' : 'none';
      });
    });
  })();
</script>
