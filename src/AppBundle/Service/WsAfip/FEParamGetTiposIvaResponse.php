<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetTiposIvaResponse
{

    /**
     * @var IvaTipoResponse $FEParamGetTiposIvaResult
     */
    protected $FEParamGetTiposIvaResult = null;

    /**
     * @param IvaTipoResponse $FEParamGetTiposIvaResult
     */
    public function __construct($FEParamGetTiposIvaResult)
    {
      $this->FEParamGetTiposIvaResult = $FEParamGetTiposIvaResult;
    }

    /**
     * @return IvaTipoResponse
     */
    public function getFEParamGetTiposIvaResult()
    {
      return $this->FEParamGetTiposIvaResult;
    }

    /**
     * @param IvaTipoResponse $FEParamGetTiposIvaResult
     * @return \AppBundle\Service\WsAfip\FEParamGetTiposIvaResponse
     */
    public function setFEParamGetTiposIvaResult($FEParamGetTiposIvaResult)
    {
      $this->FEParamGetTiposIvaResult = $FEParamGetTiposIvaResult;
      return $this;
    }

}
