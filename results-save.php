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
$cashReported = $_GET["cashReported"];
$cashActual = $_GET["cashActual"];
$tipsPaid = $_GET["tipsPaid"];
$staffMeal = $_GET["staffMeal"];
$netTransfer = $_GET["netTransfer"];

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
                $totalTipout = $hostTipout + $kitchenTipout + $barTipout;
                echo( "$$hostTipout + $$kitchenTipout + $$barTipout = $$totalTipout" );
            }
            else {
                $totalTipout = $kitchenTipout + $barTipout;
                echo( "$$kitchenTipout + $$barTipout = $$totalTipout" );
            }
            ?>
        </p>
    </div>

    <div>
        <h2>Final Cashout</h2>
        <?php

        $estRemit = $tipsPaid - ($cashReported + $totalTipout);

        if( is_numeric( $staffMeal ) ) {
            $cashReported = $cashReported - $staffMeal;
            ?> <p>Note: The staff meal cost has been subtracted from the recorded cash amount.</p> <?php
        }

        $totalTips = ($tipsPaid - ( round($netTransfer * 0.1, 2) ) ) + ($cashActual - $cashReported);

        $tipPercentage = round(($tipsPaid / $netSales) * 100, 1);
        

        ?>
        <form action="save-processing.php" method="post">
            <fieldset>
                <label for="empID">Employee ID: </label>
                <input type="text" name="empID" id="empID" value="<?php echo $empID; ?>" readonly>

                <label for="date">Date: </label>
                <input type="text" name="date" id="date" value="<?php echo $date; ?>" readonly>

                <ul>
                    <li>
                        <label for="netSales">Net Sales: </label>
                        <input type="text" name="netSales" id="netSales" value="<?php echo $netSales; ?>" readonly>
                    </li>
                    <li>
                        <label for="foodSales">Food Sales: </label>
                        <input type="text" name="foodSales" id="foodSales" value="<?php echo $foodSales; ?>" readonly>
                    </li>
                    <li>
                        <label for="tipout">Tipout: </label>
                        <input type="text" name="tipout" id="tipout" value="<?php echo $totalTipout; ?>" readonly>
                    </li>
                    <li>
                        <label for="tipsPaid">Reported Tips: </label>
                        <input type="text" name="tipsPaid" id="tipsPaid" value="<?php echo $tipsPaid; ?>" readonly>
                    </li>
                    <li>
                        <label for="totalTips">Total Tips: </label>
                        <input type="text" name="totalTips" id="totalTips" value="<?php echo $totalTips; ?>" readonly>
                    </li>
                    <li>
                        <label for="tipPercent">Tip %: </label>
                        <input type="text" name="tipPercent" id="tipPercent" value="<?php echo $tipPercentage; ?>%" readonly>
                    </li>
                    <li>
                        <label for="cashReported">Cash - Reported: </label>
                        <input type="text" name="cashReported" id="cashReported" value="<?php echo $cashReported; ?>" readonly>
                    </li>
                    <li>
                        <label for="cashActual">Cash - Actual: </label>
                        <input type="text" name="cashActual" id="cashActual" value="<?php echo $cashActual; ?>" readonly>
                    </li>
                    <li>
                        <label for="estRemit">Estimated Real Remit: </label>
                        <input type="text" name="estRemit" id="estRemit" value="<?php echo $estRemit; ?>" readonly>
                    </li>
                    <li>
                        <label for="netTransfer">Net Transfers: </label>
                        <input type="text" name="netTransfer" id="netTransfer" value="<?php echo $netTransfer; ?>" readonly>
                    </li>
                </ul>
            </fieldset>
        </form>

    </div>
    <a href="index.php">Back to start</a>

</main>
</body>
</html>