<?php
   include('including_files.php');
?>
<style>
/* Card hover effect */
.book-card {
    transition: all 0.3s ease-in-out;
}

.book-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.25);
    border: 1px solid #94f6fbff;
    background: linear-gradient(45deg, #bcfafaff, #50e8f3ff);
}
</style>

<div class="container text-center mt-2 shadow-md rounded-3">
    <div class="row">
        <div class="card-box">
            <h4 class="m-4">👥 <i class="fw-bold">User Management</i></h4>
            
            <div class="row text-center mt-2">
                <!-- Total Users: -->
                <div class="col-md-3 mt-3">
                    <div class="card shadow-lg book-card rounded-3 p-3">
                        <h6 class="fw-bold">Total Users</h6>
                        <span class="badge fs-5 text-dark" 
                              style="background: #95e6feff">
                            12
                        </span>
                    </div>
                </div>

                <!--Active Users -->
                <div class="col-md-3 mt-3">
                    <div class="card shadow-lg book-card rounded-3 p-3">
                        <h6 class="fw-bold">Active Users</h6>
                        <span class="badge fs-5 text-dark" 
                              style="background:#95e6feff">
                            1
                        </span>
                    </div>
                </div>

                <!-- New This Month:: -->
                <div class="col-md-3 mt-3">
                    <div class="card shadow-lg book-card rounded-3 p-3">
                        <h6 class="fw-bold">New This Month</h6>
                        <span class="badge fs-5 text-dark" 
                              style="background: #95e6feff">
                            2
                        </span>
                    </div>
                </div>

                <!-- Drivers:-->
                <div class="col-md-3 mt-3">
                    <div class="card shadow-lg book-card rounded-3 p-3">
                        <h6 class="fw-bold">Drivers</h6>
                        <span class="badge fs-5 text-dark" 
                              style="background: #95e6feff">
                            5
                        </span>
                    </div>
                </div>
            </div>

            <div class="container col-md-6 text-center mt-3 mb-3">
                <div  class="card shadow-lg book-card rounded-3 p-1">
                    <div class="card-body">
                        <h3 class="fw-bold">Quick Action</h3>
                        <a href="#" class="btn btn-success w-100 fw-bold text-dark" style="background: #95e6feff" >👤 Manage User</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
