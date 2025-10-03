<?php
    session_start();
    require ('Datacon.php');

    //require ('PhpMailer/Exception.php');
    require ('PhpMailer/PHPMailerAutoload.php');
    //require ('PhpMailer/PHPMailer.php');
    //require ('PhpMailer/SMTP.php');
    require ('Datacon.php');
    //require ('PHPMailerAutoload.php');
?>  


<!DOCTYPE html>
<html>
    <?php
    if($conn)
    {
        if(isset($_POST['ebackbtn']))
        {
            header('location: Login.php');
        }

        if(isset($_POST['eSubmitbtn']))
        {
            if(!empty($_POST['fpemail']))
            {
                
               if(filter_var($_POST['fpemail'], FILTER_VALIDATE_EMAIL))
               {
                $flag = false;
                $flag1 = false;
                $fpemail = $_POST['fpemail'];
                $query = "select Email from registration_master where Email='$fpemail'";
                $result = mysqli_query($conn, $query);
                
                if(mysqli_affected_rows($conn) == 1)
                {
                    $row = mysqli_fetch_row($result);
                    if($row[0] == $fpemail)
                    {
                        $flag1 = true;
                        $_SESSION['cngpass'] = "Customer";
                    }
                }
                else
                {
                    $dquery = "select Email from dealer_registration where Email='$fpemail'";
                    $dresult = mysqli_query($conn, $dquery);

                    if(mysqli_affected_rows($conn) == 1)
                    {
                        $drow = mysqli_fetch_row($dresult);
                        if($drow[0] == $fpemail)
                        {
                            $flag1 = true;
                            $_SESSION['cngpass'] = "Dealer";
                        }
                    }
                }

                if($flag1)
                {
                    $otp = rand(100000, 999999);
                    $_SESSION['eotp'] = $otp;
                    $_SESSION['cngpassemail'] = $fpemail;

                    $mail = new PHPMailer;
                    //$mail->SMTPDebug = 4;
                    $mail->isSMTP();
                    $mail->SMTPAuth = true;
                    $mail->Host = 'smtp.gmail.com';
                    $mail->Port = 587;
                    $mail->Username = '20bmiit030@gmail.com';
                    $mail->Password = 'kfdiqmehjsgpdkga';
                    $mail->SMTPSecure = "tls";
                    
                    $mail->From = "hashevents2@gmail.com";
                    $mail->FromName = '#Event SYSTEM';
                    $mail->addAddress($_POST['fpemail']);
                    $mail->Subject = "Otp for your email verification";
                    $mail->Body = "Your OTP is : " . $otp;

                    if(!$mail->send())
                    {
                        echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                            <center>OTP not Send</center>
                        </div>";
                    }
                    else
                    {
                        header('location: eotpverify.php');
                    }
               }
               else
               {
                echo "<div style='padding: 5px;
                background-color: #ffffb3;
                color: black;
                height: 25px;'>
                <center>No email found</center>
                </div>";
               }
            }
            else
            {
                echo "<div style='padding: 5px;
                background-color: #ffffb3;
                color: black;
                height: 25px;'>
                <center>Please enter valid email</center>
                </div>";
            }
        }
        else
        {
            echo "<div style='padding: 5px;
                          background-color: #ffffb3;
                          color: black;
                          height: 25px;'>
                          <center>Please enter email</center>
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
    <title>Forgot Password</title>

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
                    <center><h2 class="title">Enter Your Email</h2></center>
                    <form method="post">
                        <div class="input-group" id="otp">
                            <input class="input--style-1" type="text" placeholder="Enter Email" name="fpemail">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input type="submit" class="btn btn--radius btn--green" name="ebackbtn" value="Back">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input class="btn btn--radius btn--green" type="submit" name="eSubmitbtn" value="Submit">
                                </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div> 
</body>