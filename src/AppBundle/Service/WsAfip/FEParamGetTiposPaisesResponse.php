<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetTiposPaisesResponse
{

    /**
     * @var FEPaisResponse $FEParamGetTiposPaisesResult
     */
    protected $FEParamGetTiposPaisesResult = null;

    /**
     * @param FEPaisResponse $FEParamGetTiposPaisesResult
     */
    public function __construct($FEParamGetTiposPaisesResult)
    {
      $this->FEParamGetTiposPaisesResult = $FEParamGetTiposPaisesResult;
    }

    /**
     * @return FEPaisResponse
     */
    public function getFEParamGetTiposPaisesResult()
    {
      return $this->FEParamGetTiposPaisesResult;
    }

    /**
     * @param FEPaisResponse $FEParamGetTiposPaisesResult
     * @return \AppBundle\Service\WsAfip\FEParamGetTiposPaisesResponse
     */
    public function setFEParamGetTiposPaisesResult($FEParamGetTiposPaisesResult)
    {
      $this->FEParamGetTiposPaisesResult = $FEParamGetTiposPaisesResult;
      return $this;
    }

}
