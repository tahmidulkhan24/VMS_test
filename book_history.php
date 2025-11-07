
<hr class="my-5">
  <h3 class="mb-3">Booking History</h3>
  <div class="table-responsive">
    <table class="table table-bordered table-striped table-hover align-middle text-center">
      <thead class="table-dark">
      <tr>
        <th>ID</th>
        <th>Vehicle</th>
        <th>Purpose</th>
        <th>Status</th>
        <th>Approved Date</th>
        <th>Payment</th>
      </tr>
      </thead>
      <tbody>
      <?php if ($bookings->num_rows > 0): ?>
        <?php while ($row = $bookings->fetch_assoc()): ?>
          <tr>
            <td><?php echo $row['booking_id']; ?></td>
            <td><?php echo htmlspecialchars($row['vehicle_name']); ?></td>
            <td><?php echo htmlspecialchars($row['purpose']); ?></td>
            <td>
              <?php if ($row['status'] === 'Approved'): ?>
                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Approved</span>
              <?php elseif ($row['status'] === 'Pending'): ?>
                <span class="badge bg-warning text-dark"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
              <?php else: ?>
                <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Rejected</span>
              <?php endif; ?>
            </td>
            <td><?php echo $row['approved_date'] ? htmlspecialchars($row['approved_date']) : '-'; ?></td>
            <td>
              <?php if ($row['status'] === 'Approved'): ?>
              <?php if (isset($row['payment']) && $row['payment'] > 0): ?>
                <span class="text-success fw-semibold">
                    Paid: $<?php echo number_format($row['payment'], 2); ?>
                </span>
            <?php else: ?>
            <a href="payment/payment.php?booking_id=<?php echo $row['booking_id']; ?>" class="btn btn-danger">Pay Now</a>
            <?php endif; ?>
            <?php else: ?>
            <span class="text-secondary">Pending Approval</span>
            <?php endif; ?>

            </td>
          </tr>
        <?php endwhile; ?>
      <?php else: ?>
        <tr><td colspan="6">No bookings found.</td></tr>
      <?php endif; ?>
      </tbody>
    </table>
  </div>

</div>