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

  $id = $_SESSION['User'];

  $query = "select * from registration_master where Email='$id'";
  $result = mysqli_query($conn, $query);
  $row = mysqli_fetch_row($result);

  if(isset($_POST['Update']))
  {
    if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['contact']) && !empty($_POST['gender']) && !empty($_POST['profession']))
    {
        $ano = str_split($_POST['contact']);
        if(strlen($_POST['contact']) == 10 && is_numeric($_POST['contact']) && (($ano[0] == 6) || ($ano[0] == 7) || ($ano[0] == 8) || ($ano[0] == 9)))
        {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $email = $_POST['email'];
            $contact = $_POST['contact'];
            $bdate = $_POST['bdate'];
            $gender = $_POST['gender'];
            $profession = $_POST['profession'];

            $uquery = "update registration_master set First_Name='$fname', Last_Name='$lname', Contact_No='$contact', Birthdate='$bdate', Gender='$gender', Profession='$profession' where CID='$row[0]'";
            $uresult = mysqli_query($conn, $uquery);

            if($uresult)
            {
                header('location: dashboard-Customer-profile.php');
            }
            else
            {
                echo "<script>alert('Somethings wrong please try after sometime')</script>";
            }
        }
        else
        {
            echo "<script>alert('Enter valid contact number')</script>";
        }
    }
    else
    {
        echo "<script>alert('Enter all the details properly')</script>";
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
        color: black;
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
              <a class="nav-link page-scroll" href="dashboard-Customer-profile.php">Back</a>
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
        <h2 class="section-title">Update Profile</h2>
        <!--<span>Booking</span>-->
        <p class="section-subtitle txt-shadow">Update your profile here</p>
      </div>
      <hr>
        <div class="row">
          <div class="" style="width: 100%;">
            <div class="contact-block">
                <center><form method='post'>
                  <div class="col-md-6">
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type='text' name='fname' class='drop' placeholder="First Name" value="<?php if(isset($row[1])){echo $row[1];} ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type='text' name='lname' class='drop' placeholder="Last Name" value="<?php if(isset($row[2])){echo $row[2];} ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input disabled type='text' name='email' class='drop' placeholder="Email" value="<?php if(isset($row[3])){echo $row[3];} ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type='text' name='contact' class='drop' placeholder="contact No." value="<?php if(isset($row[4])){echo $row[4];} ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type='date' name='bdate' class='drop' placeholder="Birthdate" value="<?php if(isset($row[5])){echo $row[5];} ?>">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <select name="gender" class="drop">
                          <option selected disabled>Gender</option>
                          <option value="Male" <?php if(isset($row[6])){if($row[6] == 'Male'){echo "selected";}} ?>>Male</option>
                          <option value="Female" <?php if(isset($row[6])){if($row[6] == 'Female'){echo "selected";}} ?>>Female</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <input type='text' name='profession' class='drop' placeholder="Profession" value="<?php if(isset($row[7])){echo $row[7];} ?>">
                      </div>
                    </div>
                    <center><div class="col-md-12" id="estimate">
                      <div class="form-group">
                        <h5 style="font-size: 20px;"></h5>
                        <input type="submit" style="border-radius: 0px;" name='Update' id='estimation' class="btn btn-success" value="Update">
                      </div>
                    </div></center>
                  </div>
                </form>
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

