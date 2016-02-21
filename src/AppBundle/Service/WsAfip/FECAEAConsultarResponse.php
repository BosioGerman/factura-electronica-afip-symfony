<?php

namespace AppBundle\Service\WsAfip;

class FECAEAConsultarResponse
{

    /**
     * @var FECAEAGetResponse $FECAEAConsultarResult
     */
    protected $FECAEAConsultarResult = null;

    /**
     * @param FECAEAGetResponse $FECAEAConsultarResult
     */
    public function __construct($FECAEAConsultarResult)
    {
      $this->FECAEAConsultarResult = $FECAEAConsultarResult;
    }

    /**
     * @return FECAEAGetResponse
     */
    public function getFECAEAConsultarResult()
    {
      return $this->FECAEAConsultarResult;
    }

    /**
     * @param FECAEAGetResponse $FECAEAConsultarResult
     * @return \AppBundle\Service\WsAfip\FECAEAConsultarResponse
     */
    public function setFECAEAConsultarResult($FECAEAConsultarResult)
    {
      $this->FECAEAConsultarResult = $FECAEAConsultarResult;
      return $this;
    }

}
