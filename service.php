<?php
include("inc/header.php");
?>
<style>
  .description-text {
    display: -webkit-box;
    -webkit-box-orient: vertical;
    overflow: hidden;
    text-overflow: ellipsis;
    -webkit-line-clamp: 3;
    /* Limits to 3 lines */
    max-height: 4.5em;
    line-height: 1.5em;
    color: #fff;
    margin-bottom: 10px;
  }
</style>
<!-- subheader -->
<section class="banner-sec service1">
  <div class="banner-img">
    <div class="overlay"></div>
    <img class="img-fluid" src="assets/images/slider/wide7.jpg">
    <div class="banner-content inter-banner-content">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="banner-text inter-banner-text">

              <h1>Service</h1>
              <span class="decor-equal"></span>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- subheader close -->

<!-- content begin -->
<div id="content" class="no-top no-bottom">

  <!-- section service begin -->
  <?php
$sql = "SELECT * FROM services";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $index = 0; // Initialize an index counter

  while ($row = $result->fetch_assoc()) {
    $id = $row['id'];
    $title = $row['title'];
    $description = $row['description'];
    $image = $row['image'];

    // Truncate the description to 150 characters
    $shortDescription = strlen($description) > 150 ? substr($description, 0, 150) . '...' : $description;

    // Alternate between odd and even sections
    if ($index % 2 === 0) {
      // Even index section layout
      echo "
      <section id='section-service-$id' class='side-bg no-padding' style='background-color:#000'>
        <div class='image-container col-md-5 pull-left' data-delay='0'>
          <div class='background-image' style='background-size: cover; background-image:url(admin/uploads/$image)'></div>
        </div>
        <div class='container'>
          <div class='row py-5'>
            <div class='col-md-6'></div>
            <div class='col-md-6 wow fadeInRight' data-wow-delay='.5s'>
              <h3 class='id-color'>$title</h3>
              <p class='description-text'>$shortDescription</p>
              <div class='spacer-single'></div>
              <a href='detail-services.php?id=$id' class='btn-line'>Read More</a>
            </div>
            <div class='clearfix'></div>
          </div>
        </div>
      </section>";
    } else {
      // Odd index section layout (reverse layout)
      echo "
      <section id='section-service-$id' class='side-bg no-padding' style='background-color:#212225; display:flex; flex-direction: row-reverse;'>
        <div class='image-container col-md-5 pull-right' data-delay='0'>
          <div class='background-image' style='background-size: cover; background-image:url(admin/uploads/$image)'></div>
        </div>
        <div class='container'>
          <div class='row py-5'>
            <div class='col-md-6 wow fadeInRight' data-wow-delay='.5s'>
              <h3 class='id-color'>$title</h3>
              <p class='description-text'>$shortDescription</p>
              <div class='spacer-single'></div>
              <a href='detail-services.php?id=$id' class='btn-line'>Read More</a>
            </div>
            <div class='col-md-6'></div>
            <div class='clearfix'></div>
          </div>
        </div>
      </section>";
    }

    // Increment the index counter
    $index++;
  }
} else {
  echo "No services available.";
}
?>


</div>


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
<?php

include("inc/footer.php");

?>