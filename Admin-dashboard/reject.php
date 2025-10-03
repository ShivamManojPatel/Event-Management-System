<?php
    session_start();
    require ('../Datacon.php');
    require ('../PhpMailer/PHPMailerAutoload.php');
    $id = $_GET['id'];
    $email = $_SESSION['remail'];

    if($conn)
    {
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
        $mail->Body = "Sorry!Your request has been rejected by our Admin";

        if($mail->send())
        {
                                      
            $dquery = "delete from tmp_dealer where td_id = '$id'";
            $dresult = mysqli_query($conn, $dquery);

            if($dresult)
            {
                header('location: dashboard-admin-Dealers.php');
            }
        }
    }
    else
    {
        header('location: ../error/Databaseerror.php;');
    }
?>