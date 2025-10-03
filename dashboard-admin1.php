<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>#Events-Dashboard.Admin</title>

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
                            <a class="nav-link page-scroll" href="#event">Manage Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#customer">Customers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#dealer">Dealers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#feedback">View Feedback</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="" data-toggle="modal"
                                data-target="#modalmanageprofile">Manage Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="index.php">Log Out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <!--Manage Event-->
    <section id="event" class="section" style="background-color:rgb(248, 239, 246);">
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
                        <a class="filter btn btn-common btn-effect" data-filter=".development">
                            Delete Events
                        </a>
                    </div>
                    <!-- Portfolio Controller/Buttons Ends-->
                </div>
            </div>
        </div>
    </section>

    <!--Manage Customer-->
    <section id="customer" class="section" style="background-color:rgb(238, 226, 247);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Manage Customer Details</h2>
                <!--<span>Projects</span>-->
                <!--<p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Portfolio Controller/Buttons -->
                    <div class="controls text-center">
                        <a class="filter active btn btn-common btn-effect" data-filter=".design">
                            Manage
                        </a>
                        <a class="filter btn btn-common btn-effect" data-filter=".development">
                            Search
                        </a>
                    </div>
                    <!-- Portfolio Controller/Buttons Ends-->
                </div>
            </div>
        </div>

        <div id="portfolio" class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 mix development print">
                <div class="portfolio-item">
                    <div class="col-lg-12 col-md-12 col-xs-12" align="center">
                        <form class="contactForm">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Search by Name">
                                    <a class="filter btn btn-common btn-effect">Go</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="shot-item text-center">
                        <table class="tblmanagecust" align="center" width="80%">
                            <tr class="trmanagecust">
                                <th class="thmanagecust">ID</th>
                                <th class="thmanagecust">First Name</th>
                                <th class="thmanagecust">Last Name</th>
                                <th class="thmanagecust">Email</th>
                                <th class="thmanagecust">Contact No.</th>
                                <th class="thmanagecust">Profession</th>
                            </tr>
                            <tr class="trmanagecust">
                                <td>101</td>
                                <td>Harsh</td>
                                <td>Gandhi</td>
                                <td>hcgandhi54@gmail.com</td>
                                <td>6353358020</td>
                                <td>Software Developer</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 mix design print">
                <div class="portfolio-item">
                    <div class="shot-item text-center">
                        <table class="tblmanagecust" align="center" width="80%">
                            <tr class="trmanagecust">
                                <th class="thmanagecust">ID</th>
                                <th class="thmanagecust">First Name</th>
                                <th class="thmanagecust">Last Name</th>
                                <th class="thmanagecust">Email</th>
                                <th class="thmanagecust">Contact No.</th>
                                <th class="thmanagecust">Profession</th>
                            </tr>
                            <tr class="trmanagecust">
                                <td>101</td>
                                <td>Harsh</td>
                                <td>Gandhi</td>
                                <td>hcgandhi54@gmail.com</td>
                                <td>6353358020</td>
                                <td>Software Developer</td>
                            </tr>
                            <tr class="trmanagecust">
                                <td>102</td>
                                <td>Shivam</td>
                                <td>Patel</td>
                                <td>shivamptl123@gmail.com</td>
                                <td>7990597887</td>
                                <td>Advocate</td>
                            </tr>
                            <tr class="trmanagecust">
                                <td>103</td>
                                <td>Preet</td>
                                <td>Patel</td>
                                <td>20bmiit036@gmail.com</td>
                                <td>9865321245</td>
                                <td>Accountant</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--Manage Dealer-->
    <section id="dealer" class="section" style="background-color:rgb(247, 250, 234);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Manage Dealer Details</h2>
                <!--<span>Projects</span>-->
                <!--<p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Portfolio Controller/Buttons -->
                    <div class="controls text-center">
                        <a class="filter active btn btn-common btn-effect" data-filter=".design">
                            Manage
                        </a>
                        <a class="filter btn btn-common btn-effect" data-filter=".development">
                            Search
                        </a>
                    </div>
                    <!-- Portfolio Controller/Buttons Ends-->
                </div>
            </div>
        </div>

        <div id="portfolio" class="row">
            <div class="col-lg-12 col-md-12 col-xs-12 mix development print">
                <div class="portfolio-item">
                    <div class="col-lg-12 col-md-12 col-xs-12" align="center">
                        <form class="contactForm">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <input type="text" class="form-control" id="search" name="search"
                                        placeholder="Search by Name">
                                    <a class="filter btn btn-common btn-effect">Go</a>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="shot-item text-center">
                        <table class="tblmanagecust" align="center" width="80%">
                            <tr class="trmanagecust">
                                <th class="thmanagecust">ID</th>
                                <th class="thmanagecust">First Name</th>
                                <th class="thmanagecust">Last Name</th>
                                <th class="thmanagecust">Email</th>
                                <th class="thmanagecust">Contact No.</th>
                                <th class="thmanagecust">Profession</th>
                            </tr>
                            <tr class="trmanagecust">
                                <td>101</td>
                                <td>Harsh</td>
                                <td>Gandhi</td>
                                <td>hcgandhi54@gmail.com</td>
                                <td>6353358020</td>
                                <td>Software Developer</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 col-md-12 col-xs-12 mix design print">
                <div class="portfolio-item">
                    <div class="shot-item text-center">
                        <table class="tblmanagecust" align="center" width="80%">
                            <tr class="trmanagecust">
                                <th class="thmanagecust">ID</th>
                                <th class="thmanagecust">First Name</th>
                                <th class="thmanagecust">Last Name</th>
                                <th class="thmanagecust">Email</th>
                                <th class="thmanagecust">Contact No.</th>
                                <th class="thmanagecust">Profession</th>
                            </tr>
                            <tr class="trmanagecust">
                                <td>101</td>
                                <td>Harsh</td>
                                <td>Gandhi</td>
                                <td>hcgandhi54@gmail.com</td>
                                <td>6353358020</td>
                                <td>Software Developer</td>
                            </tr>
                            <tr class="trmanagecust">
                                <td>102</td>
                                <td>Shivam</td>
                                <td>Patel</td>
                                <td>shivamptl123@gmail.com</td>
                                <td>7990597887</td>
                                <td>Advocate</td>
                            </tr>
                            <tr class="trmanagecust">
                                <td>103</td>
                                <td>Preet</td>
                                <td>Patel</td>
                                <td>20bmiit036@gmail.com</td>
                                <td>9865321245</td>
                                <td>Accountant</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--View Feedback-->
    <section id="feedback" class="section" style="background-color:rgb(225, 239, 247);">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">Feedback</h2>
                <!--<span>Projects</span>-->
                <!--<p class="section-subtitle">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dignissimos debitis.</p>-->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <!-- Portfolio Controller/Buttons -->
                    <div class="controls text-center">
                        <a class="filter active btn btn-common btn-effect" data-filter=".design">
                            Customer
                        </a>
                        <a class="filter btn btn-common btn-effect" data-filter=".development">
                            Dealer
                        </a>
                    </div>
                    <!-- Portfolio Controller/Buttons Ends-->
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