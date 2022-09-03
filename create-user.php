<?php
$client = new Client();
$headers = [
  'Authorization' => '{{token}}',
  'Content-Type' => 'application/json'
];
$body = '{
  "username": "Carlitos S. Bernardino",
  "password": "BSIT3A",
  "real_name": "Carlitos",
  "email": "bernardino.carlitos@auf.edu.ph",
  "access_level": {
    "name": "updater"
  },
  "enabled": false,
  "protected": false
}';
$request = new Request('POST', '{{url}}/api/rest/users/', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
