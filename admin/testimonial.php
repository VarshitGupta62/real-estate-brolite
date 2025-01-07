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
                    Add Testimonial
                </h5>
                <form id="testimonialDataSubmit">

                    <div class="mb-3">
                        <label class="form-label">Image</label>
                        <input type="file" name="testimonialImage" class="form-control" aria-label="file example" required>
                        <div class="invalid-feedback">Example invalid form file feedback</div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="testimonialName" id="simpleinput" class="form-control" required>
                    </div>

                    

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea class="form-control" name="testimonialDescription" id="example-textarea" rows="5"></textarea>
                    </div>

                    <button type="submit" id="sweetalert-success" class="btn btn-success width-xs">Add</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-1 anchor" id="basic">
                    All Testimonial
                </h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <th scope="col">Name</th>
                                <th scope="col">Description</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="loadTestimonialData">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Edit Testimonial</h5>
                        <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form id="UpdateTestimonialForm">
                        <div class="modal-body">
                            <!-- Responsive Image Section -->
                            <div class="mb-3">
                                <label class="form-label">Current Image</label> <!-- First show image label -->
                                <div class="text-center">
                                    <img src='' class="carouselImage img-fluid rounded border" alt='Image not found' style="max-height: 200px; width: auto;">
                                </div>
                            </div>

                            <!-- File Upload Section -->
                            <div class="mb-3">
                                <label class="form-label">Image</label>
                                <input type="file" name="newTestimonialImage" class="form-control" aria-label="file example" >
                                <div class="invalid-feedback">Example invalid form file feedback</div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Name</label>
                                <input type="text" name="newTestimonialName" id="simpleinput" class="form-control newTestimonialName" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Description</label>
                                <textarea class="form-control newTestimonialDescription" name="newTestimonialDescription" id="example-textarea" rows="5"></textarea>
                            </div>

                            <!-- Hidden ID Field -->
                            <input type="hidden" name="testimonialEditId" id="testimonialEditId">
                        </div>

                        <!-- Modal Footer -->
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success">Save changes</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <!-- End Container Fluid -->
    <?php
    include("inc/footer.php");
    ?>

    <script>
        let loadTestimonialData = function() {
            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: {
                    loadTestimonialData: 1
                },
                success: function(data) {
                    $('#loadTestimonialData').html(data);
                }
            })
        }
        loadTestimonialData();
        $('#testimonialDataSubmit').on('submit', function(e) {
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
                        $('#testimonialDataSubmit').trigger('reset');
                        loadTestimonialData();
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
        $(document).on('click', '.testimonialDeleteById', function() {
            if (confirm('Are you want to delete')) {
                let id = $(this).data('id');
                img = $(this).data('deleteimg');
                $.ajax({
                    url: "query.php",
                    type: "POST",
                    data: {
                        deleteTestimonialById: id,
                        deleteTestimonialImg: img
                    },
                    success: function(data) {
                        if (data == 1) {
                            alert("Data deleted successfully.");
                            loadTestimonialData();
                        } else {
                            alert("Failed to delete data.");
                        }
                    }
                })
            }
        });
        $(document).on('click', '.testimonialEditById', function() {
            let id = $(this).data('id');
            $.ajax({
                url: "query.php",
                type: "POST",
                data: {
                    loadTestimonialEditForm: id
                },
                success: function(data) {
                    // alert(data);
                    data = JSON.parse(data);
                    $('#testimonialEditId').val(data.id);
                    $('.newTestimonialName').val(data.name);
                    $('.newTestimonialDescription').val(data.description);
                    $('.carouselImage').attr('src', 'uploads/' + data.Image);
                }
            });
        });
        $('#UpdateTestimonialForm').on('submit', function(e) {
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
                        $('#UpdateTestimonialForm').trigger('reset');
                        $('.close').click();
                        loadTestimonialData();
                    }
                }
            })
        });
    </script>