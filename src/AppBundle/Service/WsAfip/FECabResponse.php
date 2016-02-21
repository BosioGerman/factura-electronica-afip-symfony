<?php

namespace AppBundle\Service\WsAfip;

class FECabResponse
{

    /**
     * @var int $Cuit
     */
    protected $Cuit = null;

    /**
     * @var int $PtoVta
     */
    protected $PtoVta = null;

    /**
     * @var int $CbteTipo
     */
    protected $CbteTipo = null;

    /**
     * @var string $FchProceso
     */
    protected $FchProceso = null;

    /**
     * @var int $CantReg
     */
    protected $CantReg = null;

    /**
     * @var string $Resultado
     */
    protected $Resultado = null;

    /**
     * @var string $Reproceso
     */
    protected $Reproceso = null;

    /**
     * @param int $Cuit
     * @param int $PtoVta
     * @param int $CbteTipo
     * @param int $CantReg
     */
    public function __construct($Cuit, $PtoVta, $CbteTipo, $CantReg)
    {
      $this->Cuit = $Cuit;
      $this->PtoVta = $PtoVta;
      $this->CbteTipo = $CbteTipo;
      $this->CantReg = $CantReg;
    }

    /**
     * @return int
     */
    public function getCuit()
    {
      return $this->Cuit;
    }

    /**
     * @param int $Cuit
     * @return \AppBundle\Service\WsAfip\FECabResponse
     */
    public function setCuit($Cuit)
    {
      $this->Cuit = $Cuit;
      return $this;
    }

    /**
     * @return int
     */
    public function getPtoVta()
    {
      return $this->PtoVta;
    }

    /**
     * @param int $PtoVta
     * @return \AppBundle\Service\WsAfip\FECabResponse
     */
    public function setPtoVta($PtoVta)
    {
      $this->PtoVta = $PtoVta;
      return $this;
    }

    /**
     * @return int
     */
    public function getCbteTipo()
    {
      return $this->CbteTipo;
    }

    /**
     * @param int $CbteTipo
     * @return \AppBundle\Service\WsAfip\FECabResponse
     */
    public function setCbteTipo($CbteTipo)
    {
      $this->CbteTipo = $CbteTipo;
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
     * @return \AppBundle\Service\WsAfip\FECabResponse
     */
    public function setFchProceso($FchProceso)
    {
      $this->FchProceso = $FchProceso;
      return $this;
    }

    /**
     * @return int
     */
    public function getCantReg()
    {
      return $this->CantReg;
    }

    /**
     * @param int $CantReg
     * @return \AppBundle\Service\WsAfip\FECabResponse
     */
    public function setCantReg($CantReg)
    {
      $this->CantReg = $CantReg;
      return $this;
    }

    /**
     * @return string
     */
    public function getResultado()
    {
      return $this->Resultado;
    }

    /**
     * @param string $Resultado
     * @return \AppBundle\Service\WsAfip\FECabResponse
     */
    public function setResultado($Resultado)
    {
      $this->Resultado = $Resultado;
      return $this;
    }

    /**
     * @return string
     */
    public function getReproceso()
    {
      return $this->Reproceso;
    }

    /**
     * @param string $Reproceso
     * @return \AppBundle\Service\WsAfip\FECabResponse
     */
    public function setReproceso($Reproceso)
    {
      $this->Reproceso = $Reproceso;
      return $this;
    }

}
