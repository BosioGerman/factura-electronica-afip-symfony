<?php

namespace AppBundle\Service\WsAfip;

class FEDetResponse
{

    /**
     * @var int $Concepto
     */
    protected $Concepto = null;

    /**
     * @var int $DocTipo
     */
    protected $DocTipo = null;

    /**
     * @var int $DocNro
     */
    protected $DocNro = null;

    /**
     * @var int $CbteDesde
     */
    protected $CbteDesde = null;

    /**
     * @var int $CbteHasta
     */
    protected $CbteHasta = null;

    /**
     * @var string $CbteFch
     */
    protected $CbteFch = null;

    /**
     * @var string $Resultado
     */
    protected $Resultado = null;

    /**
     * @var ArrayOfObs $Observaciones
     */
    protected $Observaciones = null;

    /**
     * @param int $Concepto
     * @param int $DocTipo
     * @param int $DocNro
     * @param int $CbteDesde
     * @param int $CbteHasta
     */
    public function __construct($Concepto, $DocTipo, $DocNro, $CbteDesde, $CbteHasta)
    {
      $this->Concepto = $Concepto;
      $this->DocTipo = $DocTipo;
      $this->DocNro = $DocNro;
      $this->CbteDesde = $CbteDesde;
      $this->CbteHasta = $CbteHasta;
    }

    /**
     * @return int
     */
    public function getConcepto()
    {
      return $this->Concepto;
    }

    /**
     * @param int $Concepto
     * @return \AppBundle\Service\WsAfip\FEDetResponse
     */
    public function setConcepto($Concepto)
    {
      $this->Concepto = $Concepto;
      return $this;
    }

    /**
     * @return int
     */
    public function getDocTipo()
    {
      return $this->DocTipo;
    }

    /**
     * @param int $DocTipo
     * @return \AppBundle\Service\WsAfip\FEDetResponse
     */
    public function setDocTipo($DocTipo)
    {
      $this->DocTipo = $DocTipo;
      return $this;
    }

    /**
     * @return int
     */
    public function getDocNro()
    {
      return $this->DocNro;
    }

    /**
     * @param int $DocNro
     * @return \AppBundle\Service\WsAfip\FEDetResponse
     */
    public function setDocNro($DocNro)
    {
      $this->DocNro = $DocNro;
      return $this;
    }

    /**
     * @return int
     */
    public function getCbteDesde()
    {
      return $this->CbteDesde;
    }

    /**
     * @param int $CbteDesde
     * @return \AppBundle\Service\WsAfip\FEDetResponse
     */
    public function setCbteDesde($CbteDesde)
    {
      $this->CbteDesde = $CbteDesde;
      return $this;
    }

    /**
     * @return int
     */
    public function getCbteHasta()
    {
      return $this->CbteHasta;
    }

    /**
     * @param int $CbteHasta
     * @return \AppBundle\Service\WsAfip\FEDetResponse
     */
    public function setCbteHasta($CbteHasta)
    {
      $this->CbteHasta = $CbteHasta;
      return $this;
    }

    /**
     * @return string
     */
    public function getCbteFch()
    {
      return $this->CbteFch;
    }

    /**
     * @param string $CbteFch
     * @return \AppBundle\Service\WsAfip\FEDetResponse
     */
    public function setCbteFch($CbteFch)
    {
      $this->CbteFch = $CbteFch;
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
     * @return \AppBundle\Service\WsAfip\FEDetResponse
     */
    public function setResultado($Resultado)
    {
      $this->Resultado = $Resultado;
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
     * @return \AppBundle\Service\WsAfip\FEDetResponse
     */
    public function setObservaciones($Observaciones)
    {
      $this->Observaciones = $Observaciones;
      return $this;
    }

}
