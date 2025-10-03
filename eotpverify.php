<?php
    session_start();
    require ('Datacon.php');
?>


<!DOCTYPE html>
<html>
    <?php
        if(isset($_POST['eobackbtn']))
        {
            header('location: forgotpassword.php');
        }

        if(isset($_POST['eoSubmitbtn']))
        {
            if(!empty($_POST['eootptb']))
            {
                if(is_numeric($_POST['eootptb']) && (strlen($_POST['eootptb']) == 6))
                {
                    if($_POST['eootptb'] == $_SESSION['eotp'])
                    {
                        header('location: cngpassword.php');
                    }
                    else
                    {
                        echo "<div style='padding: 5px;
                                    background-color: #ffffb3;
                                    color: black;
                                    height: 25px'>
                                        <center>Invalid OTP</center>
                                    </div>";
                    }
                }
                else
                {
                    echo "<div style='padding: 5px;
                                    background-color: #ffffb3;
                                    color: black;
                                    height: 25px'>
                                        <center>Please enter OTP properly</center>
                                    </div>";
                }
            }
            else
            {
                echo "<div style='padding: 5px;
                                    background-color: #ffffb3;
                                    color: black;
                                    height: 25px'>
                                        <center>Please enter OTP</center>
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
<div class="page-wrapper p-t-10 p-b-10 font-robo" style="padding-top: 230px; background-color: ;">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <center><h2 class="title">VERIFY OTP</h2></center>
                    <form method="post">
                        <div class="input-group" id="otp">
                            <input class="input--style-1" type="text" placeholder="Enter OTP" name="eootptb">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input type="submit" class="btn btn--radius btn--green" name="eobackbtn" value="Back">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input class="btn btn--radius btn--green" type="submit" name="eoSubmitbtn" value="Submit">
                                </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div> 
</body>