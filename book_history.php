<hr class="my-5">

<div class="booking-history-section">
  <h3 class="fw-bold text-center mb-4">
    <i class="bi bi-clock-history me-2"></i>Booking History
  </h3>

  <div class="table-responsive shadow-lg rounded-4 overflow-hidden">
    <table class="table modern-table align-middle text-center mb-0">
      <thead class="table-header">
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
            <tr class="table-row">
              <td><span class="fw-semibold text-dark"><?php echo $row['booking_id']; ?></span></td>
              <td><i class="bi bi-car-front-fill text-primary me-1"></i><?php echo htmlspecialchars($row['vehicle_name']); ?></td>
              <td><i class="bi bi-briefcase-fill text-secondary me-1"></i><?php echo htmlspecialchars($row['purpose']); ?></td>

              <!-- Status -->
              <td>
                <?php if ($row['status'] === 'Approved'): ?>
                  <span class="badge status-badge bg-success-subtle text-success"><i class="bi bi-check-circle-fill me-1"></i>Approved</span>
                <?php elseif ($row['status'] === 'Pending'): ?>
                  <span class="badge status-badge bg-warning-subtle text-warning"><i class="bi bi-hourglass-split me-1"></i>Pending</span>
                <?php else: ?>
                  <span class="badge status-badge bg-danger-subtle text-danger"><i class="bi bi-x-circle-fill me-1"></i>Rejected</span>
                <?php endif; ?>
              </td>

              <td>
                <?php echo $row['approved_date'] ? htmlspecialchars($row['approved_date']) : '<span class="text-muted">—</span>'; ?>
              </td>

              <!-- Payment -->
              <td>
                <?php if ($row['status'] === 'Approved'): ?>
                  <?php if (isset($row['payment']) && $row['payment'] > 0): ?>
                    <span class="text-success fw-semibold"><i class="bi bi-cash-stack me-1"></i>Paid $<?php echo number_format($row['payment'], 2); ?></span>
                  <?php else: ?>
                    <a href="payment/payment.php?booking_id=<?php echo $row['booking_id']; ?>" class="btn btn-pay btn-sm">
                      <i class="bi bi-credit-card-2-front-fill me-1"></i>Pay Now
                    </a>
                  <?php endif; ?>
                <?php else: ?>
                  <span class="text-secondary"><i class="bi bi-clock"></i> Waiting Approval</span>
                <?php endif; ?>
              </td>
            </tr>
          <?php endwhile; ?>
        <?php else: ?>
          <tr><td colspan="6" class="text-muted py-4">No bookings found.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</div>
