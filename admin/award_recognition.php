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

        <div class="card">
            <div class="card-body">
                <h5 style="text-align: center;" class="card-title mb-3 anchor" id="basic">
                    Add Award & Recognition
                </h5>
                <form id="carouselDataSubmit">

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="carouselImage" class="form-control" aria-label="file example" required>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>

                    <!-- <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="carouselTitle" id="simpleinput" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="carouselDescription" id="example-textarea" rows="5"></textarea>
                    </div> -->

                    <button type="submit" id="sweetalert-success" class="btn btn-success width-xs">Add</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-1 anchor" id="basic">
                    All Award & Recognition
                </h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <!-- <th scope="col">Title</th>
                                <th scope="col">Description</th> -->
                                <!-- <th scope="col">Edit</th> -->
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="loadCarouselData">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


    </div>
    <!-- End Container Fluid -->

    <!-- Modal -->
     
    <?php
    include("inc/footer.php");
    ?>

    <script>
        let loadCarouselData = function() {
            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: {
                    loadCarouselData: 1
                },
                success: function(data) {
                    $('#loadCarouselData').html(data);
                }
            })
        }
        loadCarouselData();
        $('#carouselDataSubmit').on('submit', function(e) {
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
                        alert("Data added successfully.");
                        $('#carouselDataSubmit').trigger('reset');
                        loadCarouselData();
                    } else {
                        alert("Failed to add data.");
                    }
                },
                error: function(err) {
                    console.log(err);
                    alert("There was an error uploading the file.");
                }
            });
        });
        $(document).on('click', '.carouselDeleteById', function() {
            if (confirm('Are you want to delete')) {
                let id = $(this).data('id');
                img = $(this).data('deleteimg');
                $.ajax({
                    url: "query.php",
                    type: "POST",
                    data: {
                        deleteCarouselById: id,
                        deleteCarouselImg: img
                    },
                    success: function(data) {
                        if (data == 1) {
                            alert("Data deleted successfully.");
                            loadCarouselData();
                        } else {
                            alert("Failed to delete data.");
                        }
                    }
                })
            }
        });
        $(document).on('click', '.carouselEditById', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "query.php",
                type: "POST",
                data: {
                    loadCarouselEditForm: id
                },
                success: function(data) {
                    // alert(data);
                    data = JSON.parse(data);
                    $('#carouselEditId').val(data.id);
                    $('.newCarouselTitle').val(data.title);
                    $('.newCarouselDescription').val(data.description);
                    $('.carouselImage').attr('src', 'uploads/' + data.Image);
                }
            });
        });
        $('#carouselUpdateForm').on('submit', function(e) {
            e.preventDefault();
            let formdata = new FormData(this);
            $.ajax({
                url: "query.php",
                type: "POST",
                data: formdata,
                contentType: false,
                processData: false,
                success: function(data) {
                    // alert("Server Response: " + data);
                    if (data == 1) {
                        alert("Updated Successfully");
                        $('#carouselUpdateForm').trigger('reset');
                        $('.close').click();
                        loadCarouselData();
                    }
                }
            })
        });
    </script>