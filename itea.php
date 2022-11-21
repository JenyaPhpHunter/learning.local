
<?php

require_once __DIR__ .'/vendor/autoload.php';

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://itea.ua');

echo $response->getBody()->getContents();
