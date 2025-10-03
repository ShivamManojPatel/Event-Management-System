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

  if(isset($_GET['ETid']))
  {
    $ETid = $_GET['ETid'];
  }

  if(isset($_GET['PTid']))
  {
    $PTid = $_GET['PTid'];
  }

  if(isset($_POST['customestimate']))
  {
    if(!empty($_POST['event']) && !empty($_POST['caterar']) && !empty($_POST['decorator']) && !empty($_POST['benquethall']) && !empty($_POST['beautyparlor']) && !empty($_POST['dj']) && !empty($_POST['photographer']))
    {
      if((!empty($_POST['fromdate']) && !empty($_POST['todate'])) || !empty($_POST['date']))
      {
        if(!empty($_POST['noofperson']))
        {
          $event = $_POST['event'];
          $caterar = $_POST['caterar'];
          $decorator = $_POST['decorator'];
          $benquethall = $_POST['benquethall'];
          $beautyparlor = $_POST['beautyparlor'];
          $dj = $_POST['dj'];
          $photographer = $_POST['photographer'];
          $noofperson = $_POST['noofperson'];

          $fromdate = $_POST['fromdate'];
          $todate = $_POST['todate'];

          $date1 = date_create($fromdate);
          $date2 = date_create($todate);

          $diff = date_diff($date1, $date2);
          $noofdays = $diff -> format("%a");
          
          $catpricequery = "select PricePerPlate from caterar where C_id='$caterar'";
          $catpriceresult = mysqli_query($conn, $catpricequery);
          $catpricerow = mysqli_fetch_row($catpriceresult);

          $decpricequery = "select PricePerDecoration from decorator where D_id='$decorator'";
          $decpriceresult = mysqli_query($conn, $decpricequery);
          $decpricerow = mysqli_fetch_row($decpriceresult);

          $benpricequery = "select PricePerDay from benquethall where BH_id='$benquethall'";
          $benpriceresult = mysqli_query($conn, $benpricequery);
          $benpricerow = mysqli_fetch_row($benpriceresult);

          $beapricequery = "select PricePerPerson from beautyparlor where B_id='$beautyparlor'";
          $beapriceresult = mysqli_query($conn, $beapricequery);
          $beapricerow = mysqli_fetch_row($beapriceresult);

          $djpricequery = "select PricePerDay from dj where DJ_id='$dj'";
          $djpriceresult = mysqli_query($conn, $djpricequery);
          $djpricerow = mysqli_fetch_row($djpriceresult);

          $photopricequery = "select PricePerDay from photographer where P_id='$photographer'";
          $photopriceresult = mysqli_query($conn, $photopricequery);
          $photopricerow = mysqli_fetch_row($photopriceresult);

          $profit = 85000;
          $catfinal = $catpricerow[0]*$noofperson*$noofdays;
          $decfinal = $decpricerow[0]*$noofdays;
          $benfinal = $benpricerow[0]*$noofdays;
          $beafinal = $beapricerow[0]*10;
          $djfinal = $djpricerow[0]*$noofdays;
          $photofinal = $photopricerow[0]*$noofdays;

          $estimate = $catfinal + $decfinal + $benfinal + $beafinal + $djfinal + $photofinal + $profit;

          $_SESSION['event'] = $_POST['event'];
            $_SESSION['package'] = $_POST['package'];
            $_SESSION['caterar'] = $_POST['caterar'];
            $_SESSION['decorator'] = $_POST['decorator'];
            $_SESSION['benquethall'] = $_POST['benquethall'];
            $_SESSION['beautyparlor'] = $_POST['beautyparlor'];
            $_SESSION['dj'] = $_POST['dj'];
            $_SESSION['photographer'] = $_POST['photographer'];
            $_SESSION['noofperson'] = $_POST['noofperson'];
            $_SESSION['fromdate'] = $fromdate;
            $_SESSION['todate'] = $todate;
            $_SESSION['noofdays'] = $noofdays;
            $_SESSION['estimate'] = $estimate;
            $_SESSION['package_type'] = "Custom";
        }
        else
        {
          echo "<script>alert('Please enter no of person to be present in event')</script>";
        }
      }
      else
      {
        echo "<script>alert('Please enter date properly')</script>";
      }
    }
    else
    {
      echo "<script>alert('Please enter all the details properly')</script>";
    }
  }
