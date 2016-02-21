<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetTiposCbteResponse
{

    /**
     * @var CbteTipoResponse $FEParamGetTiposCbteResult
     */
    protected $FEParamGetTiposCbteResult = null;

    /**
     * @param CbteTipoResponse $FEParamGetTiposCbteResult
     */
    public function __construct($FEParamGetTiposCbteResult)
    {
      $this->FEParamGetTiposCbteResult = $FEParamGetTiposCbteResult;
    }

    /**
     * @return CbteTipoResponse
     */
    public function getFEParamGetTiposCbteResult()
    {
      return $this->FEParamGetTiposCbteResult;
    }

    /**
     * @param CbteTipoResponse $FEParamGetTiposCbteResult
     * @return \AppBundle\Service\WsAfip\FEParamGetTiposCbteResponse
     */
    public function setFEParamGetTiposCbteResult($FEParamGetTiposCbteResult)
    {
      $this->FEParamGetTiposCbteResult = $FEParamGetTiposCbteResult;
      return $this;
    }

}
