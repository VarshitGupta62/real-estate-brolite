<footer>
  <div class="container newDiv">
    <div class="row">
      <div class="col-md-4 border-right border-white">
        <!-- <img src="assets/images/new/logo-s.png" class="logo-small" alt="proffrill Homes"> -->
        <?php
        // Query to fetch data
        $query = "SELECT  * FROM settings where setting_key = 'logo'";
        $result = mysqli_query($conn, $query) or die('Query Failed: ' . mysqli_error($conn));

        if (mysqli_num_rows($result) > 0) {
          // Output data of each row
          while ($row = mysqli_fetch_assoc($result)) {
            echo "
                        <img class='logo-small' src='admin/uploads/$row[setting_value]' alt='Logo'> 
                        ";
          }
        } else {
          echo "Image not found.";
        } ?>
        <br>
        One of the fastest growing companies in India, Ample Infra Reality offers comprehensive real estate solutions. We are defined by trust and excellence with a commitment to customer satisfaction and technology.
      </div>

      <div class="col-md-2 border-right border-white">
        <div class="widget widget_recent_post">
          <h3>Quick Links</h3>
          <ul class="important_links">
            <li>
              <a href="about-us.php">About us</a>
            </li>
            <li>
              <a href="service.php">Services</a>
            </li>
            <li class="d-none">
              <a href="award.php">Awards & Recognition</a>
            </li>
            <li class="d-none">
              <a href="career.php">Career</a>
            </li>
            <li>
              <a href="testimonials.php">Testimonials</a>
            </li>
            <li>
              <a href="contact.php">Contact Us</a>
            </li>
            <li>
              <a href="privacy-policy.php">Privacy Policy</a>
            </li>
            <li>
              <a href="disclaimer.php">Disclaimer</a>
            </li>
            <li>
              <a href="termsconditions.php">Terms & Condition</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-md-2 border-right border-white">
        <div class="widget widget_recent_post">
          <h3>Social Links</h3>
          <div class="social-icons">
            <?php

            // Fetch social links from the database
            $sql = "SELECT * FROM important_links WHERE id = 1";
            $result = $conn->query($sql);

            // Check if the record exists
            if ($result->num_rows > 0) {
              $row = $result->fetch_assoc();

              echo '<a href="' . htmlspecialchars($row['facebook_link']) . '" target="_blank">
                <i class="fa fa-facebook fa-lg"></i> Facebook
              </a>';
              echo '<a href="' . htmlspecialchars($row['twitter_link']) . '" target="_blank">
                <i class="fa fa-twitter fa-lg"></i> Twitter
              </a>';
              echo '<a href="' . htmlspecialchars($row['instagram_link']) . '" target="_blank">
                <i class="fa fa-instagram fa-lg"></i> Instagram
              </a>';
              echo '<a href="' . htmlspecialchars($row['linkedin_link']) . '" target="_blank">
                <i class="fa fa-linkedin fa-lg"></i> LinkedIn
              </a>';
            } else {
              echo "<p>No social links found.</p>";
            }

            ?>
          </div>
        </div>
      </div>


      <div class="col-md-4">
        <div class="widget widget_recent_post">
          <h3>Contact Us</h3>
          <div class=" widget-address">
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
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.85403286061!2d77.35126997450759!3d28.574145586731483!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce54f9f9059e3%3A0xe745316aa9898ea5!2sLogix%20Mall%2C%20Wave%20City%20Centre!5e0!3m2!1sen!2sin!4v1734502616750!5m2!1sen!2sin" width="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="subfooter">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center"> &copy; Copyright <span id="currYear"></span> - Ample Infra Reality . ALL RIGHTS RESERVED. <br>
          WEBSITE DESIGNED & DEVELOPMENT BY <a href="https://bhoomitechzone.in/"> <span class="id-color">Bhoomi Techzone Pvt. Ltd.</span></a> </div>
      </div>
    </div>
  </div>
  <a href="#" id="back-to-top"></a>
</footer>


