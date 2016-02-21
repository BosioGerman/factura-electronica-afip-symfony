<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetPtosVentaResponse
{

    /**
     * @var FEPtoVentaResponse $FEParamGetPtosVentaResult
     */
    protected $FEParamGetPtosVentaResult = null;

    /**
     * @param FEPtoVentaResponse $FEParamGetPtosVentaResult
     */
    public function __construct($FEParamGetPtosVentaResult)
    {
      $this->FEParamGetPtosVentaResult = $FEParamGetPtosVentaResult;
    }

    /**
     * @return FEPtoVentaResponse
     */
    public function getFEParamGetPtosVentaResult()
    {
      return $this->FEParamGetPtosVentaResult;
    }

    /**
     * @param FEPtoVentaResponse $FEParamGetPtosVentaResult
     * @return \AppBundle\Service\WsAfip\FEParamGetPtosVentaResponse
     */
    public function setFEParamGetPtosVentaResult($FEParamGetPtosVentaResult)
    {
      $this->FEParamGetPtosVentaResult = $FEParamGetPtosVentaResult;
      return $this;
    }

}
