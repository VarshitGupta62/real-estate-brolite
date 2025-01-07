<?php 
session_start();
if (!isset($_SESSION['adminUsername'])) {
    header("Location: index.php");
}
include("inc/header.php"); 
include("inc/sidebar.php"); 
?>
<!-- ==================================================== -->
<!-- Start right Content here -->
<!-- ==================================================== -->
<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-fluid">

        <!-- Start here.... -->
        <div class="row d-flex justify-content-center"> <!-- Center the card -->
            <div class="col-md-4">
                <div class="card overflow-hidden text-center"> <!-- Center text inside the card -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12">
                                <p class="text-muted mb-2">Goto Our Website</p>
                                <br>
                                <a href="../index.php" target="_blank" class="btn btn-soft-danger">Visit Website</a> <!-- Add link to your website -->
                            </div>  
                        </div> <!-- end row-->
                    </div> <!-- end card body --> 
                </div> <!-- end card -->
            </div> <!-- end col -->
        </div> <!-- end row -->

    </div>
    <!-- End Container Fluid -->
<?php 
include("inc/footer.php");
?>
