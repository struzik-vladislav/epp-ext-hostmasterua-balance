<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance;

use Struzik\EPPClient\Extension\ExtensionInterface;
use Struzik\EPPClient\EPPClient;
use Struzik\EPPClient\Response\ResponseInterface;
use Psr\Log\LoggerInterface;

/**
 * Balance extension who was provided by Hostmaster (https://hostmaster.ua/).
 */
class BalanceExtension implements ExtensionInterface
{
    const NS_NAME_BALANCE = 'balance';

    /**
     * @var string
     */
    private $uri;

    /**
     * @var LoggerInterface
     */
    private $logger;

    /**
     * @param string          $uri    URI of the balance extension
     * @param LoggerInterface $logger instance of logger object
     */
    public function __construct($uri, LoggerInterface $logger)
    {
        $this->uri = $uri;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function setupNamespaces(EPPClient $client)
    {
        $client->getExtNamespaceCollection()
            ->offsetSet(self::NS_NAME_BALANCE, $this->uri);
    }

    /**
     * {@inheritdoc}
     */
    public function handleResponse(ResponseInterface $response)
    {
        if (!in_array($this->uri, $response->getUsedNamespaces())) {
            $this->logger->debug(sprintf(
                'Namespace with URI \'%s\' does not exists in used namespaces in the response object.',
                $this->uri
            ));

            return;
        }
    }
}
