<?php
    session_start();
    require ('Datacon.php');
?>

<!DOCTYPE html>
<html>
    <?php
    if($conn)
    {
        if(isset($_POST['Backbtncp']))
        {
            header('location: index.php');
        }

        if(isset($_POST['Submitbtncp']))
        {
            if(!empty($_POST['cptb']) && !empty($_POST['cprtb']))
            {
                if(strlen($_POST['cptb']) >= 8)
                {
                    if($_POST['cptb'] == $_POST['cprtb'])
                    {
                        $pass = password_hash($_POST['cptb'], PASSWORD_DEFAULT);
                        $time = date("Y-m-d h:i:sa");
                        $email = $_SESSION['cngpassemail'];

                        if(isset($_SESSION['cngpass']))
                        {
                            if($_SESSION['cngpass'] == "Customer")
                            {
                                $query = "update registration_master set Password='$pass', Updated_On='$time' where Email='$email'";
                                $result = mysqli_query($conn, $query);
                                if($result)
                                {
                                    header('location: index.php');
                                }
                                else
                                {
                                    echo "<div style='padding: 5px;
                                            background-color: #ffffb3;
                                            color: black;
                                            height: 25px'>
                                                <center>Something went wrong!please try again later</center>
                                            </div>";
                                }
                            }
                            else if($_SESSION['cngpass'] == "Dealer")
                            {
                                $query = "update dealer_registration set Password='$pass', Updated_On='$time' where Email='$email'";
                                $result = mysqli_query($conn, $query);
                                if($result)
                                {
                                    header('location: index.php');
                                }
                                else
                                {
                                    echo "<div style='padding: 5px;
                                            background-color: #ffffb3;
                                            color: black;
                                            height: 25px'>
                                                <center>Something went wrong!please try again later</center>
                                            </div>";
                                }
                            }
                        }
                        
                    }
                    else
                    {
                        echo "<div style='padding: 5px;
                                    background-color: #ffffb3;
                                    color: black;
                                    height: 25px'>
                                        <center>Password dosen't match</center>
                                    </div>";
                    }
                }
                else
                {
                    echo "<div style='padding: 5px;
                                    background-color: #ffffb3;
                                    color: black;
                                    height: 25px'>
                                        <center>Password must be 8 characters or longer</center>
                                    </div>";
                }
            }
            else
            {
                echo "<div style='padding: 5px;
                                    background-color: #ffffb3;
                                    color: black;
                                    height: 25px'>
                                        <center>Enter Password!</center>
                                    </div>";
            }
        }
    }
    else
    {
        header('location: error/Databaseerror.php');
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
    <title>Registration</title>

    <!-- Icons font CSS-->
    <link href="Register/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="Register/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="Register/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="Register/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="Register/css/Registration.css" rel="stylesheet" media="all">
    <link rel="shortout icon" type="image/x-icon" href="img/favicon.png"/>
</head>

<body style="background-image: url('images/OTP-background.jpg');background-position: center;background-size:cover;">
<div class="page-wrapper p-t-10 p-b-10 font-robo" style="padding-top: 210px; background-color: ;">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <center><h2 class="title">Change Password</h2></center>
                    <form method="post">
                        <div class="input-group" id="otp">
                            <input class="input--style-1" type="password" placeholder="Enter New Password" name="cptb">
                        </div>
                        <div class="input-group" id="otp">
                            <input class="input--style-1" type="password" placeholder="Re-enter New Password" name="cprtb">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input type="submit" class="btn btn--radius btn--green" name="Backbtncp" value="Home">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input class="btn btn--radius btn--green" type="submit" name="Submitbtncp" value="Submit">
                                </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div> 
</body>