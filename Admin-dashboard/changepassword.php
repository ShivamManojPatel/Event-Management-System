<?php
    session_start();
    require ('../Datacon.php');

    if(!$conn)
    {
        header('loaction: ../error/Databaseerror.php;');
    }
?>


<!DOCTYPE html>
<html>
    <?php
        if(isset($_POST['back']))
        {
            header('location: dashboard-admin-Profile.php');
        }

        if(isset($_POST['submit']))
        {
            if(!empty($_POST['Oldpass']) && !empty($_POST['Newpass']) && !empty($_POST['rnewpass']))
            {
                $oldpass = $_POST['Oldpass'];
                $id = $_GET['id'];
                $query = "select * from admin_registration where A_id = '$id'";
                $result = mysqli_query($conn, $query);
                $row = mysqli_fetch_array($result);

                if(password_verify($oldpass, $row[7]))
                {
                    if($_POST['Newpass'] == $_POST['rnewpass'])
                    {
                        if(strlen($_POST['Newpass']) >= 8)
                        {
                            $newpass = password_hash($_POST['Newpass'], PASSWORD_DEFAULT);
                            $uquery = "update admin_registration set Password='$newpass' where A_id='$id'";
                            $uresult = mysqli_query($conn, $uquery);

                            if($uresult)
                            {
                                header('location: dashboard-admin-Profile.php');
                            }
                            else
                            {
                                echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                            <center>Something went wrong please try again later</center>
                        </div>";
                            }
                        }
                        else
                        {
                            echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                            <center>Password should be 8 character or long</center>
                        </div>";
                        }
                    }
                    else
                    {
                        echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                            <center>Password doesn't match</center>
                        </div>";
                    }
                }
                else
                {
                    echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                            <center>Enter correct old password</center>
                        </div>";
                }
            }
            else
            {
                echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                            <center>Enter all the details properly</center>
                        </div>";
            }
        }
    ?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Title Page-->
    <title>Forgot Password</title>

    <!-- Icons font CSS-->
    <link href="../Register/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="../Register/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="../Register/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../Register/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="../Register/css/Registration.css" rel="stylesheet" media="all">
    <link rel="shortout icon" type="image/x-icon" href="../img/favicon.png"/>
</head>

<body style="background-image: url('../images/OTP-background.jpg');background-position: center;background-size:cover;">
<div class="page-wrapper p-t-10 p-b-10 font-robo" style="padding-top: 150px; background-color: ;">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <center><h2 class="title">Change Password</h2></center>
                    <form method="post">
                        <div class="input-group" id="otp">
                            <input class="input--style-1" type="password" placeholder="Enter Old Password" name="Oldpass">
                        </div>
                        <div class="input-group" id="otp">
                            <input class="input--style-1" type="password" placeholder="Enter New Password" name="Newpass">
                        </div>
                        <div class="input-group" id="otp">
                            <input class="input--style-1" type="password" placeholder="Re-enter New Password" name="rnewpass">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input type="submit" class="btn btn--radius btn--green" name="back" value="Back">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input class="btn btn--radius btn--green" type="submit" name="submit" value="Submit">
                                </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div> 
</body>