<div class="modal enquiry-model modal-fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->

      <!-- Modal body -->
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" style="margin-right: 0px;
                            padding: 0 10px"> &times;</button>
        <div class="modal-body text-center" style=" padding: 10px!important; margin-top: 15px!important"> <span id="spanQueryMsg" style="color: Green; font-size: 15px"></span> <img id="proimg" src="assets/images/m3m.png" alt="M3M" style="width: 110px;">
          <p class="text-center" style="color: #3c3259; font-size: 16px; margin-top: 10px; font-weight:600; margin-bottom: 0px;"> <span id="projectname">M3M INTERNATIONAL FINANCIAL CENTER</span></p>
          <p style="text-align: center; color: #ec0000; font-size: 16px; margin-bottom: 10px; font-weight:600; letter-spacing:0.5px;">
            <span id="projectlocation">Gurgaon</span>
          </p>
          <div id="divFormMainPop">
            <div class="input-group pop-frm-hght"> <span class="input-group-addon"><i class="fa fa-user"></i></span>
              <input type="text" name="txtNameForm" id="txtNameForm" style="border: 1px solid #ccc;
                                    height: 40px; margin: 0" class="form-control pop-frm-hght" height="auto" placeholder="Enter Name" maxlength="200" required="">
            </div>
            <br>
            <div class="input-group pop-frm-hght"> <span class="input-group-addon"><i class="fa fa-phone"></i></span>
              <input type="number" name="txtMobileForm" id="txtMobileForm" class="form-control pop-frm-hght movsection" maxlength="100" placeholder="Mobile No" required="" style="height:40px;">
            </div>
            <br>
            <div class="input-group pop-frm-hght"> <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
              <input type="email" name="txtEmailForm" id="txtEmailForm" class="form-control pop-frm-hght" maxlength="200" placeholder="Email ID" required="" style="height:40px;">
            </div>
            <br>
            <div class="input-group pop-frm-hght"> <span class="input-group-addon"><i class="fa fa-comment"></i></span>
              <textarea class="form-control pop-frm-hght" name="txtMessageForm" id="txtMessageForm" style="height: auto; margin: 0" value="Yes | I am interested" required="">Yes | I am interested</textarea>
            </div>
            <br>
            <div class="col-sm-12" style="margin: 0; padding: 0"> <span id="button">
                <input type="submit" id="btnQueryPop" onclick="return SendQueryData1('M3M INTERNATIONAL FINANCIAL CENTER')" style="color: #fff; background-color: #ec0000; margin-bottom:0px" class="btn btn btn-default btn-block popup-btn pop-frm-hght" value="SUBMIT">
              </span> </div>
            <br>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-12 col-md-12 col-xs-12"> <span id="msg" style="color:green;text-align:center"></span>
          </div>
        </div>

        <!-- Modal footer -->

      </div>
    </div>
  </div>
</div>
<script>
  const currentDate = new Date().getFullYear();
  document.getElementById('currYear').innerHTML = currentDate;
</script>


<script>
  var BASE_URL = "https://www.propertyfinder.org.in/";
</script>
<!-- Javascript Files
    ================================================== -->
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/jpreLoader.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/enquire.min.js"></script>
<script src="assets/js/jquery.isotope.min.js"></script>
<script src="assets/js/easing.js"></script>
<script src="assets/js/jquery.flexslider-min.js"></script>
<script src="assets/js/jquery.scrollto.js"></script>
<script src="assets/js/owl.carousel.js"></script>
<script src="assets/js/jquery.countTo.js"></script>
<script src="assets/js/classie.js"></script>
<script src="assets/js/video.resize.js"></script>
<script src="assets/js/validation.js"></script>
<script src="assets/js/wow.min.js"></script>
<script src="assets/js/jquery.magnific-popup.min.js"></script>
<script src="assets/js/jquery.stellar.min.js"></script>
<!-- <script src="https://api2.gtftech.com/Scripts/queryform.min.ssl.js"></script> -->
<script src="assets/js/designesia.js"></script>
<script src="assets/js/lightbox.js"></script>
<script src="assets/js/custom.js"></script>
<script src="assets/js/select2.min.js"></script>
<script src="assets/rs-plugin/js/jquery.themepunch.plugins.min.js"></script>
<script src="assets/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script>
  function downloadFile(filePath) {
    var link = document.createElement('a');
    link.href = filePath;
    link.download = filePath.substr(filePath.lastIndexOf('/') + 1);
    link.click();
  }
</script>

<script>
  var AgentInfo = {
    "vAgentID": "4381",
    "vProject": " Ample Infra Reality ",
    "vURL": BASE_URL,
    "thankspageurl": "",
  };
</script>

<script src="vendor/search.js"></script>

<script>
  $(document).ready(function() {
    getAllProjjects();
  })
</script>

</body>

</html>