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
                    Add Policy
                </h5>
                <form id="courseDataSubmit">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="policy_Title" id="simpleinput" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Discription</label>
                        <!-- <p class="text-muted">Use <code>snow-editor</code> id to set snow editor.</p> -->
                        <div class="mb-3">
                            <div id="snow-editor-new" style="height: 300px;">

                            </div>
                        </div>
                    </div>


                    <button type="submit" id="sweetalert-success" class="btn btn-success width-xs">Add</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-1 anchor" id="basic">
                    All Policy
                </h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Discription</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="loadpolicy_Data">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>
    <!-- End Container Fluid -->

    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="Model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit policy </h5>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="Updatepolicy_Form">
                    <div class="modal-body">
                        <!-- Responsive Image Section -->
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="newpolicy_Title" id="simpleinput" class="form-control newpolicy_Title" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Discription</label>
                            <!-- <p class="text-muted">Use <code>snow-editor</code> id to set snow editor.</p> -->
                            <div class="mb-3">
                                <div id="snow-editor-edit" class="newpolicy_Description" style="height: 300px;">

                                </div>
                            </div>
                        </div>

                        <!-- Hidden ID Field -->
                        <input type="hidden" name="policy_EditId" id="policy_EditId">
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
<!-- End Model -->
 

<!-- End Model -->
<?php
include("inc/footer.php");
?>
<script>
    var quillAdd;

    $(document).ready(function() {
        // Initialize Quill editor when the DOM is ready
        quillAdd = new Quill('#snow-editor-new', {
            theme: 'snow'
        });
    });

    // Handle Add Course Form Submission
    $('#courseDataSubmit').on('submit', function(e) {
        e.preventDefault();

        console.log("Form Submitted");

        let editorContent = quillAdd.root.innerHTML;

        let formData = new FormData(this);
        formData.append('policy_Description', editorContent);


        $.ajax({
            url: 'query.php', // PHP endpoint to handle the request
            type: 'POST',
            data: formData,
            contentType: false, // Don't set content type for FormData
            processData: false, // Don't process data (keep as FormData)
            success: function(response) {

                // alert(response);

                if (response == 1) {
                    alert("Data added successfully.");
                    $('#courseDataSubmit').trigger('reset'); // Reset form fields
                    quillAdd.setContents([]); // Clear Quill editor content
                    loadpolicy_Data(); // Optional: Call this function to reload _Course_JUnior data
                } else {
                    alert("Failed to add  data.");
                }
            },
            error: function(err) {
                console.log("Error:", err); // Log the error to the console for debugging
                alert("There was an error adding the data.");
            }
        });
    });


    let loadpolicy_Data = function() {
        $.ajax({
            url: 'query.php',
            type: 'POST',
            data: {
                loadpolicy_Data: 1
            },
            success: function(data) {
                $('#loadpolicy_Data').html(data);
            }
        })
    }
    loadpolicy_Data();

    $(document).on('click', '.policy_DeleteById', function() {
        if (confirm('Are you want to delete')) {
            let id = $(this).data('id');
            img = $(this).data('deleteimg');
            $.ajax({
                url: "query.php",
                type: "POST",
                data: {
                    deletepolicy_ById: id
                },
                success: function(data) {
                    // alert(data);
                    if (data == 1) {
                        alert("Data deleted successfully.");
                        loadpolicy_Data();
                    } else {
                        alert("Failed to delete data.");
                    }
                }
            })
        }
    });


    var quillEdit; // Declare it globally

    // Initialize Quill editor for Edit Message Modal when the modal is shown
    $('#newModel').on('shown.bs.modal', function() {
        if (!quillEdit) {
            quillEdit = new Quill('#snow-editor-edit', {
                theme: 'snow'
            }); // Ensure correct selector
        }
    });


    $(document).on('click', '.policy_EditById', function() {
        let id = $(this).data('id');
        $.ajax({
            url: "query.php",
            type: "POST",
            data: {
                loadpolicy_EditForm: id
            },
            success: function(data) {
                // alert(data);
                data = JSON.parse(data);
                $('#policy_EditId').val(data.id);
                $('.newpolicy_Title').val(data.title);
                // Make sure to initialize Quill editor before setting its content
                if (!quillEdit) {
                    quillEdit = new Quill('#snow-editor-edit', {
                        theme: 'snow'
                    });
                }

                // Set the content in the Quill editor
                quillEdit.root.innerHTML = data.description;
            }
        });
    });
    $('#Updatepolicy_Form').on('submit', function(e) {
        e.preventDefault();
        let formData = new FormData(this);

        // Append Quill editor content (description)
        let editorContent = quillEdit.root.innerHTML;
        formData.append('newpolicy_Description', editorContent);

        $.ajax({
            url: "query.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                // alert(data);
                if (data == 1) {
                    alert("Updated Successfully");
                    $('#Updatepolicy_Form').trigger('reset');
                    $('.close').click();
                    quillEdit.setContents([]);
                    loadpolicy_Data(); // Reload data after update
                } else {
                    alert("Failed to update the course.");
                }
            }
        });
    });
</script>

 