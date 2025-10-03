<?php
  session_start();

  if(session_id() == "" || !isset($_SESSION['User']))
  {
    header('location: index.php');
  }

  require '../Datacon.php';

  if(!$conn)
  {
    header('location: ../error/Databaseerror.php');
  }

  $id = $_GET['a'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <meta name="author" content="Grayrids">
  <title>#Events-Dashboard.Customer</title>

  <link rel="shortout icon" type="image/x-icon" href="../img/favicon.png" />
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/line-icons.css">
  <link rel="stylesheet" href="../css/owl.carousel.css">
  <link rel="stylesheet" href="../css/owl.theme.css">
  <link rel="stylesheet" href="../css/nivo-lightbox.css">
  <link rel="stylesheet" href="../css/magnific-popup.css">
  <link rel="stylesheet" href="../css/animate.css">
  <link rel="stylesheet" href="../css/color-switcher.css">
  <link rel="stylesheet" href="../css/menu_sideslide.css">
  <link rel="stylesheet" href="../css/main.css">
  <link rel="stylesheet" href="../css/responsive.css">
  <link rel="stylesheet" href="../css/style.css">

</head>

<body>
  <!-- Header Section Start -->
  <header id="slider-area">
    <nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
      <div class="container">
        <a class="navbar-brand" href="../index.php"><span class="lni-bulb"></span>#Events</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
          aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <i class="lni-menu"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto w-100 justify-content-end">
          <li class="nav-item">
              <a class="nav-link page-scroll" href="dashboard-Customer.php">Back</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="../logout.php">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Blog section -->
  <section id="blog" class="section">
    <!-- Container Starts -->
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Select Package</h2>
        <!--<span>Booking</span>-->
        <p class="section-subtitle txt-shadow">Book the event you want to celebrate from here</p>
      </div>
        <div class="row">
          <?php
                  $query1 = "select packages.PT_id, packages.ET_id, package_type.Package_type from packages join package_type on packages.PT_id = package_type.PT_id where packages.ET_id='1' and packages.Status='Active';                  ";
                  $result1 = mysqli_query($conn, $query1);
                  $photoarray = array("Uploads/Wedding.jpg", "Uploads/Birthday.jpg", "Uploads/Aniversary.jpg");
                  $i=0;
                  while($row = mysqli_fetch_row($result1))
                  {
                    ?>
                    <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
                      <div class="blog-item-wrapper">
                        <div class="blog-item-img">
                          <a href="">
                            <img src="<?php echo $photoarray[$i]; ?>" alt="">
                          </a>
                        </div>
                        <div class="blog-item-text">
                          <div class="">
                            <center><h6 style="font-size: 30px;"><b><?php echo $row[2]; ?></b></h6></center>
                          </div>
                          <div>
                            <hr>
                            <?php
                              $catrarquery = "select dealer_registration.D_id, dealer_registration.StoreName from caterar join dealer_registration on caterar.DealerId = dealer_registration.D_id join packages on caterar.C_id = packages.Caterar_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                              $catrarresult = mysqli_query($conn, $catrarquery);
                              $catrow = mysqli_fetch_row($catrarresult);

                              $decorator = "select dealer_registration.D_id, dealer_registration.StoreName from decorator join dealer_registration on decorator.DealerId = dealer_registration.D_id join packages on decorator.D_id = packages.Decorator_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                              $decoatorresult = mysqli_query($conn, $decorator);
                              $decrow = mysqli_fetch_row($decoatorresult);

                              $benquethall = "select dealer_registration.D_id, dealer_registration.StoreName from benquethall join dealer_registration on benquethall.DealerId = dealer_registration.D_id join packages on benquethall.BH_id = packages.BenquetHall_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                              $benquetresult = mysqli_query($conn, $benquethall);
                              $benrow = mysqli_fetch_row($benquetresult);

                              $beautyparlor = "select dealer_registration.D_id, dealer_registration.StoreName from beautyparlor join dealer_registration on beautyparlor.DealerId = dealer_registration.D_id join packages on beautyparlor.B_id = packages.BeautyParlor_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                              $beautyresult = mysqli_query($conn, $beautyparlor);
                              $bearow = mysqli_fetch_row($beautyresult);

                              $dj = "select dealer_registration.D_id, dealer_registration.StoreName from dj join dealer_registration on dj.DealerId = dealer_registration.D_id join packages on dj.DJ_id = packages.DJ_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                              $djresult = mysqli_query($conn, $dj);
                              $djrow = mysqli_fetch_row($djresult);

                              $photo = "select dealer_registration.D_id, dealer_registration.StoreName from photographer join dealer_registration on photographer.DealerId = dealer_registration.D_id join packages on photographer.P_id = packages.Photographer_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                              $photoresult = mysqli_query($conn, $photo);
                              $phorow = mysqli_fetch_row($photoresult);
                            ?>
                            <h6>Caterar : <?php echo $catrow[1]; ?><br>
                                        Decorator : <?php echo $decrow[1]; ?><br>
                                        Benquet Hall : <?php echo $benrow[1]; ?><br>
                                        Beauty parlor : <?php echo $bearow[1]; ?><br>
                                        Sound System : <?php echo $djrow[1]; ?><br>
                                        Photographer : <?php echo $phorow[1]; ?></h6>
                            <hr>
                          </div>
                          <div class="meta-tags">
                            <center><a href="dashboard-Customer-book.php?PTid=<?php echo $row[0]; ?>&ETid=<?php echo $id; ?>&cat=<?php echo $catrow[0]; ?>&dec=<?php echo $decrow[0]; ?>&ben=<?php echo $benrow[0];?>&bea=<?php echo $bearow[0]; ?>&dj=<?php echo $djrow[0]; ?>&photo=<?php echo $phorow[0]; ?>" class="btn btn-lg btn-common btn-effect wow" data-wow-delay="0.9s">Book Now</a></center>
                          </div>
                        </div>
                      </div>
                    </div>
                    <?php
                    $i=$i+1;
                  }
                  ?>
        </div>
  </section>

  <!-- Copyright Start  -->
  <div id="copyright">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="site-info float-left">
            <p>Crafted by <a href="#" rel="nofollow">Harsh and Shivam</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright End -->

  <a href="#" class="back-to-top">
    <i class="lni-arrow-up"></i>
  </a>

  <div id="loader">
    <div class="spinner">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
  </div>

  <!-- jQuery first, then Tether, then Bootstrap JS. -->
  <script src="../js/jquery-min.js"></script>
  <script src="../js/popper.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/classie.js"></script>
  <script src="../js/color-switcher.js"></script>
  <script src="../js/jquery.mixitup.js"></script>
  <script src="../js/nivo-lightbox.js"></script>
  <script src="../js/owl.carousel.js"></script>
  <script src="../js/jquery.stellar.min.js"></script>
  <script src="../js/jquery.nav.js"></script>
  <script src="../js/scrolling-nav.js"></script>
  <script src="../js/jquery.easing.min.js"></script>
  <script src="../js/wow.js"></script>
  <script src="../js/jquery.vide.js"></script>
  <script src="../js/jquery.counterup.min.js"></script>
  <script src="../js/jquery.magnific-popup.min.js"></script>
  <script src="../js/waypoints.min.js"></script>
  <script src="../js/form-validator.min.js"></script>
  <script src="../js/contact-form-script.js"></script>
  <script src="../js/main.js"></script>
</body>

</html>