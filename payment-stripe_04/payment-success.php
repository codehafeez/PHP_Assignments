<?php 
require_once 'config.php'; 
if(!empty($_GET['session_id']))
{ 
    $session_id = $_GET['session_id']; 
    require_once 'stripe-php/init.php'; 
    $stripe = new \Stripe\StripeClient(STRIPE_API_KEY); 
    $checkout_session = $stripe->checkout->sessions->retrieve($session_id); 
     
    if(empty($api_error) && $checkout_session)
    { 
        $customer_details = $checkout_session->customer_details; 
        $paymentIntent = $stripe->paymentIntents->retrieve($checkout_session->payment_intent); 
         
        if(empty($api_error) && $paymentIntent)
        { 
            if(!empty($paymentIntent) && $paymentIntent->status == 'succeeded')
            {

                // Transaction details  
                $transactionID = $paymentIntent->id; 
                $paidAmount = $paymentIntent->amount; 
                $paidAmount = ($paidAmount/100); 
                $paidCurrency = $paymentIntent->currency; 
                $payment_status = $paymentIntent->status;                  
                $customer_name = !empty($customer_details->name)?$customer_details->name:''; 
                $customer_email = !empty($customer_details->email)?$customer_details->email:''; 

                    echo "Customer Name : ".$customer_name." <br> ".
                    "Customer Email : ".$customer_email." <br> ".
                    "Paid Amount : ".$paidAmount." <br> ".
                    "Paid Currency : ".$paidCurrency." <br> ".
                    "Transaction ID : ".$transactionID." <br> ".
                    "Payment Status : ".$payment_status." <br> ".
                    "Session ID : ".$session_id." <br> ";                 


            } else { echo "Transaction has been failed!"; } 
        } else { echo "Unable to fetch the transaction details! $api_error";  } 
    } else { echo "Invalid Transaction! $api_error"; } 
}
else { echo "Invalid Request!"; }  ?>

