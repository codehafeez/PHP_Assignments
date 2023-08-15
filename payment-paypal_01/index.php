<?php
require_once('dbclass.php');
$db = new DB;
$db->query("SELECT * FROM `products`");
$products = $db->resultSet();
$db->close();
?>
<html>
<head>
<title>PayPal Payment Integration in PHP</title>
<link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
</head>
<body>

<div style="width:700px; margin:50 auto;">
<h2>PayPal Payment Integration in PHP</h2>

<?php
if( !empty($products) )
{
    foreach($products as $product)
    {
?>
        <div class='product_wrapper'>
            <div class='image'><img src='<?php echo $product['image']; ?>' /></div>
            <div class='name'><?php echo $product['name']; ?></div>
            <div class='price'>$<?php echo $product['price']; ?></div>
            <form method='post' action='<?php echo PAYPAL_URL; ?>'>

            <!-- PayPal business email to collect payments -->
            <input type='hidden' name='business' value='<?php echo PAYPAL_EMAIL; ?>'>

            <!-- Details of item that customers will purchase -->
            <input type='hidden' name='item_number' value='<?php echo $product['code']; ?>'>
            <input type='hidden' name='item_name' value='<?php echo $product['name']; ?>'>
            <input type='hidden' name='amount' value='<?php echo $product['price']; ?>'>
            <input type='hidden' name='currency_code' value='<?php echo CURRENCY; ?>'>
            <input type='hidden' name='no_shipping' value='1'>
            
            <!-- PayPal return, cancel & IPN URLs -->
            <input type='hidden' name='return' value='<?php echo RETURN_URL; ?>'>
            <input type='hidden' name='cancel_return' value='<?php echo CANCEL_URL; ?>'>
            <input type='hidden' name='notify_url' value='<?php echo NOTIFY_URL; ?>'>

            <!-- Specify a Pay Now button. -->
            <input type="hidden" name="cmd" value="_xclick">
            <button type='submit' class='pay'>Pay Now</button>
            </form>
		</div>
<?php                 
    }
}
?>

</div>    
</body>
</html>