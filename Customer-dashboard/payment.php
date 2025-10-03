<?php
    require('config.php');

    $estimate = $_GET['Price'];
    $id = $_GET['BookId'];

    $pay = 0;

    if($estimate < 100000)
    {
        $pay = 5;
    }
    elseif($estimate >= 100000 && $estimate < 200000)
    {
        $pay = 10;
    }
    elseif($estimate >= 200000 && $estimate < 300000)
    {
        $pay = 20;
    }
    elseif($estimate >= 300000 && $estimate < 400000)
    {
        $pay = 30;
    }
    elseif($estimate >= 400000 && $estimate < 500000)
    {
        $pay = 40;
    }
    elseif($estimate >= 500000 && $estimate < 600000)
    {
        $pay = 50;
    }
    elseif($estimate >= 600000 && $estimate < 700000)
    {
        $pay = 60;
    }
    elseif($estimate >= 700000 && $estimate < 800000)
    {
        $pay = 70;
    }
    elseif($estimate >= 900000 && $estimate < 1000000)
    {
        $pay = 90;
    }
    elseif($estimate >= 1000000)
    {
        $pay = 100;
    }
?>

<form action='http://localhost:8081/TEMS/Customer-Dashboard/UpdatePayment.jsp?id=<?php echo $id ?>' method='post'>
    <script 
        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="<?php echo $Publishkey ?>"
        data-amount="<?php echo $pay*100?>"
        data-name="#Events"
        data-description="Event Managers"
        data-image="../img/favicon.png"
        data-currency="inr"
        data-local="auto"
        data-email='hashevents2@gmail.com'
    >
    </script>


</form>