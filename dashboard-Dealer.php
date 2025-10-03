<?php
  session_start();

   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: index.php');
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
    <title>#Events-Dashboard.Dealer</title>

    <link rel="shortout icon" type="image/x-icon" href="img/favicon.png" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/line-icons.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/nivo-lightbox.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/color-switcher.css">
    <link rel="stylesheet" href="css/menu_sideslide.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <!-- Header Section Start -->
    <header id="slider-area">
        <nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
            <div class="container">
                <a class="navbar-brand" href="index.html"><span class="lni-bulb"></span>#Events</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="lni-menu"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <!-- <li class="nav-item">
              <a class="nav-link page-scroll" href="#blog">Book Event</a>
            </li> -->
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#manage">Manage Event</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#contact">Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="" data-toggle="modal"
                                data-target="#modalmanageprofile">Manage Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="logout.php">Log Out</a>
                        </li>
                    </ul>
                </div>
                <!-- <div>
          <ul>
            <li class="nav-item pad">
              <a class="lightbox" href="img/profile/harsh.jpg">
                <img src="img/profile/harsh.jpg" class="img-profile" alt="Avatar">
              </a>
            </li>
          </ul>
        </div> -->
            </div>
        </nav>
    </header>

    <!--Manage Event-->
    <section id="manage" class="section" style="background-color:rgb(248, 239, 246);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Manage Events Here</h2>
                <!--<span>Projects</span>-->
                <!--<p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Portfolio Controller/Buttons -->
                    <div class="controls text-center">
                        <a class="filter active btn btn-common btn-effect" data-filter="all">
                            History
                        </a>
                        <a class="filter btn btn-common btn-effect" data-filter=".design">
                            Upcomming Events
                        </a>
                        <!-- <a class="filter btn btn-common btn-effect" data-filter=".development">
              Delete Events
            </a> -->
                    </div>
                    <!-- Portfolio Controller/Buttons Ends-->
                </div>
            </div>
        </div>
    </section>
    <section id="contact" class="section">
        <div class="contact-form">
            <div class="container">
                <div class="section-header">
                    <h2 class="section-title">Feedback</h2>
                    <!--<span>Contact</span>-->
                    <p class="section-subtitle">For any query or suggestions you can contact us</p>
                </div>
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-xs-12">
                        <div class="contact-block">
                            <form id="contactForm">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Your Name" required data-error="Please enter your name">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" placeholder="Your Email" id="email" class="form-control"
                                                name="name" required data-error="Please enter your email">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea class="form-control" id="message" placeholder="Your Review"
                                                rows="7" data-error="Write your message" required></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                        <div class="submit-button">
                                            <button class="btn btn-common btn-effect" id="submit"
                                                type="submit">Submit</button>
                                            <div id="msgSubmit" class="h3 hidden"></div>
                                            <div class="clearfix"></div>
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
    <script src="js/jquery-min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/classie.js"></script>
    <script src="js/color-switcher.js"></script>
    <script src="js/jquery.mixitup.js"></script>
    <script src="js/nivo-lightbox.js"></script>
    <script src="js/owl.carousel.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
    <script src="js/jquery.nav.js"></script>
    <script src="js/scrolling-nav.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/wow.js"></script>
    <script src="js/jquery.vide.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/main.js"></script>
</body>

</html>