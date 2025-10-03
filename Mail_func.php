<?php

      //require ('PhpMailer/Exception.php');
      require ('PhpMailer/PHPMailerAutoload.php');
      //require ('PhpMailer/PHPMailer.php');
      //require ('PhpMailer/SMTP.php');
      require ('Datacon.php');
      //require ('PHPMailerAutoload.php');
?>

<?php
    function otpmail($mail, $otp)
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
                              
        $mail->From = "20bmiit030@gmail.com";
        $mail->FromName = '#Event SYSTEM';
        $mail->addAddress($mail);
        $mail->Subject = "Otp for your email verification";
        $mail->Body = "Your OTP is : " . $otp;

        if(!$mail->send())
        {
            return false;
        }
        else
        {
            return true;
        }
    }
?>