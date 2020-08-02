<?php

declare(strict_types=1);

namespace Luigor\Fakturownia;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Luigor\Fakturownia\HttpClientInterface;

final class HttpClient implements HttpClientInterface
{
    protected Client $client;

    /**
     * HttpClient constructor.
     * @param Client $client
     */
    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public function request(string $method, string $url, array $options = [])
    {
        try {
            $response = $this->client->request(
                $method,
                $url,
                [
                    'headers' => ($method !== 'GET') ? $this->defaultHeader() : [],
                    'body' => json_encode($options)
                ]
            );
            return $response->getBody();
        } catch (GuzzleException $e) {
            return $e->getMessage();
        }
    }

    private function defaultHeader(): array
    {
        return [
            'Accept' => 'application/json',
            'Content-Type' => 'application/json'
        ];
    }
}