?>

<?php
  if(isset($_POST['custombook']))
  {
    header('location: payment.php');
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

  <style>
    .drop{
        border-radius: 3px; 
        width: 100%; 
        height: 37px; 
        background-color: inherit;
        border: 1px solid black;
    }
    .disableddrop{
        border-radius: 3px; 
        width: 100%; 
        height: 37px; 
        background-color: inherit;
    }
  </style>
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
              <a class="nav-link page-scroll" href="<?php 
                  echo "dashboard-Customer.php";
              ?>">Back</a>
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
        <h2 class="section-title">Fill this details</h2>
        <!--<span>Booking</span>-->
        <p class="section-subtitle txt-shadow">Book the event you want to celebrate from here</p>
      </div><hr>
        <div class="row">
          <div class="" style="width: 100%;">
            <div class="contact-block">
                <form method='post'>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">Event :</h5>
                        <select name="event" class="drop">
                          <option></option>

                          <?php
                              $eventquery = "select * from event_type where Status='Active'";
                              $eventresult = mysqli_query($conn, $eventquery);

                              while($eventrow = mysqli_fetch_row($eventresult))
                              {
                                ?>
                                    <option value="<?php echo $eventrow[0]; ?>" <?php if(isset($event)){if($event == $eventrow[0]){ echo "selected"; }}?>><?php echo $eventrow[1]; ?></option>
                                <?php
                              }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">Package :</h5>
                        <select name="package" class="disableddrop" disabled>
                          <option>Customized</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">No of person :</h5>
                        <input type="text" class="drop" name="noofperson" value="<?php if(isset($noofperson)){echo $noofperson;} ?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">Caterar :</h5>
                        <select name="caterar" class="drop">
                          <option></option>

                          <?php
                              $caterarquery = "select dealer_registration.StoreName, caterar.C_id, caterar.PricePerPlate from dealer_registration join caterar on dealer_registration.D_id = caterar.DealerId where dealer_registration.Professionid='1'";
                              $caterarresult = mysqli_query($conn, $caterarquery);

                              while($caterarrow = mysqli_fetch_row($caterarresult))
                              {
                                ?>
                                    <option value="<?php echo $caterarrow[1]; ?>" <?php if(isset($caterar)){if($caterar == $caterarrow[1]){ echo "selected";}}?>><?php echo $caterarrow[0]; ?></option>
                                <?php
                              }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">Decorator :</h5>
                        <select name="decorator" class="drop" style="">
                          <option></option>

                          <?php
                              $decoratorquery = "select dealer_registration.StoreName, decorator.D_id, decorator.PricePerDecoration from dealer_registration join decorator on dealer_registration.D_id = decorator.DealerId where dealer_registration.Professionid='2'";
                              $decoratorresult = mysqli_query($conn, $decoratorquery);

                              while($decoratorrow = mysqli_fetch_row($decoratorresult))
                              {
                                ?>
                                    <option value="<?php echo $decoratorrow[1]; ?>" <?php if(isset($decorator)){if($decorator == $decoratorrow[1]){ echo "selected";}}?>><?php echo $decoratorrow[0]; ?></option>
                                <?php
                              }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">Benquet Hall :</h5>
                        <select name="benquethall" class="drop">
                          <option></option>

                          <?php
                              $benquetquery = "select dealer_registration.StoreName, benquethall.BH_id, benquethall.PricePerDay from dealer_registration join benquethall on dealer_registration.D_id = benquethall.DealerId where dealer_registration.Professionid='3'";
                              $benquetresult = mysqli_query($conn, $benquetquery);

                              while($benquetrow = mysqli_fetch_row($benquetresult))
                              {
                                ?>
                                    <option value="<?php echo $benquetrow[1]; ?>" <?php if(isset($benquethall)){if($benquethall == $benquetrow[1]){ echo "selected";}}?>><?php echo $benquetrow[0]; ?></option>
                                <?php
                              }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">Beauty Parlor :</h5>
                        <select name="beautyparlor" class="drop">
                          <option></option>

                          <?php
                              $beautyquery = "select dealer_registration.StoreName, beautyparlor.B_id, beautyparlor.PricePerPerson from dealer_registration join beautyparlor on dealer_registration.D_id = beautyparlor.DealerId where dealer_registration.Professionid='4'";
                              $beautyresult = mysqli_query($conn, $beautyquery);

                              while($beautyrow = mysqli_fetch_row($beautyresult))
                              {
                                ?>
                                    <option value="<?php echo $beautyrow[1]; ?>" <?php if(isset($beautyparlor)){if($beautyparlor == $beautyrow[1]){ echo "selected";}}?>><?php echo $beautyrow[0]; ?></option>
                                <?php
                              }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">Sound System :</h5>
                        <select name="dj" class="drop">
                          <option></option>

                          <?php
                              $djquery = "select dealer_registration.StoreName, dj.DJ_id, dj.PricePerDay from dealer_registration join dj on dealer_registration.D_id = dj.DealerId where dealer_registration.Professionid='5'";
                              $djresult = mysqli_query($conn, $djquery);

                              while($djrow = mysqli_fetch_row($djresult))
                              {
                                ?>
                                    <option value="<?php echo $djrow[1]; ?>" <?php if(isset($dj)){if($dj == $djrow[1]){ echo "selected";}}?>><?php echo $djrow[0]; ?></option>
                                <?php
                              }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">Photographer :</h5>
                        <select name="photographer" class="drop">
                          <option></option>

                          <?php
                              $photoquery = "select dealer_registration.StoreName, photographer.P_id, photographer.PricePerDay from dealer_registration join photographer on dealer_registration.D_id = photographer.DealerId where dealer_registration.Professionid='6'";
                              $photoresult = mysqli_query($conn, $photoquery);

                              while($photorow = mysqli_fetch_row($photoresult))
                              {
                                ?>
                                    <option value="<?php echo $photorow[1]; ?>" <?php if(isset($photographer)){if($photographer == $photorow[1]){ echo "selected";}}?>><?php echo $photorow[0]; ?></option>
                                <?php
                              }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-2" style="background-color: white;">
                      <div class="form-group">
                        
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">From :</h5>
                        <input type="date" class="drop" name="fromdate" value="<?php if(isset($fromdate)){ echo $fromdate; }?>">
                      </div>
                    </div>
                    <div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;">To :</h5>
                        <input type="date" class="drop" name="todate" value="<?php if(isset($todate)){ echo $todate; }?>">
                      </div>
                    </div>
                    <div class="col-md-4" style="background-color: white;">
                      <div class="form-group">
                        
                      </div>
                    </div>
                    <center><div class="col-md-4">
                      <div class="form-group">
                        <h5 style="font-size: 20px;"></h5>
                        <input type="submit" style="border-radius: 0px;" name='customestimate' class="btn btn-success" value="View Estimation">
                      </div>
                    </div></center>
                  </div>
                </form>
            </div>
          </div>
        </div><hr>
        <div>
          <h4>Total Estimation : <?php if(isset($estimate)){ echo $estimate; }?></h4>
        </div><hr><br>
        <div class="row">
          <div class="" style="width: 100%;">
            <div class="contact-block">
                <form method='post'>
                  <div class="row">
                    <div class="col-md-4">
                      <div class="form-group">
                        <input type="submit" style="border-radius: 0px;" name='custombook' class="btn btn-success" value="Book Now">
                      </div>
                    </div>
                  </div>
                </form>
            </div>
          </div>
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
