<?php

namespace AppBundle\Service\WsAfip;

class FECAESolicitarResponse
{

    /**
     * @var FECAEResponse $FECAESolicitarResult
     */
    protected $FECAESolicitarResult = null;

    /**
     * @param FECAEResponse $FECAESolicitarResult
     */
    public function __construct($FECAESolicitarResult)
    {
      $this->FECAESolicitarResult = $FECAESolicitarResult;
    }

    /**
     * @return FECAEResponse
     */
    public function getFECAESolicitarResult()
    {
      return $this->FECAESolicitarResult;
    }

    /**
     * @param FECAEResponse $FECAESolicitarResult
     * @return \AppBundle\Service\WsAfip\FECAESolicitarResponse
     */
    public function setFECAESolicitarResult($FECAESolicitarResult)
    {
      $this->FECAESolicitarResult = $FECAESolicitarResult;
      return $this;
    }

}
