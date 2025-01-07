<?php
session_start();
if (!isset($_SESSION['adminUsername'])) {
    header("Location: index.php");
    exit();
}
include("inc/header.php");
include("inc/sidebar.php");
include("config.php");

// Fetch data from the email_templates table
$emailTemplateQuery = "SELECT * FROM `email_templates` LIMIT 1"; // Adjust condition if specific row is needed
$emailTemplateResult = mysqli_query($conn, $emailTemplateQuery);

if ($emailTemplateResult && mysqli_num_rows($emailTemplateResult) > 0) {
    $emailTemplate = mysqli_fetch_assoc($emailTemplateResult);
} else {
    $emailTemplate = [
        'subject' => '',
        'message' => '',
        'sender_email' => '',
        'reply_to_email' => ''
    ];
}
?>

<!-- ==================================================== -->
<!-- Start right Content here -->
<!-- ==================================================== -->
<div class="page-content">

    <!-- Start Container Fluid -->
    <div class="container-fluid">

        <div class="row">
            <div class="col-xxl-12">
                <div class="card">
                    <div class="card-body">
                        <h5 style="text-align: center;" class="card-title mb-3" id="basic">
                            Update Your E-mail for E-mail Message 
                        </h5>
                        <form id="updateEmailOtp">

                            <div class="mb-3">
                                <label class="form-label">Sender E-mail</label>
                                <input type="email" name="sender_email" class="form-control" value="<?php echo htmlspecialchars($emailTemplate['sender_email']); ?>" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Reply to E-mail</label>
                                <input type="email" name="reply_to_email" class="form-control" value="<?php echo htmlspecialchars($emailTemplate['reply_to_email']); ?>" required>
                            </div>


                            <button type="submit" class="btn btn-success width-xs">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Container Fluid -->
    </div>
    <?php include("inc/footer.php"); ?>
</div>

<script>
    $(document).ready(function () {
        // Initialize Quill Editor
       

        // Load existing message content into the editor
       

        // Form Submission
        $('#updateEmailOtp').on('submit', function (e) {
            e.preventDefault();

            let formData = new FormData(this);

            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    // alert(response);
                    if (response == 1) {
                        alert("Data updated successfully.");
                    } else {
                        alert("Failed to update data.");
                    }
                },
                error: function () {
                    alert("An error occurred while processing the request.");
                }
            });
        });
    });
</script>
