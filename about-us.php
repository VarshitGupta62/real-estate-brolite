<?php
include("inc/header.php");
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

                <h2>About Us</h2>
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
  <section id="section-no-bg" class="text-light" data-bgcolor="#6f798a">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <img src="assets/images/misc/pic_12.jpg" alt="" class="img-responsive wow fadeInUp" data-wow-duration="1.5s">
        </div>

        <div class="col-md-6 wow fadeInUp">
          <?php

          // Fetch the About Us content from the database
          $sql = "SELECT * FROM about WHERE id = 1";
          $result = $conn->query($sql);

          // Check if the record exists
          if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Display the dynamic content
            echo '<h2>' . htmlspecialchars($row['name']) . '</h2>';
            echo '<p>' . $row['description'] . '</p>';
          } else {
            echo "<p>No About Us information found.</p>";
          }


          ?>
        </div>


        <div class="clearfix"></div>
      </div>
    </div>
  </section>
  <!-- section close -->

  <!-- team section -->

  <section class="team_section" data-bgcolor="#18191b">
    <div class="container">
      <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
        <h5 class="s2">Discover</h5>
        <h1>Our Team</h1>
        <div class="separator"><span><i class="fa fa-square"></i></span></div>
        <div class="spacer-single"></div>
      </div>

      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">
          <div class="single_team">
            <div class="thumbnail">
              <img src="assets/images/new/director.jpeg" alt="team image" class="img-responsive wow fadeInUp" data-wow-duration="1s">
            </div>
            <div class="content">
              <h4 class="name">Mr. Deepak Khurana</h4>
              <!-- <small>Lawyer and CS by profession</small> -->
              <p class="description">Mr. Deepak Khurana, the founder of Ample Infra Reality in 2017, is indeed a person of great virtue. Holding a profound 11 years of experience in the real estate industry</p>
              <button class="btn read_more_btn">Read More</button>
            </div>

            <div class="popup">
              <p>Mr. Deepak Khurana, the founder of Ample Infra Reality in 2017, is indeed a person of great virtue. Holding a profound 11 years of experience in the real estate industry, Lawyer and CS by profession. He has proved his mettle in the field by bringing changes into the approach towards real estate marketing. Mr. Mudit possesses a brilliant skill set in maintaining existing real estate businesses and creating opportunities to churn new businesses from new customers. He has always believed in going to the depth of customer requirements and coming up with most creative and high-end solutions to meet their specifications. Providing feasible and subtle solutions has been one of his motives since he has stepped into this field. He conceptualizes plans and implements effective processes to drive business growth.</p>
            </div>

          </div>
        </div>
        <div class="col-md-3"></div>


        <!-- <div class="col-md-4">
                            <div class="single_team">
                                <div class="thumbnail">
                                    <img src="assets/images/team/sumit.jpg" alt="team image" class="img-responsive wow fadeInUp" data-wow-duration="1.2s">
                                </div>
                                <div class="content">
                                    <h4 class="name">Mr. Sumit Goyal</h4>
                                    <small>Director (Sales & Marketing)</small>
                                    <p class="description">As a Director, Sales & Marketing with 8 years of enrich experience, Sumit Goyal provides excellent customer service to the  Ample Infra Reality 's clients. He is also responsible for preserving and augmenting the value of the properties within his portfolio.</p>
                                    <button class="btn read_more_btn">Read More</button>
                                </div>
                                
                                <div class="popup">
                                    <p>As a Director, Sales & Marketing with 8 years of enrich experience, Sumit Goyal provides excellent customer service to the  Ample Infra Reality 's clients. He is also responsible for preserving and augmenting the value of the properties within his portfolio. Sumit Goyal is holding master's degree in MBA (Sales & International Marketing) from Amity Business School Noida, having vast experience in the real estate market. Sumit's expertise in dealing with luxury residential properties & promising commercial investments. In addition, customer engagements and expanding the business to cover new geographies, he is responsible for strategy of customer service where is focusing on shaping company's Sales and International Marketing.</p>
                                    <p>As a result, he brings a unique perspective to ensuring that our service is of high quality, resilient, and future proofed. Sumit is passionately committed to ensuring that our customers get maximum return from their investment.As a result, he brings a unique perspective to ensuring that our service is of high quality, resilient, and future proofed. Sumit is passionately committed to ensuring that our customers get maximum return from their investment.</p>
                                </div>

                            </div>
                        </div> -->

        <!-- <div class="col-md-4">
                            <div class="single_team">
                                <div class="thumbnail">
                                    <img src="assets/images/team/deepak.jpg" alt="team image" class="img-responsive wow fadeInUp" data-wow-duration="1.4s">
                                </div>
                                <div class="content">
                                    <h4 class="name">Mr. Deepak Sharma</h4>
                                    <small>Director of Marketing</small>
                                    <p class="description">Deepak Sharma joined the  Ample Infra Reality  in 2019. He is responsible for the continued growth of the company through his business development and marketing efforts.</p>
                                    <button class="btn read_more_btn">Read More</button>
                                </div>
                                
                                <div class="popup">
                                    <p>Deepak Sharma joined the  Ample Infra Reality  in 2019. He is responsible for the continued growth of the company through his business development and marketing efforts.</p>
                                    <p>As Director of Marketing and Business Development, Deepak Sharma is the first point of contact for most prospective clients. In his initial meetings he learns about the unique needs and concerns of the clients and prepares a customized proposal for them. He also manages the transition process for new associations coming on board to ensure that it goes smoothly.</p>
                                    <p>Deepak Sharma holds an Msc in physical science from University of Delhi, and has 4 years of experience in the real estate market. Experienced Sales Specialist with a demonstrated history of working in the internet industry.</p>
                                </div>

                            </div>
                        </div> -->

        <!-- <div class="col-md-4">
                                <div class="single_team">
                                    <div class="thumbnail">
                                        <img src="https://www.propertyfinder.org.in/assets/images/team/ankita-thakur.jpg" alt="team image" class="img-responsive wow fadeInUp" data-wow-duration="1.4s">
                                    </div>
                                    <div class="content">
                                        <h4 class="name">Ms.Ankita Thakur</h4>
                                        <small>President Sales</small>
                                        <p class="description">Ankita Thakur has been associated with  Ample Infra Reality  since 2020. She believes that her ability to handle criticism and willingness to learn are the prime reason for her success in a field that is often short of women.</p>
                                        <button class="btn read_more_btn">Read More</button>
                                    </div>
                                    
                                    <div class="popup">
                                        <p>Ankita Thakur has been associated with  Ample Infra Reality  since 2020. She believes that her ability to handle criticism and willingness to learn are the prime reason for her success in a field that is often short of women.</p>
                                        <p>She shoulders the responsibility of offering a common platform for developers and home seekers.</p>
                                        <p>Her Mantra : If you are confident, committed & focused,there is absolutely nothing that can obstruct your path to success .</p>
                                    </div>

                                </div>
                            </div> -->


      </div>
    </div>
  </section>


  <!-- <section id="section-why-choose-us-2" data-bgcolor="#18191b">

                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
                            <h5 class="s2">Discover</h5>
                            <h1>Why  Ample Infra Reality ?</h1>
                            <div class="separator"><span><i class="fa fa-square"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>

                        <div class="clearfix"></div>

                        <div class="col-md-3 wow fadeInUp" data-wow-delay="0s">
                            <img src="https://www.propertyfinder.org.in/assets/images/misc/cwr_1.jpg" class="img-responsive" alt="">

                            <div class="text padding30 about1" data-bgcolor="rgb(70, 73, 77)">
                                <h3>Dedicated Customer Care Number.</h3>
                                <p> Ample Infra Reality  provide a 24/7 running helpline number which is backed with professionals. We bring in a customer care team who will guide you through every step patiently to get the appropriate solutions you looking.</p>
                            </div>
                        </div>

                        <div class="col-md-3 wow fadeInUp" data-wow-delay=".3s">
                            <div class="text padding30 about1" data-bgcolor="rgb(70, 73, 77)">
                                <h3>Associated with Professional Builders</h3>
                                <p> Ample Infra Reality  is a name connected to a network of 20+ professional Pan India builders which helps their customers to get the best property available in the real estate market.</p>
                            </div>

                            <img src="https://www.propertyfinder.org.in/assets/images/misc/cwr_2.jpg" class="img-responsive" alt="">
                        </div>

                        <div class="col-md-3 wow fadeInUp" data-wow-delay=".6s">
                            <img src="https://www.propertyfinder.org.in/assets/images/misc/cwr_3.jpg" class="img-responsive" alt="">

                            <div class="text padding30 about1" data-bgcolor="rgb(70, 73, 77)">
                                <h3>Served Lakhs of Happy customers</h3>
                                <p> Ample Infra Reality  consist of dedicated and enthusiastic professionals in the business who have researched the market thoroughly. Their experience in the field leaves no loophole when it comes to providing the best property.</p>
                            </div>
                        </div>

                        <div class="col-md-3 wow fadeInUp" data-wow-delay=".9s">
                            <div class="text padding30 about1" data-bgcolor="rgb(70, 73, 77)">
                                <h3>Systematic Process</h3>
                                <p> Ample Infra Reality  in house some of the best professional in the market who have built-in a systematic process which has made the whole purchasing a property process easy and quick.</p>
                            </div>

                            <img src="https://www.propertyfinder.org.in/assets/images/misc/cwr_4.jpg" class="img-responsive" alt="">
                        </div>

                    </div>

                </div>

            </section> -->

  <!-- <section id="section-services" class="text-light" data-bgcolor="#464d58">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 text-center text-light wow fadeInUp">
                            <h5 class="s2">Present You</h5>
                            <h1>Our Prime Focus</h1>
                            <div class="separator"><span><i class="fa fa-square"></i></span></div>
                            <div class="spacer-single"></div>
                        </div>

                        <div class="col-md-4 wow fadeInUp" data-wow-delay="0s">
                            <div class="box-icon">
                                <span class="icon wow fadeIn" data-wow-delay=".5s"><i class="id-color icon-chat"></i></span>
                                <div class="text">
                                    <h3>Quality Service</h3>
                                    <p> Ample Infra Reality  endeavor to provides the best quality service for its customers to make maximum profits.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 wow fadeInUp" data-wow-delay=".25s">
                            <div class="box-icon">
                                <span class="icon wow fadeIn" data-wow-delay=".75s"><i class="id-color icon-pencil"></i></span>
                                <div class="text">
                                    <h3>Research &amp; Learning</h3>
                                    <p>A team with a good understanding of the real estate market keeps on learning new trends &amp; innovations in the field.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 wow fadeInUp" data-wow-delay=".5s">
                            <div class="box-icon">
                                <span class="icon wow fadeIn" data-wow-delay="1s"><i class="id-color icon-layers"></i></span>
                                <div class="text">
                                    <h3>Customer Satisfaction</h3>
                                    <p>Our ultimate goal is to keep our customers happy by providing the best property in their budget.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section> -->




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
<!-- footer begin -->

<!-- footer close -->
</div>

<div class="modal fade" id="view_team" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modal_name">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="view_team_description">

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