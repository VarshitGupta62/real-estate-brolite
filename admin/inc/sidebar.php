<!-- Right Sidebar (Theme Settings) -->
<style>
    .sub-navbar-nav .sub-nav-item {
        padding-left: 20px;
        letter-spacing: 0.5px;
        /* Space between letters */
        word-spacing: 2px;
        /* Space between words */

    }

    .sub-sub-navbar-nav .sub-sub-nav-item {
        padding-left: 40px;
        letter-spacing: 0.5px;
        /* Space between letters */
        word-spacing: 2px;
        margin: 8px;
        /* Space between words */
    }

    .sub-sub-navbar-nav {
        font-size: 14px;
        /* Smaller font for sub-menus */
        letter-spacing: 0.5px;
        /* Space between letters */
        word-spacing: 2px;
        /* Space between words */
    }

    a {
        color: #5D7196;
        text-decoration: none;
    }

    a:hover {
        color: white;
    }
</style>

<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>



<div>
    <!-- ========== App Menu Start ========== -->
    <div class="main-nav">
        <!-- Sidebar Logo -->
        <div class="logo-box">
            <?php
            // Query to fetch data
            $query = "SELECT  * FROM settings where setting_key = 'logo'";
            $result = mysqli_query($conn, $query) or die('Query Failed: ' . mysqli_error($conn));

            if (mysqli_num_rows($result) > 0) {
                // Output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "
                        <a href='dashboard.php' class='logo-dark'>
                            <img src='uploads/$row[setting_value]' class='logo-sm' style='height: 130px; width:170px;' alt='logo sm'>
                            <img src='uploads/$row[setting_value]' class='logo-lg' style='height: 130px; width:170px;' alt='logo dark'>
                        </a>

                        <a href='dashboard.php' class='logo-light'>
                            <img src='uploads/$row[setting_value]' class='logo-sm' style='height: 130px; width:170px;' alt='logo sm'>
                            <img src='uploads/$row[setting_value]' class='logo-lg' style='height: 130px; width:170px;' alt='logo light'>
                        </a>
                        ";
                }
            } else {
                echo "Image not found.";
            } ?>

        </div>

        <div class="scrollbar" data-simplebar>
            <ul class="navbar-nav" id="navbar-nav">
                <br>

                <li class="nav-item">
                    <a class="nav-link" href="dashboard.php">
                        <span class="nav-icon">
                            <i class="fas fa-tachometer-alt"></i>
                        </span>
                        <span class="nav-text">Dashboard</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about-us.php">
                        <span class="nav-icon">
                            <i class="fas fa-info-circle"></i>
                        </span>
                        <span class="nav-text"> About Us </span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="services.php">
                        <span class="nav-icon">
                            <i class="fas fa-cogs"></i>
                        </span>
                        <span class="nav-text">Manage Services</span>
                    </a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" href="award_recognition.php">
                        <span class="nav-icon">
                            <i class="fas fa-globe"></i>
                        </span>
                        <span class="nav-text">Award and Recognition</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="contact.php">
                        <span class="nav-icon">
                            <iconify-icon icon="mdi:phone-outline"></iconify-icon>
                        </span>
                        <span class="nav-text">All Contact-Us</span>
                    </a>
                </li>




                <!-- <li class="nav-item">
                    <a class="nav-link" href="home.php">
                        <span class="nav-icon">
                            <i class="fas fa-home"></i>  
                        </span>
                        <span class="nav-text">Home</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="homeslider.php">
                        <span class="nav-icon">
                            <i class="fas fa-globe"></i> 
                        </span>
                        <span class="nav-text">Home Slider</span>
                    </a>
                </li>



                <li class="nav-item">
                    <a class="nav-link" href="mustread.php">
                        <span class="nav-icon">
                            <i class="fas fa-book"></i>  
                        </span>
                        <span class="nav-text">Must Read</span>
                    </a>
                </li>



              

                <li class="nav-item">
                    <a class="nav-link" href="how-it-works.php">
                        <span class="nav-icon">
                            <i class="fas fa-lightbulb"></i> 
                        </span>
                        <span class="nav-text">Manage How It Works?</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="investing-style.php">
                        <span class="nav-icon">
                            <i class="fas fa-chart-pie"></i> 
                        </span>
                        <span class="nav-text">Manage Investing Style</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="why-choose-midcaps.php">
                        <span class="nav-icon">
                            <i class="fas fa-handshake"></i> 
                        </span>
                        <span class="nav-text">Manage Why Choose Swing Samrat?</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="faqs.php">
                        <span class="nav-icon">
                            <i class="fas fa-question"></i> 
                        </span>
                        <span class="nav-text">Manage FAQ</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarProducts2" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts2">
                        <span class="nav-icon">
                            <i class="fas fa-gift"></i> 
                        </span>
                        <span class="nav-text"> Manage Subscription Page </span>
                    </a>
                    <div class="collapse" id="sidebarProducts2">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="subscriptionplan.php">Subscription Plan </a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="donotmiss.php">DON'T MISS !</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="extraadditon.php">Extra Addition</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarProducts3" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts3">
                        <span class="nav-icon">
                            <i class="fas fa-users"></i>  
                        </span>
                        <span class="nav-text"> Manage All Customer </span>
                    </a>
                    <div class="collapse" id="sidebarProducts3">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="userdashboardoffer.php">Manage Userdasboard Offers</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="dashboardnewsletter.php">Manage Userdasboard Newsletter</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="ebook.php">Manage Userdasboard e-Book</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="activecustomer.php"> All Active Customer </a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="inactivecustomer.php">All Inactive Customer</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="video.php">
                        <span class="nav-icon">
                            <i class="fas fa-video"></i>  
                        </span>
                        <span class="nav-text">Manage Video</span>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a class="nav-link menu-arrow" href="#sidebarProducts" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProducts">
                        <span class="nav-icon">
                            <i class="fas fa-layer-group"></i>
                        </span>
                        <span class="nav-text"> Other Section </span>
                    </a>
                    <div class="collapse" id="sidebarProducts">
                        <ul class="nav sub-navbar-nav">
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="disclaimer.php">Disclaimer</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="termsconditions.php">Terms & Conditions</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="privacypolicy.php">Privacy Policy</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="emailmessage.php">Email Message</a>
                            </li>
                            <li class="sub-nav-item">
                                <a class="sub-nav-link" href="footerimportantlink.php">Important Links</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="setting.php">
                        <span class="nav-icon">
                            <i class="fas fa-sliders-h"></i>
                        </span>
                        <span class="nav-text"> Settings </span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
    <!-- ========== App Menu End ========== -->
</div>
<script src="https://code.iconify.design/3/3.1.0/iconify.min.js"></script>