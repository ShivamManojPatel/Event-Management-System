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
   
   $id = $_GET['id'];
   $query = "update admin_registration set Status='Active' where A_id = '$id'";

   $result = mysqli_query($conn, $query);

   if($result)
   {
    setcookie("msg", "Updated", time()+5);
    header('location: dashboard-admin-Admin.php');
   }
   else
   {
    setcookie("msg", "Something went wrong", time()+5);
    header('location: dashboard-admin-Admin.php');
   }
?>