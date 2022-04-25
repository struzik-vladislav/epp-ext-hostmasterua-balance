<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Tests\Response\Balance;

use Struzik\EPPClient\Extension\HostmasterUA\Balance\Response\Balance\InfoBalanceResponse;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Tests\BalanceTestCase;

class InfoBalanceResponseTest extends BalanceTestCase
{
    public function testInfo(): void
    {
        $xml = <<<'EOF'
<?xml version="1.0" encoding="UTF-8"?>
<epp xmlns="urn:ietf:params:xml:ns:epp-1.0">
  <response>
    <result code="1000">
      <msg lang="ua">Команду виконано успішно</msg>
    </result>
    <resData>
      <balance:infData xmlns:balance="http://hostmaster.ua/epp/balance-1.0">
        <balance:contract>R19/999</balance:contract>
        <balance:contractUntil>2015-09-01T00:00:00+03:00</balance:contractUntil>
        <balance:status s="1"/>
        <balance:balance bdate="2015-05-19T16:01:37+03:00">111.11</balance:balance>
      </balance:infData>
    </resData>
    <trID>
      <clTRID>USER-1276595352</clTRID>
      <svTRID>UA:0:C11DDC12:20150520142151:470567:0002</svTRID>
    </trID>
  </response>
</epp>
EOF;
        $response = new InfoBalanceResponse($xml);
        $this->assertTrue($response->isSuccess());
        $this->assertSame('R19/999', $response->getContract());
        $this->assertSame('2015-09-01T00:00:00+03:00', $response->getContractUntil());
        $this->assertSame('2015-09-01T00:00:00+03:00', $response->getContractUntilAsObject('Y-m-d\TH:i:sP')->format('Y-m-d\TH:i:sP'));
        $this->assertSame('1', $response->getStatus());
        $this->assertSame('111.11', $response->getBalanceValue());
        $this->assertSame('2015-05-19T16:01:37+03:00', $response->getBalanceDate());
        $this->assertSame('2015-05-19T16:01:37+03:00', $response->getBalanceDateAsObject('Y-m-d\TH:i:sP')->format('Y-m-d\TH:i:sP'));
    }
}
