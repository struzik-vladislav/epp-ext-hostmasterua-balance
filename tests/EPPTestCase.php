<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Tests;

use PHPUnit\Framework\TestCase;
use Psr\Log\NullLogger;
use Struzik\EPPClient\Connection\ConnectionInterface;
use Struzik\EPPClient\EPPClient;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\BalanceExtension;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Tests\Connection\TestConnection;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Tests\IdGenerator\TestGenerator;
use Struzik\EPPClient\NamespaceCollection;

class EPPTestCase extends TestCase
{
    public ConnectionInterface $eppConnection;
    public EPPClient $eppClient;
    public BalanceExtension $balanceExtension;

    protected function setUp(): void
    {
        parent::setUp();
        $this->eppConnection = new TestConnection();
        $this->eppClient = new EPPClient($this->eppConnection, new NullLogger());
        $this->eppClient->setIdGenerator(new TestGenerator());
        $namespaceCollection = $this->eppClient->getNamespaceCollection();
        $namespaceCollection->offsetSet(NamespaceCollection::NS_NAME_ROOT, 'urn:ietf:params:xml:ns:epp-1.0');
        $namespaceCollection->offsetSet(NamespaceCollection::NS_NAME_CONTACT, 'urn:ietf:params:xml:ns:contact-1.0');
        $namespaceCollection->offsetSet(NamespaceCollection::NS_NAME_HOST, 'urn:ietf:params:xml:ns:host-1.0');
        $namespaceCollection->offsetSet(NamespaceCollection::NS_NAME_DOMAIN, 'urn:ietf:params:xml:ns:domain-1.0');

        $this->balanceExtension = new BalanceExtension('http://hostmaster.ua/epp/balance-1.0', new NullLogger());
        $this->eppClient->pushExtension($this->balanceExtension);
    }
}
