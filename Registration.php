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
      if(isset($_POST['registerbtn']))
      {
          if(!empty($_POST['fname']) && !empty($_POST['lname']) && !empty($_POST['email']) && !empty($_POST['cno']) && !empty($_POST['gender']) && !empty($_POST['pass']) && !empty($_POST['cpass']))
          {
            if(strlen($_POST['pass']) >= 8)
            {
              if($_POST['pass'] === $_POST['cpass'])
              {
                  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                  {
                    $ano = str_split($_POST['cno']);
                      if(is_numeric($_POST['cno']) && (strlen($_POST['cno']) === 10))
                      {
                        if((($ano[0] == 6) || ($ano[0] == 7) || ($ano[0] == 8) || ($ano[0] == 9)))
                        {
                          setcookie('fname', $_POST['fname'], time()+60*5);
                          setcookie('lname', $_POST['lname'], time()+60*5);
                          setcookie('email', $_POST['email'], time()+60*5);
                          setcookie('contact', $_POST['cno'], time()+60*5);
                          setcookie('gender', $_POST['gender'], time()+60*5);
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
                              $mail->addAddress($_POST['email']);
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
                                header('location: otpverify.php');
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
                  <center>Please, Fill all the details properly</center>
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
              <h3>REGISTRATION</h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
            </div>
            <form method="post">
                <div class="form-group first">
                    <input type="text" class="form-control" id="username" placeholder="First Name" name="fname">
                </div>
                <div class="form-group first">
                    <input type="text" class="form-control" id="username" placeholder="Last Name" name="lname">
                </div>
                <div class="form-group first">
                    <input type="text" class="form-control" id="email" placeholder="Email" name="email">
                </div>
                <div class="form-group first">
                    <input type="text" class="form-control" id="contact" placeholder="Contact Number" name="cno">
                </div>
                <div class="form-group first">
                    <select class="form-control" style="background-color: inherit;" name="gender">
                    <option disabled="disabled" selected="selected">Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                    <option>Other</option>
                    </select>
                </div>
                <div class="form-group first">
                    <input type="password" class="form-control" id="password" placeholder="Password" name="pass">
                </div>
                <div class="form-group last mb-4">
                    <input type="password" class="form-control" id="cpassword" placeholder="Confirm Password" name="cpass">
                </div>
              <input type="submit" value="Generate OTP" class="btn btn-block btn-primary" name="registerbtn">

              <span class="d-block text-left my-4 text-muted"><a href="Login.php"> Already have an Account? </a></span>
              <span class="d-block text-left my-4 text-muted"><a href="DealerRegister.php"> Want to be a Dealer? </a></span>
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