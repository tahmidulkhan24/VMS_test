<?php
session_start();
include_once('admin_navbar.php');
include_once('controller.php');
$db = connection();
?>

<body class="bg-light">
  <div class="container my-5">
    <div class="p-4 rounded-4 shadow-lg text-center text-dark" style="background:#95e6feff">
      <h2 class="fw-bold mb-4">Vehicle Documents</h2>
    </div>

    <div class="p-4 mt-3 rounded-4 shadow-lg bg-white">
      <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Document Type</th>
            <th scope="col">File Name</th>
            <th scope="col">Issue Date</th>
            <th scope="col">Expiry Date</th>
            <th scope="col">Document</th>
          </tr>
        </thead>
        <tbody>
          <?php
          $query = "SELECT * FROM vehicle_document ORDER BY document_id DESC";
          $result = $db->query($query);

          if($result && $result->num_rows > 0) {
            $count = 1;
            while($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<th scope='row'>{$count}</th>";
              echo "<td>{$row['document_type']}</td>";
              echo "<td>{$row['file_name']}</td>";
              echo "<td>{$row['issue_date']}</td>";
              echo "<td>{$row['expiry_date']}</td>";
              echo "<td><a href='{$row['file_path']}' target='_blank' class='btn btn-sm btn-info text-white px-3'>Download</a></td>";
              echo "</tr>";
              $count++;
            }
          } else {
            echo "<tr><td colspan='6' class='text-muted text-center'>No documents found</td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
