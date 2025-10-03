<?php
  session_start();

   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
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
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard-Admin</title>
        <!-- Favicon-->
        <link rel="shortout icon" type="image/x-icon" href="../img/favicon.png"/>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet"/>
      <link rel="stylesheet" href="../css/line-icons.css">
      <link rel='stylesheet' href='//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css'>

        <meta charset="utf-8">

    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><span class="lni-bulb"></span>#Events</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin.php" style='color: black;'>Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Events.php">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Customers.php">Customers</a>
                    <?php if(isset($_SESSION['mainadmin'])){ echo "<a class='list-group-item list-group-item-action list-group-item-light p-3' href='dashboard-admin-Admin.php'>Admin</a>";} ?>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Dealers.php">Dealers</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Packages.php">Packages</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Profile.php">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Feedback.php">Feedback</a>                    
                </div>
            </div>
            <!-- Page content wrapper-->
            <div id="page-content-wrapper">
                <!-- Top navigation-->
                <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-outline-primary" id="sidebarToggle"><span class="lni-bulb"></span></button>
                        
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                                <li class="nav-item active"><a class="nav-link" href="../index.php">Home</a></li>
                                <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Page content-->
                
                    <div class="container-fluid" style='padding-left: 5%; padding-right: 5%;'>
                        <center><h1 class="mt-4">Dashboard</h1></center><hr>
                        <table style='width: 100%;'>
                            <tr>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                                $Uquery = "select count(CID) from registration_master where Status='Active'";
                                                $Uresult = mysqli_query($conn, $Uquery);
                                                $row = mysqli_fetch_array($Uresult);
                                            ?>
                                            <center><h4 class="card-title">Active User</h4>
                                            <h3 class="card-text"><?php echo $row[0]; ?></h3>                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                                $Dquery = "select count(D_id) from dealer_registration where Status='Active'";
                                                $Dresult = mysqli_query($conn, $Dquery);
                                                $Drow = mysqli_fetch_array($Dresult);
                                            ?>
                                            <center><h4 class="card-title">Active Dealer</h4>
                                            <h3 class="card-text"><?php echo $Drow[0]; ?></h3>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                                $IPquery = 'select * from visitors';
                                                $IPresult = mysqli_query($conn, $IPquery);
                                                $count = mysqli_num_rows($IPresult);
                                            ?>
                                            <center><h4 class="card-title">Website Hit</h4>
                                            <h3 class="card-text"><?php echo $count; ?></h3>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <div class="card">
                                        <div class="card-body">
                                            <?php
                                                $incomequery = "select Amount from payment where Status='paid'";
                                                $incomeresult = mysqli_query($conn, $incomequery);

                                                $total = 0;

                                                while($row = mysqli_fetch_row($incomeresult))
                                                {
                                                    $total = $total + $row[0];
                                                }
                                            ?>
                                            <center><h4 class="card-title">Total Income</h4>
                                            <h3 class="card-text"><?php echo $total; ?></h3>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table><hr>
                        <?php if(isset($_COOKIE['msg1'])){ echo "<center><div style='padding: 0px; background-color: lightgreen; color: black; height: 25px; width: 50%; border-radius: 99px;'>";?><?php echo $_COOKIE['msg1']; ?><?php echo "</div><br><br><center>";}else{echo "<br>";}?>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-12">
                                    <center><h3 class='mt-4'>Upcoming Events</h3></center>
                                </div>
                                <center><div class='table-wrapper col-md-12'>
                                    <?php
                                        $query = "select book_event.B_id, event_type.Event_name, book_event.From_Date, book_event.To_Date, book_event.No_of_days, book_event.Noofperson, payment.Amount from book_event join event_type on event_type.ETid=book_event.ET_id join payment on payment.B_id=book_event.B_Id where book_event.Status='Upcoming'";
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
                                                        <th style="background-color: white;">Completed</th>
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
                                                                        <td><form method="post" action="completeevent.php?bid=<?php echo $row[0]; ?>"><input type='submit' value='Complete' class="btn btn-success"></form></td>
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
                                        $query = "select book_event.B_id, event_type.Event_name, book_event.From_Date, book_event.To_Date, book_event.No_of_days, book_event.Noofperson, payment.Amount from book_event join event_type on event_type.ETid=book_event.ET_id join payment on payment.B_id=book_event.B_Id where book_event.Status='Complete'";
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
                                        $query = "select book_event.B_id, event_type.Event_name, book_event.From_Date, book_event.To_Date, book_event.No_of_days, book_event.Noofperson, payment.Amount from book_event join event_type on event_type.ETid=book_event.ET_id join payment on payment.B_id=book_event.B_Id where book_event.Status='Cancelled'";
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
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright Start  -->
     
      <!-- Copyright End -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="../js/scripts.js"></script>
        <script src="../js/jquery-min.js"></script>
        <script src='//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js'></script>
        <script src='//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js'></script>
    <!-- <script src="../js/popper.min.js"></script>
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
    <script src="../js/main.js"></script> -->
    </body>
</html>