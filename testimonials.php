<?php
include("inc/header.php");
?>

<style>
  p{
    color: black ;
  }
</style>
<!-- content begin -->
<div id="content" class="no-bottom no-top">

  <!-- revolution slider begin -->
  <section class="banner-sec">
    <div class="banner-img">
      <div class="overlay"></div>
      <img class="img-fluid" src="assets/images/career.jpg">
      <div class="banner-content inter-banner-content">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="banner-text inter-banner-text">

                <h2>Testimonials</h2>
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
  <section style="background-color: rgb(70, 77, 88); background-size: cover;" class="testimonial_section">
    <div class="container">
      <h5 class="s2 text-center">Client Testimonials</h5>
      <h1>Customer Says</h1>
      <div class="separator">
        <span>
          <i class="fa fa-square"></i>
        </span>
      </div>

      <div class="row">
        <?php

        $sql = "SELECT * FROM testimonials";
        $result = $conn->query($sql);

        // Check if testimonials exist
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $title = $row['title'];
            $description = $row['description'];
        ?>

            <!-- Dynamic Testimonial Box -->
            <div class="col-md-6 testimonial_box">
              <div class="box">
                <div class="left">
                  <img src="assets/images/icon/quote.png" alt="quote " class="quote_icon">
                </div>
                <div class="right">
                    <p><?= $description ?></p>
                  <p class="name"><?= $title ?></p>
                </div>
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
</div>
<?php

include("inc/footer.php");

?>