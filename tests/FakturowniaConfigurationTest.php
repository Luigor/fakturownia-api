<?php

declare(strict_types=1);

namespace Luigor\Fakturownia\Tests;

use Luigor\Fakturownia\FakturowniaConfiguration;
use PHPUnit\Framework\TestCase;

final class FakturowniaConfigurationTest extends TestCase
{
    private FakturowniaConfiguration $fakturownia;

    public function setUp(): void
    {
        $this->fakturownia = new FakturowniaConfiguration('00001', 'appdevapi');
    }

    public function testGetDomain()
    {
        $this->assertSame('appdevapi', $this->fakturownia->getDomain());
    }

    public function testGetUrlRequest()
    {
        $this->assertSame('https://appdevapi.fakturownia.pl', $this->fakturownia->urlRequest());
    }

    public function testGetApiKey()
    {
        $this->assertSame('00001', $this->fakturownia->getApiKey());
    }
}
