<?php
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
define('TOKEN', 'NdQe03YgKb1pf9fMufhWVLtCBmMGloXs');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/api/rest/issues?page_size=10&page=1');


$client = new Client();
$headers = [
  'Authorization' => 'NdQe03YgKb1pf9fMufhWVLtCBmMGloXs'
];
$request = new Request('GET', 'https://ipt10-2022.mantishub.io/api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();

$bugs_list = json_decode($bugs);


?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">

<title>IPT10 Bugs</title>
<h1>IPT10 Bugs List</h1>
<main>
<p style="color:blue"><u>Carlitos S. Bernardino</u></p>
</main>
<table class="table">
  <thead>
    <th>ID</th>
    <th>Summary</th>
    <th>Severity</th>
    <th>Status</th>
  </thead>
  <?php foreach($bugs_list -> issues as $bug) { ?>
  <tr>
    <td><?php echo $bug->id; ?></td>
    <td><?php echo $bug->summary; ?></td>
    <td><?php echo $bug->severity->name; ?></td>
    <td><?php echo $bug->status->name; ?></td>
  </tr>
  <?php } ?>
</table>


