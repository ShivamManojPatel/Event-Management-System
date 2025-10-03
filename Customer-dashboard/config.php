<?php
    require('stripe-php-master/init.php');

    $Publishkey = "pk_test_51MvYITSIOMJd7D6Zhmz1Ver1AqeI5CZA8M6cWQFNGB9kDdhfhHO2zVm8nvwgPMCeMLcHg8iBo51TQ8mZJFMw7OZ800dXkVijBe";

    $Secretkey = "sk_test_51MvYITSIOMJd7D6ZpLALBOEHMi7SbewsdxTQsrhXleHUs4pwBIOj57rAsUKjqQvSxfMjyOgz7qY7FxvkUZpDlzG900ID64gw2t";

    \Stripe\Stripe::setApiKey($Secretkey);
?>