<?php session_start(); 
  // require 'Datacon.php';

  // if(!$conn)
  // {
  //   echo "<div style='padding: 5px;
  //             background-color: #ffffb3;
  //             color: black;
  //             height: 25px'>
  //                 <center>ERROR 502! Database Connection Error. Please visit later. We are trying our best</center>
  //             </div>";
  // }

  // $ip = $_SERVER['REMOTE_ADDR'];

  // $ipinsert = "insert into visitors(IP) values ('$ip')";
  // mysqli_query($conn, $ipinsert);
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
    <title>#Events</title>

    <link rel="shortout icon" type="image/x-icon" href="img/favicon.png"/>
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
    <?php 
      if(!isset($_SESSION['User']))
      {
    ?>
        <!-- Header Section Start -->
        <header id="slider-area">  
          <nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
            <div class="container">          
              <a class="navbar-brand" href="index.html"><span class="lni-bulb"></span>#Events</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lni-menu"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="#slider-area">Home</a>
                  </li>                            
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="#portfolios">Events</a>
                  </li>            
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">Contact</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="Login.php">Login</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="Registration.php">Register</a>
                  </li> 
                </ul>              
              </div>
            </div>
          </nav> 
        </header>
      <?php
      }
      else
      {
      ?>
        <header id="slider-area">  
          <nav class="navbar navbar-expand-md fixed-top scrolling-navbar bg-white">
            <div class="container">          
              <a class="navbar-brand" href="index.html"><span class="lni-bulb"></span>#Events</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <i class="lni-menu"></i>
              </button>
              <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="#slider-area">Home</a>
                  </li>                            
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="#portfolios">Events</a>
                  </li>            
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="#contact">Contact</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="<?php
                      if($_SESSION['User_role'] == 'Admin')
                      {
                        echo "Admin-dashboard/dashboard-admin.php";
                      }
                      elseif($_SESSION['User_role'] == 'Customer')
                      {
                        echo "Customer-dashboard/dashboard-Customer.php";
                      }
                      elseif($_SESSION['User_role'] == "Dealer")
                      {
                        echo "Dealer-dashboard/dashboard-dealer.php";
                      }
                    ?>">Dashboard</a>
                  </li> 
                  <li class="nav-item">
                    <a class="nav-link page-scroll" href="logout.php">Logout</a>
                  </li> 
                </ul>              
              </div>
            </div>
          </nav> 
        </header>
      <?php
      }
      ?>
      <!-- Main Carousel Section -->
      <div id="carousel-area">
        <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-slider" data-slide-to="1"></li>
            <li data-target="#carousel-slider" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img src="img/slider/Slider-9.jpg" alt="">
              <div class="carousel-caption text-left">
                <h3 class="wow fadeInRight" data-wow-delay="0.2s">#Events</h1>  
                <h2 class="wow fadeInRight" data-wow-delay="0.4s">A wonderful place for your wonderful events</h2>
                <h4 class="wow fadeInRight" data-wow-delay="0.6s">Wedding, Birthday Parties, Social and many more</h4>
                <a href="Login.php" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">Login</a>
                <a href="Registration.php" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">Register</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/slider/Slider-8.jpg" alt="">
              <div class="carousel-caption text-center">
                <h3 class="wow fadeInDown" data-wow-delay="0.3s">#Events</h3>
                <h2 class="wow bounceIn" data-wow-delay="0.6s">Festivals teach us to share joy with each other</h2> 
                <h4 class="wow fadeInUp" data-wow-delay="0.9s"></h4>
                <a href="#portfolios" class="btn btn-lg btn-common btn-effect wow fadeInUp page-scroll" data-wow-delay="1.2s">View Works</a>
              </div>
            </div>
            <div class="carousel-item">
              <img src="img/slider/slider-3.jpg" alt="">
              <div class="carousel-caption text-center">
                <h3 class="wow fadeInDown" data-wow-delay="0.3s">#Events</h3>
                <h2 class="wow fadeInRight" data-wow-delay="0.6s">Enjoy Every Movement of your Life​</h2> 
                <h4 class="wow fadeInUp" data-wow-delay="0.6s"></h4>
                <a href="#portfolios" class="btn btn-lg btn-border wow fadeInUp page-scroll" data-wow-delay="0.9s">Know More</a>
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carousel-slider" role="button" data-slide="prev">
            <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-slider" role="button" data-slide="next">
            <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>  

    </header>
    <!-- Header Section End --> 

    <!-- Call to Action Start -->
    <section class="call-action section" style="background-color: #e9f2fa;">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-10">
            <div class="cta-trial text-center">
              <h2 style="font-family: Brush Script MT; font-size: 70px; font-weight: normal; color: #325b81">Planning an event?</h2><br>
              <p style="font-size: 30px; font-family: Lato">You can focus on the event and let us manage the operations, finance, and even bargaining with the vendors!</p>
              <!--<a href="#" class="btn btn-common btn-effect">Purchase Now!</a>-->
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Call to Action End -->

    <!-- Portfolio Section -->
    <section id="portfolios" class="section">
      <!-- Container Starts -->
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Our Projects</h2>
          <!--<span>Projects</span>-->
          <!--<p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>-->
        </div>
        <div class="row">          
          <div class="col-md-12">
            <!-- Portfolio Controller/Buttons -->
            <div class="controls text-center">
              <a class="filter active btn btn-common btn-effect" data-filter="all">
                All 
              </a>
              <a class="filter btn btn-common btn-effect" data-filter=".design">
                Wedding 
              </a>
              <a class="filter btn btn-common btn-effect" data-filter=".development">
                Birthday Party
              </a>
              <a class="filter btn btn-common btn-effect" data-filter=".print">
                Many More
              </a>
            </div>
            <!-- Portfolio Controller/Buttons Ends-->
          </div>
        </div>

        <!-- Portfolio Recent Projects -->
        <div id="portfolio" class="row">
          <div class="col-lg-4 col-md-6 col-xs-12 mix development print">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/Wedding/wedding1.jpg" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/Wedding/wedding1.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">View Project</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix design print">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/Wedding/wedding8.jpg" alt="" /> 
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/Wedding/wedding8.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">View Project</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix development">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/Birthday/b7.jpg" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/Birthday/b7.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">View Project</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix development design">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/Wedding/catring3.jpg" alt="" /> 
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/Wedding/catring3.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">View Project</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix development">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/Birthday/b9.jpg" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/Birthday/b9.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">View Project</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
          <div class="col-lg-4 col-md-6 col-xs-12 mix print design">
            <div class="portfolio-item">
              <div class="shot-item">
                <img src="img/portfolio/Wedding/wedding5.jpg" alt="" />  
                <div class="single-content">
                  <div class="fancy-table">
                    <div class="table-cell">
                      <div class="zoom-icon">
                        <a class="lightbox" href="img/portfolio/Wedding/wedding5.jpg"><i class="lni-zoom-in item-icon"></i></a>
                      </div>
                      <a href="#">View Project</a>
                    </div>
                  </div>
                </div>
              </div>               
            </div>
          </div>
        </div>
      </div>
      <!-- Container Ends -->
    </section>
    <!-- Portfolio Section Ends --> 

    <!-- Start Pricing Table Section -->
    <!--<div id="pricing" class="section pricing-section">
      <div class="container">
        <div class="section-header">          
          <h2 class="section-title">Pricing Plans</h2>
          <span>Pricing</span>
          <p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>
        </div>

        <div class="row pricing-tables">
          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="pricing-table">
              <div class="pricing-details">
                <h2>Starter Plan</h2>
                <div class="price">49$ <span>/mo</span></div>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                  <li> - </li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common btn-effect">Get Plan</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="pricing-table pricing-big">
              <div class="pricing-details">
                <h2>Popular Plan</h2>
                <div class="price">99$ <span>/mo</span></div>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                  <li> - </li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common btn-effect">Buy Now</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-xs-12">
            <div class="pricing-table">
              <div class="pricing-details">
                <h2>Premium Plan</h2>
                <div class="price">199$ <span>/mo</span></div>
                <ul>
                  <li>Consectetur adipiscing</li>
                  <li>Nunc luctus nulla et tellus</li>
                  <li>Suspendisse quis metus</li>
                  <li>Vestibul varius fermentum erat</li>
                  <li>Suspendisse quis metus</li>
                </ul>
              </div>
              <div class="plan-button">
                <a href="#" class="btn btn-common btn-effect">Buy Now</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>-->
    <!-- End Pricing Table Section -->

    <!-- Counter Section Start -->
    <div class="counters section bg-defult">
      <div class="container">
        <div class="row"> 
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="facts-item"> 
              <div class="icon">
                <i class="lni-rocket"></i>
              </div>                
              <div class="fact-count">
                <h3><span class="counter">100</span>%</h3>
                <h4>Success</h4>
              </div>
            </div>
          </div>
          <!-- <div class="col-sm-6 col-md-6 col-lg-3">
            <div class="facts-item">
              <div class="icon">
                <i class="lni-coffee-cup"></i>
              </div>                
              <div class="fact-count">
                <h3><span class="counter">700</span></h3>
                <h4>Cup of Coffee</h4>
              </div>
            </div>
          </div> -->
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="facts-item">
              <div class="icon">
                <i class="lni-user"></i>
              </div>                
              <div class="fact-count">
                <?php
                  $Uquery = "select count(CID) from registration_master where Status='Active'";
                  $Uresult = mysqli_query($conn, $Uquery);
                  $row = mysqli_fetch_array($Uresult);
                ?>
                <h3><span class="counter"><?php echo $row[0]; ?></span></h3>
                <h4>Active Clients</h4>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4">
            <div class="facts-item">
              <div class="icon">
                <i class="lni-heart"></i>
              </div>                
              <div class="fact-count">
              <?php
                                                $IPquery = 'select * from visitors';
                                                $IPresult = mysqli_query($conn, $IPquery);
                                                $count = mysqli_num_rows($IPresult);
                                            ?>
                <h3><span class="counter"><?php echo $count; ?></span></h3>
                <h4>Peoples Love</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Counter Section End -->

    <!-- Testimonial Section Start -->
    <section class="testimonial section">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div id="testimonials" class="touch-slider owl-carousel">
              <div class="item">
                <div class="testimonial-item">
                  <div class="author">
                    <div class="img-thumb">
                    <img src="img/testimonial/img1.jpg" alt="">
                    </div>
                    <div class="author-info">
                      <h2><a href="#">Preet Patel</a></h2>
                      <span>CEO of Patel Mills</span>
                    </div>
                  </div>
                  <div class="content-inner">
                    <p class="description">Amazing management by an amazing Team.</p>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="author">
                    <div class="img-thumb">
                    <img src="img/testimonial/img2.jpg" alt="">
                    </div>
                    <div class="author-info">
                      <h2><a href="#">Aashish Mody</a></h2>
                      <span>Advocate</span>
                    </div>
                  </div>
                  <div class="content-inner">
                    <p class="description">Best place to celebrate your Event.</p>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="author">
                    <div class="img-thumb">
                    <img src="img/testimonial/img3.jpg" alt="">
                    </div>
                    <div class="author-info">
                      <h2><a href="#">Chetan Gandhi</a></h2>
                      <span>Entrepreneur</span>
                    </div>
                  </div>
                  <div class="content-inner">
                    <p class="description">#Events provides best hospitality.</p>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star"></i></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="author">
                    <div class="img-thumb">
                    <img src="img/testimonial/img2.jpg" alt="">
                    </div>
                    <div class="author-info">
                      <h2><a href="#">Deep Dalal</a></h2>
                      <span>Journalist</span>
                    </div>
                  </div>
                  <div class="content-inner">
                    <p class="description">They provides amazing Packages according to coustomer's budget.</p>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial-item">
                  <div class="author">
                    <div class="img-thumb">
                    <img src="img/testimonial/img1.jpg" alt="">
                    </div>
                    <div class="author-info">
                      <h2><a href="#">Pratham Patel</a></h2>
                      <span>IT Professor</span>
                    </div>
                  </div>
                  <div class="content-inner">
                    <p class="description">The great Event Planners.</p>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star-filled"></i></span>
                    <span><i class="lni-star"></i></span>
                    <span><i class="lni-star"></i></span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Testimonial Section End --> 
    
    <!-- Map Section Start -->
    <section id="google-map-area">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12 padding-0">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238133.15238271494!2d72.68220938081429!3d21.159142501427855!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1658906194312!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </section>
    <!-- Map Section End -->

    <!-- Footer Section Start -->
    <footer>
      <!-- Footer Area Start -->
      <center>
      <section class="footer-Content">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <h3>#Events</h3>
              <div class="textwidget">
                <p>If you want to celebrate your event successfully, then you are at the right place.</p>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Short Links</h3>
                <ul class="menu">
                  <li><a class="page-scroll" href="#portfolios">Events</a></li>
                  <li><a class="page-scroll" href="#contact">Contact Us</a></li>
                  <li><a href="Login.php">Login</a></li>
                  <li><a href="Registration.php">Register</a></li>
                  <!--<li><a href="#">Site Map</a></li>-->
                </ul>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Contact Us</h3>
                <ul class="contact-footer">
                  <li>
                    <strong>Address :</strong> <span>Surat, Gujrat, India</span>
                  </li>
                  <li>
                    <strong>Phone :</strong> <span>+91 63533 58020</span>
                  </li>
                  <li>
                    <strong>E-mail :</strong> <span>20bmiit057@gmail.com<br>20bmiit030@gmail.com</span>
                  </li>
                </ul> 
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-6 col-mb-12">
              <div class="widget">
                <h3 class="block-title">Instagram</h3>
                  <h6>Harsh Gandhi</h6>
                  <a href="#">@valiant_harsh</a>
                  <h6><br>Shivam Patel</h6>
                  <a href="#">@___19shivam.___</a>
              </div>
            </div>
          </div>
        </div>
      </section>
      </center>
      <!-- Footer area End -->
      
      <!-- Copyright Start  -->
      <div id="copyright">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <div class="site-info float-left">
                <p>Crafted by <a href="#" rel="nofollow">Harsh and Shivam</a></p>
              </div>              
              <div class="float-right">  
                <ul class="nav nav-inline">
                  <li class="nav-item">
                    <a class="nav-link active" href="documentation.docx">Documentation</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="privacypolicy.php">Return Policy</a>
                  </li>
                  <!--<li class="nav-item">
                    <a class="nav-link" href="#">FAQ</a>
                  </li>-->
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Copyright End -->

    </footer>
    <!-- Footer Section End --> 

    <!-- Go To Top Link -->
    <a href="#" class="back-to-top">
      <i class="lni-arrow-up"></i>
    </a>

    <div id="loader">
      <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
      </div>
    </div>    
