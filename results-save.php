<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashout Results - Save?</title>
</head>
<body>
<?php
$empID = $_GET["empID"];
$netSales = $_GET["netSales"];
$foodSales = $_GET["foodSales"];
$hostSales = $_GET["hostSales"];
$cash = $_GET["cash"];
$tipsPaid = $_GET["tipsPaid"];

$date;

if(date("G") > 3) {
    $date = date("m-d-Y");
}
else{
    $date = ( date("m") . "-" . (date("d") - 1) . "-" . date("Y") );
}

?>
<main>
    <div>
        <h2>Cashout Results - <?php echo $date; ?></h2>


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
            $totalTipout = $hostTipout + $kitchenTipout + $barTipout;
            echo( "$$hostTipout + $$kitchenTipout + $$barTipout = $$totalTipout" );
            ?>
        </p>
    </div>

    <div>
        <h2>Final Cashout</h2>
        <p>Employee ID: <?php echo $empID; ?></p>
        <p>Date: <?php echo $date; ?></p>
        <ul>
            <li>Sales: <?php echo $netSales; ?></li>
            <li>Food: <?php echo $foodSales; ?></li>
            <li>Tipout: <?php echo $totalTipout; ?></li>
            <li>Cash: <?php echo $cash; ?></li>
            <li>Tips: <?php echo $tipsPaid; ?></li>
        </ul>
    </div>
    <a href="index.php">Back to start</a>

</main>
</body>
</html>