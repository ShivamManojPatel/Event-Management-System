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
?>

<!DOCTYPE html>
<html lang="en">

<head>
                  <?php
                    if(isset($_POST['fbtn']))
                    {
                      if(!empty($_POST['feedname']) && !empty($_POST['feedemail']) && !empty($_POST['feedmessage']))
                      {
                        if(filter_var($_POST['feedemail'], FILTER_VALIDATE_EMAIL))
                        {
                          $name = $_POST['feedname'];
                          $email = $_POST['feedemail'];
                          $msg = $_POST['feedmessage'];

                          $query = "insert into feedback(Name, Email, Message) values ('$name', '$email', '$msg')";
                          $result = mysqli_query($conn, $query);

                          if($result)
                          {
                            echo "<script>alert('Submitted')</script>";
                          }
                          else
                          {
                            echo "<script>alert('Somethings wrong please try again later')</script>";
                          }
                        }
                        else
                        {
                          echo "<script>alert('Enter valid email')</script>";
                        }
                      }
                      else
                      {
                        echo "<script>alert('Enter details property')</script>";
                      }
                    }
                  ?>
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
              <a class="nav-link page-scroll" href="../index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#blog">Book Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="#contact">Feedback</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="dashboard-Customer-ManageEvent.php">Manage Event</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="dashboard-Customer-profile.php">Manage Profile</a>
            </li>
            <li class="nav-item">
              <a class="nav-link page-scroll" href="../logout.php">Log Out</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!--Home section-->
  <!--<section id="home">
    <img class="img" src="img/portfolio/other/dashboard-customer.jpg">
  </section>-->

  <!-- <section class="call-action section" id="booking" style="background-color:aliceblue">
    <div class="container" style="height: 100%; width: 100%;">
      <div class="row justify-content-center">
        <div class="col-10">
          <div class="cta-trial text-center">
            <h2 style="font-family: Brush Script MT; font-size: 70px; font-weight: normal; color: #325b81">Book Events
              Here​</h2><br>
          </div>
            <Bookings
            <div class="row">
              <div class="col-sm-4">
                <div class="card hvr" style="width: 18rem;">
                  <img class="card-img-top" src="img/portfolio/Wedding/wedding3.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h6 style="font-size: 30px;"><b>Wedding</b></h6>
                    <p class="card-text">Plan a perfect wedding
                      for a perfect couple</p>
                    <a href="#" class="btn btn-primary">Book Now</a>
                  </div>
                </div>
              </div>
        
              <div class="col-sm-4">
                <div class="card hvr" style="width: 18rem;">
                  <img class="card-img-top" src="img/portfolio/Birthday/b10.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h6 style="font-size: 30px;"><b>Birthday Party</b></h6>
                    <p class="card-text">​​Surprise a best person of your life in the best way </p>
                    <a href="#" class="btn btn-primary">Book Now</a>
                  </div>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="card hvr" style="width: 18rem;">
                  <img class="card-img-top" src="img/portfolio/other/a4.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h6 style="font-size: 30px;"><b>Anniversary</b></h6>
                    <p class="card-text">Plan a grand anniversary celebration for your loved one​</p>
                    <a href="#" class="btn btn-primary">Book Now</a>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-4">
                <div class="card hvr" style="width: 18rem;">
                  <img class="card-img-top" src="img/portfolio/other/b5.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h6 style="font-size: 30px;"><b>Baby Shower</b></h6>
                    <p class="card-text">Do a celebration to welcome the new member of your family​</p>
                    <a href="#" class="btn btn-primary">Book Now</a>
                  </div>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="card hvr" style="width: 18rem;">
                  <img class="card-img-top" src="img/portfolio/other/reunion1.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h6 style="font-size: 30px;"><b>Reunion Party</b></h6>
                    <p class="card-text">Do a reunion party with your friends and loved one​</p>
                    <a href="#" class="btn btn-primary">Book Now</a>
                  </div>
                </div>
              </div>

              <div class="col-sm-4">
                <div class="card hvr" style="width: 18rem;">
                  <img class="card-img-top" src="img/portfolio/Wedding/catring3.jpg" alt="Card image cap">
                  <div class="card-body">
                    <h6 style="font-size: 30px;"><b>Other</b></h6>
                    <p class="card-text">Celebrate event according to your own customization​</p>
                    <a href="#" class="btn btn-primary">Book Now</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->

  <!-- Blog Section -->
  <section id="blog" class="section">
    <!-- Container Starts -->
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Book Events Here</h2>
        <!--<span>Booking</span>-->
        <p class="section-subtitle txt-shadow">Book the event you want to celebrate from here</p>
      </div>
        <div class="row">
            <!-- Blog Item Starts -->
            <?php
              $count = 0;
              $query = "select * from event_type where status='Active'";
              $result = mysqli_query($conn, $query);

              while($row = mysqli_fetch_array($result))
              {
                $count++;
                ?>
                <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
                  <div class="blog-item-wrapper">
                    <div class="blog-item-img">
                      <a href="">
                        <img src="<?php echo $row[3]; ?>" alt="">
                      </a>
                    </div>
                    <div class="blog-item-text">
                      <div class="">
                        <h6 style="font-size: 30px;"><b><?php echo $row[1]; ?></b></h6>
                      </div>
                      <h3><a><?php echo $row[2]; ?>​</a></h3>
                      <div class="meta-tags">
                        <a href="dashboard-Customer-packages.php?a=<?php echo $row[0]; ?>" class="btn btn-lg btn-common btn-effect wow" data-wow-delay="0.9s">Book Now</a>
                      </div>
                    </div>
                  </div>
                </div>
                <?php
              }
            ?>
            <!-- Blog Item Wrapper Ends-->

        <div class="col-lg-4 col-md-6 col-xs-12 blog-item">
          <!-- Blog Item Starts -->
          <div class="blog-item-wrapper">
            <div class="blog-item-img">
              <a href="">
                <img src="../img/portfolio/Wedding/catring3.jpg" alt="">
              </a>
            </div>
            <div class="blog-item-text">
              <div class="">
                <h6 style="font-size: 30px;"><b>Custom</b></h6>
              </div>
              <h3><a>Create your own mindblowing event</a></h3>
              <div class="meta-tags">
                <a href="dashboard-Customer-custombook.php" class="btn btn-lg btn-common btn-effect wow" data-wow-delay="0.9s">Book Now</a>
              </div>
            </div>
          </div>
          <!-- Blog Item Wrapper Ends-->
        </div>

      </div>
    </div>
  </section>
  <!-- blog Section End -->

  <section id="contact" class="section">
    <div class="contact-form">
      <div class="container">
        <div class="section-header">
          <h2 class="section-title">Feedback</h2>
          <!--<span>Contact</span>-->
          <p class="section-subtitle">Give feedback here</p>
        </div>
        <div class="row">
          <div class="col-lg-9 col-md-9 col-xs-12">
            <div class="contact-block">
              <form method='post'>
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" class="form-control" name="feedname" placeholder="Your Name"
                        data-error="Please enter your name">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <input type="text" placeholder="Your Email" class="form-control" name="feedemail"
                        data-error="Please enter your email">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                      <textarea class="form-control" id="message" placeholder="Your Review" rows="7"
                        data-error="Write your message" name='feedmessage'></textarea>
                    </div>
                    <div class="submit-button">
                      <input type='submit' class="btn btn-common btn-effect" id="submit" name='fbtn'>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-xs-12">
            <div class="contact-deatils">
              <!-- Content Info -->
              <div class="contact-info_area">
                <div class="contact-info">
                  <i class="lni-map"></i>
                  <h5>Location</h5>
                  <p>Surat, Gujarat, India</p>
                </div>
                <!-- Content Info -->
                <div class="contact-info">
                  <i class="lni-star"></i>
                  <h5>E-mail</h5>
                  <p>20bmiit057@gmail.com</p>
                  <p>20bmiit030@gmail.com</p>
                </div>
                <!-- Content Info -->
                <div class="contact-info">
                  <i class="lni-phone"></i>
                  <h5>Phone</h5>
                  <p>+91 63533 58020</p>
                </div>
                <!-- Icon -->
                <!--<ul class="footer-social">
                  <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                  <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                  <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                  <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                </ul>-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Contact Section End -->

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

  <!--Manage Profile PopUp-->
  <form action="" id="frm">
    <div class="modal fade" id="modalmanageprofile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Profile</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mx-3">
                    <div class="md-form mb-3">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <div>
                            <ul>
                                <li class="nav-item pad">
                                    <a class="lightbox" href="img/profile/harsh2.jpg">
                                        <img src="img/profile/harsh2.jpg" class="img-profile" alt="Avatar">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="md-form mb-3">
                        <i class="fas fa-envelope prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="defaultForm-email">Name : </label>
                    </div>

                    <div class="md-form mb-3">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Email Address :
                        </label>
                    </div>

                    <div class="md-form mb-3">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Contact Number :
                        </label>
                    </div>

                    <div class="md-form mb-3">
                        <i class="fas fa-lock prefix grey-text"></i>
                        <label data-error="wrong" data-success="right" for="defaultForm-pass">Profession :
                        </label>
                    </div>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button class="filter btn btn-common btn-effect" onclick="">Done</button>
                    <button class="filter btn btn-common btn-effect" onclick="">Update</button>
                </div>
            </div>
        </div>
    </div>
</form>

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