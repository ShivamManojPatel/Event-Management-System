<?php session_start(); ?>

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

    <title>#Events-Login</title>
  </head>
  <?php
    include ('Datacon.php');
    $flagh = 0;
    if($conn)
    {
      if(isset($_POST['Lbtn']))
      {
        if(!empty($_POST['Lid']) && !empty($_POST['Lpass']))
        {
            if(filter_var($_POST['Lid'], FILTER_VALIDATE_EMAIL))
            {
              $id = $_POST['Lid'];
              $pass = $_POST['Lpass'];
              $Cquery = "select * from registration_master where Email='$id' and Status='Active'";
              //$Dquery = "select * from registration_master where Email='$id' and Status='Active'";
              $Cresult = mysqli_query($conn, $Cquery);
              $Cafrow = mysqli_affected_rows($conn);
              
                if($Cafrow == 1)
                {
                  
                    $row = $Cresult->fetch_assoc();
                    $did = $row['Email'];
                    $dpass = $row['Password'];
                    $dfname = $row['First_Name'];
                    $dlname = $row['Last_Name'];
                    if($did == $id && password_verify($pass, $dpass))
                    {   
                        $_SESSION['User'] = $did;
                        $_SESSION['User_role'] = 'Customer';

                        if(isset($_POST['chbox']))
                        {
                          setcookie("User", $id, time()+3600*24*7);
                          setcookie("Pass", $pass, time()+3600*24*7);
                        }

                        header('location: Customer-dashboard/dashboard-Customer.php');
                    }
                    else
                    {
                      $flagh = 1;
                    }
                }
                else
                {
                  $Aquery = "select * from admin_registration where Email='$id' and Status='Active'";
                  $Aresult = mysqli_query($conn ,$Aquery);
                  $Aafrow = mysqli_affected_rows($conn);
                  if($Aafrow == 1)
                  {
                    
                      $row = $Aresult->fetch_assoc();
                      $did = $row['Email'];
                      $dpass = $row['Password'];
                      $dfname = $row['First_Name'];
                      $dlname = $row['Last_Name'];
                      if($did == $id && password_verify($pass, $dpass))
                      {   
                          $_SESSION['User'] = $did;
                          $_SESSION['User_role'] = 'Admin';

                          if(isset($_POST['chbox']))
                          {
                            setcookie("User", $id, time()+3600*24*7);
                            setcookie("Pass", $pass, time()+3600*24*7);
                          }

                          if($id=='hashevents2@gmail.com')
                          {
                            $_SESSION['mainadmin'] = "Main";
                          }

                          header('location: Admin-dashboard/dashboard-admin.php');
                      }
                      else
                      {
                        $flagh = 1;
                      
                      }
                  }
                  else
                  {
                    $Dquery = "select * from dealer_registration where Email='$id'";
                    $Dresult = mysqli_query($conn ,$Dquery);
                    $Dafrow = mysqli_affected_rows($conn);
                    if($Dafrow == 1)
                    {
                      
                        $row = $Dresult->fetch_assoc();
                        $did = $row['Email'];
                        $dpass = $row['Password'];
                        $dfname = $row['First_Name'];
                        $dlname = $row['Last_Name'];
                        if($did == $id && password_verify($pass, $dpass))
                        {   
                            $_SESSION['User'] = $did;
                            $_SESSION['User_role'] = 'Dealer';

                            if(isset($_POST['chbox']))
                            {
                              setcookie("User", $id, time()+3600*24*7);
                              setcookie("Pass", $pass, time()+3600*24*7);
                            }

                            header('location: Dealer-dashboard/dashboard-dealer.php');
                        }
                        else
                        {
                          $flagh = 1;
                        }                   
                      }
                      $flagh = 1;
                  }
                  $flagh = 1;
                }
            }
            else
            {
              echo "<div style='padding: 5px;
                                            background-color: #ffffb3;
                                            color: black;
                                            height: 25px;'>
                                                <center>Please, Enter valid email</center>
                                            </div>";
            }
        }
        else
        {
          echo "<div style='padding: 5px;
                                            background-color: #ffffb3;
                                            color: black;
                                            height: 25px;'>
                                                <center>Please, Enter details properly</center>
                                            </div>";
        }
      }
    }
    else
    {
      header('location: error/Databaseerror.php');
    }

    if($flagh == 1)
    {
      echo "<div style='padding: 5px;
                                                  background-color: #ffffb3;
                                                  color: black;
                                                  height: 25px;'>
                                                      <center>Login Failed! please try again later</center>
                                                  </div>";
    }
  ?>
  <body>
  
  <header id="slider-area" style='padding-top: 10px;'>     
        <a href="index.php"><img src="Login/images/homebtn.png" alt="Image" width="50px" height="30px" style="padding-left : 20px"></a>          
    </header>  
  <div class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="Login/images/login-bg.png" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4">
              <h3>LOGIN</h3>
              <!-- <p class="mb-4">Lorem ipsum dolor sit amet elit. Sapiente sit aut eos consectetur adipisicing.</p> -->
            </div>
            <form method="post">
              <div class="form-group first">
                <input type="text" class="form-control" id="username" placeholder="Email" name="Lid" value="<?php if(isset($_COOKIE['User'])){echo $_COOKIE['User'];}?>">

              </div>
              <div class="form-group last mb-4">
                <input type="password" class="form-control" id="password" placeholder="Password" name="Lpass" value="<?php if(isset($_COOKIE['Pass'])){echo $_COOKIE['Pass'];}?>">
                
              </div>
              
              <div class="d-flex mb-5 align-items-center">
                <label class="control control--checkbox mb-0"><span class="caption">Remember me</span>
                  <input type="checkbox" name="chbox"/>
                  <div class="control__indicator"></div>
                </label>
                <span class="ml-auto"><a href="forgotpassword.php" class="forgot-pass">Forgot Password?</a></span> 
              </div>

              <input type="submit" value="Log In" class="btn btn-block btn-primary" name="Lbtn">

              <span class="d-block text-left my-4 text-muted"><a href="Registration.php"> Didn't Register Yet? </a></span>
            </form>
            </div>
          </div>
          
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