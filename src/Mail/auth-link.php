<?php
$auth_token = 'b0a9c10120ae2d3999575fc2735b3597'; //your_auth_token
$org_id = 20064915354; //your_organization_id
$mail = 'srnbt.uyanga@yahoo.com';

$contact_data = array(
    "lastName" => "Your Last Name",
    "firstName" => "My first Name",
    "email" => $mail,
    "phone" => "123456789",
    "description" => "some description"
);



$ticket_data = array(
    "subject" => "test1",
    "departmentId" => 18456000002205084,
    

    
);

$headers = array(
    "Authorization: $auth_token",
    "orgId: $org_id",
    "contentType: application/json; charset=utf-8",
);
$url = "https://desk.zoho.eu/api/v1/contacts/search?limit=1&email=$mail";

$url1 = "https://desk.zoho.eu/api/v1/contacts";


$ticket_data = (gettype($ticket_data) === "array") ? json_encode($ticket_data) : $ticket_data;

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
//curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPGET, TRUE);

//curl_setopt($ch, CURLOPT_POSTFIELDS, $ticket_data); //convert ticket data array to json

$response = curl_exec($ch);
$info = curl_getinfo($ch);

if ($info['http_code'] == 200) {
    echo "<h2>Request Successful, Response:</h2> <br>";
    echo $response;
} else {
    echo "Request not successful. Response code : " . $info['http_code'] . " <br>";
    echo "Response : $response";
}

curl_close($ch);
