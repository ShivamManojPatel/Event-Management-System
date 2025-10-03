<?php
    require ('../Datacon.php');
    $id = $_GET['id'];

    if($conn)
    {
        $query = "update event_type set Status='Active' where ETid = '$id'";
        $result = mysqli_query($conn, $query);

        if($result)
        {
            header('location: dashboard-admin-Events.php');
        }
    }
    else
    {
        header('location: ../error/Databaseerror.php;');
    }
?>