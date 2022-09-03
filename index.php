<?php 
include "vendor/autoload.php";
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;

$client = new Client();
$headers = [
  'Authorization' => '{{NdQe03YgKb1pf9fMufhWVLtCBmMGloXs}}'
];
$request = new Request('GET', '{{url}}/api/rest/issues?page_size=10&page=1', $headers);
$res = $client->sendAsync($request)->wait();
$bugs = $res->getBody()->getContents();

define('TOKEN', '[NdQe03YgKb1pf9fMufhWVLtCBmMGloXs]');
define('MANTISHUB_URL', 'https://ipt10-2022.mantishub.io/');

$bugs_list = json_decode($bugs);

foreach ($bugs_list->issues as $bug)
{
	echo '<li>' . $bug->id . ' ' .
    $bug->summary . ' - ' .
    $bug->severity->name . ' - ' .
    $bug->status->name . "\n";
}
