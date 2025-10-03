<?php
  session_start();

   if(session_id() == "" || !isset($_SESSION['User']))
   {
        header('location: ../index.php');
   }

   require '../Datacon.php';

   if(!$conn)
   {
    header('location: ../error/Databaseerror.php');
   }
?>

<?php
    $bid = $_GET['bid'];

    $query = "update book_event set Status='Complete' where B_Id='$bid'";
    $result = mysqli_query($conn, $query);

    if($result)
    {
        setcookie("msg1", "Updated!", time()+10);
        header('location: dashboard-admin.php');
    }
    else
    {
        setcookie("msg1", "Task Failed!please try again later", time()+10);
    }
?>