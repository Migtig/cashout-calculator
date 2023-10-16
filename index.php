<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cashout Calculator</title>
    <link rel="stylesheet" href="styles/output.css">

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

            <label for="emp-id" class="text-xl font-semibold mb-1">Employee ID</label>
            <input type="text" name="emp-id" id="emp-id" inputmode="numeric"  
            class="border-2 border-black mb-4 pl-2">

            <label for="sales" class="text-xl font-semibold mb-1 after:content-['*'] after:ml-0.5 after:text-red-500">Net Sales</label>
            <input type="text" name="sales" id="sales" inputmode="decimal" required 
            class="border-2 border-black mb-4 pl-2">

            <label for="host-sales" class="text-xl font-semibold mb-1">Sales @ Host Cut</label>
            <input type="text" name="host-sales" id="host-sales" inputmode="decimal" 
            class="border-2 border-black mb-4 pl-2">

            <label for="food" class="text-xl font-semibold mb-1 after:content-['*'] after:ml-0.5 after:text-red-500">Food</label>
            <input type="text" name="food" id="food" inputmode="decimal" required 
            class="border-2 border-black mb-4 pl-2">

            <label for="cash" class="text-xl font-semibold mb-1 after:content-['*'] after:ml-0.5 after:text-red-500">Cash</label>
            <input type="text" name="cash" id="cash" inputmode="decimal" required 
            class="border-2 border-black mb-4 pl-2">

            <label for="tips" class="text-xl font-semibold mb-1 after:content-['*'] after:ml-0.5 after:text-red-500">Tips Paid</label>
            <input type="text" name="tips" id="tips" inputmode="decimal" required 
            class="border-2 border-black mb-4 pl-2">
        </fieldset>

        <input type="submit" value="Submit" class="py-2 px-8 font-lg bg-red-300 border-2 border-red-900 font-bold hover:bg-red-400 hover:cursor-pointer">
    </form>
</main>
    
</body>
</html>