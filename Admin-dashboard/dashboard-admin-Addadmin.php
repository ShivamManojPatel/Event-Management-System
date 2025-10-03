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
    <?php
        if(isset($_POST['asubmit']))
        {
            if(!empty($_POST['fname'] && !empty($_POST['lname'])) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['password']) && !empty($_POST['rpassword']))
            {
                if(isset($_POST['gender']))
                {
                    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                    {
                        if(is_numeric($_POST['contact']) && (strlen($_POST['contact']) == 10))
                        {
                            $ano = str_split($_POST['contact']);
                            if((($ano[0] == 6) || ($ano[0] == 7) || ($ano[0] == 8) || ($ano[0] == 9)))
                            {
                                if(strlen($_POST['password']) > 8)
                                {
                                    if($_POST['password'] == $_POST['rpassword'])
                                    {
                                        $query1 = "select * from admin_registration";
                                        $result1 = mysqli_query($conn, $query1);

                                        while($row = mysqli_fetch_row($result1))
                                        {
                                            if($row[3] == $_POST['email'])
                                            {
                                                setcookie("msg", "This Email already exist", time()+5);
                                            }
                                            else
                                            {
                                                $fname = $_POST['fname'];
                                                $lname = $_POST['lname'];
                                                $email = $_POST['email'];
                                                $contact = $_POST['contact'];
                                                $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
                                                $gender = $_POST['gender'];

                                                $query2 = "insert into admin_registration(First_Name, Last_Name, Email, Contact_No, Gender, Profile_photo, Password) values ('$fname', '$lname', '$email', '$contact', '$gender', 'Uploads/Ano_Male.png', '$password')";
                                                $result2 = mysqli_query($conn, $query2);

                                                if($result2)
                                                {
                                                    setcookie("msg", "Admin Added", time()+5);
                                                    header('location: dashboard-admin-Admin.php');
                                                }
                                                else
                                                {
                                                    setcookie("msg", "Something went wrong please try after sometime", time()+5);
                                                    header('location: dashboard-admin-Admin.php');
                                                }
                                            }
                                        }
                                    }
                                    else
                                    {
                                        setcookie("msg", "Password dosen't match", time()+5);
                                        header('location: dashboard-admin-Addadmin.php');
                                    }
                                }
                                else
                                {
                                    setcookie("msg", "Password must be more that 8 characters", time()+5);
                                    header('location: dashboard-admin-Addadmin.php');
                                }
                            }
                            else
                            {
                                setcookie("msg", "Please enter valid contact no", time()+5);
                                header('location: dashboard-admin-Addadmin.php');
                            }
                        }
                        else
                        {
                            setcookie("msg", "Please enter valid contact no", time()+5);
                            header('location: dashboard-admin-Addadmin.php');
                        }
                    }   
                    else
                    {
                        setcookie("msg", "Please enter valid email", time()+5);
                        header('location: dashboard-admin-Addadmin.php');
                    }
                }
                else
                {
                    setcookie("msg", "Please enter all the details properly", time()+5);
                    header('location: dashboard-admin-Addadmin.php');
                }
            }
            else
            {
                setcookie("msg", "Please enter all the details properly", time()+5);
                header('location: dashboard-admin-Addadmin.php');
            }
        }
    ?>
    <body>
        <div class="d-flex" id="wrapper">
            <!-- Sidebar-->
            <div class="border-end bg-white" id="sidebar-wrapper">
                <div class="sidebar-heading border-bottom bg-light"><span class="lni-bulb"></span>#Events</div>
                <div class="list-group list-group-flush">
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin.php" style='color: black;'>Dashboard</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Events.php">Events</a>
                    <a class="list-group-item list-group-item-action list-group-item-light p-3" href="dashboard-admin-Customers.php">Customers</a>
                    <?php if(isset($_SESSION['mainadmin'])){ echo "<a class='list-group-item list-group-item-action list-group-item-light p-3' href='dashboard-admin-Admin.php' style='color: black;'>Admin</a>";} ?>
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
                        <center><h1 class="mt-4">Add Admin</h1></center>
                        <form action='dashboard-admin-Admin.php'><input type='submit' class='btn btn-primary' name='btnaddadmin' value="Back"></form><hr>
                        <?php if(isset($_COOKIE['msg'])){ echo "<center><div style='padding: 0px; background-color: lightgreen; color: black; height: 25px; width: 50%; border-radius: 99px;'>";?><?php echo $_COOKIE['msg']; ?><?php echo "</div><br><br><center>";}else{echo "<br>";}?>
                        <center><div style='background-color:; width: 75%;'>
                            <form method='post'>
                                <input type='text' placeholder='First Name' name='fname' class='form-control' style='width:50%; background: white;'><br>
                                <input type='text' placeholder='Last Name' name='lname' class='form-control' style='width:50%; background: white;'><br>
                                <input type='text' placeholder='Email' name='email' class='form-control' style='width:50%; background: white;'><br>
                                <input type='text' placeholder='Contact no.' name='contact' class='form-control' style='width:50%; background: white;'><br>
                                <select class='form-control' name='gender' style='width: 50%; color: inherit;'>
                                    <option disabled selected>Gender</option>
                                    <option value='Male'>Male</option>
                                    <option value='Female'>Female</option>
                                </select><br>
                                <input type='password' placeholder='Password' name='password' class='form-control' style='width:50%; background: white;'><br>
                                <input type='password' placeholder='Re-enter Password' name='rpassword' class='form-control' style='width:50%; background: white;'><br>
                                <input type='submit' value='submit' name='asubmit' class='btn btn-success'>
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