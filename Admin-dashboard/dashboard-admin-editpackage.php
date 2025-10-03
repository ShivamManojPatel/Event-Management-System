<?php
    session_start();
    require ('../Datacon.php');

    if(!$conn)
    {
        header('loaction: ../error/Databaseerror.php;');
    }

    $ET_id = $_GET['ETid'];
    $PT_id = $_GET['PT'];

    $caterar = $_GET['caterar'];
    $decorator = $_GET['decorator'];
    $benquethall = $_GET['benquethall'];
    $beautyparlor = $_GET['beautyparlor'];
    $dj = $_GET['dj'];
    $photographer = $_GET['photo'];

    $eventquery = "select Event_name from event_type where ETid = '$ET_id'";
    $eventresult = mysqli_query($conn, $eventquery);
    $eventrow = mysqli_fetch_row($eventresult);

    $packagequery = "select Package_type from package_type where PT_id='$PT_id'";
    $packageresult = mysqli_query($conn, $packagequery);
    $packagerow = mysqli_fetch_row($packageresult);
?>


<!DOCTYPE html>
<html>
    <?php
        if(isset($_POST['eback']))
        {
            header('location: dashboard-admin-Packages.php');
        }

        if(isset($_POST['esubmit']))
        {
            $cat = $_POST['caterar'];
            $dec = $_POST['decorator'];
            $ben = $_POST['benquet'];
            $bea = $_POST['beauty'];
            $dj = $_POST['dj'];
            $pho = $_POST['photo'];

            echo "<script>alert('".$dj."')</script>";
            $updatequery = "Update packages set Caterar_id='$cat', Decorator_id='$dec', BenquetHall_id='$ben', BeautyParlor_id='$bea', DJ_id='$dj', Photographer_id='$pho' where PT_id='$PT_id' and ET_id='$ET_id'";
            $updateresult = mysqli_query($conn, $updatequery);

            if($updateresult)
            {
                header('location: dashboard-admin-Packages.php');
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
    <style>
    .drop{
        border-radius: 3px; 
        width: 100%; 
        height: 37px; 
        background-color: inherit;
        border: 1px solid black;
    }
    .disableddrop{
        border-radius: 3px; 
        width: 100%; 
        height: 37px; 
        background-color: inherit;
        color: black;
    }
  </style>
</head>

<body style="background-image: url('Uploads/back.jpg');background-position: center;background-size:cover;">
<div class="page-wrapper p-t-10 p-b-10 font-robo" style="padding-top: 50px; background-color: ;">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-body">
                    <center><h2 class="title">Event Type : <?php echo $eventrow[0]; ?><br>Package Type : <?php echo $packagerow[0]; ?></h2></center>
                    <div class='col-md-12'>
                        <form method="post" enectype='multipart/form-data'>
                            <div class="input-group" id="otp">
                                <select class='drop' name='caterar'>
                                    <?php
                                        $caterarquery = "select dealer_registration.D_id, dealer_registration.StoreName, caterar.C_id from dealer_registration join caterar on dealer_registration.D_id=caterar.Dealerid where dealer_registration.Professionid=1";
                                        $caterarresult = mysqli_query($conn, $caterarquery);

                                        while($catrow = mysqli_fetch_row($caterarresult))
                                        {
                                            ?>
                                                <option value='<?php echo $catrow[2];?>' <?php if($caterar == $catrow[0]){echo "selected";}?>><?php echo $catrow[1]; ?></option>
                                            <?php
                                        }
                                    ?>
                                </select>
                            </div>
                            <div class="input-group" id="otp">
                                <select class='drop' name='decorator'>
                                        <?php
                                            $decoratorquery = "select dealer_registration.D_id, dealer_registration.StoreName, decorator.D_id from dealer_registration join decorator on dealer_registration.D_id=decorator.Dealerid where dealer_registration.Professionid=2";
                                            $decoratorresult = mysqli_query($conn, $decoratorquery);

                                            while($decrow = mysqli_fetch_row($decoratorresult))
                                            {
                                                ?>
                                                    <option value='<?php echo $decrow[2];?>' <?php if($decorator == $decrow[0]){echo "selected";}?> ><?php echo $decrow[1]; ?></option>
                                                <?php
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="input-group" id="otp">
                                <select class='drop' name='benquet'>
                                        <?php
                                            $benquetquery = "select dealer_registration.D_id, dealer_registration.StoreName, benquethall.BH_id from dealer_registration join benquethall on dealer_registration.D_id=benquethall.Dealerid where dealer_registration.Professionid=3";
                                            $benquetresult = mysqli_query($conn, $benquetquery);

                                            while($benrow = mysqli_fetch_row($benquetresult))
                                            {
                                                ?>
                                                    <option value='<?php echo $benrow[2];?>' <?php if($benquethall == $benrow[0]){echo "selected";}?> ><?php echo $benrow[1]; ?></option>
                                                <?php
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="input-group" id="otp">
                                <select class='drop' name='beauty'>
                                        <?php
                                            $beautyquery = "select dealer_registration.D_id, dealer_registration.StoreName, beautyparlor.B_id from dealer_registration join beautyparlor on dealer_registration.D_id=beautyparlor.Dealerid where dealer_registration.Professionid=4";
                                            $beautyresult = mysqli_query($conn, $beautyquery);

                                            while($bearow = mysqli_fetch_row($beautyresult))
                                            {
                                                ?>
                                                    <option value='<?php echo $bearow[2];?>' <?php if($beautyparlor == $bearow[0]){echo "selected";}?> ><?php echo $bearow[1]; ?></option>
                                                <?php
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="input-group" id="otp">
                                <select class='drop' name='dj'>
                                        <?php
                                            $djquery = "select dealer_registration.D_id, dealer_registration.StoreName, dj.DJ_id from dealer_registration join dj on dealer_registration.D_id=dj.Dealerid where dealer_registration.Professionid=5";
                                            $djresult = mysqli_query($conn, $djquery);

                                            while($djrow = mysqli_fetch_row($djresult))
                                            {
                                                ?>
                                                    <option value='<?php echo $djrow[2];?>' <?php if($dj == $djrow[0]){echo "selected";}?> ><?php echo $djrow[1]; ?></option>
                                                <?php
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="input-group" id="otp">
                                <select class='drop' name='photo'>
                                        <?php
                                            $photoquery = "select dealer_registration.D_id, dealer_registration.StoreName, photographer.P_id from dealer_registration join photographer on dealer_registration.D_id=photographer.Dealerid where dealer_registration.Professionid=6";
                                            $photoresult = mysqli_query($conn, $photoquery);

                                            while($photorow = mysqli_fetch_row($photoresult))
                                            {
                                                ?>
                                                    <option value='<?php echo $photorow[2];?>' <?php if($photographer == $photorow[0]){echo "selected";}?> ><?php echo $photorow[1]; ?></option>
                                                <?php
                                            }
                                        ?>
                                </select>
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
</div> 
</body>