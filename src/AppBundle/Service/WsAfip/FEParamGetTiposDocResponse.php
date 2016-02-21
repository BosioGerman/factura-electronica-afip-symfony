<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetTiposDocResponse
{

    /**
     * @var DocTipoResponse $FEParamGetTiposDocResult
     */
    protected $FEParamGetTiposDocResult = null;

    /**
     * @param DocTipoResponse $FEParamGetTiposDocResult
     */
    public function __construct($FEParamGetTiposDocResult)
    {
      $this->FEParamGetTiposDocResult = $FEParamGetTiposDocResult;
    }

    /**
     * @return DocTipoResponse
     */
    public function getFEParamGetTiposDocResult()
    {
      return $this->FEParamGetTiposDocResult;
    }

    /**
     * @param DocTipoResponse $FEParamGetTiposDocResult
     * @return \AppBundle\Service\WsAfip\FEParamGetTiposDocResponse
     */
    public function setFEParamGetTiposDocResult($FEParamGetTiposDocResult)
    {
      $this->FEParamGetTiposDocResult = $FEParamGetTiposDocResult;
      return $this;
    }

}
