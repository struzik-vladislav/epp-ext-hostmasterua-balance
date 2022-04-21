<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Request\Balance;

use Struzik\EPPClient\Extension\HostmasterUA\Balance\Node\Balance\BalanceContractNode;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Node\Balance\BalanceInfoNode;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Response\Balance\InfoBalanceResponse;
use Struzik\EPPClient\Node\Common\CommandNode;
use Struzik\EPPClient\Node\Common\EppNode;
use Struzik\EPPClient\Node\Common\InfoNode;
use Struzik\EPPClient\Node\Common\TransactionIdNode;
use Struzik\EPPClient\Request\AbstractRequest;

/**
 * Object representation of the request of balance information command.
 */
class InfoBalanceRequest extends AbstractRequest
{
    private string $contract = '';

    /**
     * {@inheritdoc}
     */
    protected function handleParameters(): void
    {
        $eppNode = EppNode::create($this);
        $commandNode = CommandNode::create($this, $eppNode);
        $infoNode = InfoNode::create($this, $commandNode);
        $balanceInfoNode = BalanceInfoNode::create($this, $infoNode);
        BalanceContractNode::create($this, $balanceInfoNode, $this->contract);
        TransactionIdNode::create($this, $commandNode);
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseClass(): string
    {
        return InfoBalanceResponse::class;
    }

    /**
     * Setting the contract number with administrator of public domain.
     *
     * @param string $contract contract number
     */
    public function setContract(string $contract): self
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Getting the contract number with administrator of public domain.
     */
    public function getContract(): string
    {
        return $this->contract;
    }
}
