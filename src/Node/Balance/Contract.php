<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Node\Balance;

use Struzik\EPPClient\Node\AbstractNode;
use Struzik\EPPClient\Request\RequestInterface;
use Struzik\EPPClient\Exception\InvalidArgumentException;

/**
 * Object representation of the <balance:contract> node.
 */
class Contract extends AbstractNode
{
    /**
     * @param RequestInterface $request    The request object to which the node belongs
     * @param array            $parameters Array of parameters who will be passed in self::handleParameters
     */
    public function __construct(RequestInterface $request, $parameters = [])
    {
        parent::__construct($request, 'balance:contract', $parameters);
    }

    /**
     * {@inheritdoc}
     */
    protected function handleParameters($parameters = [])
    {
        if (!isset($parameters['contract']) || empty($parameters['contract'])) {
            throw new InvalidArgumentException('Missing parameter with a key \'contract\'.');
        }

        $this->getNode()->nodeValue = $parameters['contract'];
    }
}
