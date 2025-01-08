<?php
include("inc/header.php");
?>

<!-- content begin -->
<div id="content" class="no-bottom no-top">

  <!-- revolution slider begin -->

  <section class="banner-sec">
    <div class="banner-img">
      <div class="overlay"></div>
      <img class="img-fluid" src="assets/images/contact.jpg">
      <div class="banner-content inter-banner-content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="banner-text inter-banner-text">

                <h2>Contact Us</h2>
                <span class="decor-equal"></span>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- revolution slider close -->

  <!-- section begin -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-md-6 wow fadeInLeft">
          <div class="why-us-sec">
            <h2> Reach Us
            </h2>
          </div>
          <div class="contact-text">
            <address>
              <?php
              // Fetch contact details from the database
              $sql = "SELECT * FROM contactus WHERE id = 1";
              $result = $conn->query($sql);

              // Check if record exists
              if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();

                // Display contact details
                echo '<div>';
                echo '<b>Ample Infra Reality</b><br>';
                echo htmlspecialchars($row['address']) . '';
                echo '<span><strong>Phone:</strong> <a href="tel:' . htmlspecialchars($row['number']) . '">' . htmlspecialchars($row['number']) . '</a></span>';
                echo '<span><strong>Email:</strong> <a href="mailto:' . htmlspecialchars($row['email']) . '">' . htmlspecialchars($row['email']) . '</a></span>';
                echo '<span><strong>Web:</strong> <a href="' . htmlspecialchars($row['time']) . '" target="_blank">' . htmlspecialchars($row['time']) . '</a></span>';
                echo '</div>';
              } else {
                echo "<p>No contact details found.</p>";
              }


              ?>
            </address>
          </div>

        </div>
        <div class="col-md-6 wow fadeInRight">
          <div class="why-us-sec">
            <h2> Get In Touch with Us
            </h2>
          </div>
          <div class="contact-form-sec">
            <form id="contactDataSubmit">
              <div class="form-group">
                <label for="name">Your Name *</label>
                <input type="text" class="form-control" placeholder="Name" name="contactName" required>
              </div>
              <div class="form-group">
                <label for="email">Email address *</label>
                <input type="text" class="form-control" placeholder="E-Mail ID" name="email" required>
              </div>
              <div class="form-group">
                <label for="email">Phone Number *</label>
                <input
                  type="number"
                  id="mobileInput"
                  name="phone"
                  class="form-control"
                  maxlength="10"
                  required
                  placeholder="Enter your 10-digit mobile number">
                <!-- <input type="text" class="form-control" placeholder="Phone Number" name="phone" required> -->
              </div>
              <div class="form-group">
                <label for="email">Message *</label>
                <textarea class="form-control" rows="6" placeholder="Comment" name="message" required></textarea>
              </div>

              <input type="submit" class="btn btn-warning" value="SUBMIT">
            </form>

          </div>

        </div>
      </div>
    </div>
  </section>
  <section class="map">
    <div class="container-fluid px-md-0">
      <div class="row">
        <div class="col-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.85403286061!2d77.35126997450759!3d28.574145586731483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce54f9f9059e3%3A0xe745316aa9898ea5!2sLogix%20Mall%2C%20Wave%20City%20Centre!5e0!3m2!1sen!2sin!4v1734502616750!5m2!1sen!2sin" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
      </div>

    </div>
  </section>
</div>

<!-- footer begin -->

</div>
<?php

include("inc/footer.php");

?>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<script>
  $('#contactDataSubmit').on('submit', function(e) {
    e.preventDefault();

    // Get the mobile number value
    let mobileNumber = $('#mobileInput').val();

    // Validate mobile number (should be exactly 10 digits)
    if (!/^\d{10}$/.test(mobileNumber)) {
      Swal.fire({
        icon: 'error',
        title: 'Invalid Number',
        text: 'Please enter a valid 10-digit mobile number.',
      });
      return;
    }

    let formData = new FormData(this);

    $.ajax({
      url: 'admin/query.php',
      type: 'POST',
      data: formData,
      contentType: false,
      processData: false,
      success: function(response) {
        if (response == 1) {
          Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: 'Your contact details have been submitted successfully.We will contact you soon.',
          });
          $('#contactDataSubmit').trigger('reset');
        } else {
          Swal.fire({
            icon: 'error',
            title: 'Failed',
            text: 'Failed to add data. Please try again.',
          });
        }
      },
      error: function(err) {
        Swal.fire({
          icon: 'error',
          title: 'Error!',
          text: 'There was an error uploading the file.',
        });
      }
    });
  });
</script>