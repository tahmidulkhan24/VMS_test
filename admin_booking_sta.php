<?php
    include('admin_auth.php');
?>

</style>

<div class="container text-center mt-2 shadow-md rounded-3">
    <div class="row">
        <div class="card-box">
            <h4 class="m-4">📋Booking Status</h4>
            
            <div class="row text-center mt-2">
                <!-- Pending Approvals -->
                <div class="col-md-3 mt-3">
                    <div class="card shadow-lg book-card rounded-3 p-3">
                        <h6 class="fw-bold">Pending Approvals</h6>
                        <span class="badge fs-5 text-dark" 
                              style="background: #95e6feff">
                            12
                        </span>
                    </div>
                </div>

                <!--Active Bookings -->
                <div class="col-md-3 mt-3">
                    <div class="card shadow-lg book-card rounded-3 p-3">
                        <h6 class="fw-bold">Active Bookings</h6>
                        <span class="badge fs-5 text-dark" 
                              style="background: #95e6feff">
                            1
                        </span>
                    </div>
                </div>

                <!-- Today's Trips: -->
                <div class="col-md-3 mt-3">
                    <div class="card shadow-lg book-card rounded-3 p-3">
                        <h6 class="fw-bold">Today's Trips:</h6>
                        <span class="badge fs-5 text-dark" 
                              style="background: #95e6feff">
                            2
                        </span>
                    </div>
                </div>

                <!-- This Month:-->
                <div class="col-md-3 mt-3">
                    <div class="card shadow-lg book-card rounded-3 p-3">
                        <h6 class="fw-bold">This Month:</h6>
                        <span class="badge fs-5 text-dark" 
                              style="background:#95e6feff">
                            5
                        </span>
                    </div>
                </div>
            </div>

            <div class="container col-md-6 text-center mt-3 mb-3">
                <div  class="card shadow-lg book-card rounded-3 p-1">
                    <div class="card-body">
                        <h3 class="fw-bold">Quick Action</h3>
                        <a href="admin_approve.php" class="btn btn-success w-100 fw-bold text-dark" style="background: #95e6feff" >✅ Approve Bookings</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
