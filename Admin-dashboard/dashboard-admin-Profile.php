<?php
  session_start();

   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }

   require ('../Datacon.php');

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
        <link href="../css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="../css/line-icons.css">

        <meta charset="utf-8">
        <style>
            .card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
}

.title {
  color: grey;
  font-size: 18px;
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
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Packages.php">Packages</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Profile.php" style='color: black;'>Profile</a>
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

                <?php
                    $user = $_SESSION['User'];
                    $query = "select * from admin_registration where Email='$user'";
                    $result = mysqli_query($conn, $query);

                    $row = mysqli_fetch_array($result);
                ?>
                <!-- Page content-->
                <div class="container-fluid">
                    <center><h1 class="mt-4">Profile</h1></center><hr>
                    <div class='card'>
                    <!-- style='width: 250px; height: 250px; border-radius: 999px;' -->
                        <img src="<?php echo $row[6]?>" class='img'>
                    </div>
                    <center><div><br>
                    <h1>Name : <?php echo $row[1] . " " . $row[2]; ?></h1>
                        <p class="title">#Events.Admin</p>
                        <p class="title">Email : <?php  echo $row[3]; ?></p>
                        <p class="title">Contact no : <?php echo $row[4]; ?></p>
                        <p><a href='changepassword.php?id=<?php echo $row[0];?>'><button class='btn btn-primary'>Change Password</button></a></p>
                        <p><a href='editprofile.php?id=<?php echo $row[0];?>'><button class='btn btn-primary'>Edit Profile</button></a></p>
                        <p><button class='btn btn-primary' id='uploadprofilebtn'>Change Profile photo</button></p>
                        <center><p><div id='profileupload' style='display: none;'>
                            Upload profile photo : <form method='post' enctype='multipart/form-data'><input class="input--style-1" type="file" name="profile">
                            <p><input type='submit' name='submitbtn' value='upload' class='btn btn-primary'></p></form>
                        </div></p></center>
                    </div></center>
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
                                            $equery = "update admin_registration set Profile_Photo='$eprofile' where Email='$user'";
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
                                    $equery = "update admin_registration set Profile_Photo='$eprofile' where Email='$user'";
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
                </div>
            </div>
        </div>

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
