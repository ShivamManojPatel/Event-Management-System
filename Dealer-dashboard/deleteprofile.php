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

  if(isset($_POST['delete']))
  {
    $id = $_SESSION['User'];

    $update = "update dealer_registration set Status='Inactive' where Email='$id'";
    $result = mysqli_query($conn, $update);

    if($result)
    {
        header('location: ../logout.php');
    }
    else
    {
        echo "<script>alert('Somethings wrong please try again later')</script>";
    }
  }
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

<body style="background-color: powderblue;">
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
              <a class="nav-link page-scroll" href="dashboard-dealer.php">Back</a>
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
  <section id="blog" class="section" style="padding-top: 14%;padding-bottom: 14%;">
    <!-- Container Starts -->
            <center><div class="col-md-12">
                        <div class="col-md-6">
                        <div class="blog-item-wrapper">
                            <div class="blog-item-text">
                                <div class="">
                                    <center><h6 style="font-size: 30px;"><b>Delete Profile</b></h6></center>
                                </div><hr>
                                <div>
                                    <center><h6 style="font-size: 20px;"><b>Are you sure?</b></h6></center><br>
                                    <div class="col-md-12">
                                        <form method='post'><input type='submit' name='delete' class="btn btn-lg btn-common btn-effect wow" data-wow-delay="0.9s" value="Yes"></form><br>
                                        <a href="dashboard-dealer-profile.php" class="btn btn-lg btn-common wow" data-wow-delay="0.9s">No</a>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div></center>
      </div>
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