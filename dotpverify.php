<?php
    session_start();
    require ('Datacon.php');
    require ('PhpMailer/PHPMailerAutoload.php');
?>


<!DOCTYPE html>
<html>
<head>
    <?php
        if(isset($_POST['backbtn']))
        {
            header('location: DealerRegister.php');
        }

        if($conn)
        {
            if(isset($_POST['Submitbtn']))
            {
                if(!empty($_POST['otptb']))
                {
                    if(is_numeric($_POST['otptb']) && (strlen($_POST['otptb']) == 6))
                    {
                        if($_SESSION['otp'] == $_POST['otptb'])
                        {
                            if(isset($_COOKIE['fname']) && isset($_COOKIE['lname']) && isset($_COOKIE['email']) && isset($_COOKIE['contact']) && isset($_COOKIE['acontact']) && isset($_COOKIE['gender']) && isset($_COOKIE['pass']) && isset($_COOKIE['profession']))
                            {
                                $fname = $_COOKIE['fname'];
                                $lname = $_COOKIE['lname'];
                                $sname = $_COOKIE['sname'];
                                $email = $_COOKIE['email'];
                                $contact = $_COOKIE['contact'];
                                $acontact = $_COOKIE['acontact'];
                                $gender = $_COOKIE['gender'];
                                $profession = $_COOKIE['profession'];
                                $pass = password_hash($_COOKIE['pass'], PASSWORD_DEFAULT);
                                $time = date("Y-m-d h:i:sa");

                                $query = "insert into tmp_dealer(First_name, Last_name, StoreName, Email, Contact_No, Alt_Contact_No, Gender, Profession, Password, Created_On, Updated_On, Status)values('$fname', '$lname', '$sname', '$email', '$contact', '$acontact', '$gender', '$profession', '$pass', '$time', '$time', 'Requested')";

                                $result = mysqli_query($conn, $query);
                                if($result)
                                {
                                    $otp = rand(100000, 999999);
                                    $_SESSION['otp'] = $otp;
      
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
                                    $mail->addAddress($email);
                                    $mail->Subject = "Dealer Request";
                                    $mail->Body = "Your request has been sent to our Admin. We will let you know when request is accepted";
      
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
                                      header('location: waitmsg.php');
                                    }
                                }
                                else
                                {
                                    echo "<div style='padding: 5px;
                                    background-color: #ffffb3;
                                    color: black;
                                    height: 25px'>
                                        <center>Insert Error!plz try again after some time</center>
                                    </div>";
                                }
                            }
                            else
                            {
                                echo "<div style='padding: 5px;
                                    background-color: #ffffb3;
                                    color: black;
                                    height: 25px'>
                                        <center>Somethings wrong!try after some moments</center>
                                    </div>";
                            }
                        }
                        else
                        {
                            echo "<div style='padding: 5px;
                            background-color: #ffffb3;
                            color: black;
                            height: 25px'>
                                <center>Entered otp is incorrect</center>
                            </div>";
                        }
                    }
                    else
                    {
                        echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px'>
                            <center>Please, enter valid OTP</center>
                        </div>";
                    }
                }
                else
                {
                    echo "<div style='padding: 5px;
                    background-color: #ffffb3;
                    color: black;
                    height: 25px'>
                        <center>Please, enter OTP</center>
                    </div>";
                }
            }
        }
        else
        {
            echo "<div style='padding: 5px;
                background-color: red;
                color: black;
                height: 25px'>
                    <center>Server connection Please try again later</center>
                </div>";
        }
    ?>
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
                            <input class="input--style-1" type="text" placeholder="Enter OTP" name="otptb">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input type="submit" class="btn btn--radius btn--green" name="backbtn" value="Back">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input class="btn btn--radius btn--green" type="submit" name="Submitbtn" value="Submit">
                                </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div> 
</body>