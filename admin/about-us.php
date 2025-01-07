<?php
session_start();
if (!isset($_SESSION['adminUsername'])) {
    header("Location: index.php");
}
include("inc/header.php");
include("inc/sidebar.php");

$sqlFetch = "SELECT * FROM `about` WHERE `id` = 1";
$result = $conn->query($sqlFetch);
$row = $result->fetch_assoc();
?>

<div class="page-content">
    <div class="container-fluid">
        <div class="card">
            <div class="card-body">
                <h5 style="text-align: center;" class="card-title mb-3 anchor" id="basic">
                    Update About Us
                </h5>
                <form id="aboutDataSubmit">
                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input type="text" name="aboutName" class="form-control" value="<?php echo $row['name']; ?>" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <div class="mb-3">
                            <div id="snow-editor-new" style="height: 300px;"></div>
                        </div>
                    </div>
                    <button type="submit" id="aboutSubmitButton" class="btn btn-success width-xs">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

 
<?php include("inc/footer.php"); ?>

<script>
    let disableButton = (button, state, text = null) => {
        button.prop('disabled', state);
        if (text) button.text(text);
    };

    $(document).ready(function() {

        // Initialize Quill Editor
        let aboutDescription = <?php echo json_encode($row['description']); ?>;

        // Initialize the editor only after content is ready
        let quillAdd = new Quill('#snow-editor-new', {
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

        // Convert and load content into the editor
        if (aboutDescription) {
            let delta = quillAdd.clipboard.convert(aboutDescription);
            quillAdd.setContents(delta);
        }

       

        // About Us Form Submission
        $('#aboutDataSubmit').on('submit', function(e) {
            e.preventDefault();
            let button = $('#aboutSubmitButton');
            disableButton(button, true, 'Updating...');

            let formData = new FormData(this);
            formData.append('aboutDescription', quillAdd.root.innerHTML);

            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function(response) {
                    alert(response == 1 ? "Data updated successfully." : "Failed to update data.");
                },
                complete: function() {
                    disableButton(button, false, 'Update');
                }
            });
        });
    });
</script>
<link href="https://cdn.quilljs.com/1.3.7/quill.snow.css" rel="stylesheet">