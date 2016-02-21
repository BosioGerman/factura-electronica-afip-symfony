<?php

namespace AppBundle\Service\WsAfip;

class FECompUltimoAutorizadoResponse
{

    /**
     * @var FERecuperaLastCbteResponse $FECompUltimoAutorizadoResult
     */
    protected $FECompUltimoAutorizadoResult = null;

    /**
     * @param FERecuperaLastCbteResponse $FECompUltimoAutorizadoResult
     */
    public function __construct($FECompUltimoAutorizadoResult)
    {
      $this->FECompUltimoAutorizadoResult = $FECompUltimoAutorizadoResult;
    }

    /**
     * @return FERecuperaLastCbteResponse
     */
    public function getFECompUltimoAutorizadoResult()
    {
      return $this->FECompUltimoAutorizadoResult;
    }

    /**
     * @param FERecuperaLastCbteResponse $FECompUltimoAutorizadoResult
     * @return \AppBundle\Service\WsAfip\FECompUltimoAutorizadoResponse
     */
    public function setFECompUltimoAutorizadoResult($FECompUltimoAutorizadoResult)
    {
      $this->FECompUltimoAutorizadoResult = $FECompUltimoAutorizadoResult;
      return $this;
    }

}
