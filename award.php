<?php
include("inc/header.php");
?> <!-- content begin -->
<div id="content" class="no-bottom no-top">

  <!-- revolution slider begin -->

  <section class="banner-sec">
    <div class="banner-img">
      <div class="overlay"></div>
      <img class="img-fluid" src="assets/images/award.jpg">
      <div class="banner-content inter-banner-content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="banner-text inter-banner-text">

                <h2>Award &amp; Recognition</h2>
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
      <div class="">
        <div class="row">
          <?php
         $sql = "SELECT * FROM `carousel` ORDER BY `id` DESC";
          $result = $conn->query($sql);

          if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
              $imagePath = 'admin/uploads/' . $row['Image'];
              echo '<div class="col-md-4 wow fadeInUp">';
              echo '  <div class="service-page-inner">';
              echo '    <img src="' . $imagePath . '" class="img-fluid w-100">';
              echo '  </div>';
              echo '</div>';
            }
          } else {
            echo '<p>No images found.</p>';
          }
          ?>

        </div>
      </div>
    </div>
  </section>

</div>

<!-- footer begin -->

<!-- footer close -->
</div>


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
<?php

include("inc/footer.php");

?>