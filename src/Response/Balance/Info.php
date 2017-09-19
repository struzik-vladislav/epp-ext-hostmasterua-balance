<?php

namespace Struzik\EPPClient\Extension\HostmasterUA\Balance\Response\Balance;

use Struzik\EPPClient\Response\CommonResponse;

/**
 * Object representation of the response of balance information command.
 */
class Info extends CommonResponse
{
    /**
     * Current valid contract number between registrar and administrator of public domain.
     *
     * @return string
     */
    public function getContract()
    {
        $node = $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:contract');

        return $node->nodeValue;
    }

    /**
     * Date of expire of contract.
     *
     * @param string|null $format format of the date string
     *
     * @return \DateTime|string
     */
    public function getContractUntil($format = null)
    {
        $node = $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:contractUntil');
        if ($format === null) {
            return $node->nodeValue;
        }

        return date_create_from_format($format, $node->nodeValue);
    }

    /**
     * Status of availability of toll transactions.
     *
     * @return string
     */
    public function getStatus()
    {
        $node = $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:status');

        return $node->getAttribute('s');
    }

    /**
     * Financial state of registrar's account.
     *
     * @return string
     */
    public function getBalanceValue()
    {
        $node = $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:balance');

        return $node->nodeValue;
    }

    /**
     * Date of the financial state of account.
     *
     * @param string|null $format format of the date string
     *
     * @return \DateTime|string
     */
    public function getBalanceDate($format = null)
    {
        $node = $this->getFirst('//epp:epp/epp:response/epp:resData/balance:infData/balance:balance');
        if ($format === null) {
            return $node->getAttribute('bdate');
        }

        return date_create_from_format($format, $node->getAttribute('bdate'));
    }
}
