<?php
include("inc/header.php");
?>
<!-- header close -->

<!-- content begin -->
<div id="content" class="no-bottom no-top">

  <!-- revolution slider begin -->

  <div id="homeSlider" class="carousel slide" data-ride="carousel">

    <!-- Indicators -->
    <!-- <ul class="carousel-indicators">
          <li data-target="#homeSlider" data-slide-to="0" class="active"></li>
          <li data-target="#homeSlider" data-slide-to="1" class=""></li>
          <li data-target="#homeSlider" data-slide-to="2" class=""></li>
        </ul> -->

    <!-- The slideshow -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <video autoplay="" muted="" loop="">
          <source src="assets/images/slider/banner-video.mp4" type="video/mp4">
        </video>
        <!-- <img src="https://www.propertyfinder.org.in/assets/images/slider/wide1.jpg" alt="Residential Properties in Gurgaon"> -->
      </div>
      <!-- <div class="carousel-item"> <img src="https://www.propertyfinder.org.in/assets/images/slider/wide2.jpg" alt="Luxury Property in Gurgaon"> </div>
          <div class="carousel-item"> <img src="https://www.propertyfinder.org.in/assets/images/slider/wide3.jpg" alt="Properties in Gurgaon"> </div> -->
    </div>
    <div class="sliderText">
      <div class="tp-caption big-white sft"> It's Easy Now Search Your Properties With</div>
      <div class="tp-caption ultra-big-white customin customout start"> Ample Infra Reality </div>
      <div class="tp-caption sfb" data-x="0"> <a href="#section-portfolio" class="btn-slider">Our Properties </a></div>
      <div class="search-form mt_60 mt_sm_40">




        <form class="form-inline search_form" id="bannerform">
          <div class="form-group d-none d-md-block">
            <select class="form-control city_select" id="citylist">
              <option selected="" value="all-city">Select City</option>
              <option value="gurgaon">Gurgaon</option>
              <option value="noida">Noida</option>
            </select>
          </div>

          <div class="form-group d-none d-md-block">
            <select class="form-control property_select" id="property_cat">
              <option selected="" value="all-category">Select Property Type</option>
              <option value="residential">Residential</option>
              <option value="commercial">Commercial</option>
            </select>
          </div>

          <div class="form-group projects">
            <div class="search_inputs">
              <select class="form-control" id="projectlist">
                <option value="">-- Select Projects --</option>
              </select>
            </div>
          </div>

          <div class="button-group">
            <button type="submit" class="btn search_btn">
              <img src="assets/images/icon/search.svg" alt="search icon" class="icon search_icon">
              <span class="d-none d-md-block">Search</span>
            </button>
          </div>
        </form>
      </div>
    </div>

    <!-- Left and right controls -->
    <!-- <a class="carousel-control-prev" href="#homeSlider" data-slide="prev"> <span class="carousel-control-prev-icon"></span> </a>
                <a class="carousel-control-next" href="#homeSlider" data-slide="next"> <span class="carousel-control-next-icon"></span> </a> -->
  </div>
  <!-- revolution slider close -->

  <!-- section begin -->
  <section id="section-about">
    <div class="container">
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
          <h1> <span class="varColor">What </span>We Are Doing</h1>
          <div class="separator"><span><i class="fa fa-circle"></i></span></div>
          <div class="spacer-single"></div>
        </div>
        <div class="col-md-4 wow fadeInLeft service_card">
          <h3><span class="id-color">Legal Services</span></h3>
          <div class="content">
            <p>Our Ample Infra Reality is your key to realizing the dream of owning your ideal home through our comprehensive home loan services. Nationwide, the .... </p>
          </div>
          <a class="home-services-align" href="detail-services.php.html?sid=Legal-Services">
            <img class="img-responsive" src="assets/images/new/1.png" alt="Legal Services">
          </a>
        </div>
        <div class="col-md-4 wow fadeInLeft service_card">
          <h3><span class="id-color">Lease Property</span></h3>
          <div class="content">
            <p>Leasing a property offers a flexible and practical solution for individuals and families in search of their dream home. Whether you&#39;re a fi.... </p>
          </div>
          <a class="home-services-align" href="detail-services.php-1.html?sid=Lease-Property">
            <img class="img-responsive" src="assets/images/new/2.png" alt="Lease Property">
          </a>
        </div>
        <div class="col-md-4 wow fadeInLeft service_card">
          <h3><span class="id-color">Buy Property</span></h3>
          <div class="content">
            <p> Ample Infra Reality goes beyond merely assisting you in property acquisition; we extend our commitment to our customers through comprehensive after.... </p>
          </div>
          <a class="home-services-align" href="detail-services.php-2.html?sid=Buy-Property">
            <img class="img-responsive" src="assets/images/new/3.png" alt="Buy Property">
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- section close -->

  <!-- section begin -->
  <section id="section-portfolio" class="no-top no-bottom properties" aria-label="section-portfolio">
    <div class="container-fluid">
      <div class="spacer-single"></div>
      <div class="row">
        <div class="col-md-6 offset-md-3 text-center wow fadeInUp">
          <h2> <span class="varColor">TOP </span> PROPERTIES</h2>
          <div class="separator"><span><i class="fa fa-circle"></i></span></div>
          <div class="spacer-single"></div>
        </div>
      </div>
      <div>
        <nav>
          <div class="nav nav-tabs border-bottom-0 justify-content-center" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#Residentisldatatb" role="tab" aria-controls="nav-profile" aria-selected="false">Residential</a> <a class="nav-item nav-link " id="nav-contact-tab" data-toggle="tab" href="#commercialdatatb" role="tab" aria-controls="nav-contact" aria-selected="false">Commercial</a>



          </div>
        </nav>

        <div class="tab-pane fade  show active" id="Residentisldatatb" role="tabpanel" aria-labelledby="nav-profile-tab">
          <div id="" class="row changeNew gallery" data-wow-delay=".3s">
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/ambience-tiverton.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">
                        Ambience Tiverton
                      </span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-11-11-24-35.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-27-06.jpg" alt="Ambience Tiverton" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Ambience Tiverton</h3>
                <h4><i class="fa fa-inr"></i>4 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector - 50, Noida</p>

                <span> <a href="residential/ambience-tiverton.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/parx-laureate.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Parx Laureate</span>
                    </span>
                  </span>
                </a>

                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-12-07-16-50.png" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-28-30.jpg" alt="Parx Laureate" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Parx Laureate</h3>
                <h4><i class="fa fa-inr"></i>6.5 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector-108, Noida</p>

                <span> <a href="residential/parx-laureate.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/county-107.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">County 107</span>
                    </span>
                  </span>
                </a>



                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-12-10-45-37.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-31-11.jpg" alt="County 107" class="img-fluid propertyLogo mx-auto d-block">

                <h3>County 107</h3>
                <h4><i class="fa fa-inr"></i>7.7 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>SECTOR 107, NOIDA</p>

                <span> <a href="residential/county-107.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/kalpataru-vista.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Kalpataru Vista</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-09-13-10-33-45.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-31-31.jpg" alt="Kalpataru Vista" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Kalpataru Vista</h3>
                <h4><i class="fa fa-inr"></i>6 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector - 128, Wish Toen, Noida</p>

                <span> <a href="residential/kalpataru-vista.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/max-estates.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Max Estates</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-13-11-16-19.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-31-44.jpg" alt="Max Estates" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Max Estates</h3>
                <h4><i class="fa fa-inr"></i>10 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>SECTOR 128, NOIDA</p>

                <span> <a href="residential/max-estates.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/gulshan-dynasty.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Gulshan Dynasty</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-13-11-41-03.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-31-54.jpg" alt="Gulshan Dynasty" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Gulshan Dynasty</h3>
                <h4><i class="fa fa-inr"></i>9.5 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 144, Noida</p>

                <span> <a href="residential/gulshan-dynasty.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/gulshan-avante.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Gulshan Avante</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-13-12-06-09.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-32-05.jpg" alt="Gulshan Avante" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Gulshan Avante</h3>
                <h4><i class="fa fa-inr"></i>4 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Noida Extension</p>

                <span> <a href="residential/gulshan-avante.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/crc-joyous.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">CRC Joyous</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-10-05-10-53-49.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-32-42.jpg" alt="CRC Joyous" class="img-fluid propertyLogo mx-auto d-block">

                <h3>CRC Joyous</h3>
                <h4><i class="fa fa-inr"></i>75 Lakh* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Greater Noida West</p>

                <span> <a href="residential/crc-joyous.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/godrej-woods.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Godrej Woods</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-09-26-08-46-41.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-33-06.jpg" alt="Godrej Woods" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Godrej Woods</h3>
                <h4><i class="fa fa-inr"></i>2 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 43, Noida </p>

                <span> <a href="residential/godrej-woods.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <span class="overlay">
                  <span class="pf_text">
                    <span class="project-name">Godrej Tropical Isle</span>
                  </span>
                </span>


                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-10-05-10-43-34.png" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-33-55.jpg" alt="Godrej Tropical Isle" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Godrej Tropical Isle</h3>
                <h4><i class="fa fa-inr"></i>2.97 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 146, Noida</p>

                <span> <a href="residential/godrej-tropical-isle.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/m3m-the-cullinan.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">M3M The Cullinan</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-10-05-10-54-20.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-34-12.jpg" alt="M3M The Cullinan" class="img-fluid propertyLogo mx-auto d-block">

                <h3>M3M The Cullinan</h3>
                <h4><i class="fa fa-inr"></i>8 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 94, Noida </p>

                <span> <a href="residential/m3m-the-cullinan.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/mahagun-madelleo.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Mahagun Madelleo</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-26-07-46-43.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-34-39.jpg" alt="Mahagun Madelleo" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Mahagun Madelleo</h3>
                <h4><i class="fa fa-inr"></i>4.12 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 107</p>

                <span> <a href="residential/mahagun-madelleo.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/mahagun-manorialle.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Mahagun Manorialle</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-10-05-10-42-15.png" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-35-01.jpg" alt="Mahagun Manorialle" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Mahagun Manorialle</h3>
                <h4><i class="fa fa-inr"></i>4.63 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector128, Noida</p>

                <span> <a href="residential/mahagun-manorialle.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <span class="overlay">
                  <span class="pf_text">
                    <span class="project-name">L&T Realty</span>
                  </span>
                </span>


                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-10-05-09-44-44.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-35-14.jpg" alt="L&T Realty" class="img-fluid propertyLogo mx-auto d-block">

                <h3>L&T Realty</h3>
                <h4><i class="fa fa-inr"></i>On Request </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 128, Noida</p>

                <span class="coming-soon"> Coming Soon</span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/ivory-county.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Ivory County</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-10-05-09-43-39.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-35-34.jpg" alt="Ivory County" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Ivory County</h3>
                <h4><i class="fa fa-inr"></i>2.94 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i> Sector 115 Noida</p>

                <span> <a href="residential/ivory-county.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/goa-aero-cidade.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Goa Aero Cidade</span>
                    </span>
                  </span>

                </a>

                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-09-30-11-18-49.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-36-40.png" alt="Goa Aero Cidade" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Goa Aero Cidade</h3>
                <h4><i class="fa fa-inr"></i> 75 Lacs* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Coastal Paradise</p>

                <span> <a href="residential/goa-aero-cidade.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <a href="residential/jewar-residency.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Jewar Residency</span>
                    </span>
                  </span>
                </a>


                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-10-23-08-02-09.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-23-08-02-09.jpg" alt="Jewar Residency" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Jewar Residency</h3>
                <h4><i class="fa fa-inr"></i>On Request </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Jewar, Noida</p>

                <span> <a href="residential/jewar-residency.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">


                <span class="overlay">
                  <span class="pf_text">
                    <span class="project-name">Prestige Sidharth VIhar NH 24</span>
                  </span>
                </span>



                <img src="admin/uploads/microsite/feature-image/feature-image-2024-09-02-11-38-45.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/project-logo-2024-09-02-11-38-45.jpg" alt="Prestige Sidharth VIhar NH 24" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Prestige Sidharth VIhar NH 24</h3>
                <h4><i class="fa fa-inr"></i>1.64 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>NH 24, Ghaziabad</p>

                <span class="coming-soon"> Coming Soon</span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <span class="overlay">
                  <span class="pf_text">
                    <span class="project-name">Birla Sector 150</span>
                  </span>
                </span>


                <img src="admin/uploads/microsite/feature-image/feature-image-2024-09-02-11-59-08.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/project-logo-2024-09-02-11-59-08.jpg" alt="Birla Sector 150" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Birla Sector 150</h3>
                <h4><i class="fa fa-inr"></i>On Request </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 150, Noida</p>

                <span class="coming-soon"> Coming Soon</span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <span class="overlay">
                  <span class="pf_text">
                    <span class="project-name">Ace Plots Sector 22 D</span>
                  </span>
                </span>


                <img src="admin/uploads/microsite/feature-image/feature-image-2024-09-02-12-08-00.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/project-logo-2024-09-02-12-08-00.jpg" alt="Ace Plots Sector 22 D" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Ace Plots Sector 22 D</h3>
                <h4><i class="fa fa-inr"></i>1.72 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 22 D, Yamuna Expressway, Greater Noida</p>




              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <span class="overlay">
                  <span class="pf_text">
                    <span class="project-name">Ace Sector 12 Extension</span>
                  </span>
                </span>


                <img src="admin/uploads/microsite/feature-image/feature-image-2024-09-02-12-14-40.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/project-logo-2024-09-02-12-14-40.jpg" alt="Ace Sector 12 Extension" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Ace Sector 12 Extension</h3>
                <h4><i class="fa fa-inr"></i>2.31 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 12, Noida Extension</p>




              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <span class="overlay">
                  <span class="pf_text">
                    <span class="project-name">Experion Elements</span>
                  </span>
                </span>


                <img src="admin/uploads/microsite/feature-image/feature-image-2024-09-02-12-28-07.jpg" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/project-logo-2024-09-02-12-28-07.png" alt="Experion Elements" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Experion Elements</h3>
                <h4><i class="fa fa-inr"></i>5.27 Cr* </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 45, Noida</p>

                <span> <a href="residential/experion-elements.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">

                <span class="overlay">
                  <span class="pf_text">
                    <span class="project-name">Legacy by Gaurs</span>
                  </span>
                </span>


                <img src="admin/uploads/microsite/feature-image/feature-image-2024-12-09-12-20-48.png" alt="">

              </div>
              <div class="properties-detail">

                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2024-12-09-12-25-24.jpg" alt="Legacy by Gaurs" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Legacy by Gaurs</h3>
                <h4><i class="fa fa-inr"></i>5.42 Cr </h4>
                <h5>
                  Residential
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Near Pari Chowk, Greater Noida</p>

                <span> <a href="residential/legacy-by-gaurs.html" target="_blank">Know More</a></span>


              </div>
            </div>
          </div>
        </div>
        <div class="tab-pane fade " id="commercialdatatb" role="tabpanel" aria-labelledby="nav-contact-tab">
          <div id="" class="row changeNew gallery" data-wow-delay=".3s">
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">
                <a href="commercial/m3m-the-cullinan.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">M3M The Cullinan</span>
                    </span>
                  </span>
                </a>



                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-09-12-12-12-24.jpg" alt="">

              </div>
              <div class="properties-detail">
                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-37-47.jpg" alt="M3M The Cullinan" class="img-fluid propertyLogo mx-auto d-block">

                <h3>M3M The Cullinan</h3>
                <h4><i class="fa fa-inr"></i>5.92 Cr* </h4>
                <h5>
                  Commercial
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector-94, Noida</p>

                <span> <a href="commercial/m3m-the-cullinan.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">
                <a href="commercial/CRC-The-Flagshipfw1695644446.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">CRC The Flagship</span>
                    </span>
                  </span>
                </a>



                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-09-25-12-26-25.jpg" alt="">

              </div>
              <div class="properties-detail">
                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-38-07.jpg" alt="CRC The Flagship" class="img-fluid propertyLogo mx-auto d-block">

                <h3>CRC The Flagship</h3>
                <h4><i class="fa fa-inr"></i>60 Lacs* </h4>
                <h5>
                  Commercial
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 140A Noida</p>

                <span> <a href="commercial/CRC-The-Flagshipfw1695644446.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">
                <a href="commercial/Bhutani-Avenue-62uO1695705462.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Bhutani Avenue 62</span>
                    </span>
                  </span>
                </a>



                <img src="admin/uploads/microsite/feature-image/microsite-projects-feature-image-2023-09-26-05-35-52.jpg" alt="">

              </div>
              <div class="properties-detail">
                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-39-08.jpg" alt="Bhutani Avenue 62" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Bhutani Avenue 62</h3>
                <h4><i class="fa fa-inr"></i>1.35 Cr* </h4>
                <h5>
                  Commercial
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 62, Noida</p>

                <span> <a href="commercial/Bhutani-Avenue-62uO1695705462.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">
                <a href="commercial/bhutani-techno-park.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Bhutani Techno Park</span>
                    </span>
                  </span>
                </a>



                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-26-06-43-02.jpg" alt="">

              </div>
              <div class="properties-detail">
                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-39-25.jpg" alt="Bhutani Techno Park" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Bhutani Techno Park</h3>
                <h4><i class="fa fa-inr"></i>23.97 Lacs* </h4>
                <h5>
                  Commercial
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 127, Noida </p>

                <span> <a href="commercial/bhutani-techno-park.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">
                <a href="commercial/gulshan-129.html">
                  <span class="overlay"
                    <span class="pf_text">
                    <span class="project-name">Gulshan 129</span>
                  </span>
                  </span>
                </a>



                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-26-07-12-22.jpg" alt="">

              </div>
              <div class="properties-detail">
                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-39-42.jpg" alt="Gulshan 129" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Gulshan 129</h3>
                <h4><i class="fa fa-inr"></i>3 Cr* </h4>
                <h5>
                  Commercial
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>SECTOR 128, NOIDA</p>

                <span> <a href="commercial/gulshan-129.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">
                <a href="commercial/supertech-supernova.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">Supertech Supernova</span>
                    </span>
                  </span>
                </a>



                <img src="admin/uploads/microsite/feature-image/feature-image-2023-09-26-10-09-04.jpg" alt="">

              </div>
              <div class="properties-detail">
                <img src="admin/uploads/microsite/projectlogo/microsite-projects-feature-image-2023-10-04-11-39-59.jpg" alt="Supertech Supernova" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Supertech Supernova</h3>
                <h4><i class="fa fa-inr"></i>On Request* </h4>
                <h5>
                  Commercial
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 94, Noida</p>

                <span> <a href="commercial/supertech-supernova.html" target="_blank">Know More</a></span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">
                <!-- <a href="commercial/Bhutani-Avenue-62uO1695705462.html"> -->
                <span class="overlay">
                  <span class="pf_text">
                    <span class="project-name">Bhutani 133</span>
                  </span>
                </span>
                <!-- </a> -->



                <img src="admin/uploads/microsite/feature-image/feature-image-2023-10-18-11-57-43.jpg" alt="">

              </div>
              <div class="properties-detail">
                <img src="admin/uploads/microsite/projectlogo/project-logo-2023-10-18-11-57-43.jpg" alt="Bhutani 133" class="img-fluid propertyLogo mx-auto d-block">

                <h3>Bhutani 133</h3>
                <h4><i class="fa fa-inr"></i>On Request* </h4>
                <h5>
                  Commercial
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Noida 133</p>

                <span class="coming-soon"> Coming Soon</span>


              </div>
            </div>
            <div class="col-md-3 col-sm-6 item">
              <div class="picframe properties-inner">
                <a href="residential/m3m-the-cullinan.html">
                  <span class="overlay">
                    <span class="pf_text">
                      <span class="project-name">M3M 72</span>
                    </span>
                  </span>
                </a>



                <img src="admin/uploads/microsite/feature-image/feature-image-2023-10-20-12-15-00.jpg" alt="">

              </div>
              <div class="properties-detail">
                <img src="admin/uploads/microsite/projectlogo/project-logo-2023-10-20-12-15-00.jpg" alt="M3M 72" class="img-fluid propertyLogo mx-auto d-block">

                <h3>M3M 72</h3>
                <h4><i class="fa fa-inr"></i>On Request* </h4>
                <h5>
                  Commercial
                </h5>

                <p class="property-location"><i class="fa fa-map-marker"></i>Sector 72 </p>

                <span class="coming-soon"> Coming Soon</span>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>


<!-- add testimonials -->

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

<!-- add partner/builder section-->


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