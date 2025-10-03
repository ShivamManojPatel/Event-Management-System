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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Packages.php" style='color: black;'>Packages</a>
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
                        <center><h1 class="mt-4">Packages</h1></center><hr>
                        <center><h1 class='mt-4'>Wedding Packages</h1></center>
                        <div class='table-wrapper'>
                            <?php
                                $query = "select packages.PT_id, packages.ET_id, package_type.Package_type from packages join package_type on packages.PT_id = package_type.PT_id where packages.ET_id='1' and packages.Status='Active'";
                                $result = mysqli_query($conn, $query);
                                if(mysqli_affected_rows($conn) > 0)
                                {
                                    ?>
                                    <table class="table table-borderless table-wrapper">
                                        <thead>
                                            <th style="background-color: white;">Package type</th>
                                            <th style="background-color: white;">Caterar</th>
                                            <th style="background-color: white;">Decorator</th>
                                            <th style="background-color: white;">Benquet hall</th>
                                            <th style="background-color: white;">Beauty Parlor</th>
                                            <th style="background-color: white;">Dj</th>
                                            <th style="background-color: white;">Photographer</th>
                                            <th style="background-color: white;">Edit</th>
                                            <!-- <th style="background-color: white;">Delete</th> -->
                                        </thead>
                                        <tbody>
                                            <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                        $catrarquery = "select dealer_registration.D_id, dealer_registration.StoreName from caterar join dealer_registration on caterar.DealerId = dealer_registration.D_id join packages on caterar.C_id = packages.Caterar_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $catrarresult = mysqli_query($conn, $catrarquery);
                                                        $catrow = mysqli_fetch_row($catrarresult);

                                                        $decorator = "select dealer_registration.D_id, dealer_registration.StoreName from decorator join dealer_registration on decorator.DealerId = dealer_registration.D_id join packages on decorator.D_id = packages.Decorator_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $decoatorresult = mysqli_query($conn, $decorator);
                                                        $decrow = mysqli_fetch_row($decoatorresult);

                                                        $benquethall = "select dealer_registration.D_id, dealer_registration.StoreName from benquethall join dealer_registration on benquethall.DealerId = dealer_registration.D_id join packages on benquethall.BH_id = packages.BenquetHall_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $benquetresult = mysqli_query($conn, $benquethall);
                                                        $benrow = mysqli_fetch_row($benquetresult);

                                                        $beautyparlor = "select dealer_registration.D_id, dealer_registration.StoreName from beautyparlor join dealer_registration on beautyparlor.DealerId = dealer_registration.D_id join packages on beautyparlor.B_id = packages.BeautyParlor_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $beautyresult = mysqli_query($conn, $beautyparlor);
                                                        $bearow = mysqli_fetch_row($beautyresult);

                                                        $dj = "select dealer_registration.D_id, dealer_registration.StoreName from dj join dealer_registration on dj.DealerId = dealer_registration.D_id join packages on dj.DJ_id = packages.DJ_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $djresult = mysqli_query($conn, $dj);
                                                        $djrow = mysqli_fetch_row($djresult);

                                                        $photo = "select dealer_registration.D_id, dealer_registration.StoreName from photographer join dealer_registration on photographer.DealerId = dealer_registration.D_id join packages on photographer.P_id = packages.Photographer_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $photoresult = mysqli_query($conn, $photo);
                                                        $phorow = mysqli_fetch_row($photoresult);
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $catrow[1]; ?></td>
                                                        <td><?php echo $decrow[1]; ?></td>
                                                        <td><?php echo $benrow[1]; ?></td>
                                                        <td><?php echo $bearow[1]; ?></td>
                                                        <td><?php echo $djrow[1]; ?></td>
                                                        <td><?php echo $phorow[1]; ?></td>
                                                        <td><form method='post' action="dashboard-admin-editpackage.php?ETid=<?php echo $row[1];?>&PT=<?php echo $row[0];?>&caterar=<?php echo $catrow[0];?>&decorator=<?php echo $decrow[0];?>&benquethall=<?php echo $benrow[0];?>&beautyparlor=<?php echo $bearow[0];?>&dj=<?php echo $djrow[0];?>&photo=<?php echo $phorow[0];?>"><input type='submit' value='Edit' class="btn btn-primary"></form></td>
                                                        <!-- <td><form method='post' action="ETdelete.php?id=<?php echo $row[0];?>"><input type='submit' value='Delete' class="btn btn-danger"></form></td> -->
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
                        <hr>

                        <center><h1 class='mt-4'>Birthday party Packages</h1></center>
                        <div class='table-wrapper'>
                                <?php
                                    $query = "select packages.PT_id, packages.ET_id, package_type.Package_type from packages join package_type on packages.PT_id = package_type.PT_id where packages.ET_id='2' and packages.Status='Active'";
                                    $result = mysqli_query($conn, $query);
                                    if(mysqli_affected_rows($conn) > 0)
                                    {
                                        ?>
                                        <table class="table table-borderless table-wrapper">
                                            <thead>
                                                <th style="background-color: white;">Package type</th>
                                                <th style="background-color: white;">Caterar</th>
                                                <th style="background-color: white;">Decorator</th>
                                                <th style="background-color: white;">Benquet hall</th>
                                                <th style="background-color: white;">Beauty Parlor</th>
                                                <th style="background-color: white;">Dj</th>
                                                <th style="background-color: white;">Photographer</th>
                                                <th style="background-color: white;">Edit</th>
                                                <!-- <th style="background-color: white;">Delete</th> -->
                                            </thead>
                                            <tbody>
                                                <?php
                                                    while($row = mysqli_fetch_array($result))
                                                    {
                                                            $catrarquery = "select dealer_registration.D_id, dealer_registration.StoreName from caterar join dealer_registration on caterar.DealerId = dealer_registration.D_id join packages on caterar.C_id = packages.Caterar_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                            $catrarresult = mysqli_query($conn, $catrarquery);
                                                            $catrow = mysqli_fetch_row($catrarresult);

                                                            $decorator = "select dealer_registration.D_id, dealer_registration.StoreName from decorator join dealer_registration on decorator.DealerId = dealer_registration.D_id join packages on decorator.D_id = packages.Decorator_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                            $decoatorresult = mysqli_query($conn, $decorator);
                                                            $decrow = mysqli_fetch_row($decoatorresult);

                                                            $benquethall = "select dealer_registration.D_id, dealer_registration.StoreName from benquethall join dealer_registration on benquethall.DealerId = dealer_registration.D_id join packages on benquethall.BH_id = packages.BenquetHall_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                            $benquetresult = mysqli_query($conn, $benquethall);
                                                            $benrow = mysqli_fetch_row($benquetresult);

                                                            $beautyparlor = "select dealer_registration.D_id, dealer_registration.StoreName from beautyparlor join dealer_registration on beautyparlor.DealerId = dealer_registration.D_id join packages on beautyparlor.B_id = packages.BeautyParlor_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                            $beautyresult = mysqli_query($conn, $beautyparlor);
                                                            $bearow = mysqli_fetch_row($beautyresult);

                                                            $dj = "select dealer_registration.D_id, dealer_registration.StoreName from dj join dealer_registration on dj.DealerId = dealer_registration.D_id join packages on dj.DJ_id = packages.DJ_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                            $djresult = mysqli_query($conn, $dj);
                                                            $djrow = mysqli_fetch_row($djresult);

                                                            $photo = "select dealer_registration.D_id, dealer_registration.StoreName from photographer join dealer_registration on photographer.DealerId = dealer_registration.D_id join packages on photographer.P_id = packages.Photographer_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                            $photoresult = mysqli_query($conn, $photo);
                                                            $phorow = mysqli_fetch_row($photoresult);
                                                        ?>
                                                            <tr>
                                                            <td><?php echo $row[2]; ?></td>
                                                            <td><?php echo $catrow[1]; ?></td>
                                                            <td><?php echo $decrow[1]; ?></td>
                                                            <td><?php echo $benrow[1]; ?></td>
                                                            <td><?php echo $bearow[1]; ?></td>
                                                            <td><?php echo $djrow[1]; ?></td>
                                                            <td><?php echo $phorow[1]; ?></td>
                                                            <td><form method='post' action="dashboard-admin-editpackage.php?ETid=<?php echo $row[1];?>&PT=<?php echo $row[0];?>&caterar=<?php echo $catrow[0];?>&decorator=<?php echo $decrow[0];?>&benquethall=<?php echo $benrow[0];?>&beautyparlor=<?php echo $bearow[0];?>&dj=<?php echo $djrow[0];?>&photo=<?php echo $phorow[0];?>"><input type='submit' value='Edit' class="btn btn-primary"></form></td>
                                                            <!-- <td><form method='post' action="ETdelete.php?id=<?php echo $row[0];?>"><input type='submit' value='Delete' class="btn btn-danger"></form></td> -->
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
                        <hr>

                        <center><h1 class='mt-4'>Anniversary party Packages</h1></center>
                        <div class='table-wrapper'>
                            <?php
                                $query = "select packages.PT_id, packages.ET_id, package_type.Package_type from packages join package_type on packages.PT_id = package_type.PT_id where packages.ET_id='3' and packages.Status='Active'";
                                $result = mysqli_query($conn, $query);
                                if(mysqli_affected_rows($conn) > 0)
                                {
                                    ?>
                                    <table class="table table-borderless table-wrapper">
                                        <thead>
                                            <th style="background-color: white;">Package type</th>
                                            <th style="background-color: white;">Caterar</th>
                                            <th style="background-color: white;">Decorator</th>
                                            <th style="background-color: white;">Benquet hall</th>
                                            <th style="background-color: white;">Beauty Parlor</th>
                                            <th style="background-color: white;">Dj</th>
                                            <th style="background-color: white;">Photographer</th>
                                            <th style="background-color: white;">Edit</th>
                                            <!-- <th style="background-color: white;">Delete</th> -->
                                        </thead>
                                        <tbody>
                                            <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                        $catrarquery = "select dealer_registration.D_id, dealer_registration.StoreName from caterar join dealer_registration on caterar.DealerId = dealer_registration.D_id join packages on caterar.C_id = packages.Caterar_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $catrarresult = mysqli_query($conn, $catrarquery);
                                                        $catrow = mysqli_fetch_row($catrarresult);

                                                        $decorator = "select dealer_registration.D_id, dealer_registration.StoreName from decorator join dealer_registration on decorator.DealerId = dealer_registration.D_id join packages on decorator.D_id = packages.Decorator_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $decoatorresult = mysqli_query($conn, $decorator);
                                                        $decrow = mysqli_fetch_row($decoatorresult);

                                                        $benquethall = "select dealer_registration.D_id, dealer_registration.StoreName from benquethall join dealer_registration on benquethall.DealerId = dealer_registration.D_id join packages on benquethall.BH_id = packages.BenquetHall_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $benquetresult = mysqli_query($conn, $benquethall);
                                                        $benrow = mysqli_fetch_row($benquetresult);

                                                        $beautyparlor = "select dealer_registration.D_id, dealer_registration.StoreName from beautyparlor join dealer_registration on beautyparlor.DealerId = dealer_registration.D_id join packages on beautyparlor.B_id = packages.BeautyParlor_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $beautyresult = mysqli_query($conn, $beautyparlor);
                                                        $bearow = mysqli_fetch_row($beautyresult);

                                                        $dj = "select dealer_registration.D_id, dealer_registration.StoreName from dj join dealer_registration on dj.DealerId = dealer_registration.D_id join packages on dj.DJ_id = packages.DJ_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $djresult = mysqli_query($conn, $dj);
                                                        $djrow = mysqli_fetch_row($djresult);

                                                        $photo = "select dealer_registration.D_id, dealer_registration.StoreName from photographer join dealer_registration on photographer.DealerId = dealer_registration.D_id join packages on photographer.P_id = packages.Photographer_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $photoresult = mysqli_query($conn, $photo);
                                                        $phorow = mysqli_fetch_row($photoresult);
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $catrow[1]; ?></td>
                                                        <td><?php echo $decrow[1]; ?></td>
                                                        <td><?php echo $benrow[1]; ?></td>
                                                        <td><?php echo $bearow[1]; ?></td>
                                                        <td><?php echo $djrow[1]; ?></td>
                                                        <td><?php echo $phorow[1]; ?></td>
                                                        <td><form method='post' action="dashboard-admin-editpackage.php?ETid=<?php echo $row[1];?>&PT=<?php echo $row[0];?>&caterar=<?php echo $catrow[0];?>&decorator=<?php echo $decrow[0];?>&benquethall=<?php echo $benrow[0];?>&beautyparlor=<?php echo $bearow[0];?>&dj=<?php echo $djrow[0];?>&photo=<?php echo $phorow[0];?>"><input type='submit' value='Edit' class="btn btn-primary"></form></td>
                                                        <!-- <td><form method='post' action="ETdelete.php?id=<?php echo $row[0];?>"><input type='submit' value='Delete' class="btn btn-danger"></form></td> -->
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
                        <hr>

                        <center><h1 class='mt-4'>Baby shower Packages</h1></center>
                        <div class='table-wrapper'>
                            <?php
                                $query = "select packages.PT_id, packages.ET_id, package_type.Package_type from packages join package_type on packages.PT_id = package_type.PT_id where packages.ET_id='4' and packages.Status='Active'";
                                $result = mysqli_query($conn, $query);
                                if(mysqli_affected_rows($conn) > 0)
                                {
                                    ?>
                                    <table class="table table-borderless table-wrapper">
                                        <thead>
                                            <th style="background-color: white;">Package type</th>
                                            <th style="background-color: white;">Caterar</th>
                                            <th style="background-color: white;">Decorator</th>
                                            <th style="background-color: white;">Benquet hall</th>
                                            <th style="background-color: white;">Beauty Parlor</th>
                                            <th style="background-color: white;">Dj</th>
                                            <th style="background-color: white;">Photographer</th>
                                            <th style="background-color: white;">Edit</th>
                                            <!-- <th style="background-color: white;">Delete</th> -->
                                        </thead>
                                        <tbody>
                                            <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                        $catrarquery = "select dealer_registration.D_id, dealer_registration.StoreName from caterar join dealer_registration on caterar.DealerId = dealer_registration.D_id join packages on caterar.C_id = packages.Caterar_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $catrarresult = mysqli_query($conn, $catrarquery);
                                                        $catrow = mysqli_fetch_row($catrarresult);

                                                        $decorator = "select dealer_registration.D_id, dealer_registration.StoreName from decorator join dealer_registration on decorator.DealerId = dealer_registration.D_id join packages on decorator.D_id = packages.Decorator_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $decoatorresult = mysqli_query($conn, $decorator);
                                                        $decrow = mysqli_fetch_row($decoatorresult);

                                                        $benquethall = "select dealer_registration.D_id, dealer_registration.StoreName from benquethall join dealer_registration on benquethall.DealerId = dealer_registration.D_id join packages on benquethall.BH_id = packages.BenquetHall_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $benquetresult = mysqli_query($conn, $benquethall);
                                                        $benrow = mysqli_fetch_row($benquetresult);

                                                        $beautyparlor = "select dealer_registration.D_id, dealer_registration.StoreName from beautyparlor join dealer_registration on beautyparlor.DealerId = dealer_registration.D_id join packages on beautyparlor.B_id = packages.BeautyParlor_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $beautyresult = mysqli_query($conn, $beautyparlor);
                                                        $bearow = mysqli_fetch_row($beautyresult);

                                                        $dj = "select dealer_registration.D_id, dealer_registration.StoreName from dj join dealer_registration on dj.DealerId = dealer_registration.D_id join packages on dj.DJ_id = packages.DJ_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $djresult = mysqli_query($conn, $dj);
                                                        $djrow = mysqli_fetch_row($djresult);

                                                        $photo = "select dealer_registration.D_id, dealer_registration.StoreName from photographer join dealer_registration on photographer.DealerId = dealer_registration.D_id join packages on photographer.P_id = packages.Photographer_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $photoresult = mysqli_query($conn, $photo);
                                                        $phorow = mysqli_fetch_row($photoresult);
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $catrow[1]; ?></td>
                                                        <td><?php echo $decrow[1]; ?></td>
                                                        <td><?php echo $benrow[1]; ?></td>
                                                        <td><?php echo $bearow[1]; ?></td>
                                                        <td><?php echo $djrow[1]; ?></td>
                                                        <td><?php echo $phorow[1]; ?></td>
                                                        <td><form method='post' action="dashboard-admin-editpackage.php?ETid=<?php echo $row[1];?>&PT=<?php echo $row[0];?>&caterar=<?php echo $catrow[0];?>&decorator=<?php echo $decrow[0];?>&benquethall=<?php echo $benrow[0];?>&beautyparlor=<?php echo $bearow[0];?>&dj=<?php echo $djrow[0];?>&photo=<?php echo $phorow[0];?>"><input type='submit' value='Edit' class="btn btn-primary"></form></td>
                                                        <!-- <td><form method='post' action="ETdelete.php?id=<?php echo $row[0];?>"><input type='submit' value='Delete' class="btn btn-danger"></form></td> -->
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
                        <hr>

                        <center><h1 class='mt-4'>Reunion party Packages</h1></center>
                        <div class='table-wrapper'>
                            <?php
                                $query = "select packages.PT_id, packages.ET_id, package_type.Package_type from packages join package_type on packages.PT_id = package_type.PT_id where packages.ET_id='5' and packages.Status='Active'";
                                $result = mysqli_query($conn, $query);
                                if(mysqli_affected_rows($conn) > 0)
                                {
                                    ?>
                                    <table class="table table-borderless table-wrapper">
                                        <thead>
                                            <th style="background-color: white;">Package type</th>
                                            <th style="background-color: white;">Caterar</th>
                                            <th style="background-color: white;">Decorator</th>
                                            <th style="background-color: white;">Benquet hall</th>
                                            <th style="background-color: white;">Beauty Parlor</th>
                                            <th style="background-color: white;">Dj</th>
                                            <th style="background-color: white;">Photographer</th>
                                            <th style="background-color: white;">Edit</th>
                                            <!-- <th style="background-color: white;">Delete</th> -->
                                        </thead>
                                        <tbody>
                                            <?php
                                                while($row = mysqli_fetch_array($result))
                                                {
                                                        $catrarquery = "select dealer_registration.D_id, dealer_registration.StoreName from caterar join dealer_registration on caterar.DealerId = dealer_registration.D_id join packages on caterar.C_id = packages.Caterar_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $catrarresult = mysqli_query($conn, $catrarquery);
                                                        $catrow = mysqli_fetch_row($catrarresult);

                                                        $decorator = "select dealer_registration.D_id, dealer_registration.StoreName from decorator join dealer_registration on decorator.DealerId = dealer_registration.D_id join packages on decorator.D_id = packages.Decorator_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $decoatorresult = mysqli_query($conn, $decorator);
                                                        $decrow = mysqli_fetch_row($decoatorresult);

                                                        $benquethall = "select dealer_registration.D_id, dealer_registration.StoreName from benquethall join dealer_registration on benquethall.DealerId = dealer_registration.D_id join packages on benquethall.BH_id = packages.BenquetHall_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $benquetresult = mysqli_query($conn, $benquethall);
                                                        $benrow = mysqli_fetch_row($benquetresult);

                                                        $beautyparlor = "select dealer_registration.D_id, dealer_registration.StoreName from beautyparlor join dealer_registration on beautyparlor.DealerId = dealer_registration.D_id join packages on beautyparlor.B_id = packages.BeautyParlor_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $beautyresult = mysqli_query($conn, $beautyparlor);
                                                        $bearow = mysqli_fetch_row($beautyresult);

                                                        $dj = "select dealer_registration.D_id, dealer_registration.StoreName from dj join dealer_registration on dj.DealerId = dealer_registration.D_id join packages on dj.DJ_id = packages.DJ_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $djresult = mysqli_query($conn, $dj);
                                                        $djrow = mysqli_fetch_row($djresult);

                                                        $photo = "select dealer_registration.D_id, dealer_registration.StoreName from photographer join dealer_registration on photographer.DealerId = dealer_registration.D_id join packages on photographer.P_id = packages.Photographer_id where packages.PT_id='$row[0]' and ET_id='$row[1]';";
                                                        $photoresult = mysqli_query($conn, $photo);
                                                        $phorow = mysqli_fetch_row($photoresult);
                                                    ?>
                                                        <tr>
                                                        <td><?php echo $row[2]; ?></td>
                                                        <td><?php echo $catrow[1]; ?></td>
                                                        <td><?php echo $decrow[1]; ?></td>
                                                        <td><?php echo $benrow[1]; ?></td>
                                                        <td><?php echo $bearow[1]; ?></td>
                                                        <td><?php echo $djrow[1]; ?></td>
                                                        <td><?php echo $phorow[1]; ?></td>
                                                        <td><form method='post' action="dashboard-admin-editpackage.php?ETid=<?php echo $row[1];?>&PT=<?php echo $row[0];?>&caterar=<?php echo $catrow[0];?>&decorator=<?php echo $decrow[0];?>&benquethall=<?php echo $benrow[0];?>&beautyparlor=<?php echo $bearow[0];?>&dj=<?php echo $djrow[0];?>&photo=<?php echo $phorow[0];?>"><input type='submit' value='Edit' class="btn btn-primary"></form></td>
                                                        <!-- <td><form method='post' action="ETdelete.php?id=<?php echo $row[0];?>"><input type='submit' value='Delete' class="btn btn-danger"></form></td> -->
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
                        <hr>
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