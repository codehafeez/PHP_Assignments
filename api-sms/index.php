<?php
$curl = curl_init();
$id = "AC6934bee552b0a65c35abad22a0933ce9";
$token = "fc30cfd19a0a516e8098393b01a4209c";
$url = "https://api.twilio.com/2010-04-01/Accounts/$id/SMS/Messages";
$from = "+12565636082";
$to = "+966558758631";
$body = "using twilio rest api from hafeez";
$data = array (
    'From' => $from,
    'To' => $to,
    'Body' => $body,
);
$post = http_build_query($data);
$x = curl_init($url);
curl_setopt($x, CURLOPT_POST, true);
curl_setopt($x, CURLOPT_RETURNTRANSFER, true);
curl_setopt($x, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($x, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($x, CURLOPT_USERPWD, "$id:$token");
curl_setopt($x, CURLOPT_POSTFIELDS, $post);
$y = curl_exec($x);
curl_close($x);
var_dump($post);
var_dump($y);