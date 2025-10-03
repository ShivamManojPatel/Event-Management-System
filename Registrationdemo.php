<?php 
    session_start(); 
    require ('Datacon.php');
?>

<!DOCTYPE html>
<html>
<!-- PHP code -->
<?php
    if(isset($_POST['Homebtn']))
    {
        header('location: index.php');
    }
    
    if($conn)
    {
        if(isset($_POST['registerbtn']))
        {
            if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['cno']) && !empty($_POST['birthday']) && !empty($_POST['gender']) && !empty($_POST['profession']) && !empty($_POST['role']) && !empty($_POST['pass']) && !empty($_POST['cpass']))
            {
                if($_POST['pass'] === $_POST['cpass'])
                {
                    if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                    {
                        if(is_numeric($_POST['cno']) && (strlen($_POST['cno']) === 10))
                        {
                            setcookie('fname', $_POST['fname'], time()+60*5);
                            setcookie('lname', $_POST['lname'], time()+60*5);
                            setcookie('email', $_POST['email'], time()+60*5);
                            setcookie('contact', $_POST['cno'], time()+60*5);
                            setcookie('birthday', $_POST['birthday'], time()+60*5);
                            setcookie('gender', $_POST['gender'], time()+60*5);
                            setcookie('profession', $_POST['profession'], time()+60*5);
                            setcookie('role', $_POST['role'], time()+60*5);
                            setcookie('pass', $_POST['pass'], time()+60*5);
                            $flag = false;
                            
                            $query = "select * from registration_master";
                            $result = mysqli_query($conn, $query);
                            while($row = mysqli_fetch_row($result))
                            {
                                if($_POST['email'] == $row[3])
                                {
                                    $flag = true;
                                }
                            }
                            
                            if(!$flag)
                            {
                                $otp = rand(100000, 999999);
                                $_SESSION['otp'] = $otp;
                                $from = "20bmiit057@gmail.com";
                                $to = $_POST['email'];
                                $subject = "OTP to verify your account";

                                $message = "Your OTP is : ".strval($otp);
                                $header = "From:" . $from;

                                if(mail($to, $subject, $message, $header))
                                {
                                    header('location: otpverify.php');
                                }
                                else
                                {
                                    echo "<div style='padding: 5px;
                                    background-color: #ffffb3;
                                    color: black;
                                    height: 25px;'>
                                        <center>OTP not send, make sure you are connected to internet</center>
                                    </div>";
                                }
                            }
                            else
                            {
                                echo "<div style='padding: 5px;
                                background-color: #ffffb3;
                                color: black;
                                height: 25px;'>
                                    <center>Looks like this email id is already registered</center>
                                </div>";
                            }
                        }
                        else
                        {
                            echo "<div style='padding: 5px;
                            background-color: #ffffb3;
                            color: black;
                            height: 25px;'>
                            <center>Please, enter contact properly</center>
                            </div>";
                        }
                    }
                    else
                    {
                        echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                        <center>Please, Enter Email properly</center>
                        </div>";
                    }
                }
                else
                {
                    echo "<div style='padding: 5px;
                    background-color: #ffffb3;
                    color: black;
                    height: 25px;'>
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
                    <center>Please, Fill all the details properly</center>
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
    <link href="css/Login_style.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-10 font-robo" style="background-color: whitesmoke;">
    <!-- <video autoplay loop muted plays-inline>
        <source src="Video/bg-video.mp4" type="video/mp4">
    </video> -->
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                    <center><h2 class="title">REGISTRATION</h2></center>
                    <form method="post">
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="FIRST NAME" name="fname">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="LAST NAME" name="lname">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="EMAIL" name="email">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="numeric" placeholder="CONTACT NUMBER" name="cno">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="BIRTHDATE(YYYY-MM-DD)" name="birthday">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="PROFESSION" name="profession">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="role">
                                            <option disabled="disabled" selected="selected">REGISTER AS</option>
                                            <option>Customer</option>
                                            <option>Dealer</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="PASSWORD" name="pass">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="password" placeholder="CONFIRM PASSWORD" name="cpass">
                                </div>
                            </div>
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input type="submit" class="btn btn--radius btn--green" name="Homebtn" value="Home">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input class="btn btn--radius btn--green" type="submit" name="registerbtn" value="Register">
                                </div>
                             </div>
                        </div><br>
                        <center>
                            <div>
                                <b><a class="forpass" href="Login.php">Already have an account?</a></b>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="Register/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="Register/vendor/select2/select2.min.js"></script>
    <script src="Register/vendor/datepicker/moment.min.js"></script>
    <script src="Register/vendor/datepicker/daterangepicker.js"></script>

    <!-- Main JS-->
    <script src="Register/js/global.js"></script>

</body>

</html>
<!-- end document-->
