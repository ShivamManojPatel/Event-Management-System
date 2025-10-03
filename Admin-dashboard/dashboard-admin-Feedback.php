<?php
  session_start();
    require '../Datacon.php';   
   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }

   if(!$conn)
   {
        header('location: ../error/Databaseerror.php;');
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

        <meta charset="utf-8">
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Dealers.php">Dealers</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Packages.php">Packages</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Profile.php">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Feedback.php" style='color: black;'>Feedback</a>                    

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
                <center><h1 class="mt-4">Feedback</h1></center><hr>
                <div class='table-wrapper'>

                    <?php
                        $query = "select * from feedback";
                        $result = mysqli_query($conn, $query);
                        if(mysqli_affected_rows($conn) > 0)
                        {
                            ?>
                            <table class="table table-borderless table-wrapper">
                                <thead>
                                    <th style="background-color: white;">Name</th>
                                    <th style="background-color: white;">Email</th>
                                    <th style="background-color: white;">Message</th>
                                    <th style="background-color: white;">View</th>
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
                                                <td><form method='post' action="view.php?id=<?php echo $row[0]; $_SESSION['cuEmail'] = $row[2]; $_SESSION['Msg'] = $row[3];?>"><input type='submit' value='view' class="btn btn-primary"></form></td>
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
                            <center><h3 class="mt-4">No records here</h3></center>  
                            <?php 
                        }
                    ?>
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
