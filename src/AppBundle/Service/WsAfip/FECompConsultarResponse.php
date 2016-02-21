<?php

namespace AppBundle\Service\WsAfip;

class FECompConsultarResponse
{

    /**
     * @var FECompConsultaResponse $FECompConsultarResult
     */
    protected $FECompConsultarResult = null;

    /**
     * @param FECompConsultaResponse $FECompConsultarResult
     */
    public function __construct($FECompConsultarResult)
    {
      $this->FECompConsultarResult = $FECompConsultarResult;
    }

    /**
     * @return FECompConsultaResponse
     */
    public function getFECompConsultarResult()
    {
      return $this->FECompConsultarResult;
    }

    /**
     * @param FECompConsultaResponse $FECompConsultarResult
     * @return \AppBundle\Service\WsAfip\FECompConsultarResponse
     */
    public function setFECompConsultarResult($FECompConsultarResult)
    {
      $this->FECompConsultarResult = $FECompConsultarResult;
      return $this;
    }

}
