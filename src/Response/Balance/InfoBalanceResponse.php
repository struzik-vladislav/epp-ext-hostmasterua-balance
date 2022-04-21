<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Response\Balance;

use Struzik\EPPClient\Response\CommonResponse;

/**
 * Object representation of the response of balance information command.
 */
class InfoBalanceResponse extends CommonResponse
{
    /**
     * Current valid contract number between registrar and administrator of public domain.
     */
    public function getContract(): string
    {
        return $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:contract')->nodeValue;
    }

    /**
     * Date of expire of contract as string.
     */
    public function getContractUntil(): string
    {
        return $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:contractUntil')->nodeValue;
    }

    /**
     * Date of expire of contract as string.
     *
     * @param string $format format for creating \DateTime object
     */
    public function getContractUntilAsObject(string $format): \DateTime
    {
        return date_create_from_format($format, $this->getContractUntil());
    }

    /**
     * Status of availability of toll transactions.
     */
    public function getStatus(): string
    {
        return $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:status')->getAttribute('s');
    }

    /**
     * Financial state of registrar's account.
     */
    public function getBalanceValue(): string
    {
        return $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:balance')->nodeValue;
    }

    /**
     * Date of the financial state of account as string.
     */
    public function getBalanceDate(): string
    {
        return $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:balance')->getAttribute('bdate');
    }

    /**
     * Date of the financial state of account as object.
     *
     * @param string $format format for creating \DateTime object
     */
    public function getBalanceDateAsObject(string $format): \DateTime
    {
        return date_create_from_format($format, $this->getBalanceDate());
    }
}
