<?php
$client = new Client();
$headers = [
  'Authorization' => 'NdQe03YgKb1pf9fMufhWVLtCBmMGloXs',
  'Content-Type' => 'application/json'
];
$body = '{
  "caloy0714@gmail.com": "test note",
  "view_state": {
    "name": "public"
  }
}';
$request = new Request('POST', '{{url}}/api/rest/issues/[ISSUE_NUMBER]/notes', $headers, $body);
$res = $client->sendAsync($request)->wait();
echo $res->getBody();
