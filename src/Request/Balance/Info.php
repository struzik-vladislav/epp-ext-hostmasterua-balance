<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Request\Balance;

use Struzik\EPPClient\Request\AbstractRequest;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Response\Balance\Info as InfoResponse;
use Struzik\EPPClient\Node\Common\Info as InfoNode;
use Struzik\EPPClient\Node\Common\Command;
use Struzik\EPPClient\Node\Common\TransactionId;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Node\Balance\Info as BalanceInfoNode;
use Struzik\EPPClient\Extension\HostmasterUA\Balance\Node\Balance\Contract;

/**
 * Object representation of the request of balance information command.
 */
class Info extends AbstractRequest
{
    /**
     * @var string
     */
    private $contract;

    /**
     * {@inheritdoc}
     */
    protected function handleParameters()
    {
        $epp = $this->getRoot();

        $command = new Command($this);
        $epp->append($command);

        $info = new InfoNode($this);
        $command->append($info);

        $balanceInfo = new BalanceInfoNode($this);
        $info->append($balanceInfo);

        $balanceContract = new Contract($this, ['contract' => $this->contract]);
        $balanceInfo->append($balanceContract);

        $transaction = new TransactionId($this);
        $command->append($transaction);
    }

    /**
     * {@inheritdoc}
     */
    public function getResponseClass()
    {
        return InfoResponse::class;
    }

    /**
     * Setting the contract number with administrator of public domain.
     *
     * @param string $contract contract number
     *
     * @return self
     */
    public function setContract($contract)
    {
        $this->contract = $contract;

        return $this;
    }

    /**
     * Getting the contract number with administrator of public domain.
     *
     * @return string
     */
    public function getContract()
    {
        return $this->contract;
    }
}
