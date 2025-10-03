<?php
include ('../Datacon.php');

if(!$conn)
{
    header('location: ../error/Databaseerror.php');
}
  session_start();

   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }

   if(isset($_POST['refresh']))
   {
    header('location: dashboard-admin-Dealers.php');
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
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/line-icons.css">

        <meta charset="utf-8">
        <style>
            th{
                position: sticky;
                top: 0px;
            }

            .table-wrapper{
                max-height: 500px;
                overflow-y: scroll;
            }

            .thback{
                background-color: white;
            }

            input[type=text]{
                border: 1px solid lightgray; 
                border-radius: 5px;
            }
        </style>
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><span class="lni-bulb"></span>#Events</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Events.php">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Customers.php">Customers</a>
                    <?php if(isset($_SESSION['mainadmin'])){ echo "<a class='list-group-item list-group-item-action list-group-item-light p-3' href='dashboard-admin-Admin.php'>Admin</a>";} ?>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Dealers.php" style='color: black;'>Dealers</a>
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
                <div class="container-fluid">
                <br>
                <form methood='post'><input value='Refresh' name='refresh' type="submit" class="btn btn-success"></form>
                <hr>
                    <center><h1 class="mt-4">Request by Dealers</h1></center>
                    <div class='table-wrapper'>
                    <center>
                            <form method="post">
                                <input type="text" name="search" style='width: 250px;height: 40px;' placeholder='Search by email'>
                                <input type="submit" value="Search" name='searchbtn' class="btn btn-primary">
                            </form>
                        </center>
                        <table class="table table-borderless table-wrapper">
                        <?php

                            if(!isset($_POST['searchbtn']))
                            {
                                ?>
                                <table class="table table-borderless table-wrapper">
                                        <?php
                                            $query = "SELECT * FROM tmp_dealer INNER JOIN dealer_type on dealer_type.Dealer_id = tmp_dealer.Profession";
                                            $result = mysqli_query($conn, $query);

                                            if(mysqli_affected_rows($conn) > 0)
                                            {
                                                ?>
                                                <thead>
                                                    <th style="background-color: white;">First Name</th>
                                                    <th style="background-color: white;">Last Name</th>
                                                    <th style="background-color: white;">Store Name</th>
                                                    <th style="background-color: white;">Email</th>
                                                    <th style="background-color: white;">Contact No</th>
                                                    <th style="background-color: white;">Alternate Contact no</th>
                                                    <th style="background-color: white;">Profession</th>
                                                    <th style="background-color: white;">Accept</th>
                                                    <th style="background-color: white;">Reject</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[1]; ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[5]; ?></td>
                                                        <td><?php echo $row[6]; ?></td>
                                                        <td><?php echo $row[15]; ?></td>
                                                        <td><form method='post' action="accept.php?id=<?php echo $row[0]; $_SESSION['remail'] = $row[3];?>"><input type='submit' value='Accept' class="btn btn-success"></form></td>
                                                        <td><form method='post' action="reject.php?id=<?php echo $row[0]; $_SESSION['remail'] = $row[3];?>"><input type='submit' value='Reject' class="btn btn-danger"></form></td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <center><h3 class="mt-4">No records here</h3></center>
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
                                <table class="table table-borderless table-wrapper">
                                        <?php
                                        if(!empty($_POST['search']))
                                        {
                                            $Email = $_POST['search'];
                                            $query = "SELECT * FROM tmp_dealer INNER JOIN dealer_type on dealer_type.Dealer_id = tmp_dealer.Profession where Email='$Email'";
                                            $result = mysqli_query($conn, $query);

                                            if(mysqli_affected_rows($conn) > 0)
                                            {
                                                ?>
                                                <thead>
                                                    <th style="background-color: white;">First Name</th>
                                                    <th style="background-color: white;">Last Name</th>
                                                    <th style="background-color: white;">Store Name</th>
                                                    <th style="background-color: white;">Email</th>
                                                    <th style="background-color: white;">Contact No</th>
                                                    <th style="background-color: white;">Alternate Contact No</th>
                                                    <th style="background-color: white;">Profession</th>
                                                    <th style="background-color: white;">Accept</th>
                                                    <th style="background-color: white;">reject</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[1]; ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[5]; ?></td>
                                                        <td><?php echo $row[6]; ?></td>
                                                        <td><?php echo $row[15]; ?></td>
                                                        <td><form method='post' action="accept.php?id=<?php echo $row[0]; $_SESSION['remail'] = $row[3];?>"><input type='submit' value='Accept' class="btn btn-success"></form></td>
                                                        <td><form method='post' action="reject.php?id=<?php echo $row[0]; $_SESSION['remail'] = $row[3];?>"><input type='submit' value='Reject' class="btn btn-danger"></form></td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <center><h3 class="mt-4">No records here</h3></center>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('Please enter email');</script>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                        ?>
                            </tbody>
                        </table>
                                </div>

                        <hr>

                        <center><h1 class="mt-4">Active Dealers</h1></center>
                    <div class='table-wrapper'>
                    <center>
                            <form method="post">
                                <input type="text" name="Asearch" style='width: 250px;height: 40px;' placeholder='Search by email'>
                                <input type="submit" value="Search" name='Asearchbtn' class="btn btn-primary">
                            </form>
                        </center>
                        <table class="table table-borderless table-wrapper">
                        <?php

                            if(!isset($_POST['Asearchbtn']))
                            {
                                ?>
                                <table class="table table-borderless table-wrapper">
                                        <?php
                                            $query = "SELECT * FROM dealer_registration INNER JOIN dealer_type on dealer_type.Dealer_id = dealer_registration.Professionid where Status='Active'";
                                            $result = mysqli_query($conn, $query);

                                            if(mysqli_affected_rows($conn) > 0)
                                            {
                                                ?>
                                                <thead>
                                                    <th style="background-color: white;">First Name</th>
                                                    <th style="background-color: white;">Last Name</th>
                                                    <th style="background-color: white;">Store Name</th>
                                                    <th style="background-color: white;">Email</th>
                                                    <th style="background-color: white;">Contact No</th>
                                                    <th style="background-color: white;">Alternate contact No</th>
                                                    <th style="background-color: white;">Profession</th>
                                                    <th style="background-color: white;">Inactive</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[1]; ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[5]; ?></td>
                                                        <td><?php echo $row[6]; ?></td>
                                                        <td><?php echo $row[15]; ?></td>
                                                        <td><form method='post' action="dactive.php?id=<?php echo $row[0]; ?>"><input type='submit' value='Inactive' class="btn btn-danger"></form></td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <center><h3 class="mt-4">No records here</h3></center>
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
                                <table class="table table-borderless table-wrapper">
                                        <?php
                                        if(!empty($_POST['Asearch']))
                                        {
                                            $Email = $_POST['Asearch'];
                                            $query = "SELECT * FROM dealer_registration INNER JOIN dealer_type on dealer_type.Dealer_id = dealer_registration.Professionid where Status='Active' and Email='$Email'";
                                            $result = mysqli_query($conn, $query);

                                            if(mysqli_affected_rows($conn) > 0)
                                            {
                                                ?>
                                                <thead>
                                                    <th style="background-color: white;">First Name</th>
                                                    <th style="background-color: white;">Last Name</th>
                                                    <th style="background-color: white;">Store Name</th>
                                                    <th style="background-color: white;">Email</th>
                                                    <th style="background-color: white;">Contact No</th>
                                                    <th style="background-color: white;">Alternate contact No</th>
                                                    <th style="background-color: white;">Profession</th>
                                                    <th style="background-color: white;">Inactive</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[1]; ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[5]; ?></td>
                                                        <td><?php echo $row[6]; ?></td>
                                                        <td><?php echo $row[15]; ?></td>
                                                        <td><form method='post' action="dactive.php?id=<?php echo $row[0]; ?>"><input type='submit' value='Inactive' class="btn btn-danger"></form></td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <center><h3 class="mt-4">No records here</h3></center>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('Please enter email');</script>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                        ?>
                            </tbody>
                        </table>

                    </div>
                    <hr>

                        <center><h1 class="mt-4">Inctive Dealers</h1></center>
                    <div class='table-wrapper'>
                    <center>
                            <form method="post">
                                <input type="text" name="Isearch" style='width: 250px;height: 40px;' placeholder='Search by email'>
                                <input type="submit" value="Search" name='Isearchbtn' class="btn btn-primary">
                            </form>
                        </center>
                        <table class="table table-borderless table-wrapper">
                        <?php

                            if(!isset($_POST['Isearchbtn']))
                            {
                                ?>
                                <table class="table table-borderless table-wrapper">
                                        <?php
                                            $query = "SELECT * FROM dealer_registration INNER JOIN dealer_type on dealer_type.Dealer_id = dealer_registration.Professionid where Status='Inactive'";
                                            $result = mysqli_query($conn, $query);

                                            if(mysqli_affected_rows($conn) > 0)
                                            {
                                                ?>
                                                <thead>
                                                    <th style="background-color: white;">First Name</th>
                                                    <th style="background-color: white;">Last Name</th>
                                                    <th style="background-color: white;">Store Name</th>
                                                    <th style="background-color: white;">Email</th>
                                                    <th style="background-color: white;">Contact No</th>
                                                    <th style="background-color: white;">Alternate contact No</th>
                                                    <th style="background-color: white;">Profession</th>
                                                    <th style="background-color: white;">Active</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[1]; ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[5]; ?></td>
                                                        <td><?php echo $row[6]; ?></td>
                                                        <td><?php echo $row[15]; ?></td>
                                                        <td><form method='post' action="dinactive.php?id=<?php echo $row[0]; ?>"><input type='submit' value='Active' class="btn btn-success"></form></td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <center><h3 class="mt-4">No records here</h3></center>
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
                                <table class="table table-borderless table-wrapper">
                                        <?php
                                        if(!empty($_POST['Isearch']))
                                        {
                                            $Email = $_POST['Isearch'];
                                            $query = "SELECT * FROM dealer_registration INNER JOIN dealer_type on dealer_type.Dealer_id = dealer_registration.Professionid where Status='Inactive' and Email='$Email'";
                                            $result = mysqli_query($conn, $query);

                                            if(mysqli_affected_rows($conn) > 0)
                                            {
                                                ?>
                                                <thead>
                                                    <th style="background-color: white;">First Name</th>
                                                    <th style="background-color: white;">Last Name</th>
                                                    <th style="background-color: white;">Store Name</th>
                                                    <th style="background-color: white;">Email</th>
                                                    <th style="background-color: white;">Contact No</th>
                                                    <th style="background-color: white;">Alternate contact No</th>
                                                    <th style="background-color: white;">Profession</th>
                                                    <th style="background-color: white;">Active</th>
                                                </thead>
                                                <tbody>
                                                <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[1]; ?></td>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $row[3]; ?></td>
                                                        <td><?php echo $row[4]; ?></td>
                                                        <td><?php echo $row[5]; ?></td>
                                                        <td><?php echo $row[6]; ?></td>
                                                        <td><?php echo $row[15]; ?></td>
                                                        <td><form method='post' action="dinactive.php?id=<?php echo $row[0]; ?>"><input type='submit' value='Active' class="btn btn-success"></form></td>
                                                        </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                ?>
                                                    <center><h3 class="mt-4">No records here</h3></center>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            echo "<script>alert('Please enter email');</script>";
                                        }
                                        ?>
                                    </tbody>
                                </table>
                                <?php
                            }
                        ?>
                            </tbody>
                        </table>

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
