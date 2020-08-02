<?php

declare(strict_types=1);

use GuzzleHttp\Client;
use Luigor\Fakturownia\FakturowniaConfiguration;
use Luigor\Fakturownia\HttpClient;
use Luigor\Fakturownia\Fakturownia;

require __DIR__ . '/vendor/autoload.php';

$fakturowniaConfig = new FakturowniaConfiguration('API_KEY', 'USER_NAME_IN_APP');
$httpClient  = new HttpClient(new Client());
$fakturownia = new Fakturownia($fakturowniaConfig, $httpClient);
echo $fakturownia->getAllProducts($page = 1);
