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
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <!-- Title Page-->
    <title>View Review</title>

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

<body style="background-image: url('Uploads/back.jpg');background-position: center;background-size:cover;">
<div class="page-wrapper p-t-10 p-b-10 font-robo" style="padding-top: 175px; background-color: ;">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <center><h2 class="title">View Review</h2></center>
                    <?php
                        $id = $_GET['id'];

                        $query = "select * from feedback where Id = '$id'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result);
                    ?>
                    <h4>Review from : <?php echo $row[1]; ?></h4><br>
                    <h4>Email : <?php echo $row[2]; ?></h4><br><hr><br>
                    <center><h3>Feedback<br></h3><br></center><p><?php echo $row['Message']; ?></p><br><hr><br>
                    <center><form method='post'>
                        <input type="submit" value="Back" name='backbtn' class="btn btn--radius btn--green">
                    </form></center>
                    <?php
                        if(isset($_POST['backbtn']))
                        {
                            header('location: dashboard-admin-Feedback.php');
                        }
                    ?>
                </div>
            </div>
        </div>
</div> 
</body>