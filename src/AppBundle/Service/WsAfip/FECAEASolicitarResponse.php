<?php

namespace AppBundle\Service\WsAfip;

class FECAEASolicitarResponse
{

    /**
     * @var FECAEAGetResponse $FECAEASolicitarResult
     */
    protected $FECAEASolicitarResult = null;

    /**
     * @param FECAEAGetResponse $FECAEASolicitarResult
     */
    public function __construct($FECAEASolicitarResult)
    {
      $this->FECAEASolicitarResult = $FECAEASolicitarResult;
    }

    /**
     * @return FECAEAGetResponse
     */
    public function getFECAEASolicitarResult()
    {
      return $this->FECAEASolicitarResult;
    }

    /**
     * @param FECAEAGetResponse $FECAEASolicitarResult
     * @return \AppBundle\Service\WsAfip\FECAEASolicitarResponse
     */
    public function setFECAEASolicitarResult($FECAEASolicitarResult)
    {
      $this->FECAEASolicitarResult = $FECAEASolicitarResult;
      return $this;
    }

}
