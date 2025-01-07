<?php
session_start();
if (!isset($_SESSION['adminUsername'])) {
    header("Location: index.php");
}
include("inc/header.php");
include("inc/sidebar.php");


include("config.php");



$sqlFetch = "SELECT * FROM `homepage_data` WHERE `id` = 1";
$result = $conn->query($sqlFetch);
$row = $result->fetch_assoc();


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
                    <!-- <div class="col-md-6"> -->
                    <!-- <div class="card"> -->
                    <div class="card overflow-hidden">
                        <div class="card-body">
                            <h5 style="text-align: center;" class="card-title mb-3 anchor" id="basic">
                                Update Home page
                            </h5>
                            <form id="homeDataSubmit" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <label class="form-label">Home Title</label>
                                    <input type="text" name="homeTitle" class="form-control" value="<?php echo htmlspecialchars($row['title']); ?>" required>
                                </div>



                                <div class="mb-3">
                                    <label class="form-label">Home Description</label>
                                    <div class="mb-3">
                                        <div id="new_show_editer" style="height: 300px;"></div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Home Image Title</label>
                                    <input type="text" name="homeImageTitle" class="form-control" value="<?php echo htmlspecialchars($row['image_title']); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Current Image</label> <!-- First show image label -->
                                    <div class="text-center">
                                        <img src="<?php echo htmlspecialchars($row['image_path']); ?>" class="carouselImage img-fluid rounded border" alt="Image not found" style="max-height: 200px; width: auto;">
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="homePageImage" class="form-control">
                                </div>

                                <button type="submit" class="btn btn-success width-xs">Update</button>
                            </form>


                        </div>
                    </div>

                    <!-- </div> -->

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
        let quillAdd2 = new Quill('#new_show_editer', {
            theme: 'snow',
            placeholder: 'Enter the description...',
            modules: {
                toolbar: [
                    [{
                        header: [1, 2, 3, false]
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    [{
                        list: 'ordered'
                    }, {
                        list: 'bullet'
                    }],
                    [{
                        align: []
                    }],
                    ['link', 'image'],
                    ['clean']
                ]
            }
        });

        // Load existing description into Quill
        const existingDescription = `<?php echo addslashes($row['description']); ?>`;
        quillAdd2.root.innerHTML = existingDescription;

        $('#homeDataSubmit').on('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            formData.append('homeDiscpction', quillAdd2.root.innerHTML);

            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    if (response == 1) {
                        alert("Data Updated successfully.");
                        // $('#homeDataSubmit').trigger('reset');
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