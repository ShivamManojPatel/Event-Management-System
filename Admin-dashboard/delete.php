<?php
    require ('../Datacon.php');
    $id = $_GET['id'];

    if($conn)
    {
        $query = "update registration_master set status='Inactive' where CID = '$id'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header('location: dashboard-admin-Customers.php');
        }
    }
    else
    {
        header('location: ../error/Databaseerror.php;');
    }
?>