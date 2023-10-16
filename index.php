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

            <label for="sales" class="text-xl font-semibold mb-1 after:content-['*'] after:ml-0.5 after:text-red-500">Net Sales</label>
            <input type="text" name="sales" id="sales" inputmode="decimal" required 
            class="border-2 border-black mb-4 pl-2">

            <label for="host-sales" class="text-xl font-semibold mb-1">Sales @ Host Cut</label>
            <input type="text" name="host-sales" id="host-sales" inputmode="decimal" 
            class="border-2 border-black mb-4 pl-2">

            <label for="food" class="text-xl font-semibold mb-1 after:content-['*'] after:ml-0.5 after:text-red-500">Food Sales</label>
            <input type="text" name="food" id="food" inputmode="decimal" required 
            class="border-2 border-black mb-4 pl-2">

            <fieldset class="mb-4">
                <label class="text-xl font-semibold mb-1 block">Would you like to save this cashout?</label>

                <input type="radio" name="save-select" id="save-select-yes" value="true" class="inline-block">
                <label for="save-select-yes" class="inline-block mr-4">Yes</label>

                <input type="radio" name="save-select" id="save-select-no" value="false" class="inline-block" checked>
                <label for="save-select-no" class="inline-block">No</label>
            </fieldset>


            <div id="save-inputs" class="hidden">
                <label for="cash" class="text-xl font-semibold mb-1 block">Cash</label>
                <input type="text" name="cash" id="cash" inputmode="decimal" 
                class="border-2 border-black mb-4 pl-2 block w-full">

                <label for="tips" class="text-xl font-semibold mb-1 block">Tips Paid</label>
                <input type="text" name="tips" id="tips" inputmode="decimal" 
                class="border-2 border-black mb-4 pl-2 block w-full">

                <label for="staffmeal" class="text-xl font-semibold mb-1 block">Order food during your shift?</label>
                <input type="checkbox" name="staffmeal" id="staffmeal" class="block mb-4">

                <div id="staffmeal-amount" class="hidden">
                    <label for="meal" class="text-xl font-semibold mb-1 block">Personal Food</label>
                    <input type="text" name="meal" id="meal" inputmode="decimal" 
                    class="border-2 border-black mb-4 pl-2 w-full">
                </div>

                <label for="emp-id" class="text-xl font-semibold mb-1 block">Employee ID</label>
                <input type="text" name="emp-id" id="emp-id" inputmode="numeric"  
                class="border-2 border-black mb-4 pl-2 block w-full">

            </div>



        </fieldset>

        <input type="submit" value="Submit" class="py-2 px-8 font-lg bg-red-300 border-2 border-red-900 font-bold hover:bg-red-400 hover:cursor-pointer">
    </form>
</main>
    
</body>
</html>