// PHP update code
<?php
session_start();
if (!isset($_SESSION['adminUsername'])) {
    header("Location: index.php");
}

include("config.php");
include("inc/header.php");
include("inc/sidebar.php");


// Fetch current data
$sql = "SELECT * FROM important_links WHERE id = 1";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

$facebooklink = $row['facebook_link'];
$instagramlink = $row['instagram_link'];
$youtubelink = $row['linkedin_link'];
$whatsappnumber = $row['twitter_link'];
?>

<!-- HTML Form -->
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="overflow-hidden">
                <div class="card-body">
                    <h5 style="text-align: center;" class="card-title mb-3 anchor" id="basic">
                        Update Your Link
                    </h5>
                    <form id="ImportantlinkDataSubmit">
                        <div class="mb-3">
                            <label class="form-label">Facebook Link</label>
                            <input type="text" name="facebooklink" class="form-control" value="<?php echo $facebooklink; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Instagram Link</label>
                            <input type="text" name="instagramlink" class="form-control" value="<?php echo $instagramlink; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Linkedin Link</label>
                            <input type="text" name="youtubelink" class="form-control" value="<?php echo $youtubelink; ?>" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Twitter Link</label>
                            <input type="text" name="whatsappnumber" class="form-control" value="<?php echo $whatsappnumber; ?>" required>
                        </div>

                        <input type="hidden" name="importantlink">

                        <button type="submit" class="btn btn-success width-xs">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include("inc/footer.php");
?>

<script>
    $('#ImportantlinkDataSubmit').on('submit', function(e) {
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
                    alert("Link Updated successfully.");
                    // $('#ImportantlinkDataSubmit').trigger('reset');
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
</script>


