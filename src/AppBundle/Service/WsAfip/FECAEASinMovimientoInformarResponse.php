<?php

namespace AppBundle\Service\WsAfip;

class FECAEASinMovimientoInformarResponse
{

    /**
     * @var FECAEASinMovResponse $FECAEASinMovimientoInformarResult
     */
    protected $FECAEASinMovimientoInformarResult = null;

    /**
     * @param FECAEASinMovResponse $FECAEASinMovimientoInformarResult
     */
    public function __construct($FECAEASinMovimientoInformarResult)
    {
      $this->FECAEASinMovimientoInformarResult = $FECAEASinMovimientoInformarResult;
    }

    /**
     * @return FECAEASinMovResponse
     */
    public function getFECAEASinMovimientoInformarResult()
    {
      return $this->FECAEASinMovimientoInformarResult;
    }

    /**
     * @param FECAEASinMovResponse $FECAEASinMovimientoInformarResult
     * @return \AppBundle\Service\WsAfip\FECAEASinMovimientoInformarResponse
     */
    public function setFECAEASinMovimientoInformarResult($FECAEASinMovimientoInformarResult)
    {
      $this->FECAEASinMovimientoInformarResult = $FECAEASinMovimientoInformarResult;
      return $this;
    }

}
