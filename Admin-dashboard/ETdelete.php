<?php
    session_start();

    if(session_id() == "" || !isset($_SESSION['User']))
    {
         header('location: ../index.php');
    }
    require '../Datacon.php';
    if(!$conn)
    {
     header('../error/Databaseerror.php');
    }
    if(isset($_POST['btnaddevent']))
    {
     header('location: addevent.php');
    }

    $id = $_GET['id'];

    $query = "delete from event_type where ETid='$id'";

    $result = mysqli_query($conn, $query);

    if($result)
    {
        header('location: dashboard-admin-Events.php');
    }


?>