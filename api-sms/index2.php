<?php
require __DIR__ . '/vendor/autoload.php';
use Twilio\Rest\Client;
$sid    = "AC6934bee552b0a65c35abad22a0933ce9";
$token  = "fc30cfd19a0a516e8098393b01a4209c";
$twilio = new Client($sid, $token);

// +966558758631
// 0582839252
// +966592045036

$message = $twilio->messages->create("+966558758631", // to
	array("body" => "Test Message Hafeez", "from" => "+12565636082")
);

/*
$message = $twilio->messages->create("whatsapp:+966592045036", // to
   ["from" => "whatsapp:+12565636082","body" => "Whatsapp Test Message From Hafeez"]
);
*/

print($message->sid);
