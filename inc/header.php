<?php

include("admin/config.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1">
  <link rel="canonical" href="index.htm">
  <?php
  // Query to fetch data
  $query = "SELECT  * FROM settings where setting_key = 'favicon'";
  $result = mysqli_query($conn, $query) or die('Query Failed: ' . mysqli_error($conn));

  if (mysqli_num_rows($result) > 0) {
    // Output data of each row
    while ($row = mysqli_fetch_assoc($result)) {
      echo "
                        <link rel='shortcut icon' href='admin/uploads/$row[setting_value]'>
                        ";
    }
  } else {
    echo "Image not found.";
  } ?>
  <link rel="stylesheet" href="assets/css/bootstrap.css" type="text/css">
  <link rel="stylesheet" href="assets/css/jpreloader.css" type="text/css">
  <link rel="stylesheet" href="assets/css/animate.css" type="text/css">
  <link rel="stylesheet" href="assets/css/plugin.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.carousel.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.theme.css" type="text/css">
  <link rel="stylesheet" href="assets/css/owl.transitions.css" type="text/css">
  <link rel="stylesheet" href="assets/css/magnific-popup.css" type="text/css">
  <link rel="stylesheet" href="assets/rs-plugin/css/settings.css" type="text/css">
  <link rel="stylesheet" href="assets/css/bg.css" type="text/css">
  <link rel="stylesheet" href="assets/css/colors/yellow.css" type="text/css" id="colors">
  <link rel="stylesheet" href="assets/css/color.css" type="text/css">
  <link rel="stylesheet" href="assets/fonts/font-awesome/css/font-awesome.css" type="text/css">
  <link rel="stylesheet" href="assets/fonts/elegant_font/HTML_CSS/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/select2.min.css" type="text/css">
  <link rel="stylesheet" href="assets/fonts/et-line-font/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/rev-settings.css" type="text/css">
  <link rel="stylesheet" href="assets/css/lightbox.css">
  <link rel="stylesheet" href="assets/css/style.css" type="text/css">
  <link rel="stylesheet" href="assets/css/style2.css" type="text/css">
  <title>Ample Infra Reality</title>
  <meta name="description" content="One of the fastest growing companies in India,  Ample Infra Reality  offers comprehensive real estate solutions. We are defined by trust and excellence with a commitment to customer satisfaction and technology.">
  <meta name="keywords" content=" Ample Infra Reality  Premimum Real Estate Projects of Noida"><!-- Global site tag (gtag.js) - Google Analytics -->
  <script async="" src="gtag/js?id=UA-176295333-1"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'UA-176295333-1');
  </script>
</head>

<body id="homepage">
  <div id="wrapper">

    <!-- header begin -->
    <header class="header-mobile">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <!-- logo begin -->
            <div id="logo"> <a href="index.php">
                <?php
                // Query to fetch data
                $query = "SELECT  * FROM settings where setting_key = 'logo'";
                $result = mysqli_query($conn, $query) or die('Query Failed: ' . mysqli_error($conn));

                if (mysqli_num_rows($result) > 0) {
                  // Output data of each row
                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <img class='logo' src='admin/uploads/$row[setting_value]' alt='Logo'> 
                        ";
                  }
                } else {
                  echo "Image not found.";
                } ?>
              </a> </div>
            <!-- logo close -->

            <!-- small button begin -->
            <span id="menu-btn"> &nbsp; MENU</span>
            <!-- small button close -->

            <!-- mainmenu begin -->
            <nav>
              <ul id="mainmenu">

                <li><a href="index.php">Home</a></li>
                <li><a href="about-us.php">About Us</a></li>
                <li><a href="service.php">Services</a></li>
                <li><a href="#">Listed Properties</a>
                  <ul>
                    <!-- <li><a href="https://www.propertyfinder.org.in/featured">Featured</a></li> -->
                    <li><a href="residential.php">Residential</a></li>
                    <li><a href="commercial.php">Commercial</a></li>

                  </ul>
                </li>
                <li><a href="award.php">Awards &amp; Recognition</a></li>
                <li><a href="career.php">Career</a></li>
                <li><a href="blog.php">Blog</a></li>
                <li><a href="contact.php">Contact</a></li>
              </ul>
            </nav>
            <!-- mainmenu close -->

          </div>
        </div>
      </div>
    </header>