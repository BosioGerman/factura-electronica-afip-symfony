<?php

namespace AppBundle\Service\WsAfip;

class FECAEARegInformativoResponse
{

    /**
     * @var FECAEAResponse $FECAEARegInformativoResult
     */
    protected $FECAEARegInformativoResult = null;

    /**
     * @param FECAEAResponse $FECAEARegInformativoResult
     */
    public function __construct($FECAEARegInformativoResult)
    {
      $this->FECAEARegInformativoResult = $FECAEARegInformativoResult;
    }

    /**
     * @return FECAEAResponse
     */
    public function getFECAEARegInformativoResult()
    {
      return $this->FECAEARegInformativoResult;
    }

    /**
     * @param FECAEAResponse $FECAEARegInformativoResult
     * @return \AppBundle\Service\WsAfip\FECAEARegInformativoResponse
     */
    public function setFECAEARegInformativoResult($FECAEARegInformativoResult)
    {
      $this->FECAEARegInformativoResult = $FECAEARegInformativoResult;
      return $this;
    }

}
