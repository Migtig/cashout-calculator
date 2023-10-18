<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashout Calculator</title>
    <link rel="stylesheet" href="styles/output.css">
    <script src="scripts/scripts.js" defer></script>

</head>
<body class="h-screen">
    <?php
    if( isset( $_COOKIE["invalidCashout"] ) ) {
        $cookieContents = $_COOKIE["invalidCashout"];
        setcookie( "invalidCashout", "", time()-1 );

        echo( "<p>$cookieContents</p>");
    } 
    ?>

<main class="h-full">
    <form action="form-processing.php" method="post" class="bg-gray-400 p-4 h-full">
        <fieldset class="flex flex-col mb-8">
            <legend class="font-bold text-2xl mb-8 mx-auto">Cashout Calculator</legend>

            <!-- Net Sales -->
            <label for="sales" class="text-xl font-semibold mb-1 after:content-['*'] after:ml-0.5 after:text-red-500">Net Sales</label>
            <input type="text" name="sales" id="sales" inputmode="decimal" required 
            class="border-2 border-black mb-4 pl-2">

            <!-- Food Sales -->
            <label for="food" class="text-xl font-semibold mb-1 after:content-['*'] after:ml-0.5 after:text-red-500">Food Sales</label>
            <input type="text" name="food" id="food" inputmode="decimal" required 
            class="border-2 border-black mb-4 pl-2">

            <!-- Had host? -->
            <label for="hostcheck" class="text-xl font-semibold mb-1 block">Did you have a host?</label>
            <input type="checkbox" name="hostcheck" id="hostcheck" class="block mb-4">

                <!-- OPTIONAL - Host Sales -->
                <div id="hostsales-amount" class="hidden">
                    <label for="hostsales" class="text-xl font-semibold mb-1">Host Sales</label>
                    <input type="text" name="hostsales" id="hostsales" inputmode="decimal" class="border-2 border-black mb-4 pl-2">
                </div>

            <!-- Want to save? -->
            <label for="savecheck" class="text-xl font-semibold mb-1 block">Would you like to save this cashout?</label>
            <input type="checkbox" name="savecheck" id="savecheck" class="block mb-4">

            <!-- OPTIONAL - Saved Stats -->
            <div id="save-inputs" class="hidden">

                <!-- Tips Paid -->
                <label for="tips" class="text-xl font-semibold mb-1 block">Tips Paid</label>
                <input type="text" name="tips" id="tips" inputmode="decimal" class="border-2 border-black mb-4 pl-2 block w-full">

                <!-- Reported Cash -->
                <label for="cashreported" class="text-xl font-semibold mb-1 block">Cash - Reported</label>
                <input type="text" name="cashreported" id="cashreported" inputmode="decimal" class="border-2 border-black mb-4 pl-2 block w-full">

                <!-- Actual Cash -->
                <label for="cashactual" class="text-xl font-semibold mb-1 block">Cash - Actual</label>
                <input type="text" name="cashactual" id="cashactual" inputmode="decimal" class="border-2 border-black mb-4 pl-2 block w-full">

                <!-- Ordered personal food? -->
                <label for="staffmealcheck" class="text-xl font-semibold mb-1 block">Order food during your shift?</label>
                <input type="checkbox" name="staffmealcheck" id="staffmealcheck" class="block mb-4">

                    <!-- OPTIONAL - Staff Meal Cost -->
                    <div id="staffmeal-amount" class="hidden">
                        <label for="staffmeal" class="text-xl font-semibold mb-1 block">Personal Food</label>
                        <input type="text" name="staffmeal" id="staffmeal" inputmode="decimal" class="border-2 border-black mb-4 pl-2 w-full">
                    </div>

                <!-- Had transfers? -->
                <label for="transfercheck" class="text-xl font-semibold mb-1 block">Did you transfer tables in or out during your shift?</label>
                <input type="checkbox" name="transfercheck" id="transfercheck" class="block mb-4">

                    <!-- OPTIONAL - Transfers -->
                    <div id="transfer-amount" class="hidden">

                        <!-- Transfers In -->
                        <label for="transfersin" class="text-xl font-semibold mb-1 block">Transfers In</label>
                        <input type="text" name="transfersin" id="transfersin" inputmode="decimal" value="0" class="border-2 border-black mb-4 pl-2 w-full">

                        <!-- Transfers Out -->
                        <label for="transfersout" class="text-xl font-semibold mb-1 block">Transfers Out</label>
                        <input type="text" name="transfersout" id="transfersout" inputmode="decimal" value="0" class="border-2 border-black mb-4 pl-2 w-full">

                    </div>

                <!-- Employee ID -->
                <label for="emp-id" class="text-xl font-semibold mb-1 block">Employee ID</label>
                <input type="text" name="emp-id" id="emp-id" inputmode="numeric" class="border-2 border-black mb-4 pl-2 block w-full">

            </div>



        </fieldset>

        <input type="submit" value="Submit" class="py-2 px-8 font-lg bg-red-300 border-2 border-red-900 font-bold hover:bg-red-400 hover:cursor-pointer">
    </form>
</main>
    
</body>
</html>