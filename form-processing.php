<?php
// Variable for keeping track of whether the cashout was valid
$cashoutValid = true;

// Default error message to be sent back if something goes wrong. Can be overwritten for a specific error
$errorCookieData = "You entered some data incorrectly :/ Please try again!";

// NET SALES
// Checks and assigns variable for Net Sales
if( isset( $_POST["sales"] ) && is_numeric( $_POST["sales"] ) ) {
    $netSales = $_POST["sales"];
} else {
    $cashoutValid = false;
}

// FOOD SALES
// Checks and assigns variable for Food Sales
if( isset( $_POST["food"] ) && is_numeric( $_POST["food"] ) ) {
    $foodSales = $_POST["food"];
} else {
    $cashoutValid = false;
}

// HOST CHECK?
// If user had a host for their shift, checks and assigns variable for Host Sales
if( isset( $_POST["hostcheck"] ) ) {

    // HOST SALES
    // Checks and assigns variable for Host Sales
    if( isset( $_POST["hostsales"] ) && is_numeric( $_POST["hostsales"] ) ) {
        $hostSales = $_POST["hostsales"];
    } else {
        $errorCookieData = "Please enter your sales made while a host was on the clock.";
        $cashoutValid = false;
    }

} 

// FULL CASHOUT CHECK?
// If user wants to view their full cashout, checks and assigns other variables.
if( isset( $_POST["savecheck"] ) ) {

    // TIPS PAID
    // Checks and assigns variable for Tips Paid
    if( isset( $_POST["tips"] ) && is_numeric( $_POST["tips"] ) ) {
        $tipsPaid = $_POST["tips"];
    } else {
        $errorCookieData = "Please enter Tips Paid, as printed on your cashout report.";
        $cashoutValid = false;
    }

    // CASH - REPORTED
    // Checks and assigns variable for Cash - Reported
    if( isset( $_POST["cashreported"] ) && is_numeric( $_POST["cashreported"] ) ) {
        $cashReported = $_POST["cashreported"];
    } else {
        $errorCookieData = "Please enter Cash, as printed on your cashout report.";
        $cashoutValid = false;
    }

    // CASH - ACTUAL
    // Checks and assigns variable for Cash - Actual
    if( isset( $_POST["cashactual"] ) && is_numeric( $_POST["cashactual"] ) ) {
        $cashActual = $_POST["cashactual"];
    } else {
        $errorCookieData = "Please enter the amount of real cash you have, minus your original float.";
        $cashoutValid = false;
    }

    // EMPLOYEE ID
    // Checks and assigns variable for Employee ID
    if( isset( $_POST["emp-id"] ) && is_numeric( $_POST["emp-id"] ) && ( strlen( $_POST["emp-id"] ) == 4 ) ) {
        $empID = $_POST["emp-id"];
    } else {
        $errorCookieData = "Your Employee ID should match the following format: 1234";
        $cashoutValid = false;
    }

    // STAFF MEAL CHECK?
    if( isset( $_POST["staffmealcheck"] ) ) {

        // STAFF MEAL
        // Checks and assigns variable for Staff Meal amount
        if( isset( $_POST["staffmeal"] ) && is_numeric( $_POST["staffmeal"] ) ) {
            $staffMeal = $_POST["staffmeal"];
        } else {
            $errorCookieData = "Please enter the amount you spent on on-shift personal food.";
            $cashoutValid = false;
        }
    }

    // TRANSFER CHECK?
    if( isset( $_POST["transfercheck"] ) ) {

        // TRANSFERS IN
        // Checks and assigns variable for amount Transferred In from other servers
        if( isset( $_POST["transfersin"] ) && is_numeric( $_POST["transfersin"] ) ) {
            $transfersIn = $_POST["transfersin"];
        } else {
            $errorCookieData = "Please enter the total amount transferred into you from other servers.";
            $cashoutValid = false;
        }

        // TRANSFERS OUT
        // Checks and assigns variable for amount Transferred Out to other servers
        if( isset( $_POST["transfersout"] ) && is_numeric( $_POST["transfersout"] ) ) {
            $transfersOut = $_POST["transfersout"];
        } else {
            $errorCookieData = "Please enter the total amount transferred out from you to other servers.";
            $cashoutValid = false;
        }

        $netTransfer = $transfersIn - $transfersOut;
    }
}

// Checks if anything went wrong, and redirects the user back to the first page
if( !$cashoutValid ) {
    setcookie( "invalidCashout", $errorCookieData, time() +10 );
    header( "location: index.php" );
    die();
}

// Variables: netSales, foodSales, hostSales, tipsPaid, cashReported, cashActual, empID, staffMeal

// If the Full Cashout box wasn't checked, directs user to results-simple.php for their simple results (Tipout calculation only)
if( !isset( $_POST["savecheck"] ) ) {
    header( "location: results-simple.php?netSales=$netSales&foodSales=$foodSales&hostSales=$hostSales" );
    die();
}

// Otherwise, sends the user to results-full.php for a full accounting and a confirmation of whether they'd like to save.
header( "location: results-full.php?empID=$empID&netSales=$netSales&foodSales=$foodSales&hostSales=$hostSales&tipsPaid=$tipsPaid&cashReported=$cashReported&cashActual=$cashActual&staffMeal=$staffMeal&netTransfer=$netTransfer" );
die();
?>