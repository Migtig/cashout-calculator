<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashout Results</title>
    <link rel="stylesheet" href="styles/output.css">
</head>
<body>
    
<?php

$cashoutValid = true;


// Checks and assigns variable for Net Sales
if( isset( $_POST["sales"] ) ) {
    if ( is_numeric( $_POST["sales"] ) ) {
        $netSales = $_POST["sales"];
    }
    else {
        $cashoutValid = false;
    }
}
else {
    $cashoutValid = false;
}

// Checks and assigns variable for Food Sales
if( isset( $_POST["food"] ) ) {
    if ( is_numeric( $_POST["food"] ) ) {
        $foodSales = $_POST["food"];
    }
    else {
        $cashoutValid = false;
    }
}
else {
    $cashoutValid = false;
}

// Checks and assigns variable for Cash
if( isset( $_POST["cash"] ) ) {
    if ( is_numeric( $_POST["cash"] ) ) {
        $cash = $_POST["cash"];
    }
    else {
        $cashoutValid = false;
    }
}
else {
    $cashoutValid = false;
}

// Checks and assigns variable for Tips Paid
if( isset( $_POST["tips"] ) ) {
    if ( is_numeric( $_POST["tips"] ) ) {
        $tipsPaid = $_POST["tips"];
    }
    else {
        $cashoutValid = false;
    }
}
else {
    $cashoutValid = false;
}

// Checks and assigns variable for sales at time of host being cut
if( isset( $_POST["host-sales"] ) ) {
    if ( $_POST["host-sales"] != "" ) {
        if( is_numeric( $_POST["host-sales"] ) ) {
            $hostSales = $_POST["host-sales"];
        }
        else {
            $cashoutValid = false;
        }
    }
    else {
        $hostSales = null;
    }
}
else {
    $cashoutValid = false;
}




if( !$cashoutValid ) {
    $errorCookieData = "You entered some data incorrectly :/ Please try again!";
    setcookie( "invalidCashout", $errorCookieData, time() +10 );
    header( "location: index.php" );
    die();
}

// Variables: netSales, foodSales, cash, tipsPaid, hostSales

?>

<main>
    <div>
        <h2>Cashout Results</h2>

        <h3>Host:</h3>
        <p>
            <?php 
            if( isset( $hostSales ) ) {
                $hostTipout = $hostSales * 0.01;
                echo( "$$hostSales x 1% = $" . $hostTipout );
            } 
            else {
                $hostTipout = $netSales * 0.01;
                echo( "$$netSales x 1% = $" . $hostTipout );
            }
            
            ?>
        </p>

        <h3>Kitchen:</h3>
        <p>
            <?php
            $kitchenTipout = $foodSales * 0.05;
            echo( "$$foodSales x 5% = $" . $kitchenTipout );
            ?>
        </p>

        <h3>Bar:</h3>
        <p>
            <?php
            $barTipout = $netSales * 0.02;
            echo( "$$netSales x 2% = $" . $barTipout );
            ?>
        </p>

        <h3>Total:</h3>
        <p>
            <?php
            echo( "$$hostTipout + $$kitchenTipout + $$barTipout = $" . $hostTipout + $kitchenTipout + $barTipout );
            ?>
        </p>


    </div>
    <a href="index.php">Back to start</a>

</main>
</body>
</html>