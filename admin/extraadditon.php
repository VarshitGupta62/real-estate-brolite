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
                    Add Extra Addition
                </h5>
                <form id="ExtraAdditionDataSubmit">
                    <div class="mb-3">
                        <label class="form-label">Title </label>
                        <input type="text" name="Extra_Addition_Title" id="simpleinput" class="form-control" required>
                    </div>


                    <div class="mb-3">
                        <label class="form-label">Subtitle </label>
                        <input type="text" name="Extra_Addition_Subtitle" id="simpleinput" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Main Text </label>
                        <div class="mb-3">
                            <div id="snow-editor-new" style="height: 300px;">

                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Extra Text </label>
                        <!-- <p class="text-muted">Use <code>snow-editor</code> id to set snow editor.</p> -->
                        <div class="mb-3">
                            <div id="snow-editor-new2" style="height: 300px;">

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
                    All Extra Addition
                </h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Title</th>
                                <th scope="col">Subtitle</th>
                                <th scope="col">Main Text</th>
                                <th scope="col">Extra Text</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="loadExtraAddition">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>




    </div>
    <!-- End Container Fluid -->

    <!-- Modal -->

    <!-- Modal -->
    <div class="modal fade" id="ExtraModel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Extra Addition </h5>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="Update_Extra_Addition">
                    <div class="modal-body">
                        <!-- Responsive Image Section -->
                        <div class="mb-3">
                            <label class="form-label">Title </label>
                            <input type="text" name="new_Extra_Addition_Title" id="simpleinput" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Subtitle </label>
                            <input type="text" name="new_Extra_Addition_Subtitle" id="simpleinput" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Main Text </label>
                            <div class="mb-3">
                                <div id="snow-editor-new3" style="height: 300px;">

                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Extra Text </label>
                            <!-- <p class="text-muted">Use <code>snow-editor</code> id to set snow editor.</p> -->
                            <div class="mb-3">
                                <div id="snow-editor-new4" style="height: 300px;">

                                </div>
                            </div>
                        </div>

                        <!-- Hidden ID Field -->
                        <input type="hidden" name="Extra_Addition_EditId" id="Extra_Addition_EditId">
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
    var quillAdd, quillAdd2, quillAdd3, quillAdd4;

    $(document).ready(function() {
        // Initialize Quill editor when the DOM is ready
        quillAdd = new Quill('#snow-editor-new', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': '1'
                    }, {
                        'header': '2'
                    }, {
                        'font': []
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'align': []
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'link': []
                    }],
                    ['image', 'video'],
                    ['clean'] // This is for clearing the editor content
                ]
            }
        });
    });

    $(document).ready(function() {
        // Initialize Quill editor when the DOM is ready
        quillAdd2 = new Quill('#snow-editor-new2', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'header': '1'
                    }, {
                        'header': '2'
                    }, {
                        'font': []
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    [{
                        'align': []
                    }],
                    ['bold', 'italic', 'underline', 'strike'],
                    ['blockquote', 'code-block'],
                    [{
                        'color': []
                    }, {
                        'background': []
                    }],
                    [{
                        'link': []
                    }],
                    ['image', 'video'],
                    ['clean'] // This is for clearing the editor content
                ]
            }
        });
    });

    // Handle Add Course Form Submission
    $('#ExtraAdditionDataSubmit').on('submit', function(e) {
        e.preventDefault();

        let editorContent = quillAdd.root.innerHTML;
        let editorContent2 = quillAdd2.root.innerHTML;

        let formData = new FormData(this);
        formData.append('main_text', editorContent);
        formData.append('extra_text', editorContent2);

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
                    $('#ExtraAdditionDataSubmit').trigger('reset'); // Reset form fields
                    quillAdd.setContents([]); // Clear Quill editor content
                    quillAdd2.setContents([]); // Clear Quill editor content
                    loadExtraAddition(); // Optional: Call this function to reload _Course_JUnior data4

                } else {
                    alert("Failed to add Imp Q&A.");
                }
            },
            error: function(err) {
                console.log("Error:", err); // Log the error to the console for debugging
                alert("There was an error adding the course.");
            }
        });
    });


    let loadExtraAddition = function() {
        $.ajax({
            url: 'query.php',
            type: 'POST',
            data: {
                loadExtraAddition: 1
            },
            success: function(data) {
                $('#loadExtraAddition').html(data);
            }
        })
    }
    loadExtraAddition();

    $(document).on('click', '.deleteExtraAdditionBtn', function() {
        if (confirm('Are you want to delete')) {
            let id = $(this).data('id');
            $.ajax({
                url: "query.php",
                type: "POST",
                data: {
                    deleteExtraAdditionId: id,
                },
                success: function(data) {
                    // alert(data);
                    if (data == 1) {
                        alert("Data deleted successfully.");
                        loadExtraAddition();
                    } else {
                        alert("Failed to delete data.");
                    }
                }
            })
        }
    });



    var quillEdit, quillEdit2;

    $('#ExtraModel').on('shown.bs.modal', function() {
        // Initialize Quill editor only if it has not been initialized yet
        if (!quillEdit) {
            quillEdit = new Quill('#snow-editor-new3', {
                theme: 'snow'
            });
        }

        if (!quillEdit2) {
            quillEdit2 = new Quill('#snow-editor-new4', {
                theme: 'snow'
            });
        }
    });


    // When the edit button is clicked
    $(document).on('click', '.editExtraAdditionBtn', function() {
        var id = $(this).data('id');

        // Load data for the editor and populate the modal
        $.ajax({
            url: "query.php",
            type: "POST",
            data: {
                editExtraAdditionBtn: id
            },
            success: function(data) {
                try {
                    var response = JSON.parse(data); // Ensure the response is in JSON format

                    // Populate the form fields with the fetched data
                    $('#Extra_Addition_EditId').val(response.id);
                    $("input[name='new_Extra_Addition_Title']").val(response.title);
                    $("input[name='new_Extra_Addition_Subtitle']").val(response.subtitle);

                    if (!quillEdit) {
                        quillEdit = new Quill('#snow-editor-new3', {
                            theme: 'snow',
                            modules: {
                                toolbar: [
                                    [{
                                        'header': '1'
                                    }, {
                                        'header': '2'
                                    }, {
                                        'font': []
                                    }],
                                    [{
                                        'list': 'ordered'
                                    }, {
                                        'list': 'bullet'
                                    }],
                                    [{
                                        'script': 'sub'
                                    }, {
                                        'script': 'super'
                                    }],
                                    [{
                                        'indent': '-1'
                                    }, {
                                        'indent': '+1'
                                    }],
                                    [{
                                        'align': []
                                    }],
                                    ['bold', 'italic', 'underline', 'strike'],
                                    ['blockquote', 'code-block'],
                                    [{
                                        'color': []
                                    }, {
                                        'background': []
                                    }],
                                    [{
                                        'link': []
                                    }],
                                    ['image', 'video'],
                                    ['clean'] // This is for clearing the editor content
                                ]
                            }
                        });
                    }

                    if (!quillEdit2) {
                        quillEdit2 = new Quill('#snow-editor-new4', {
                            theme: 'snow',
                            modules: {
                                toolbar: [
                                    [{
                                        'header': '1'
                                    }, {
                                        'header': '2'
                                    }, {
                                        'font': []
                                    }],
                                    [{
                                        'list': 'ordered'
                                    }, {
                                        'list': 'bullet'
                                    }],
                                    [{
                                        'script': 'sub'
                                    }, {
                                        'script': 'super'
                                    }],
                                    [{
                                        'indent': '-1'
                                    }, {
                                        'indent': '+1'
                                    }],
                                    [{
                                        'align': []
                                    }],
                                    ['bold', 'italic', 'underline', 'strike'],
                                    ['blockquote', 'code-block'],
                                    [{
                                        'color': []
                                    }, {
                                        'background': []
                                    }],
                                    [{
                                        'link': []
                                    }],
                                    ['image', 'video'],
                                    ['clean'] // This is for clearing the editor content
                                ]
                            }
                        });
                    }

                    // Set content in Quill editors
                    quillEdit.root.innerHTML = response.main_text;
                    quillEdit2.root.innerHTML = response.extra_text;

                    // Show the modal
                    $('#ExtraModel').modal('show');
                } catch (e) {
                    alert('Failed to load data for editing.');
                    console.error("Error parsing response: ", e);
                }
            },
            error: function(err) {
                console.log("Error:", err); // Log the error for debugging
                alert("There was an error loading the data for editing.");
            }
        });
    });

    // Handle form submission for updating the extra addition
    $('#Update_Extra_Addition').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let editorContent = quillEdit.root.innerHTML;
        let editorContent2 = quillEdit2.root.innerHTML;

        // Append editor content to the form data
        formData.append('new_main_text', editorContent);
        formData.append('new_extra_text', editorContent2);

        $.ajax({
            url: 'query.php',
            type: 'POST',
            data: formData,
            contentType: false, // Don't set content type for FormData
            processData: false, // Don't process data (keep as FormData)
            success: function(response) {
                if (response == 1) {
                    alert("Data updated successfully.");
                    $('.close').click(); // Close the modal
                    loadExtraAddition(); // Reload the extra additions list
                    $('#Update_Extra_Addition').trigger('reset'); // Reset form fields
                    quillEdit.setContents([]); // Clear Quill editor content
                    quillEdit2.setContents([]); // Clear Quill editor content
                } else {
                    alert("Failed to update data.");
                }
            },
            error: function(err) {
                console.log("Error:", err); // Log the error for debugging
                alert("There was an error updating the data.");
            }
        });
    });
</script>