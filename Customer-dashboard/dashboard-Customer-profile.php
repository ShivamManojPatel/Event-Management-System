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
      <div class="">
        <center><h2 class="section-title">Profile</h2>
        <!--<span>Booking</span>-->
        <p class="section-subtitle txt-shadow">See yourself here</p></center>
        <div class='col-md-2'>
          <button href="" class="btn btn-success" style='border-radius: 5px;'>Refresh</button>
        </div>
      </div><hr>
        <?php
                                    $id = $_SESSION['User'];

                                    $fetchquery = "select * from registration_master where Email='$id'";
                                    $queryresult = mysqli_query($conn, $fetchquery);

                                    $rowresult = mysqli_fetch_row($queryresult);
                                ?>
            <center><div class="col-md-12">
                        <div class="col-md-6">
                        <div class="blog-item-wrapper">
                            <div class="blog-item-img"><br>
                            <a href="">
                                <center><img src="<?php if(isset($rowresult[9])){echo $rowresult[9];}else{echo "Uploads/Ano_Male.png";}?>" alt="" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2); height: 200px; width: 200px; border-radius: 999px;"></center>
                            </a>
                            </div>
                            <div class="blog-item-text">
                            <div class="">
                                <center><h6 style="font-size: 30px;"><b>Profile</b></h6></center>
                            </div>
                            <div>
                                <hr>
                                <h6>
                                    First Name: <?php echo $rowresult[1]; ?><br><br>
                                    Last Name: <?php echo $rowresult[2]; ?><br><br>
                                    Email: <?php echo $rowresult[3]; ?><br><br>
                                    Contact_no: <?php echo $rowresult[4]; ?><br><br>
                                    Birthdate: <?php if(isset($rowresult[5])){echo $rowresult[5];}else{echo "Not set";} ?><br><br>
                                    Profession: <?php if(isset($rowresult[7])){echo $rowresult[7];}else{echo "Not set";} ?><br><br>
                                </h6>
                                <hr>
                            </div>
                            <div class="meta-tags">
                                <center><a href="dashboard-Customer-updateprofile.php" class="btn btn-lg btn-common btn-effect wow" data-wow-delay="0.9s">Update Profile</a></center>
                            </div>
                            <div class="meta-tags">
                                <center><a href="dashboard-Customer-changepassword.php" class="btn btn-lg btn-common btn-effect wow" data-wow-delay="0.9s">Change password</a></center>
                            </div>
                            <div class="meta-tags">
                                <center><a href="deleteprofile.php" class="btn btn-lg btn-common btn-effect wow" data-wow-delay="0.9s">delete profile</a></center>
                            </div>
                            <div class="meta-tags">
                                <center><button class="btn btn-lg btn-common btn-effect wow" id='uploadprofilebtn' data-wow-delay="0.9s">Change Profile Photo</button></center>
                            </div>
                            <div class="meta-tags">
                              <p><div id='profileupload' style='display: none;'>
                              Upload profile photo : <form method='post' enctype='multipart/form-data'><input class="input--style-1" type="file" name="profile"><br><br>
                              <p><input type='submit' name='submitbtn' value='upload' class='btn btn-primary'></p></form>
                              </div></p>
                            </div>
                            </div>
                        </div>
                        <?php
                          if(isset($_POST['submitbtn']))
                          {
                            if(!($_FILES['profile']['name'] == ""))
                            {
                              $target_dir = "Uploads/";
                              $target_file = $target_dir . basename($_FILES['profile']['name']);
                              if(!file_exists($target_file))
                              {
                                if($_FILES['profile']['type'] == 'image/jpg' || $_FILES['profile']['type'] == 'image/jpeg' || $_FILES['profile']['type'] == 'image/png')
                                {
                                  if(move_uploaded_file($_FILES['profile']['tmp_name'], $target_file))
                                  {
                                    $eprofile = "Uploads/" . $_FILES['profile']['name'];
                                    $equery = "update registration_master set Profile_Photo='$eprofile' where Email='$id'";
                                    $eresult = mysqli_query($conn, $equery);

                                    if($eresult)
                                    {
                                      echo "<script>alert('Uploaded');</script>";
                                    }
                                    else
                                    {
                                      echo "<script>alert('somethings wrong please try again later');</script>";
                                    }
                                  }
                                  else
                                  {
                                    echo "<script>alert('Something went wrong please try again later');</script>";
                                  }
                                }
                                else
                                {
                                  echo "<script>alert('Please upload image only');</script>";
                                }
                              }
                              else
                              {
                                    $eprofile = "Uploads/" . $_FILES['profile']['name'];
                                    $equery = "update registration_master set Profile_Photo='$eprofile' where Email='$id'";
                                    $eresult = mysqli_query($conn, $equery);

                                    if($eresult)
                                    {
                                        echo "<script>alert('Updated');</script>";
                                    }
                                    else
                                    {
                                        echo "<script>alert('somethings wrong please try again later');</script>";
                                    }
                              }
                            }
                            else
                            {
                              echo "<script>alert('Please choose image first');</script>";
                            }
                          }
                        ?>
                        <script>
                            const targetdiv = document.getElementById("profileupload");
                            const btn = document.getElementById("uploadprofilebtn");

                            btn.onclick = function(){
                                if(targetdiv.style.display !== "none"){
                                    targetdiv.style.display = "none";
                                }else{
                                    targetdiv.style.display = "block";
                                }
                            };
                        </script>
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