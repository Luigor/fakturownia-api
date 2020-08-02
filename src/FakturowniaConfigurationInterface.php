<?php

declare(strict_types=1);

namespace Luigor\Fakturownia;

interface FakturowniaConfigurationInterface
{
    public function getApiKey(): string;
    public function getDomain(): string;
    public function urlRequest(): string;
}
