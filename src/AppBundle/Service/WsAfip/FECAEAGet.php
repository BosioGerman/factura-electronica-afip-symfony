<?php

namespace AppBundle\Service\WsAfip;

class FECAEAGet
{

    /**
     * @var string $CAEA
     */
    protected $CAEA = null;

    /**
     * @var int $Periodo
     */
    protected $Periodo = null;

    /**
     * @var int $Orden
     */
    protected $Orden = null;

    /**
     * @var string $FchVigDesde
     */
    protected $FchVigDesde = null;

    /**
     * @var string $FchVigHasta
     */
    protected $FchVigHasta = null;

    /**
     * @var string $FchTopeInf
     */
    protected $FchTopeInf = null;

    /**
     * @var string $FchProceso
     */
    protected $FchProceso = null;

    /**
     * @param int $Periodo
     * @param int $Orden
     */
    public function __construct($Periodo, $Orden)
    {
      $this->Periodo = $Periodo;
      $this->Orden = $Orden;
    }

    /**
     * @return string
     */
    public function getCAEA()
    {
      return $this->CAEA;
    }

    /**
     * @param string $CAEA
     * @return \AppBundle\Service\WsAfip\FECAEAGet
     */
    public function setCAEA($CAEA)
    {
      $this->CAEA = $CAEA;
      return $this;
    }

    /**
     * @return int
     */
    public function getPeriodo()
    {
      return $this->Periodo;
    }

    /**
     * @param int $Periodo
     * @return \AppBundle\Service\WsAfip\FECAEAGet
     */
    public function setPeriodo($Periodo)
    {
      $this->Periodo = $Periodo;
      return $this;
    }

    /**
     * @return int
     */
    public function getOrden()
    {
      return $this->Orden;
    }

    /**
     * @param int $Orden
     * @return \AppBundle\Service\WsAfip\FECAEAGet
     */
    public function setOrden($Orden)
    {
      $this->Orden = $Orden;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchVigDesde()
    {
      return $this->FchVigDesde;
    }

    /**
     * @param string $FchVigDesde
     * @return \AppBundle\Service\WsAfip\FECAEAGet
     */
    public function setFchVigDesde($FchVigDesde)
    {
      $this->FchVigDesde = $FchVigDesde;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchVigHasta()
    {
      return $this->FchVigHasta;
    }

    /**
     * @param string $FchVigHasta
     * @return \AppBundle\Service\WsAfip\FECAEAGet
     */
    public function setFchVigHasta($FchVigHasta)
    {
      $this->FchVigHasta = $FchVigHasta;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchTopeInf()
    {
      return $this->FchTopeInf;
    }

    /**
     * @param string $FchTopeInf
     * @return \AppBundle\Service\WsAfip\FECAEAGet
     */
    public function setFchTopeInf($FchTopeInf)
    {
      $this->FchTopeInf = $FchTopeInf;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchProceso()
    {
      return $this->FchProceso;
    }

    /**
     * @param string $FchProceso
     * @return \AppBundle\Service\WsAfip\FECAEAGet
     */
    public function setFchProceso($FchProceso)
    {
      $this->FchProceso = $FchProceso;
      return $this;
    }

}
