<?php 
require_once 'config.php'; 
require_once 'stripe-php/init.php'; 
$stripe = new \Stripe\StripeClient(STRIPE_API_KEY); 
 
 
if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
    $request = json_decode(file_get_contents('php://input'));     
} 

 
if(!empty($request->createCheckoutSession))
{ 
    try 
    {
        $lineItems = array();
        foreach ($request->products as $product) {
            $lineItems[] = array(
                'price_data' => [
                    'product_data' => [
                        'name' => $product->name,
                        'description' => $product->desc,
                    ],
                    'unit_amount' => $product->price * 100, // Convert price to cents (Stripe uses smallest currency unit)
                    'currency' => 'USD',
                ],
                'quantity' => $product->quantity,
            );
        }

        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => $lineItems,
            'mode' => 'payment',
            'success_url' => STRIPE_SUCCESS_URL . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => STRIPE_CANCEL_URL,
        ]);
    } catch (Exception $e) {
        $api_error = $e->getMessage();
    }


    if(empty($api_error) && $checkout_session){ 
        $response = array( 
            'status' => 1, 
            'message' => 'Checkout Session created successfully!', 
            'sessionId' => $checkout_session->id 
        ); 
    }
    else
    { 
        $response = array( 
            'status' => 0, 
            'error' => array('message' => 'Checkout Session creation failed! '.$api_error) 
        ); 
    } 
} 
 
echo json_encode($response);  
?>