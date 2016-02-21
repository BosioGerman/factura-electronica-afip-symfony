<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetCotizacionResponse
{

    /**
     * @var FECotizacionResponse $FEParamGetCotizacionResult
     */
    protected $FEParamGetCotizacionResult = null;

    /**
     * @param FECotizacionResponse $FEParamGetCotizacionResult
     */
    public function __construct($FEParamGetCotizacionResult)
    {
      $this->FEParamGetCotizacionResult = $FEParamGetCotizacionResult;
    }

    /**
     * @return FECotizacionResponse
     */
    public function getFEParamGetCotizacionResult()
    {
      return $this->FEParamGetCotizacionResult;
    }

    /**
     * @param FECotizacionResponse $FEParamGetCotizacionResult
     * @return \AppBundle\Service\WsAfip\FEParamGetCotizacionResponse
     */
    public function setFEParamGetCotizacionResult($FEParamGetCotizacionResult)
    {
      $this->FEParamGetCotizacionResult = $FEParamGetCotizacionResult;
      return $this;
    }

}
