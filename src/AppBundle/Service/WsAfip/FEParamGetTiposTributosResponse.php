<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetTiposTributosResponse
{

    /**
     * @var FETributoResponse $FEParamGetTiposTributosResult
     */
    protected $FEParamGetTiposTributosResult = null;

    /**
     * @param FETributoResponse $FEParamGetTiposTributosResult
     */
    public function __construct($FEParamGetTiposTributosResult)
    {
      $this->FEParamGetTiposTributosResult = $FEParamGetTiposTributosResult;
    }

    /**
     * @return FETributoResponse
     */
    public function getFEParamGetTiposTributosResult()
    {
      return $this->FEParamGetTiposTributosResult;
    }

    /**
     * @param FETributoResponse $FEParamGetTiposTributosResult
     * @return \AppBundle\Service\WsAfip\FEParamGetTiposTributosResponse
     */
    public function setFEParamGetTiposTributosResult($FEParamGetTiposTributosResult)
    {
      $this->FEParamGetTiposTributosResult = $FEParamGetTiposTributosResult;
      return $this;
    }

}
