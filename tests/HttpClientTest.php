<?php

declare(strict_types=1);

namespace Luigor\Fakturownia\Tests;

use GuzzleHttp\Client;
use Luigor\Fakturownia\HttpClient;
use PHPUnit\Framework\TestCase;

final class HttpClientTest extends TestCase
{
    private HttpClient $client;

    public function setUp(): void
    {
        $this->client = new HttpClient(new Client());
    }

    public function testGetResponse()
    {
        $request = $this->client->request('GET', 'https://httpbin.org/get?x=1');
        $response = json_decode($request);
        $this->assertSame('https://httpbin.org/get?x=1', $response->url);
    }
}
