<?php

    session_start();    

    if(session_id() == "" || !isset($_SESSION['User']))
    {
      header('location: index.php');
    }
  
    require '../Datacon.php';
  
    if(!$conn)
    {
      header('location: ../error/Databaseerror.php');
    }
?>

<?php
    $event = $_SESSION['event'];
    $package = $_SESSION['package'];
    $caterar = $_SESSION['caterar'];
    $decorator = $_SESSION['decorator'];
    $benquethall = $_SESSION['benquethall'];
    $beautyparlor = $_SESSION['beautyparlor'];
    $dj = $_SESSION['dj'];
    $photographer = $_SESSION['photographer'];
    $noofperson = $_SESSION['noofperson'];
    $fromdate = $_SESSION['fromdate'];
    $todate = $_SESSION['todate'];
    $noofdays = $_SESSION['noofdays'];
    $estimate = $_SESSION['estimate'];

    echo $package;
    $id = $_SESSION['User'];

    $query1 = "select CID from registration_master where Email = '$id'";
    $result1 = mysqli_query($conn, $query1);
    $row1 = mysqli_fetch_row($result1);

    if($_SESSION['package_type'] == "Custom")
    {
        $query2 = "insert into book_event (C_id, ET_id, Caterar_id, Decorator_id, Benquethall_id, Beautyparlor_id, Dj_id, Photographer_id, From_Date, To_Date, No_of_days, Noofperson, Status) value ('$row1[0]', '$event', '$caterar', '$decorator', '$benquethall', '$beautyparlor', '$dj', '$photographer', '$fromdate', '$todate', '$noofdays', '$noofperson', 'Upcoming')";
    }
    else
    {
        $query2 = "insert into book_event (C_id, ET_id, PT_id, Caterar_id, Decorator_id, Benquethall_id, Beautyparlor_id, Dj_id, Photographer_id, From_Date, To_Date, No_of_days, Noofperson, Status) value ('$row1[0]', '$event', '$package', '$caterar', '$decorator', '$benquethall', '$beautyparlor', '$dj', '$photographer', '$fromdate', '$todate', '$noofdays', '$noofperson', 'Upcoming')";
    }
    $result2 = mysqli_query($conn, $query2);

    if($result2)
    {
        $query3 = "select max(B_Id) from book_event";
        $result3 = mysqli_query($conn, $query3);
        $row3 = mysqli_fetch_row($result3);

        $query4 = "insert into payment (B_id, Amount, Status) values ('$row3[0]', '$estimate', 'Paid')";
        $result4 = mysqli_query($conn, $query4);

        if($result4)
        {
            header('location: booksuccess.php');
        }
    }
?>