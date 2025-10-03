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

    $id = $_GET['bid'];

    $query = "select payment.Amount, book_event.From_Date from book_event join payment on book_event.B_Id=payment.B_id where book_event.B_Id='$id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_row($result);

    $date1 = date_create($row[1]);
    $date2 = date("Y-m-d");
    $today = date_create($date2);

    $days = date_diff($today, $date1);
    $diff = $days->format("%a");

    $updatequery = "update book_event set Status='Cancelled' where B_Id='$id'";
    $updateresult = mysqli_query($conn, $updatequery);

    if($updateresult)
    {
        $paymentquery = "update payment set Status='Cancelled' where B_id='$id'";
        $paymentesult = mysqli_query($conn, $paymentquery);

        if($paymentesult)
        {
            if($diff > 7)
            {
                setcookie("cancel", "Event cancelled with 100% refund", time()+10);
                header('location: dashboard-Customer-ManageEvent.php');
            }
            else
            {
                setcookie("cancel", "Event cancelled with 50% refund", time()+10);
                header('location: dashboard-Customer-ManageEvent.php');
            }
        }
        else
        {
            setcookie("cancel", "Event cancellation failed!try after sometime1", time()+10);
            header('location: dashboard-Customer-ManageEvent.php');
        }
    }
    else
    {
        setcookie("cancel", "Event cancellation failed!try after sometime2", time()+10);
        header('location: dashboard-Customer-ManageEvent.php');
    }
?>