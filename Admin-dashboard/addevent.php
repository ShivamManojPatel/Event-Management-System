<?php
  session_start();

   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }
   require '../Datacon.php';
   if(!$conn)
   {
    header('../error/Databaseerror.php');
   }
   if(isset($_POST['btnback']))
   {
    header('location: dashboard-admin-Events.php');
   }

   if(isset($_POST['btnaddevent']))
   {
        if(!empty($_POST['eventname']) && !empty($_POST['eventdescription']))
        {
            $name = $_POST['eventname'];
            $description = $_POST['eventdescription'];

            $targetdir = "../Customer-dashboard/Uploads/";
            $targetfile = $targetdir . basename($_FILES["eventimage"]["name"]);

            if(!file_exists($targetfile))
            {
                if($_FILES['eventimage']['type'] == 'image/jpg' || $_FILES['eventimage']['type'] == 'image/jpeg' || $_FILES['eventimage']['type'] == 'image/png')
                {
                    if(move_uploaded_file($_FILES['eventimage']['tmp_name'], $targetfile))
                    {
                        $file = "Uploads/" . $_FILES['eventimage']['name'];
                        $query = "insert into event_type(Event_name, Description, cover_photo, Status) value ('$name', '$description', '$file', 'Active')";
                        $result = mysqli_query($conn, $query);

                        if($result)
                        {
                            header('location: dashboard-admin-Events.php');
                        }
                        else
                        {
                            echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                            <center>Insert Error please try again later</center>
                        </div>";
                        }
                    }
                    else
                    {
                        echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 30px;'>
                            <center>File upload error please try again later</center>
                        </div>";
                    }
                }
                else
                {
                    echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 30px;'>
                            <center>Please upload jpg, jpeg, png file only</center>
                        </div>";
                }
            }
            else
            {
                echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 30px;'>
                            <center>File with this name already exist please upload another file</center>
                        </div>";
            }
        }
        else
        {
            echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 30px;'>
                            <center>Please!fill the details properly</center>
                        </div>";
        }
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
    </head>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><span class="lni-bulb"></span>#Events</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin.php">Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Events.php" style='color: black;'>Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Customers.php">Customers</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Dealers.php">Dealers</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Profile.php">Profile</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-contactUs.php">Doubts</a>                    

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
                    <center><h1 class="mt-4">Events</h1></center><br><br>
                    <form method='post'><input type='submit' class='btn btn-primary' name='btnback' value="Back"></form>
                    <hr>

                    <center><h1 class='mt-4'>Add Events Here</h1></center><br><br>
                    <center><div style='width: 60%;'>
                        <form method='post' enctype="multipart/form-data">
                            <center><div style='width: 50%;'>
                                <div class="">
                                    <input type="text" class="form-control" id="" name='eventname' placeholder='Enter event name'>
                                </div>
                                <br>
                                <div class="form-group">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" placeholder='Enter event description' rows="3" name='eventdescription'></textarea>
                                </div>
                                <br>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">Upload Event Image : </label>
                                    <input type="file" class="form-control-file" id="exampleFormControlFile1" name='eventimage'>
                                </div>
                                <br>
                                <div class='form-group'>
                                    <input type="submit" value="submit" class='btn btn-primary' name='btnaddevent'>
                                </div>
                            </div></center>
                        </form>
                    </div></center>
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
