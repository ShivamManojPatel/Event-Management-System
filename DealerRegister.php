<?php session_start();

      //require ('PhpMailer/Exception.php');
      require ('PhpMailer/PHPMailerAutoload.php');
      //require ('PhpMailer/PHPMailer.php');
      //require ('PhpMailer/SMTP.php');
      require ('Datacon.php');
      //require ('PHPMailerAutoload.php');
?>

<?php
    if($conn)
    {
        if(isset($_POST['dregisterbtn']))
        {
            if(!empty($_POST['dfname']) && !empty($_POST['dlname']) && !empty($_POST['demail']) && !empty($_POST['dcno']) && !empty($_POST['dgender']) && !empty($_POST['dpass']) && !empty($_POST['dcpass']) && !empty($_POST['dacno']) && !empty($_POST['dsname']))
            {
                if(strlen($_POST['dpass']) >= 8)
                {
                    if($_POST['dpass'] === $_POST['dcpass'])
                    {
                        if(filter_var($_POST['demail'], FILTER_VALIDATE_EMAIL))
                        {
                            $ano = str_split($_POST['dcno']);
                            $aano = str_split($_POST['dacno']);
                            if(is_numeric($_POST['dcno']) && (strlen($_POST['dcno']) === 10))
                            {
                                if((($ano[0] == 6) || ($ano[0] == 7) || ($ano[0] == 8) || ($ano[0] == 9)))
                                {
                                    if((is_numeric($_POST['dcno']) && (strlen($_POST['dcno']) === 10)))
                                    {
                                        if((($aano[0] == 6) || ($aano[0] == 7) || ($aano[0] == 8) || ($aano[0] == 9)))
                                        {
                                            if($_POST['dprofession'] == 'caterar')
                                            {
                                                $professionid = 1;
                                            }
                                            elseif ($_POST['dprofession'] == 'decorator') {
                                                $professionid = 2;
                                            }
                                            elseif ($_POST['dprofession'] == 'benquet hall manager') {
                                                $professionid = 3;
                                            }
                                            elseif ($_POST['dprofession'] == 'beautique') {
                                                $professionid = 4;
                                            }
                                            elseif($_POST['dprofession'] == 'DJ') {
                                                $professionid = 5;
                                            }
                                            elseif ($_POST['dprofession'] == 'photographer') {
                                                $professionid = 6;
                                            }
                                                setcookie('fname', $_POST['dfname'], time()+60*5);
                                                setcookie('lname', $_POST['dlname'], time()+60*5);
                                                setcookie('sname', $_POST['dsname'], time()+60*5);
                                                setcookie('email', $_POST['demail'], time()+60*5);
                                                setcookie('contact', $_POST['dcno'], time()+60*5);
                                                setcookie('acontact', $_POST['dacno'], time()+60*5);
                                                setcookie('profession', $professionid, time()+60*5);
                                                setcookie('gender', $_POST['dgender'], time()+60*5);
                                                setcookie('pass', $_POST['dpass'], time()+60*5);
                                                $flag = false;
                                                
                                                $query = "select * from tmp_dealer";
                                                $result = mysqli_query($conn, $query);
                                                while($row = mysqli_fetch_row($result))
                                                {
                                                    if($_POST['demail'] == $row[3])
                                                    {
                                                        $flag = true;
                                                    }
                                                }
                                                
                                                if(!$flag)
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
                                                    $mail->addAddress($_POST['demail']);
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
                                                        //echo $professionid;
                                                        header('location: dotpverify.php');
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
                                        <center>Please, enter alternate contact numberproperly</center>
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
                                <center>Please enter contact number properly</center>
                                </div>";
                            }
                        }
                        else
                        {
                            echo "<div style='padding: 5px;
                            background-color: #ffffb3;
                            color: black;
                            height: 25px;'>
                                <center>Enter valid email</center>
                            </div>";
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
                        <center>Password must be 8 characters or more</center>
                    </div>";
                }
            }
            else
            {
                echo "<div style='padding: 5px;
                                        background-color: #ffffb3;
                                        color: black;
                                        height: 25px;'>
                                        <center>Please, enter all the deatils properly</center>
                                        </div>";
            }
        }
    }
    else
    {
        header('location: error/Databaseerror.php');
    }
?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="Login/fonts/icomoon/style.css">

    <link rel="stylesheet" href="Login/css/owl.carousel.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="Login/css/bootstrap.min.css">
    
    <!-- Style -->
    <link rel="stylesheet" href="Login/css/style.css">

    <!-- System Logo -->
    <link rel="shortout icon" type="image/x-icon" href="img/favicon.png"/>

    <title>#Events-Registration</title>
  </head>
  <body>
  
  <header id="slider-area" style='padding-top: 10px;'>      
        <a href="index.php"><img src="Login/images/homebtn.png" alt="Image" width="50px" height="30px" style="padding-left : 20px"></a>          
    </header> 
  <div class="content">
    <div class="container">
      <div class="row">
        
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-10">
              <div class="mb-4">
              <h3>DEALER-REGISTRATION</h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
            </div>
            <form method="post">
                <div class="form-group first">
                    <input type="text" class="form-control" id="username" placeholder="First Name" name="dfname">
                </div>
                <div class="form-group first">
                    <input type="text" class="form-control" id="username" placeholder="Last Name" name="dlname">
                </div>
                <div class="form-group first">
                    <input type="text" class="form-control" id="username" placeholder="Store Name" name="dsname">
                </div>
                <div class="form-group first">
                    <input type="text" class="form-control" id="email" placeholder="Email" name="demail">
                </div>
                <div class="form-group first">
                    <input type="text" class="form-control" id="contact" placeholder="Contact Number" name="dcno">
                </div>
                <div class="form-group first">
                    <input type="text" class="form-control" id="contact" placeholder="Alternate Contact Number" name="dacno">
                </div>
                <div class="form-group first">
                    <select placeholder='profession' class='form-control' style='background-color: inherit;' name="dprofession">
                    <option disabled='disabled' selected='selected'>profession</option>
                    <?php
                        $dquery = 'select * from dealer_type';
                        $dresult = mysqli_query($conn, $dquery);

                        while($row = mysqli_fetch_row($dresult))
                        {
                            ?>
                                <option><?php echo $row[1]; ?></option>
                            <?php
                        }
                    ?>
                    </select>
                </div>
                <div class="form-group first">
                    <select class="form-control" style="background-color: inherit;" name="dgender">
                    <option disabled="disabled" selected="selected">Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                    </select>
                </div>
                <div class="form-group first">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="dpass">
                </div>
                <div class="form-group last mb-4">
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="dcpass">
                </div>
              <input type="submit" value="Generate OTP" class="btn btn-block btn-primary" name="dregisterbtn">

              <span class="d-block text-left my-4 text-muted"><a href="Login.php"> Already have an Account? </a></span>
            </form>
            </div>
          </div>
          
        </div>
        <div class="col-md-6" style='top: 150px;'>
          <img src="Login/images/registration-bg.svg" alt="Image" class="img-fluid" style="">
        </div>
      </div>
    </div>
  </div>

  
    <script src="Login/js/jquery-3.3.1.min.js"></script>
    <script src="Login/js/popper.min.js"></script>
    <script src="Login/js/bootstrap.min.js"></script>
    <script src="Login/js/main.js"></script>
  </body>
</html>