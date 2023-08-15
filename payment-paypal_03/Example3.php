<?php
// Login Detail
// Email => sb-vd7qg25852895@business.example.com
// Password => YEbhH2q_

define('PAYPAL_EMAIL', 'sb-4799lj23522702@business.example.com');
define('RETURN_URL', 'http://localhost/payment-paypal_03/return.php');
define('CANCEL_URL', 'http://localhost/payment-paypal_03/cancel.php');
define('SANDBOX', TRUE); // TRUE or FALSE
define('CURRENCY', 'EUR');

if (SANDBOX === TRUE) { $paypal_url = "https://www.sandbox.paypal.com/cgi-bin/webscr"; }
else { $paypal_url = "https://www.paypal.com/cgi-bin/webscr"; }
define('PAYPAL_URL', $paypal_url);

$tax = 1.15; // The tax rate (e.g., 1.15 for 15% tax)
$shipping = 10.00; // Shipping cost

$products = [
    [
        "name" => "Product 1",
        "desc" => "Desc Test Product 1",
        "sku" => "p001",
        "quantity" => 2,
        "price" => 10.99,
    ],
    [
        "name" => "Product 2",
        "sku" => "p002",
        "desc" => "Desc Test Product 2",
        "quantity" => 1,
        "price" => 20.99,
    ],
    [
        "name" => "Product 3",
        "sku" => "p003",
        "desc" => "Desc Test Product 3",
        "quantity" => 3,
        "price" => 9.99,
    ],
];

$total = 0;
?>

<form method='post' action='<?php echo PAYPAL_URL; ?>'>

    <!-- PayPal business email to collect payments -->
    <input type='hidden' name='business' value='<?php echo PAYPAL_EMAIL; ?>'>

    <!-- Specify a Pay Now button. -->
    <input type="hidden" name="cmd" value="_cart">
    <input type="hidden" name="upload" value="1">

    <?php
    foreach ($products as $index => $product) {
        $itemName = 'item_name_' . ($index + 1);
        $itemDesc = 'item_desc_' . ($index + 1);
        $itemQty = 'quantity_' . ($index + 1);
        $itemPrice = 'amount_' . ($index + 1);
        $itemTax = 'tax_' . ($index + 1);
        $totalPerItem = $product["quantity"] * $product["price"];
        $total += $totalPerItem;
    ?>
        <!-- Product information -->
        <input type='hidden' name='<?php echo $itemName; ?>' value='<?php echo $product["name"]; ?>'>
        <input type='hidden' name='<?php echo $itemDesc; ?>' value='<?php echo $product["desc"]; ?>'>
        <input type='hidden' name='<?php echo $itemQty; ?>' value='<?php echo $product["quantity"]; ?>'>
        <input type='hidden' name='<?php echo $itemPrice; ?>' value='<?php echo $product["price"]; ?>'>
        <input type='hidden' name='<?php echo $itemTax; ?>' value='<?php echo number_format($totalPerItem * ($tax - 1), 2, '.', ''); ?>'>

    <?php
    }
    ?>

    <!-- Tax and shipping information -->
    <input type='hidden' name='tax_cart' value='<?php echo number_format($total * ($tax - 1), 2, '.', ''); ?>'>
    <input type='hidden' name='handling_cart' value='<?php echo $shipping; ?>'>
    <input type='hidden' name='currency_code' value='<?php echo CURRENCY; ?>'>

    <!-- Other PayPal return, cancel & IPN URLs -->
    <input type='hidden' name='return' value='<?php echo RETURN_URL; ?>'>
    <input type='hidden' name='cancel_return' value='<?php echo CANCEL_URL; ?>'>
    <button type='submit' class='pay'>Pay Now</button>

</form>
