<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Node\Balance;

use Struzik\EPPClient\Exception\InvalidArgumentException;
use Struzik\EPPClient\Request\RequestInterface;

class BalanceContractNode
{
    public static function create(RequestInterface $request, \DOMElement $parentNode, string $contract): \DOMElement
    {
        if ($contract === '') {
            throw new InvalidArgumentException('Invalid parameter "contract".');
        }

        $node = $request->getDocument()->createElement('balance:contract', $contract);
        $parentNode->appendChild($node);

        return $node;
    }
}
