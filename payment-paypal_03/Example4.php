<?php
define('PAYPAL_EMAIL', 'sb-4799lj23522702@business.example.com');
define('PAYPAL_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
define('PAYPAL_SUCCESS_URL', 'http://localhost/payment-paypal/return.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/payment-paypal/cancel.php');
?>

<form method='post' action='<?php echo PAYPAL_URL; ?>'>

    <!-- Product information -->
    <input type='number' name='amount_1' step='0.01' required placeholder="Amount" min="0.01"><br/>
    <textarea name='item_name_1' required placeholder="Description" rows="5"></textarea><br/>
    <button type='submit' id="paypal_button">Pay with PayPal</button>

    <!-- PayPal Required Fields -->
    <input type='hidden' name='cmd' value='_cart'>
    <input type='hidden' name='upload' value='1'>
    <input type='hidden' name='return' value='<?php echo PAYPAL_SUCCESS_URL; ?>'>
    <input type='hidden' name='cancel_return' value='<?php echo PAYPAL_CANCEL_URL; ?>'>
    <input type='hidden' name='business' value='<?php echo PAYPAL_EMAIL; ?>'>

</form>
