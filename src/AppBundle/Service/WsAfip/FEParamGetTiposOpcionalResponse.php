<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetTiposOpcionalResponse
{

    /**
     * @var OpcionalTipoResponse $FEParamGetTiposOpcionalResult
     */
    protected $FEParamGetTiposOpcionalResult = null;

    /**
     * @param OpcionalTipoResponse $FEParamGetTiposOpcionalResult
     */
    public function __construct($FEParamGetTiposOpcionalResult)
    {
      $this->FEParamGetTiposOpcionalResult = $FEParamGetTiposOpcionalResult;
    }

    /**
     * @return OpcionalTipoResponse
     */
    public function getFEParamGetTiposOpcionalResult()
    {
      return $this->FEParamGetTiposOpcionalResult;
    }

    /**
     * @param OpcionalTipoResponse $FEParamGetTiposOpcionalResult
     * @return \AppBundle\Service\WsAfip\FEParamGetTiposOpcionalResponse
     */
    public function setFEParamGetTiposOpcionalResult($FEParamGetTiposOpcionalResult)
    {
      $this->FEParamGetTiposOpcionalResult = $FEParamGetTiposOpcionalResult;
      return $this;
    }

}
