<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Tests;

use Psr\Log\NullLogger;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\BalanceExtension;
use Struzik\EPPClient\Tests\EPPTestCase;

class BalanceTestCase extends EPPTestCase
{
    public BalanceExtension $balanceExtension;

    protected function setUp(): void
    {
        parent::setUp();
        $this->balanceExtension = new BalanceExtension('http://hostmaster.ua/epp/balance-1.0', new NullLogger());
        $this->eppClient->pushExtension($this->balanceExtension);
    }
}