<!--Login PopUp-->
  <form action="" id="frm">
    <div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
      aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header text-center">
            <h4 class="modal-title w-100 font-weight-bold">Login</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-3">
            <div class="md-form mb-3">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="email" id="defaultForm-email" class="form-control validate">
              <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label>
            </div>

            <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="defaultForm-pass" class="form-control validate">
              <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label>
            </div>

            <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <a href="#"><label data-error="wrong" data-success="right" for="defaultForm-pass">Forgot Password?</label></a>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <button class="filter btn btn-common btn-effect" onclick="">Login</button>
          </div>
        </div>
      </div>
    </div>
  </form>

  <!--Register PopUp-->

  <div class="modal fade" id="modalRegisterForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header text-center">
          <h4 class="modal-title w-100 font-weight-bold">Registration</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post">
          <!-- <br><input type="text" name="R_Fname" id="defaultForm-text" class="form-control" placeholder="First Name">
          <input type="text" name="R_Lname" id="defaultForm-text" class="form-control" placeholder="Last Name">
          <input type="text" name="R_Email" id="defaultForm-text" class="form-control" placeholder="Email">
          <input type="text" name="R_contact" id="defaultForm-text" class="form-control" placeholder="Contact Number">
          <input type="text" name="R_profession" id="defaultForm-text" class="form-control" placeholder="Profession">
          <input type="password" name="R_password" id="defaultForm-text" class="form-control" placeholder="Password">
          <input type="password" name="R_rpassword" id="defaultForm-text" class="form-control" placeholder="Re-type Password">
          <label>Register As :</label>
          <input type="radio" id="Customer" class="validate Customer" name="role" value="Customer" checked>&nbsp;Customer&nbsp;&nbsp;
          <input type="radio" id="Dealer" class="validate Dealer" name="role" value="Dealer">&nbsp;Dealer<br>
          <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <label data-error="wrong" data-success="right" for="defaultForm-pass">Register As</label>&nbsp;&nbsp;&nbsp;
              <input type="radio" id="Customer" class="validate Customer" name="role" value="Customer" checked>&nbsp;Customer&nbsp;&nbsp;
              <input type="radio" id="Dealer" class="validate Dealer" name="role" value="Dealer">&nbsp;Dealer<br>
          </div> -->

          <div class="modal-body mx-3">
            <div class="md-form mb-3">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="text" id="defaultForm-email" class="form-control validate" name="R_Fname" placeholder="First Name">
              <!-- <label data-error="wrong" data-success="right" for="defaultForm-email">First Name</label> -->
            </div>
            <div class="md-form mb-3">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="text" id="defaultForm-email" class="form-control validate" name="R_Lname" placeholder="Last Name">
              <!-- <label data-error="wrong" data-success="right" for="defaultForm-email">Last Name</label> -->
            </div>
            <div class="md-form mb-3">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="text" id="defaultForm-email" class="form-control validate" name="R_Email" placeholder="Email">
              <!-- <label data-error="wrong" data-success="right" for="defaultForm-email">Your email</label> -->
            </div>
            <div class="md-form mb-3">
              <i class="fas fa-envelope prefix grey-text"></i>
              <input type="text" id="defaultForm-email" class="form-control validate" name="R_contact" placeholder="Contact Number">
              <!-- <label data-error="wrong" data-success="right" for="defaultForm-email">Your Contact Number</label> -->
            </div>
            <div class="md-form mb-3">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="text" id="defaultForm-pass" class="form-control validate" name="R_profession" placeholder="Profession">
              <!-- <label data-error="wrong" data-success="right" for="defaultForm-pass">Your Profession</label> -->
            </div>
            <div class="md-form mb-3">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="defaultForm-pass" class="form-control validate" name="R_password" placeholder="Password">
              <!-- <label data-error="wrong" data-success="right" for="defaultForm-pass">Your password</label> -->
            </div>
            <div class="md-form mb-3">
              <i class="fas fa-lock prefix grey-text"></i>
              <input type="password" id="defaultForm-pass" class="form-control validate" name="R_rpassword" placeholder="Re-type Password">
              <!-- <label data-error="wrong" data-success="right" for="defaultForm-pass">Confirm Your password</label> -->
            </div>
            <div class="md-form mb-3">
              <hr>
            </div>
            <div class="md-form mb-4">
              <i class="fas fa-lock prefix grey-text"></i>
              <label data-error="wrong" data-success="right" for="defaultForm-pass">Register As</label>&nbsp;&nbsp;&nbsp;
              <input type="radio" id="Customer" class="validate Customer" name="role" value="Customer" checked>&nbsp;Customer&nbsp;&nbsp;
              <input type="radio" id="Dealer" class="validate Dealer" name="role" value="Dealer">&nbsp;Dealer<br>
            </div>

          </div>
          <div class="modal-footer d-flex justify-content-center">
            <input type="submit" value="Register" name="Register_btn1" class="filter btn btn-common btn-effect" id="">
            <!-- <button class="filter btn btn-common btn-effect" id="btn" name="Regiter_btn">Register</button> -->
          </div>
        </div>
      </form>
    </div>
  </div>

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