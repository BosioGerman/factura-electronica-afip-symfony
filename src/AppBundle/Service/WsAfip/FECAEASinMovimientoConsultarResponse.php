<?php

namespace AppBundle\Service\WsAfip;

class FECAEASinMovimientoConsultarResponse
{

    /**
     * @var FECAEASinMovConsResponse $FECAEASinMovimientoConsultarResult
     */
    protected $FECAEASinMovimientoConsultarResult = null;

    /**
     * @param FECAEASinMovConsResponse $FECAEASinMovimientoConsultarResult
     */
    public function __construct($FECAEASinMovimientoConsultarResult)
    {
      $this->FECAEASinMovimientoConsultarResult = $FECAEASinMovimientoConsultarResult;
    }

    /**
     * @return FECAEASinMovConsResponse
     */
    public function getFECAEASinMovimientoConsultarResult()
    {
      return $this->FECAEASinMovimientoConsultarResult;
    }

    /**
     * @param FECAEASinMovConsResponse $FECAEASinMovimientoConsultarResult
     * @return \AppBundle\Service\WsAfip\FECAEASinMovimientoConsultarResponse
     */
    public function setFECAEASinMovimientoConsultarResult($FECAEASinMovimientoConsultarResult)
    {
      $this->FECAEASinMovimientoConsultarResult = $FECAEASinMovimientoConsultarResult;
      return $this;
    }

}
