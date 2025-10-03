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
        $mail->Body = "Congrates!Your request has been accepted by our Admin";

        if($mail->send())
        {
            $squery = "select * from tmp_dealer where td_id = '$id'";
            $sresult = mysqli_query($conn, $squery);
            $row = mysqli_fetch_array($sresult);

            $did = $row[0];
            $dfname = $row[1];
            $dlname = $row[2];
            $dsname = $row[3];
            $demail = $row[4];
            $dcontact = $row[5];
            $dacontact = $row[6];
            $dgender = $row[8];
            $dprofession = $row[9];
            $dpassword = $row[10];
            $time = date("Y-m-d h:i:sa");

            $iquery = "insert into dealer_registration(First_Name, Last_Name, StoreName, Email, Contact_No, Alt_Contact_No, Gender, Professionid, Password, Created_On, Updated_On, Status) values ('$dfname', '$dlname', '$dsname', '$demail', '$dcontact', '$dacontact', '$dgender', '$dprofession', '$dpassword', '$time', '$time', 'Active')";
            $iresult = mysqli_query($conn, $iquery);
            if($iresult)
            {                                      
                $dquery = "delete from tmp_dealer where td_id = '$id'";
                $dresult = mysqli_query($conn, $dquery);

                if($dresult)
                {
                    $query1 = "select max(D_id) from dealer_registration";
                    $result1 = mysqli_query($conn, $query1);
                    $row1 = mysqli_fetch_array($result1);
                    
                    if($result1)
                    {
                        if($dprofession == 1)
                        {
                            $cid = $row1[0];
                            $caterarinsert = "insert into caterar(DealerId, Status) values ('$cid', 'Active')";
                            $caterarresult = mysqli_query($conn, $caterarinsert);

                            if($caterarresult)
                            {
                                header('location: dashboard-admin-Dealers.php');
                            }
                        }
                        elseif($dprofession == 2)
                        {
                            $did = $row1[0];
                            $caterarinsert = "insert into decorator(DealerId, Status) values ('$did', 'Active')";
                            $caterarresult = mysqli_query($conn, $caterarinsert);

                            if($caterarresult)
                            {
                                header('location: dashboard-admin-Dealers.php');
                            }
                        }
                        elseif($dprofession == 3)
                        {
                            $bid = $row1[0];
                            $caterarinsert = "insert into benquethall(DealerId, Status) values ('$bid', 'Active')";
                            $caterarresult = mysqli_query($conn, $caterarinsert);

                            if($caterarresult)
                            {
                                header('location: dashboard-admin-Dealers.php');
                            }
                        }
                        elseif($dprofession == 4)
                        {
                            $bid = $row1[0];
                            $caterarinsert = "insert into beautique(DealerId, Status) values ('$bid', 'Active')";
                            $caterarresult = mysqli_query($conn, $caterarinsert);

                            if($caterarresult)
                            {
                                header('location: dashboard-admin-Dealers.php');
                            }
                        }
                        elseif($dprofession == 5)
                        {
                            $did = $row1[0];
                            $caterarinsert = "insert into dj(DealerId, Status) values ('$did', 'Active')";
                            $caterarresult = mysqli_query($conn, $caterarinsert);

                            if($caterarresult)
                            {
                                header('location: dashboard-admin-Dealers.php');
                            }
                        }
                        elseif($dprofession == 6)
                        {
                            $pid = $row1[0];
                            $caterarinsert = "insert into photographer(DealerId, Status) values ('$pid', 'Active')";
                            $caterarresult = mysqli_query($conn, $caterarinsert);

                            if($caterarresult)
                            {
                                header('location: dashboard-admin-Dealers.php');
                            }
                        }
                    }
                }
            }
        }
    }
    else
    {
        header('location: ../error/Databaseerror.php;');
    }
?>