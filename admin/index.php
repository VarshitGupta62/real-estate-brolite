<?php
include("config.php");
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
     <!-- Title Meta -->
     <meta charset="utf-8" />
     <title>Admin Login</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="A fully responsive premium admin dashboard template" />
     <meta name="author" content="Techzaa" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />

     <!-- App favicon -->
     <?php
     // Query to fetch data
     $query = "SELECT  * FROM settings where setting_key = 'favicon'";
     $result = mysqli_query($conn, $query) or die('Query Failed: ' . mysqli_error($conn));

     if (mysqli_num_rows($result) > 0) {
          // Output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
               echo "
                        <link rel='shortcut icon' href='uploads/$row[setting_value]'>
                        ";
          }
     } else {
          echo "Image not found.";
     } ?>

     <!-- Vendor css (Require in all Page) -->
     <link href="assets/css/vendor.min.css" rel="stylesheet" type="text/css" />

     <!-- Icons css (Require in all Page) -->
     <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />

     <!-- App css (Require in all Page) -->
     <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" />

     <!-- Theme Config js (Require in all Page) -->
     <script src="assets/js/config.js"></script>
</head>

<body class="h-90">
     <div class="d-flex flex-column h-100 p-5">
          <div class="d-flex flex-column flex-grow-1">
               <div class="row h-100">
                    <div class="col-xxl-12">
                         <div class="row justify-content-center h-100">
                              <div class="col-lg-3 py-lg-5">
                                   <div class="d-flex flex-column h-100 justify-content-center card card-body">

                                        <h2 class="fw-bold fs-24" style="text-align: center;" >Admin</h2>

                                        <div class="mb-3">
                                             <form id="loginform"  class="authentication-form">
                                                  <div class="mb-3">
                                                       <label class="form-label"  >Username</label>
                                                       <input type="text" id="example-email" name="adminUsername" class="form-control " placeholder="Enter your username">
                                                  </div>
                                                  <div class="mb-3">
                                                       <!-- <a href="auth-password.html" class="float-end text-muted text-unline-dashed ms-1">Reset password</a> -->
                                                       <label class="form-label" for="example-password">Password</label>
                                                       <input type="password" id="example-password" name="adminPassword" class="form-control" placeholder="Enter your password">
                                                  </div>

                                                  <div class="mb-1 text-center d-grid">
                                                       <button class="btn btn-soft-danger" type="submit">Log In</button>
                                                  </div>
                                             </form>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

                    <!-- <div class="col-xxl-5 d-none d-xxl-flex">
                         <div class="card h-100 mb-0 overflow-hidden">
                              <div class="d-flex flex-column h-100">
                                   <img src="assets/images/small/img-10.jpg" alt="" class="w-100 h-100">
                              </div>
                         </div>
                    </div> -->
               </div>
          </div>
     </div>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
        // $('[data-toggle="tooltip"]').tooltip();
        // $(".preloader").fadeOut();
        // ============================================================== 
        // Admin Login
        // ============================================================== 
        $(document).ready(function() {
            $('#loginform').on("submit", function(e) {
                e.preventDefault();
               //  alert("button click");
                let adminlogin = new FormData(this);

                $.ajax({
                    url: 'query.php',
                    type: "POST",
                    data: adminlogin,
                    contentType: false,
                    processData: false,
                    success: function(data) {
                         // alert(data);
                        if (data == 1) {
                            window.location.href = "dashboard.php"; // Corrected typo
                        } else {
                            alert(data); // Show backend error message (Invalid username/password)
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("An error occurred: " + xhr.responseText); // Handle server error
                    }
                });
            });
        });
    </script>

     <!-- Vendor Javascript (Require in all Page) -->
     <script src="assets/js/vendor.js"></script>

     <!-- App Javascript (Require in all Page) -->
     <script src="assets/js/app.js"></script>

</body>

</html>