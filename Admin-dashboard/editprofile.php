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
        if(isset($_POST['eback']))
        {
            header('location: dashboard-admin-Profile.php');
        }

        if(isset($_POST['esubmit']))
        {
            $id = $_GET['id'];
            if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['cno']))
            {
                if(isset($_POST['profile']))
                {}
                $ano = str_split($_POST['cno']);
                if(strlen($_POST['cno']) == 10 && is_numeric($_POST['cno']) && (($ano[0] == 6) || ($ano[0] == 7) || ($ano[0] == 8) || ($ano[0] == 9)))
                {
                    $fname = $_POST['fname'];
                    $lname = $_POST['lname'];
                    $cno = $_POST['cno'];

                    $uquery = "update admin_registration set First_Name='$fname', Last_Name='$lname', Contact_No='$cno' where A_id='$id'";
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
                            <center>something went wrong please try again later</center>
                        </div>";
                    }
                }
                else
                {
                    echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                            <center>please enter valid contact no</center>
                        </div>";
                }
            }
            else
            {
                echo "<div style='padding: 5px;
                        background-color: #ffffb3;
                        color: black;
                        height: 25px;'>
                            <center>Please fill all the details properly</center>
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
    <title>Edit Profile</title>

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
<div class="page-wrapper p-t-10 p-b-10 font-robo" style="padding-top: 65px; background-color: ;">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <center><h2 class="title">Edit Profile</h2></center>
                    <?php
                        $id = $_GET['id'];

                        $query = "select * from admin_registration where A_id = '$id'";
                        $result = mysqli_query($conn, $query);
                        $row = mysqli_fetch_array($result);
                    ?>
                    <form method="post" enectype='multipart/form-data'>
                        <div class="input-group" id="otp">
                            First Name : <input class="input--style-1" type="text" value="<?php echo $row[1]; ?>" name="fname">
                        </div>
                        <div class="input-group" id="otp">
                            Last Name : <input class="input--style-1" type="text" value="<?php  echo $row[2]; ?>" name="lname">
                        </div>
                        <div class="input-group" id="otp">
                            Email : <input class="input--style-1" type="text" value="<?php  echo $row[3]; ?>" name="" disabled>
                        </div>
                        <div class="input-group" id="otp">
                            Contact No : <input class="input--style-1" type="text" value="<?php echo $row[4]; ?>" name="cno">
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input type="submit" class="btn btn--radius btn--green" name="eback" value="Back">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="p-t-20">
                                    <input class="btn btn--radius btn--green" type="submit" name="esubmit" value="Submit">
                                </div>
                             </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
</div> 
</body>