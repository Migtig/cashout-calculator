<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashout Results</title>
</head>
<body>
<?php
$netSales = $_GET["netSales"];
$foodSales = $_GET["foodSales"];
$hostSales = $_GET["hostSales"];

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