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

  $idquery = "select CID from registration_master where Email='$id'";
  $idresult = mysqli_query($conn, $idquery);
  $idrow = mysqli_fetch_row($idresult);

  $customerid=$idrow[0];
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
    th{
        position: sticky;
        top: 0px;
    }

    .table-wrapper{
        max-height: 800px;
        overflow-y: scroll;
    }

    .thback{
        background-color: white;
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
        <h2 class="section-title">Manage Event</h2>
        <!--<span>Booking</span>-->
        <p class="section-subtitle txt-shadow">View your booked event here</p>
      </div><hr>
      <?php if(isset($_COOKIE['cancel'])){ echo "<center><div style='padding: 0px; background-color: lightgreen; color: black; height: 50px; width: 50%; border-radius: 99px;'>";?><?php echo $_COOKIE['cancel']. "!<br> our exicutive will contact you for refund in 2-3 working days!!thank you for keeping with us" ?><?php echo "</div><br><br><center>";}else{echo "<br>";}?>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <center><h3 class='mt-4'>Upcoming Events</h3></center>
                </div>
                <center><div class='table-wrapper col-md-12'>
                    <?php
                        $query = "select book_event.B_id, event_type.Event_name, book_event.From_Date, book_event.To_Date, book_event.No_of_days, book_event.Noofperson, payment.Amount from book_event join event_type on event_type.ETid=book_event.ET_id join payment on payment.B_id=book_event.B_Id where book_event.C_id='$customerid' and book_event.Status='Upcoming'";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_affected_rows($conn) > 0)
                        {
                            ?>
                                <table class="table table-borderless table-wrapper">
                                    <thead>
                                        <th style="background-color: white;">Event Type</th>
                                        <th style="background-color: white;">From date</th>
                                        <th style="background-color: white;">To date</th>
                                        <th style="background-color: white;">No. of days</th>
                                        <th style="background-color: white;">No. of person</th>
                                        <th style="background-color: white;">Amount</th>
                                        <th style="background-color: white;">Cancel</th>
                                        <!-- <th style="background-color: white;">Delete</th> -->
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($row = mysqli_fetch_row($result))
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row[1]; ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[5]; ?></td>
                                                        <td><?php echo $row[6]; ?></td>
                                                        <td><form method="post" action="cancelevent.php?bid=<?php echo $row[0]; ?>"><input type='submit' value='Cancel Event' class="btn-sm btn-danger" style="border-radius: 5px;"></form></td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                        }
                        else
                        {
                            ?>
                            <center><h6 class="mt-4">No Events booked</h6></center>
                            <?php
                        }
                    ?>
                </div></center>
            </div>
        </div><hr>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <center><h3 class='mt-4'>Completed Events</h3></center>
                </div>
                <center><div class='table-wrapper col-md-12'>
                    <?php
                        $query = "select book_event.B_id, event_type.Event_name, book_event.From_Date, book_event.To_Date, book_event.No_of_days, book_event.Noofperson, payment.Amount from book_event join event_type on event_type.ETid=book_event.ET_id join payment on payment.B_id=book_event.B_Id where book_event.C_id='$customerid' and book_event.Status='Done'";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_affected_rows($conn) > 0)
                        {
                            ?>
                                <table class="table table-borderless table-wrapper">
                                    <thead>
                                        <th style="background-color: white;">Event Type</th>
                                        <th style="background-color: white;">From date</th>
                                        <th style="background-color: white;">To date</th>
                                        <th style="background-color: white;">No. of days</th>
                                        <th style="background-color: white;">No. of person</th>
                                        <th style="background-color: white;">Amount</th>
                                        <!-- <th style="background-color: white;">Delete</th> -->
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($row = mysqli_fetch_row($result))
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row[1]; ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[5]; ?></td>
                                                        <td><?php echo $row[6]; ?></td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                        }
                        else
                        {
                            ?>
                            <center><h6 class="mt-4">No Events Completed</h6></center>
                            <?php
                        }
                    ?>
                </div></center>
            </div>
        </div><hr>

        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12">
                    <center><h3 class='mt-4'>Cancelled Events</h3></center>
                </div>
                <center><div class='table-wrapper col-md-12'>
                    <?php
                        $query = "select book_event.B_id, event_type.Event_name, book_event.From_Date, book_event.To_Date, book_event.No_of_days, book_event.Noofperson, payment.Amount from book_event join event_type on event_type.ETid=book_event.ET_id join payment on payment.B_id=book_event.B_Id where book_event.C_id='$customerid' and book_event.Status='Cancelled'";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_affected_rows($conn) > 0)
                        {
                            ?>
                                <table class="table table-borderless table-wrapper">
                                    <thead>
                                        <th style="background-color: white;">Event Type</th>
                                        <th style="background-color: white;">From date</th>
                                        <th style="background-color: white;">To date</th>
                                        <th style="background-color: white;">No. of days</th>
                                        <th style="background-color: white;">No. of person</th>
                                        <th style="background-color: white;">Amount</th>
                                        <!-- <th style="background-color: white;">Delete</th> -->
                                    </thead>
                                    <tbody>
                                        <?php
                                            while($row = mysqli_fetch_row($result))
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?php echo $row[1]; ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[5]; ?></td>
                                                        <td><?php echo $row[6]; ?></td>
                                                    </tr>
                                                <?php
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            <?php
                        }
                        else
                        {
                            ?>
                            <center><h6 class="mt-4">No Events Cancelled yet</h6></center>
                            <?php
                        }
                    ?>
                </div></center>
            </div>
        </div><hr>
        
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