<?php
session_start();
if (!isset($_SESSION['adminUsername'])) {
    header("Location: index.php");
}
include("inc/header.php");
include("inc/sidebar.php");
?>
<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 style="text-align: center;" class="card-title mb-3 anchor" id="basic">
                    Add Services
                </h5>
                <form id="courseDataSubmit">

                    <div class="mb-3">
                        <label class="form-label">Upload Image</label>
                        <input type="file" name="services_Image" class="form-control" id="services_Image" accept="image/*" required>
                    </div>

                    <!-- <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="services_Name" id="services_Name" class="form-control" required>
                    </div> -->

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="services_Title" id="simpleinput" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div class="mb-3">
                            <div id="snow-editor-new" style="height: 300px;"></div>
                        </div>
                    </div>

                    <button type="submit" id="sweetalert-success" class="btn btn-success width-xs">Add</button>
                </form>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title mb-1 anchor" id="basic">
                    All Services
                </h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Image</th>
                                <!-- <th scope="col">Name</th> -->
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                        </thead>
                        <tbody id="loadservices_Data"></tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    <!-- Edit Modal -->
    <div class="modal fade" id="Model" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Services</h5>
                    <button type="button" class="btn-close close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="Updateservices_Form">
                    <div class="modal-body">

                        <div class="mb-3">
                            <label class="form-label">Current Image</label>
                            <div class="text-center">
                                <img src='' class="carouselImage img-fluid rounded border" alt='Image not found' style="max-height: 200px; width: auto;">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">New Image</label>
                            <input type="file" name="newservices_Image" class="form-control newquestionImage" aria-label="file example">
                        </div>

                        <!-- <div class="mb-3">
                            <label class="form-label">Name</label>
                            <input type="text" name="newservices_Name" id="newservices_Name" class="form-control newservices_Name" required>
                        </div> -->

                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="newservices_Title" id="simpleinput" class="form-control newservices_Title" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <div class="mb-3">
                                <div id="snow-editor-edit" class="newservices_Description" style="height: 300px;"></div>
                            </div>
                        </div>

                        <input type="hidden" name="services_EditId" id="services_EditId">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("inc/footer.php"); ?>

<script>
    var quillAdd;

    $(document).ready(function() {
        quillAdd = new Quill('#snow-editor-new', {
            theme: 'snow',
            modules: {
                toolbar: [
                    [{
                        'font': []
                    }],
                    [{
                        'size': ['small', false, 'large', 'huge']
                    }], // Font sizes
                    ['bold', 'italic', 'underline', 'strike'], // Formatting
                    [{
                        'color': []
                    }, {
                        'background': []
                    }], // Text color and background
                    [{
                        'script': 'sub'
                    }, {
                        'script': 'super'
                    }], // Subscript/superscript
                    [{
                        'header': [1, 2, 3, 4, 5, 6, false]
                    }], // Headers
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }], // Indentation
                    [{
                        'direction': 'rtl'
                    }], // Text direction
                    [{
                        'align': []
                    }], // Alignment
                    ['blockquote', 'code-block'], // Block elements
                    ['link', 'image', 'video'], // Media
                    ['clean'] // Remove formatting
                ]
            }
        });
    });


    $('#courseDataSubmit').on('submit', function(e) {
        e.preventDefault();

        let editorContent = quillAdd.root.innerHTML;
        let formData = new FormData(this);
        formData.append('services_Description', editorContent);

        $.ajax({
            url: 'query.php',
            type: 'POST',
            data: formData,
            contentType: false,
            processData: false,
            success: function(response) {
                // alert(response);
                if (response == 1) {
                    alert("Data added successfully.");
                    $('#courseDataSubmit').trigger('reset');
                    quillAdd.setContents([]);
                    loadservices_Data();
                } else {
                    alert("Failed to add Data.");
                }
            },
            error: function(err) {
                console.log("Error:", err);
                alert("There was an error adding the course.");
            }
        });
    });

    function loadservices_Data() {
        $.ajax({
            url: 'query.php',
            type: 'POST',
            data: {
                loadservices_Data: 1
            },
            success: function(data) {
                $('#loadservices_Data').html(data);
            }
        });
    }
    loadservices_Data();

    $(document).on('click', '.services_DeleteById', function() {
        if (confirm('Are you want to delete')) {
            let id = $(this).data('id');
            let img = $(this).data('deleteimg');
            $.ajax({
                url: "query.php",
                type: "POST",
                data: {
                    deleteservices_ById: id,
                    deleteservices_Img: img
                },
                success: function(data) {
                    if (data == 1) {
                        alert("Data deleted successfully.");
                        loadservices_Data();
                    } else {
                        alert("Failed to delete data.");
                    }
                }
            });
        }
    });

    var quillEdit;

    $('#newModel').on('shown.bs.modal', function() {
        if (!quillEdit) {
            quillEdit = new Quill('#snow-editor-edit', {
                theme: 'snow'
            });
        }
    });

    $(document).on('click', '.services_EditById', function() {
        let id = $(this).data('id');
        $.ajax({
            url: "query.php",
            type: "POST",
            data: {
                loadservices_EditForm: id
            },
            success: function(data) {
                data = JSON.parse(data);
                $('#services_EditId').val(data.id);
                $('.carouselImage').attr('src', 'uploads/' + data.image);
                $('.newservices_Name').val(data.name);
                $('.newservices_Title').val(data.title);

                if (!quillEdit) {
                    quillEdit = new Quill('#snow-editor-edit', {
                        theme: 'snow',
                        modules: {
                            toolbar: [
                                [{
                                    'font': []
                                }],
                                [{
                                    'size': ['small', false, 'large', 'huge']
                                }], // Font sizes
                                ['bold', 'italic', 'underline', 'strike'], // Formatting
                                [{
                                    'color': []
                                }, {
                                    'background': []
                                }], // Text color and background
                                [{
                                    'script': 'sub'
                                }, {
                                    'script': 'super'
                                }], // Subscript/superscript
                                [{
                                    'header': [1, 2, 3, 4, 5, 6, false]
                                }], // Headers
                                [{
                                    'indent': '-1'
                                }, {
                                    'indent': '+1'
                                }], // Indentation
                                [{
                                    'direction': 'rtl'
                                }], // Text direction
                                [{
                                    'align': []
                                }], // Alignment
                                ['blockquote', 'code-block'], // Block elements
                                ['link', 'image', 'video'], // Media
                                ['clean'] // Remove formatting
                            ]
                        }
                    });
                }
                quillEdit.root.innerHTML = data.description;
            }
        });
    });

    $('#Updateservices_Form').on('submit', function(e) {
        e.preventDefault();

        let formData = new FormData(this);
        let editorContent = quillEdit.root.innerHTML;
        formData.append('newservices_Description', editorContent);

        $.ajax({
            url: "query.php",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data == 1) {
                    alert("Updated Successfully");
                    $('#Updateservices_Form').trigger('reset');
                    $('.close').click();
                    quillEdit.setContents([]);
                    loadservices_Data();
                } else {
                    alert("Failed to update the course.");
                }
            }
        });
    });
</script>