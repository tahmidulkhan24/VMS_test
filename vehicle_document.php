<?php
    include_once('admin_navbar.php');
?>

<body class="bg-light">
   <!--heading-->
  <div class="container my-5">
    <div class="p-4 rounded-4 shadow-lg text-center text-dark" 
         style="background: #95e6feff">
      <h3 class="fw-bold mb-4">Enter The Vehicle Documents</h3>
    </div>
    <!--form-->
    <form class="p-4 mt-3 rounded-4 shadow-lg bg-white" 
      action="vehicle_document_backend.php" method="post" enctype="multipart/form-data">
  
        <div class="row mb-3">
          <div class="col-md-6">
            <label for="doc-type" class="form-label fw-semibold">Document Type</label>
            <input type="text" class="form-control shadow-sm" id="doc-type" name="doc_type" placeholder="Type" required>
          </div>
          <div class="col-md-6">
            <label for="expiry-date" class="form-label fw-semibold">Expiry Date</label>
            <input type="date" class="form-control shadow-sm" id="expiry-date" name="expiry-date" required>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-md-12">
            <label for="formFile" class="form-label">Upload the document</label>
            <input class="form-control" type="file" id="formFile" name="doc_file" required>
          </div>
        </div>
        <div class="text-center mt-4">
          <button type="submit" class="btn theme-bg theme-border btn-animate px-5 py-2 rounded-pill shadow-sm" name="vehicle_id" value="<?= $_GET['vehicle_id'];?>">
            Submit Booking
          </button>
        </div>

</form>

  </div>

</body>
