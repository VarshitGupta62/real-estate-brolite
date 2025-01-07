<?php
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
                <h5 class="card-title mb-1 anchor" id="basic">
                    All Contact Us
                </h5>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Message</th>
                                <th scope="col">Action</th>
                            </tr>

                        </thead>
                        <tbody id="loadContactData">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
    <!-- End Container Fluid -->
    <?php
    include("inc/footer.php");
    ?>

    <script>
        let loadContactData = function() {
            $.ajax({
                url: 'query.php',
                type: 'POST',
                data: {
                    loadContactData: 1
                },
                success: function(data) {
                    // alert(data);
                    $('#loadContactData').html(data);
                }
            })
        }
        loadContactData();

        $(document).on('click', '.contactDeleteById', function() {
            if (confirm('Are you want to delete')) {
                let id = $(this).data('id');
                $.ajax({
                    url: "query.php",
                    type: "POST",
                    data: {
                        contactDeleteById: id,
                    },
                    success: function(data) {

                        if (data == 1) {
                            alert("Data deleted successfully.");
                            loadContactData();
                        } else {
                            alert("Failed to delete data.");
                        }
                    }
                })
            }
        });
    </script>