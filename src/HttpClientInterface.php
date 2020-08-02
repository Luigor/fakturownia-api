<?php

declare(strict_types=1);

namespace Luigor\Fakturownia;

interface HttpClientInterface
{
    /**
     * @param string $method
     * @param string $url
     * @param array $options
     * @return mixed
     */
    public function request(string $method, string $url, array $options);
}
