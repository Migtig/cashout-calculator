<?php
require("dbinfo.php");

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if( mysqli_connect_errno() != 0 ) {
    die("<p>Could not connect to database: " . $db->connect_error . "</p>" );
}

// Grabbing the date in the SQL-usable format
if( date("G") > 3 ) {
    $date = date("Y-m-d");
}
else{
    $date = ( date("Y") . "-" . date("m") . "-" . (date("d") - 1) );
}

// Assigning all the variables from the posted data
// Admittedly, I could just use the "$_POST" variables as-is, but this feels cleaner ¯\_(ツ)_/¯
$empID = $_POST["empID"];
$netSales = $_POST["netSales"];
$foodSales = $_POST["foodSales"];
$tipout = $_POST["tipout"];
$tipsPaid = $_POST["tipsPaid"];
$tipsActual = $_POST["tipsActual"];
$tipPercent = $_POST["tipPercent"];
$cashReported = $_POST["cashReported"];
$cashActual = $_POST["cashActual"];
$estRemit = $_POST["estRemit"];
$netTransfer = $_POST["netTransfer"];

$insertQuery = "INSERT INTO cashouts (empid,date,netSales,foodSales,tipout,tipsPaid,tipsActual,tipPercent,cashReported,cashActual,estRemit,netTransfer) VALUES('$empID','$date','$netSales','$foodSales','$tipout','$tipsPaid','$tipsActual','$tipPercent','$cashReported','$cashActual','$estRemit','$netTransfer');";
$insertResult = $db->query( $insertQuery );

if( $insertResult ) {
    setcookie( "invalidCashout", "Your cashout was successfully added to the database!", time() + 10 );
} else {
    setcookie( "invalidCashout", "There was an error, and your cashout wasn't saved...", time() + 10 );
}

$db->close();
header( "location: index.php" );
die();

?>