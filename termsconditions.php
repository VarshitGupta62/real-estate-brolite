<?php
include("inc/header.php");
?>

<style>
    p {
        color: #333;
        text-align: justify;
    }

    ::-webkit-input-placeholder {
        color: #515050 !important;
        font-size: 14px;
        font-weight: 600;
    }

    :-moz-placeholder {
        color: #515050 !important;
        font-size: 14px;
        font-weight: 600;
        opacity: 1;
    }

    ::-moz-placeholder {
        color: #515050 !important;
        font-size: 14px;
        font-weight: 600;
        opacity: 1;
    }

    :-ms-input-placeholder {
        color: #515050 !important;
        font-size: 14px;
        font-weight: 600;
    }

    :placeholder-shown {
        color: #515050 !important;
        font-size: 14px;
        font-weight: 600;
    }

    .frm {
        margin-top: 10px !important;
    }

    .tank-cont {
        width: 100%;
        /* margin: 0 auto; */
        padding: 100px 0;
        text-align: center;
        background: #f9fbf4;
        float: left;
    }

    .tank-cont .contents {
        margin: auto;
        font: normal 13px arial;
        padding: 30px;
    }

    .tank-cont .pageTitle {
        text-align: center;
        color: #333;
        font-size: 28px;
        font-weight: 700;
    }

    .tank-cont p {
        padding-top: 10px;
        text-align: justify;
        line-height: 24px;
    }

    .tank-cont p b {
        display: block;
        font-size: 15px;
    }

    @media(max-width:767px) {
        .tank-cont .contents {
            padding: 30px 0;
        }

        .tank-cont .pageTitle {
            font-size: 22px;
            margin-bottom: 20px;
        }
    }
</style>
<section class="tank-cont">
<div class="container" style="border:1px solid #cbcbcb;">
    <?php
    $sql = "SELECT * FROM terms_and_conditions";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="contents">';
      while ($row = $result->fetch_assoc()) {
        echo '<h2 class="pageTitle">' . htmlspecialchars($row['title']) . '</h2>';
        echo '<p>' .  $row['description'] . '</p>';
      }
      echo '</div>';
    } else {
      echo '<p>No policies found.</p>';
    }

    ?>

  </div>
</section>





<a href="#" class="scrollup"><img src="https://www.propertyfinder.org.in/assets/images/arrow-up.png" alt="Up Arrow Key"></a>


<script type="text/javascript">
    $(document).ready(function() {

        $(window).scroll(function() {
            if ($(this).scrollTop() > 100) {
                $('.scrollup').fadeIn();
            } else {
                $('.scrollup').fadeOut();
            }
        });

        $('.scrollup').click(function() {
            $("html, body").animate({
                scrollTop: 0
            }, 600);
            return false;
        });

    });
</script>
<style>
    .scrollup {
        width: 40px;
        height: 40px;
        position: fixed;
        bottom: 50px;
        right: 100px;
        display: none;
        text-indent: -9999px;
        background: url(https://www.propertyfinder.org.in/assets/images/arrow-up.png) no-repeat;

    }
</style>

<?php

include("inc/footer.php");

?>