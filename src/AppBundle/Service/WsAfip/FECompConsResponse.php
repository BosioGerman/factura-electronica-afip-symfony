<?php

namespace AppBundle\Service\WsAfip;

class FECompConsResponse extends FECAEDetRequest
{

    /**
     * @var string $Resultado
     */
    protected $Resultado = null;

    /**
     * @var string $CodAutorizacion
     */
    protected $CodAutorizacion = null;

    /**
     * @var string $EmisionTipo
     */
    protected $EmisionTipo = null;

    /**
     * @var string $FchVto
     */
    protected $FchVto = null;

    /**
     * @var string $FchProceso
     */
    protected $FchProceso = null;

    /**
     * @var ArrayOfObs $Observaciones
     */
    protected $Observaciones = null;

    /**
     * @var int $PtoVta
     */
    protected $PtoVta = null;

    /**
     * @var int $CbteTipo
     */
    protected $CbteTipo = null;

    /**
     * @param int $Concepto
     * @param int $DocTipo
     * @param int $DocNro
     * @param int $CbteDesde
     * @param int $CbteHasta
     * @param float $ImpTotal
     * @param float $ImpTotConc
     * @param float $ImpNeto
     * @param float $ImpOpEx
     * @param float $ImpTrib
     * @param float $ImpIVA
     * @param float $MonCotiz
     * @param int $PtoVta
     * @param int $CbteTipo
     */
    public function __construct($Concepto, $DocTipo, $DocNro, $CbteDesde, $CbteHasta, $ImpTotal, $ImpTotConc, $ImpNeto, $ImpOpEx, $ImpTrib, $ImpIVA, $MonCotiz, $PtoVta, $CbteTipo)
    {
      parent::__construct($Concepto, $DocTipo, $DocNro, $CbteDesde, $CbteHasta, $ImpTotal, $ImpTotConc, $ImpNeto, $ImpOpEx, $ImpTrib, $ImpIVA, $MonCotiz);
      $this->PtoVta = $PtoVta;
      $this->CbteTipo = $CbteTipo;
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
     * @return \AppBundle\Service\WsAfip\FECompConsResponse
     */
    public function setResultado($Resultado)
    {
      $this->Resultado = $Resultado;
      return $this;
    }

    /**
     * @return string
     */
    public function getCodAutorizacion()
    {
      return $this->CodAutorizacion;
    }

    /**
     * @param string $CodAutorizacion
     * @return \AppBundle\Service\WsAfip\FECompConsResponse
     */
    public function setCodAutorizacion($CodAutorizacion)
    {
      $this->CodAutorizacion = $CodAutorizacion;
      return $this;
    }

    /**
     * @return string
     */
    public function getEmisionTipo()
    {
      return $this->EmisionTipo;
    }

    /**
     * @param string $EmisionTipo
     * @return \AppBundle\Service\WsAfip\FECompConsResponse
     */
    public function setEmisionTipo($EmisionTipo)
    {
      $this->EmisionTipo = $EmisionTipo;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchVto()
    {
      return $this->FchVto;
    }

    /**
     * @param string $FchVto
     * @return \AppBundle\Service\WsAfip\FECompConsResponse
     */
    public function setFchVto($FchVto)
    {
      $this->FchVto = $FchVto;
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
     * @return \AppBundle\Service\WsAfip\FECompConsResponse
     */
    public function setFchProceso($FchProceso)
    {
      $this->FchProceso = $FchProceso;
      return $this;
    }

    /**
     * @return ArrayOfObs
     */
    public function getObservaciones()
    {
      return $this->Observaciones;
    }

    /**
     * @param ArrayOfObs $Observaciones
     * @return \AppBundle\Service\WsAfip\FECompConsResponse
     */
    public function setObservaciones($Observaciones)
    {
      $this->Observaciones = $Observaciones;
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
     * @return \AppBundle\Service\WsAfip\FECompConsResponse
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
     * @return \AppBundle\Service\WsAfip\FECompConsResponse
     */
    public function setCbteTipo($CbteTipo)
    {
      $this->CbteTipo = $CbteTipo;
      return $this;
    }

}
