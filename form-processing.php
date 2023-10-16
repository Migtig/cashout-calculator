<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashout Processing</title>
    <!-- <link rel="stylesheet" href="styles/output.css"> -->
</head>
<body>
    
<?php
// Variable for keeping track of whether the cashout was valid
$cashoutValid = true;

// Default error message to be sent back if something goes wrong. Can be overwritten for a specific error
$errorCookieData = "You entered some data incorrectly :/ Please try again!";



// Checks and assigns variable for Net Sales
if( isset( $_POST["sales"] ) ) {
    if ( is_numeric( $_POST["sales"] ) ) {
        $netSales = $_POST["sales"];
    }
    else {
        $cashoutValid = false;
        $errorCookieData = "netsales numeric test";

    }
}
else {
    $cashoutValid = false;
    $errorCookieData = "netsales set test";

}

// Checks and assigns variable for Food Sales
if( isset( $_POST["food"] ) ) {
    if ( is_numeric( $_POST["food"] ) ) {
        $foodSales = $_POST["food"];
    }
    else {
        $cashoutValid = false;
        $errorCookieData = "food numeric test";

    }
}
else {
    $cashoutValid = false;
    $errorCookieData = "food set test";

}

// Checks and assigns variable for Cash
if( isset( $_POST["cash"] ) ) {
    if ( is_numeric( $_POST["cash"] ) ) {
        $cash = $_POST["cash"];
    }
    else {
        $cashoutValid = false;
        $errorCookieData = "cash";

    }
}
// else {
//     $cashoutValid = false;
// }

// Since these are no longer required, I need to change the if statement to match the if statement for host sales
// I am retarded
// Checks and assigns variable for Tips Paid
if( isset( $_POST["tips"] ) ) {
    if ( is_numeric( $_POST["tips"] ) ) {
        $tipsPaid = $_POST["tips"];
    }
    else {
        $cashoutValid = false;
        $errorCookieData = "tips";

    }
}
// else {
//     $cashoutValid = false;
// }

// Checks for and assigns variable for sales at time of host being cut
if( isset( $_POST["host-sales"] ) ) {
    if ( $_POST["host-sales"] != "" ) {
        if( is_numeric( $_POST["host-sales"] ) ) {
            $hostSales = $_POST["host-sales"];
        }
        else {
            $cashoutValid = false;
            $errorCookieData = "host-sales";
        }
    }
    else {
        $hostSales = null;
    }
}
// else {
//     $cashoutValid = false;
// }

// Checks for and assigns variable for staff meal
// if( isset( $_POST["meal"] ) ) {
//     if ( $_POST["meal"] != "" ) {
//         if( is_numeric( $_POST["meal"] ) ) {
//             $staffMeal = $_POST["meal"];
//         }
//         else {
//             $cashoutValid = false;
//         }
//     }
//     else {
//         $staffMeal = null;
//     }
// }


if( isset( $_POST["emp-id"] ) ) {
    if ( $_POST["emp-id"] != "" ) {
        if( is_numeric( $_POST["emp-id"] ) && ( strlen( $_POST["emp-id"] ) == 4 ) ) {
            $empID = $_POST["emp-id"];
        }
        else {
            $cashoutValid = false;
            $errorCookieData = "If you enter an employee ID, it should match the following format: 1234";
        }
    }
    else {
        $empID = null;
    }
}
// else {
//     $cashoutValid = false;
// }

// Checks if anything went wrong, and redirects the user back to the first page
if( !$cashoutValid ) {
    setcookie( "invalidCashout", $errorCookieData, time() +10 );
    header( "location: index.php" );
    die();
}

// Variables: netSales, foodSales, cash, tipsPaid, hostSales, staffMeal

// If no employee ID was entered, sends user to the simple results page
if( !$empID ) {
    header( "location: results-nosave.php?netSales=$netSales&foodSales=$foodSales&hostSales=$hostSales" );
    die();
}

// Otherwise, sends the user to a results page along with a confirmation of whether they would like to save their cashout to the database
header( "location: results-save.php?empID=$empID&netSales=$netSales&foodSales=$foodSales&hostSales=$hostSales&cash=$cash&tipsPaid=$tipsPaid&staffMeal=$staffMeal" );
die();
?>
</body>
</html>