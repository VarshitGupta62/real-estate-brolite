<?php
include("inc/header.php");

// Fetch data from the blog table
$sql = "SELECT * FROM blog";
$result = $conn->query($sql);

// Store blog posts in an array
$posts = [];
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    $posts[] = $row;
  }
} else {
  echo "No blog posts found!";
}
?>
<!-- content begin -->
<div id="content" class="no-bottom no-top">

  <!-- revolution slider begin -->

  <section class="banner-sec">
    <div class="banner-img">
      <div class="overlay"></div>
      <img class="img-fluid" src="assets/images/slider/wide12.jpg">
      <div class="banner-content inter-banner-content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="banner-text inter-banner-text">

                <h2>Blog</h2>
                <span class="decor-equal"></span>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- revolution slider close -->



  <div id="content" style="background-size: cover;">
    <div class="container" style="background-size: cover;">
      <div class="row" style="background-size: cover;">
        <div class="col-md-8" style="background-size: cover;">
          <ul class="blog-list">

            <?php
            // Loop through each post and display it
            foreach ($posts as $post) {
              // Extract values from the post array
              $id = $post['id'];
              $title = $post['title'];
              $description = $post['description'];
              $shortDescription = strlen($description) > 350 ? substr($description, 0, 350) . '...' : $description;
              $createdat = date('d', strtotime($post['createdat']));  // Format date to '14 July'
              $month = date('F', strtotime($post['createdat']));  // Format date to '14 July'
            ?>
              <li>
                <div class="post-content" style="background-size: cover;">
                  <div class="post-image" style="background-size: cover;">

                  </div>
                  <div class="date-box" style="background-size: cover;">
                    <div class="day" style="background-size: cover;"><?= $createdat ?></div>
                    <div class="month" style="background-size: cover; letter-spacing:0"><?= $month ?></div>
                  </div>
                  <div class="post-text" style="background-size: cover;">
                    <h3><a href="blog-details.php?id=<?= $id ?>"><?= $title ?></a></h3>
                    <?= $shortDescription  ?>
                  </div>
                  <a href="blog-details.php?id=<?= $id ?>" class="btn-more">Read More</a>
                </div>
              </li>

            <?php
            }
            ?>


          </ul>


          <!--  <div class="text-center" style="background-size: cover;">
                            <ul class="pagination">
                                <li><a href="#">Prev</a></li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">4</a></li>
                                <li><a href="#">5</a></li>
                                <li><a href="#">Next</a></li>
                            </ul>
                        </div> -->
        </div>

        <div id="sidebar" class="col-md-4" style="background-size: cover;">
          <div class="widget widget-post" style="background-size: cover;">
            <h4>Recent Posts</h4>
            <div class="small-border" style="background-size: cover;"></div>
            <ul>
              <li><a href="blog-details.php.html?id=45">Have a problem with your real estate builder? Here’s how RERA can help</a></li>
              <li><a href="blog-details.php-1.html?id=46">Realty index at 10-year high: 7 stocks are still 10-80% lower than record highs – time to buy them?</a></li>
              <li><a href="blog-details.php-2.html?id=48">Delhi-NCR gets more luxury houses: 17% of total housing units launched in the last 6 months are luxury</a></li>
              <li><a href="blog-details.php-3.html?id=49">High raw material cost to drive up NCR realty prices by 20%</a></li>
              <li><a href="blog-details.php-4.html?id=52">PM Narendra Modi likely to lay foundation stone of Jewar Airport next month</a></li>
            </ul>
          </div>

          <div class="widget widget-text" style="background-size: cover;">
            <h4>About Us</h4>
            <div class="small-border" style="background-size: cover;"></div>
            <p>
              One of the fastest growing companies in India, Ample Infra Reality offers comprehensive real estate solutions. We are defined by trust and excellence with a commitment to customer satisfaction and technology.
            </p>
          </div>

        </div>
      </div>
    </div>
  </div>




  <section id="section-testimonial" class="text-light">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
          <h2> <span class="varColor"> Customer </span>Says</h2>
          <div class="separator"><span><i class="fa fa-circle"></i></span></div>
          <div class="spacer-single"></div>
        </div>
      </div>
      <div id="testimonial-carousel" class="owl-carousel owl-theme de_carousel wow fadeInUp" data-wow-delay=".3s">
        <?php

        $sql = "SELECT * FROM testimonials";
        $result = $conn->query($sql);

        // Check if testimonials exist
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $description = $row['description'];
        ?>

            <div class="item">
              <div class="de_testi">
                <blockquote>
                  <?php echo $description  ?>
                  <div class="de_testi_by"><?= $title  ?></div>
                </blockquote>
              </div>
            </div>


        <?php
          }
        } else {
          echo "<p>No testimonials found!</p>";
        }
        ?>
        

      </div>
    </div>
  </section>
</div>


<section id="" class="text-light latest-property">
  <div class="container">
    <div class="row">
      <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
        <h2> <span class="varColor"> Builder</span> Partner </h2>
        <div class="separator"><span><i class="fa fa-circle"></i></span></div>
        <div class="spacer-single"></div>
      </div>
    </div>
    <div id="propertyNew" class="owl-carousel owl-theme de_carousel wow fadeInUp" data-wow-delay=".3s">
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-2024-12-09-12-13-59.png" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-2024-09-02-12-20-39.png" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-2024-09-02-12-04-24.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-2024-09-02-11-53-44.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-2024-09-02-11-13-38.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-2023-10-23-07-36-39.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-2023-10-23-07-06-44.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-1698992093.png" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-2023-10-07-09-09-56.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-1696829525.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-1696829208.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-1696664742.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-1696664344.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-1694774623.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-1696664059.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-1696663711.jpg" alt="central park">
        </div>
      </div>
      <div class="item">
        <div class="de_testi">
          <img class="img-fluid propertyLogo mx-auto d-block" src="admin/uploads/developer/developer-logo-1694772291.jpg" alt="central park">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- footer close -->
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
    "vProject": "Ample Infra Reality",
    "vURL": BASE_URL,
    "thankspageurl": "",
  };
</script>


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