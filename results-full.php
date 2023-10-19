<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashout Results - Full</title>
    <link rel="stylesheet" href="styles/output.css">
</head>
<body class="h-screen bg-gray-400">
<?php

// Assigns all $_GET variables to local variables for easier use
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

// Gets the date and assigns it to a variable
// If the time is past midnight, it rolls back the day by one so that the date is still the date that the shift was worked
if(date("G") > 3) {
    $date = date("m-d-Y");
}
else{
    $date = ( date("m") . "-" . (date("d") - 1) . "-" . date("Y") );
}

?>
<main>
    <div class="p-4">
        <h2 class="font-bold text-2xl mb-4 mx-auto text-center px-4">Cashout Results - <?php echo $date; ?></h2>


        <?php
        // If user had a host during their shift, displays host tipout and adds it to the total tipout
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
            // Calculates and displays tipout for the Kitchen
            $kitchenTipout = round($foodSales * 0.05, 2);
            echo( "$$foodSales x 5% = $" . $kitchenTipout );
            ?>
        </p>

        <h3 class="text-xl font-semibold">Bar:</h3>
        <p class="mb-3 text-lg">
            <?php
            // Calculates and displays tipout for the Bar
            $barTipout = round($netSales * 0.02, 2);
            echo( "$$netSales x 2% = $" . $barTipout );
            ?>
        </p>

        <h3 class="text-xl font-semibold">Total:</h3>
        <p class="mb-3 text-lg">
            <?php
            // Calculates and displays the total tipout
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

    <div class="p-4">
        <h2 class="text-2xl font-semibold">Final Cashout</h2>
        <?php

        // Calculates the estimated real remit at the end of the shift
        //       Note: For those without an understanding of restaurant accounting, this is essentially calculating how much the restaurant owes the server for tips
        //             Or if the server took in more cash than they made in tips paid by card, then how much the server owes the restaurant
        $estRemit = $tipsPaid - ($cashReported + $totalTipout);

        // Subtracts the cost of a staff meal from the reported Cash amount, in order to avoid skewing tip percentage
        if( is_numeric( $staffMeal ) ) {
            $cashReported = $cashReported - $staffMeal;
            ?> <p class="text-sm">Note: The staff meal cost has been subtracted from the reported cash amount.</p> <?php
        }

        // Calculates the total tips that the user made by adding card tips to cash tips, and including the automatic 10% paid on transfers
        $tipsActual = ($tipsPaid - ( round($netTransfer * 0.1, 2) ) ) + ($cashActual - $cashReported);

        // Calculates the final average tip percentage for the shift
        $tipPercentage = round(($tipsPaid / $netSales) * 100, 1);
        

        ?>
        <form action="save-processing.php" method="post" class="mt-4">
            <fieldset>
                <div class="mb-2">
                    <label for="empID" class="text-xl font-semibold mb-1">Employee ID: </label>
                    <input type="text" name="empID" id="empID" value="<?php echo $empID; ?>" readonly class="bg-transparent border-none text-xl w-36">
                </div>

                <div class="mb-2">
                    <label for="date" class="text-xl font-semibold mb-1">Date: </label>
                    <input type="text" name="date" id="date" value="<?php echo $date; ?>" readonly class="bg-transparent border-none text-xl w-36">
                </div>
                
                <ul>
                    <li class="flex justify-between mb-2">
                        <label for="netSales" class="text-lg font-semibold my-auto h-fit">Net Sales: </label>
                        <input type="text" name="netSales" id="netSales" value="<?php echo $netSales; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                    <li class="flex justify-between mb-2">
                        <label for="foodSales" class="text-lg font-semibold my-auto h-fit">Food Sales: </label>
                        <input type="text" name="foodSales" id="foodSales" value="<?php echo $foodSales; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                    <li class="flex justify-between mb-2">
                        <label for="tipout" class="text-lg font-semibold my-auto h-fit">Tipout: </label>
                        <input type="text" name="tipout" id="tipout" value="<?php echo $totalTipout; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                    <li class="flex justify-between mb-2">
                        <label for="tipsPaid" class="text-lg font-semibold my-auto h-fit">Reported Tips: </label>
                        <input type="text" name="tipsPaid" id="tipsPaid" value="<?php echo $tipsPaid; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                    <li class="flex justify-between mb-2">
                        <label for="tipsActual" class="text-lg font-semibold my-auto h-fit">Total Tips: </label>
                        <input type="text" name="tipsActual" id="tipsActual" value="<?php echo $tipsActual; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                    <li class="flex justify-between mb-2">
                        <label for="tipPercent" class="text-lg font-semibold my-auto h-fit">Tip %: </label>
                        <input type="text" name="tipPercent" id="tipPercent" value="<?php echo $tipPercentage; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                    <li class="flex justify-between mb-2">
                        <label for="cashReported" class="text-lg font-semibold my-auto h-fit">Cash - Reported: </label>
                        <input type="text" name="cashReported" id="cashReported" value="<?php echo $cashReported; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                    <li class="flex justify-between mb-2">
                        <label for="cashActual" class="text-lg font-semibold my-auto h-fit">Cash - Actual: </label>
                        <input type="text" name="cashActual" id="cashActual" value="<?php echo $cashActual; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                    <li class="flex justify-between mb-2">
                        <label for="estRemit" class="text-lg font-semibold my-auto h-fit">Estimated Real Remit: </label>
                        <input type="text" name="estRemit" id="estRemit" value="<?php echo $estRemit; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                    <li class="flex justify-between mb-2">
                        <label for="netTransfer" class="text-lg font-semibold my-auto h-fit">Net Transfers: </label>
                        <input type="text" name="netTransfer" id="netTransfer" value="<?php echo $netTransfer; ?>" readonly class="ml-auto text-right text-lg">
                    </li>
                </ul>
            </fieldset>
            <a href="index.php" class="py-2 px-6 font-lg bg-gray-300 border-2 border-gray-900 font-bold hover:bg-gray-600 hover:text-gray-100 hover:cursor-pointer">Return to Start</a>
            <input type="submit" value="Save Cashout" class="py-2 px-8 font-lg bg-red-300 border-2 border-red-900 font-bold hover:bg-red-400 hover:cursor-pointer">
            
        </form>

    </div>


</main>
</body>
</html>