<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Tests\Request\Balance;

use Struzik\EPPClient\Extension\HostmasterUA\Balance\Request\Balance\InfoBalanceRequest;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Tests\BalanceTestCase;

class InfoBalanceRequestTest extends BalanceTestCase
{
    public function testInfo(): void
    {
        $expected = <<<'EOF'
<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<epp xmlns="urn:ietf:params:xml:ns:epp-1.0">
  <command>
    <info>
      <balance:info xmlns:balance="http://hostmaster.ua/epp/balance-1.0">
        <balance:contract>R19/999</balance:contract>
      </balance:info>
    </info>
    <clTRID>TEST-REQUEST-ID</clTRID>
  </command>
</epp>

EOF;
        $request = new InfoBalanceRequest($this->eppClient);
        $request->setContract('R19/999');
        $request->build();

        $this->assertSame('R19/999', $request->getContract());
        $this->assertSame($expected, $request->getDocument()->saveXML());
    }
}
