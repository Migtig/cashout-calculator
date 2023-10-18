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

        <?php
        if( isset( $hostSales ) && is_numeric( $hostSales ) ) {
            ?>
            <h3>Host:</h3>
            <p>
                <?php 
                $hostTipout = round($hostSales * 0.01, 2);
                echo( "$$hostSales x 1% = $" . $hostTipout );   
                ?>
            </p>
            <?php
        }
        ?>

        <h3>Kitchen:</h3>
        <p>
            <?php
            $kitchenTipout = round($foodSales * 0.05, 2);
            echo( "$$foodSales x 5% = $" . $kitchenTipout );
            ?>
        </p>

        <h3>Bar:</h3>
        <p>
            <?php
            $barTipout = round($netSales * 0.02, 2);
            echo( "$$netSales x 2% = $" . $barTipout );
            ?>
        </p>

        <h3>Total:</h3>
        <p>
            <?php
            if( isset( $hostSales ) && is_numeric( $hostSales ) ) {
                echo( "$$hostTipout + $$kitchenTipout + $$barTipout = $" . $hostTipout + $kitchenTipout + $barTipout );
            }
            else {
                echo( "$$kitchenTipout + $$barTipout = $" . $kitchenTipout + $barTipout );
            }
            ?>
        </p>


    </div>
    <a href="index.php">Back to start</a>

</main>
    
</body>
</html>