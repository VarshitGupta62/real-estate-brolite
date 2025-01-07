<?php
session_start();
if (!isset($_SESSION['adminUsername'])) {
    header("Location: index.php");
}
include("inc/header.php");
include("inc/sidebar.php");


include("config.php");
$sql = "SELECT * FROM `contactus` WHERE `id` = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// If no result, set defaults for empty form fields
$contactNumber = isset($row['number']) ? $row['number'] : '';
$contactAddress = isset($row['address']) ? $row['address'] : '';
$contactEmail = isset($row['email']) ? $row['email'] : '';
$contactTime = isset($row['time']) ? $row['time'] : '';

$query = "SELECT * FROM settings WHERE setting_key = 'favicon'";
$faviconResult = mysqli_query($conn, $query) or die('Query Failed: ' . mysqli_error($conn));
$favicon = mysqli_fetch_assoc($faviconResult);

$query = "SELECT * FROM settings WHERE setting_key = 'logo'";
$logoResult = mysqli_query($conn, $query) or die('Query Failed: ' . mysqli_error($conn));
$logo = mysqli_fetch_assoc($logoResult);

?>
<!-- ==================================================== -->
<!-- Start right Content here -->
<!-- ==================================================== -->
<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xxl-12">
                <div class="row">

                    <div class="col-md-6">
                        <div class="card overflow-hidden">
                            <div class="card-body">
                                <form id="logoDataSubmit">
                                    <div class="row">
                                        <h5 style="text-align: center;" class="mb-3 card-title mb-1 anchor" id="basic">
                                            Logo
                                        </h5> <!-- end col -->
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="form-label">Current Logo</label>
                                                <?php if (!empty($logo['setting_value'])): ?>
                                                    <img src="uploads/<?= htmlspecialchars($logo['setting_value']) ?>" class="logo-sm" style="height: 130px; width: 170px;" alt="Current Logo">
                                                <?php else: ?>
                                                    <p>No logo uploaded yet.</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Upload New Logo</label>
                                                <input type="file" name="settingLogo" class="form-control mb-3" required>
                                                <button type="submit" class="btn btn-success width-xs">Update</button>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </form>
                            </div> <!-- end card body -->
                        </div> <!-- end card -->
                    </div> <!-- end col -->
                    <div class="col-md-6">
                        <div class="card overflow-hidden" >
                            <div class="card-body">
                                <div class="row">
                                    <h5 style="text-align: center;" class="mb-3 card-title mb-1 anchor" id="basic">
                                        Favicon
                                    </h5>
                                    <form id="faviconDataSubmit">
                                        <div class="row">
                                            <div class="mb-3">
                                                <label class="form-label">Current Favicon</label>
                                                <?php if (!empty($favicon['setting_value'])): ?>
                                                    <img src="uploads/<?= htmlspecialchars($favicon['setting_value']) ?>" class="logo-sm" style=" height: 130px; width: 170px;" alt="Current Favicon">
                                                <?php else: ?>
                                                    <p>No favicon uploaded yet.</p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Upload New Favicon</label>
                                                <input type="file" name="faviconImage" class="form-control mb-3" required>
                                                <button type="submit" class="btn btn-success width-xs">Update</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- <div class="col-md-6"> -->
                    <div class="card">
                        <div class=" overflow-hidden">
                            <div class="card-body">
                                <h5 style="text-align: center;" class="card-title mb-3 anchor" id="basic">
                                    Update Your Details
                                </h5>
                                <form id="addContactDataSubmit" enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <label class="form-label">Contact Number</label>
                                        <input type="text" name="contactNumber" class="form-control" value="<?php echo $contactNumber; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Website Link</label>
                                        <input type="text" name="contacttime" class="form-control" value="<?php echo $contactTime; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Address</label>
                                        <input type="text" name="contactaddress" class="form-control" value="<?php echo $contactAddress; ?>" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input type="text" name="contactemail" class="form-control" value="<?php echo $contactEmail; ?>" required>
                                    </div>

                                    <input type="hidden" name="updatecontactdata">

                                    <button type="submit" class="btn btn-success width-xs">Update</button>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <!-- End Container Fluid -->
        <!-- Modal -->

    </div>
    <?php
    include("inc/footer.php");
    ?>
    <script>
        $('#logoDataSubmit').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 1) {
                        alert("Data Updated successfully.");
                        $('#logoDataSubmit').trigger('reset');
                    } else {
                        alert("Failed to update data.");
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert("There was an error uploading the file.");
                }
            });
        });
        $('#faviconDataSubmit').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // alert(response);
                    if (response == 1) {
                        alert("Data Updated successfully.");
                        $('#faviconDataSubmit').trigger('reset');
                    } else {
                        alert("Failed to update data.");
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert("There was an error uploading the file.");
                }
            });
        });
        $('#addContactDataSubmit').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // alert(response);
                    if (response == 1) {
                        alert("Data Updated successfully.");
                        // $('#addContactDataSubmit').trigger('reset');
                    } else {
                        alert("Failed to update data.");
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert("Something went wrong.");
                }
            });
        });
        $('#updateSubscriptionForm').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);

            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    // alert(response);
                    if (response == 1) {
                        alert("Data Updated successfully.");
                        // $('#addContactDataSubmit').trigger('reset');
                    } else {
                        alert("Failed to update data.");
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert("Something went wrong.");
                }
            });
        });
    </script>