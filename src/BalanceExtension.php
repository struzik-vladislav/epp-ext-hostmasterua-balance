<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance;

use Psr\Log\LoggerInterface;
use Struzik\EPPClient\EPPClient;
use Struzik\EPPClient\Extension\ExtensionInterface;
use Struzik\EPPClient\Response\ResponseInterface;

/**
 * Balance extension who was provided by Hostmaster (https://hostmaster.ua/).
 */
class BalanceExtension implements ExtensionInterface
{
    public const NS_NAME_BALANCE = 'balance';

    private string $uri;
    private LoggerInterface $logger;

    /**
     * @param string          $uri    URI of the balance extension
     * @param LoggerInterface $logger instance of logger object
     */
    public function __construct(string $uri, LoggerInterface $logger)
    {
        $this->uri = $uri;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
    public function setupNamespaces(EPPClient $client): void
    {
        $client->getExtNamespaceCollection()
            ->offsetSet(self::NS_NAME_BALANCE, $this->uri);
    }

    /**
     * {@inheritdoc}
     */
    public function handleResponse(ResponseInterface $response): void
    {
        if (!in_array($this->uri, $response->getUsedNamespaces(), true)) {
            $this->logger->debug(sprintf(
                'Namespace with URI "%s" does not exists in used namespaces in the response object.',
                $this->uri
            ));
        }
    }
}
