<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Node\Balance;

use Struzik\EPPClient\Node\AbstractNode;
use Struzik\EPPClient\Request\RequestInterface;
use Struzik\EPPClient\Exception\UnexpectedValueException;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\BalanceExtension;

/**
 * Object representation of the <balance:info> node.
 */
class Info extends AbstractNode
{
    /**
     * @param RequestInterface $request The request object to which the node belongs
     */
    public function __construct(RequestInterface $request)
    {
        parent::__construct($request, 'balance:info');
    }

    /**
     * {@inheritdoc}
     */
    protected function handleParameters($parameters = [])
    {
        $namespace = $this->getRequest()
            ->getClient()
            ->getExtNamespaceCollection()
            ->offsetGet(BalanceExtension::NS_NAME_BALANCE);
        if (!$namespace) {
            throw new UnexpectedValueException('URI of the namespace cannot be empty.');
        }

        $this->getNode()->setAttribute('xmlns:balance', $namespace);
    }
}
