<?php
/**
 *
 * name: David Nagy
 * Date: april 5th 2019
 * cupcake.php
 * Ordering cupcake page
 *
 *
 *
 */


// variables
$fname = "";
$lname = "";
$cupcakeFlavor = "";
//flavors to pick
$flavors = array("grasshopper"=>"The Grasshopper", "maple"=>"Whiskey Maple Bacon",
    "carrot"=>"Carrot Walnut", "caramel"=>"Salted Caramel Cupcake",
    "velvet"=>"Red Velvet", "lemon"=>"Lemon Drop", "tiramisu"=>"Tiramisu");
//If form is submitted, processes the info
if (!empty($_POST))
{

    $isValid = true;
    if (empty($_POST['fname']))
    {
        echo "<p>Please provide a first name</p>";
        $isValid = false;
    }
    else
    {
        $fname = $_POST['fname'];
    }

    if (empty($_POST['lname']))
    {
        echo "<p>Please provide a last name</p>";
        $isValid = false;
    }
    else
    {
        $lname = $_POST['lname'];
    }

    if (isset($_POST['cupcake']))
    {
        $cupcakeFlavor = $_POST['cupcake'];

        foreach($cupcakeFlavor as $key => $value)
        {
            if (!array_key_exists($value, $flavors))
            {
                echo "<p>Please select a flavor of Cupcake</p>";
                $isValid = false;
            }
        }
        $flavorString = implode(", ", $cupcakeFlavor);
    }
    else
        {// selecting flavor
        echo "<p>Please select a flavor of Cupcake</p>";
        $isValid = false;
    }
    //Display name and flavors if form filled out
    if ($isValid)
    {
        //Total for number of items ordered
        $total = 3.5*(count($cupcakeFlavor));

        $total = number_format($total, 2);
        echo "<p>Thank you, $fname, for your order!</p>";
        echo "<p>Order Summary: ";
        //display the flavors ordered
        foreach ($cupcakeFlavor as $values)
        {
            echo "<li>$values</li>";
        }
        echo " </p>";//end order details
        echo "<p>Order Total: $$total</p>";
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CupCakes</title>
    <link rel="stylesheet" href="../css/.css">
</head>
<body>
<h1>
    Order Cupcakes
</h1>

<form method="POST" action="">

    <!--Name-->
    <fieldset>

        <legend>Who is this order for:</legend>

        <label>First Name:&nbsp;
            <input type="text" size="20" maxlength="20" name="fname" id="fname" value='<?php echo $fname; ?>'>
        </label>

        <label>Last Name:&nbsp;
            <input type="text" size="20" maxlength="20" name="lname" id="lname" value='<?php echo $lname; ?>'>
        </label>

    </fieldset>


    <!--Cupcake flavors-->
    <fieldset>

        <legend>Cupcake Flavors</legend>


        <?php
        //Display flavors on the form
        foreach($flavors as $item => $item_value)
        {
            echo "<label><input type='checkbox' value=".$item." name='cupcake[]'>$item_value </label><br>";
        }
        ?>

    </fieldset>

    <input type="submit" value="Submit your order">
</form>

</body>
</html>