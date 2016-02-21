<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetTiposMonedasResponse
{

    /**
     * @var MonedaResponse $FEParamGetTiposMonedasResult
     */
    protected $FEParamGetTiposMonedasResult = null;

    /**
     * @param MonedaResponse $FEParamGetTiposMonedasResult
     */
    public function __construct($FEParamGetTiposMonedasResult)
    {
      $this->FEParamGetTiposMonedasResult = $FEParamGetTiposMonedasResult;
    }

    /**
     * @return MonedaResponse
     */
    public function getFEParamGetTiposMonedasResult()
    {
      return $this->FEParamGetTiposMonedasResult;
    }

    /**
     * @param MonedaResponse $FEParamGetTiposMonedasResult
     * @return \AppBundle\Service\WsAfip\FEParamGetTiposMonedasResponse
     */
    public function setFEParamGetTiposMonedasResult($FEParamGetTiposMonedasResult)
    {
      $this->FEParamGetTiposMonedasResult = $FEParamGetTiposMonedasResult;
      return $this;
    }

}
