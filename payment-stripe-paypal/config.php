<?php 


// STRIPE
define('STRIPE_API_KEY', 'sk_test_51LGsrcEWj6dPCPyNC1G7eFuB2Q37JUEDXIwtilEpMex0wz4O73pv8yVXLbjUHku7MEp9Sar8txwfRuiwbtlVHPVJ00VVrJ9E6Z'); 
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51LGsrcEWj6dPCPyNRjfL7z1T6mriqkAXC40WRDdR8a8NGGdVb5KIlwKFb0GVobvSuJpxIhGWOxKxQ0utIRzQJ6Vd00QJoD8xRG'); 
define('STRIPE_SUCCESS_URL', 'http://localhost/payment-stripe-paypal/stripe-success.php');
define('STRIPE_CANCEL_URL', 'http://localhost/payment-stripe-paypal/stripe-cancel.php'); 


// PayPal
define('PAYPAL_EMAIL', 'sb-4799lj23522702@business.example.com');
define('PAYPAL_URL', 'https://www.sandbox.paypal.com/cgi-bin/webscr');
define('PAYPAL_SUCCESS_URL', 'http://localhost/payment-stripe-paypal/paypal-success.php');
define('PAYPAL_CANCEL_URL', 'http://localhost/payment-stripe-paypal/paypal-cancel.php');


?>