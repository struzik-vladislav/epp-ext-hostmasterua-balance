<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Node\Balance;

use Struzik\EPPClient\Exception\UnexpectedValueException;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\BalanceExtension;
use Struzik\EPPClient\Request\RequestInterface;

class BalanceInfoNode
{
    public static function create(RequestInterface $request, \DOMElement $parentNode): \DOMElement
    {
        $namespace = $request->getClient()
            ->getExtNamespaceCollection()
            ->offsetGet(BalanceExtension::NS_NAME_BALANCE);
        if (!$namespace) {
            throw new UnexpectedValueException('URI of the namespace cannot be empty.');
        }

        $node = $request->getDocument()->createElement('balance:info');
        $node->setAttribute('xmlns:balance', $namespace);
        $parentNode->appendChild($node);

        return $node;
    }
}
