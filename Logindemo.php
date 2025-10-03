<?php 
    session_start(); 
    require ('Datacon.php');
?>

<!DOCTYPE html>
<html>
<head>
    <?php
        if(isset($_POST['loginHomebtn']))
        {
            header('location: index.php');
        }
    ?>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Title Page-->
    <title>#Events-Login</title>

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
    <link href="css/Login_style.css" rel="stylesheet" media="all">
    <link rel="shortout icon" type="image/x-icon" href="img/favicon.png"/>
</head>

<body>
        <div class="page-wrapper p-t-100 p-b-100 font-robo" style="background-color: powderblue;">
            <div class="wrapper wrapper--w680">
                <div class="card card-1">
                    <div class="card-heading"></div>
                    <div class="card-body">
                        <center><h2 class="title">LOGIN</h2></center>
                        <form method="post">
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="input-group">
                                        <input class="input--style-1" type="text" placeholder="EMAIL" name="loginemail">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="input-group">
                                        <input class="input--style-1" type="password" placeholder="PASSWORD" name="loginpass">
                                    </div>
                                </div>
                            </div>
                            <center>
                                <div>
                                    <b><a class="forpass" href="#">Forgot Password?</a></b>
                                </div>
                            </center>
                            <div class="row row-space">
                                <div class="col-2">
                                    <div class="p-t-20">
                                        <input type="submit" class="btn btn--radius btn--green" name="loginHomebtn" value="Home">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="p-t-20">
                                        <input class="btn btn--radius btn--green" type="submit" name="loginbtn" value="Login">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <center>
                                <div>
                                    <b><a class="forpass" href="Registration.php">Didn't Registered Yet?</a></b>
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
