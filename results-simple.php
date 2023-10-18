<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashout Results - Simple</title>
    <link rel="stylesheet" href="styles/output.css">
</head>
<body class="h-screen bg-gray-400">
<?php
$netSales = $_GET["netSales"];
$foodSales = $_GET["foodSales"];
$hostSales = $_GET["hostSales"];

?>
<main>
    <div class="p-4">
        <h2 class="font-bold text-2xl mb-4 mx-auto text-center px-4">Cashout Results</h2>

        <?php
        if( isset( $hostSales ) && is_numeric( $hostSales ) ) {
            ?>
            <h3 class="text-xl font-semibold">Host:</h3>
            <p class="mb-3 text-lg">
                <?php 
                $hostTipout = round($hostSales * 0.01, 2);
                echo( "$$hostSales x 1% = $" . $hostTipout );   
                ?>
            </p>
            <?php
        }
        ?>

        <h3 class="text-xl font-semibold">Kitchen:</h3>
        <p class="mb-3 text-lg">
            <?php
            $kitchenTipout = round($foodSales * 0.05, 2);
            echo( "$$foodSales x 5% = $" . $kitchenTipout );
            ?>
        </p>

        <h3 class="text-xl font-semibold">Bar:</h3>
        <p class="mb-3 text-lg">
            <?php
            $barTipout = round($netSales * 0.02, 2);
            echo( "$$netSales x 2% = $" . $barTipout );
            ?>
        </p>

        <h3 class="text-xl font-semibold">Total:</h3>
        <p class="mb-3 text-lg">
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