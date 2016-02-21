<?php

namespace AppBundle\Service\WsAfip;

class FECompTotXRequestResponse
{

    /**
     * @var FERegXReqResponse $FECompTotXRequestResult
     */
    protected $FECompTotXRequestResult = null;

    /**
     * @param FERegXReqResponse $FECompTotXRequestResult
     */
    public function __construct($FECompTotXRequestResult)
    {
      $this->FECompTotXRequestResult = $FECompTotXRequestResult;
    }

    /**
     * @return FERegXReqResponse
     */
    public function getFECompTotXRequestResult()
    {
      return $this->FECompTotXRequestResult;
    }

    /**
     * @param FERegXReqResponse $FECompTotXRequestResult
     * @return \AppBundle\Service\WsAfip\FECompTotXRequestResponse
     */
    public function setFECompTotXRequestResult($FECompTotXRequestResult)
    {
      $this->FECompTotXRequestResult = $FECompTotXRequestResult;
      return $this;
    }

}
