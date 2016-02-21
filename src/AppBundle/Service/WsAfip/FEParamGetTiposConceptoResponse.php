<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetTiposConceptoResponse
{

    /**
     * @var ConceptoTipoResponse $FEParamGetTiposConceptoResult
     */
    protected $FEParamGetTiposConceptoResult = null;

    /**
     * @param ConceptoTipoResponse $FEParamGetTiposConceptoResult
     */
    public function __construct($FEParamGetTiposConceptoResult)
    {
      $this->FEParamGetTiposConceptoResult = $FEParamGetTiposConceptoResult;
    }

    /**
     * @return ConceptoTipoResponse
     */
    public function getFEParamGetTiposConceptoResult()
    {
      return $this->FEParamGetTiposConceptoResult;
    }

    /**
     * @param ConceptoTipoResponse $FEParamGetTiposConceptoResult
     * @return \AppBundle\Service\WsAfip\FEParamGetTiposConceptoResponse
     */
    public function setFEParamGetTiposConceptoResult($FEParamGetTiposConceptoResult)
    {
      $this->FEParamGetTiposConceptoResult = $FEParamGetTiposConceptoResult;
      return $this;
    }

}
