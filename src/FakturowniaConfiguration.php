<?php

declare(strict_types=1);

namespace Luigor\Fakturownia;

use Luigor\Fakturownia\FakturowniaConfigurationInterface;

class FakturowniaConfiguration implements FakturowniaConfigurationInterface
{
    private string $apiKey;
    private string $domain;
    private const APP_URL = '[domain].fakturownia.pl';

    /**
     * FakturowniaConfiguration constructor.
     * @param string $apiKey
     * @param string $domain
     */
    public function __construct(string $apiKey, string $domain)
    {
        $this->apiKey = $apiKey;
        $this->domain = $domain;
    }

    public function getApiKey(): string
    {
        return $this->apiKey;
    }

    public function getDomain(): string
    {
        return $this->domain;
    }

    public function urlRequest(): string
    {
        $domain = str_replace('[domain]', $this->getDomain(), self::APP_URL);
        return 'https://'.$domain;
    }
}
