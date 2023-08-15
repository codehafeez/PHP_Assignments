<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<?php 
// Login Detail
// Email => sb-vd7qg25852895@business.example.com
// Password => YEbhH2q_

define('PAYPAL_EMAIL', 'sb-4799lj23522702@business.example.com'); 
define('RETURN_URL', 'http://localhost/payment-paypal_03/return.php'); 
define('CANCEL_URL', 'http://localhost/payment-paypal_03/cancel.php'); 
define('SANDBOX', TRUE); // TRUE or FALSE 

if (SANDBOX === TRUE){ $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr"; }
else { $paypal_url = "https://www.paypal.com/cgi-bin/webscr"; }
define('PAYPAL_URL', $paypal_url);

$products = [
    [
        "name" => "Product 1",
        "desc" => "Desc Test Product 1",
        "quantity" => 2,
        "price" => 10.99,
    ],
    [
        "name" => "Product 2",
        "desc" => "Desc Test Product 2",
        "quantity" => 1,
        "price" => 20.99,
    ],
    [
        "name" => "Product 3",
        "desc" => "Desc Test Product 3",
        "quantity" => 3,
        "price" => 9.99,
    ],
];
?>

<form method='post' action='<?php echo PAYPAL_URL; ?>'>

    <!-- PayPal business email to collect payments -->
    <input type='hidden' name='business' value='<?php echo PAYPAL_EMAIL; ?>'>

    <!-- Specify a Pay Now button. -->
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">

    <center>
    <div style="width:700px; margin-top:100px;">
    <table class="table table-bordered">
    <tr>
    <th>Product Name</th>
    <th>Description</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Total</th>
    </tr>

    <?php
    foreach ($products as $index => $product) {
        $itemName = 'item_name_' . ($index + 1);
        $itemDesc = 'item_desc_' . ($index + 1);
        $itemQty = 'quantity_' . ($index + 1);
        $itemPrice = 'amount_' . ($index + 1);
    ?>
        <!-- Product information -->
        <input type='hidden' name='<?php echo $itemName; ?>' value='<?php echo $product["name"]; ?>'>
        <input type='hidden' name='<?php echo $itemDesc; ?>' value='<?php echo $product["desc"]; ?>'>
        <input type='hidden' name='<?php echo $itemQty; ?>' value='<?php echo $product["quantity"]; ?>'>
        <input type='hidden' name='<?php echo $itemPrice; ?>' value='<?php echo $product["price"]; ?>'>


    <!-- Other PayPal return, cancel & IPN URLs -->
    <input type='hidden' name='return' value='<?php echo RETURN_URL; ?>'>
    <input type='hidden' name='cancel_return' value='<?php echo CANCEL_URL; ?>'>


            <?php
            $totalAmount = 0;
            $totalPrice = $product["quantity"] * $product["price"];
            $totalAmount += $totalPrice;
            ?>

            <tr>
            <td><?php echo $product["name"]; ?></td>
            <td><?php echo $product["desc"]; ?></td>
            <td><?php echo $product["quantity"]; ?></td>
            <td><?php echo $product["price"]; ?></td>
            <td><?php echo $totalPrice; ?></td>
            </tr>

        <?php } ?>

        <tr>
        <td colspan="4" align="right"><strong>Total Amount:</strong></td>
        <td><?php echo $totalAmount; ?></td>
        </tr>
    </table>
    <button type='submit' class='pay'>Pay Now</button>
    </div>
    </center>

</form>
