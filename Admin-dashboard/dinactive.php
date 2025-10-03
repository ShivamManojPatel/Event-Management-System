<?php
    require ('../Datacon.php');
    $id = $_GET['id'];

    if($conn)
    {
        $query = "update dealer_registration set Status='Active' where D_id = '$id'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header('location: dashboard-admin-Dealers.php');
        }
    }
    else
    {
        header('location: ../error/Databaseerror.php;');
    }
?>