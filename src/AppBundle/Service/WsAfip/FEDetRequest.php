<?php

namespace AppBundle\Service\WsAfip;

class FEDetRequest
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
     * @var float $ImpTotal
     */
    protected $ImpTotal = null;

    /**
     * @var float $ImpTotConc
     */
    protected $ImpTotConc = null;

    /**
     * @var float $ImpNeto
     */
    protected $ImpNeto = null;

    /**
     * @var float $ImpOpEx
     */
    protected $ImpOpEx = null;

    /**
     * @var float $ImpTrib
     */
    protected $ImpTrib = null;

    /**
     * @var float $ImpIVA
     */
    protected $ImpIVA = null;

    /**
     * @var string $FchServDesde
     */
    protected $FchServDesde = null;

    /**
     * @var string $FchServHasta
     */
    protected $FchServHasta = null;

    /**
     * @var string $FchVtoPago
     */
    protected $FchVtoPago = null;

    /**
     * @var string $MonId
     */
    protected $MonId = null;

    /**
     * @var float $MonCotiz
     */
    protected $MonCotiz = null;

    /**
     * @var ArrayOfCbteAsoc $CbtesAsoc
     */
    protected $CbtesAsoc = null;

    /**
     * @var ArrayOfTributo $Tributos
     */
    protected $Tributos = null;

    /**
     * @var ArrayOfAlicIva $Iva
     */
    protected $Iva = null;

    /**
     * @var ArrayOfOpcional $Opcionales
     */
    protected $Opcionales = null;

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
     */
    public function __construct($Concepto, $DocTipo, $DocNro, $CbteDesde, $CbteHasta, $ImpTotal, $ImpTotConc, $ImpNeto, $ImpOpEx, $ImpTrib, $ImpIVA, $MonCotiz)
    {
      $this->Concepto = $Concepto;
      $this->DocTipo = $DocTipo;
      $this->DocNro = $DocNro;
      $this->CbteDesde = $CbteDesde;
      $this->CbteHasta = $CbteHasta;
      $this->ImpTotal = $ImpTotal;
      $this->ImpTotConc = $ImpTotConc;
      $this->ImpNeto = $ImpNeto;
      $this->ImpOpEx = $ImpOpEx;
      $this->ImpTrib = $ImpTrib;
      $this->ImpIVA = $ImpIVA;
      $this->MonCotiz = $MonCotiz;
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
     * @return \AppBundle\Service\WsAfip\FEDetRequest
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
     * @return \AppBundle\Service\WsAfip\FEDetRequest
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
     * @return \AppBundle\Service\WsAfip\FEDetRequest
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
     * @return \AppBundle\Service\WsAfip\FEDetRequest
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
     * @return \AppBundle\Service\WsAfip\FEDetRequest
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
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setCbteFch($CbteFch)
    {
      $this->CbteFch = $CbteFch;
      return $this;
    }

    /**
     * @return float
     */
    public function getImpTotal()
    {
      return $this->ImpTotal;
    }

    /**
     * @param float $ImpTotal
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setImpTotal($ImpTotal)
    {
      $this->ImpTotal = $ImpTotal;
      return $this;
    }

    /**
     * @return float
     */
    public function getImpTotConc()
    {
      return $this->ImpTotConc;
    }

    /**
     * @param float $ImpTotConc
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setImpTotConc($ImpTotConc)
    {
      $this->ImpTotConc = $ImpTotConc;
      return $this;
    }

    /**
     * @return float
     */
    public function getImpNeto()
    {
      return $this->ImpNeto;
    }

    /**
     * @param float $ImpNeto
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setImpNeto($ImpNeto)
    {
      $this->ImpNeto = $ImpNeto;
      return $this;
    }

    /**
     * @return float
     */
    public function getImpOpEx()
    {
      return $this->ImpOpEx;
    }

    /**
     * @param float $ImpOpEx
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setImpOpEx($ImpOpEx)
    {
      $this->ImpOpEx = $ImpOpEx;
      return $this;
    }

    /**
     * @return float
     */
    public function getImpTrib()
    {
      return $this->ImpTrib;
    }

    /**
     * @param float $ImpTrib
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setImpTrib($ImpTrib)
    {
      $this->ImpTrib = $ImpTrib;
      return $this;
    }

    /**
     * @return float
     */
    public function getImpIVA()
    {
      return $this->ImpIVA;
    }

    /**
     * @param float $ImpIVA
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setImpIVA($ImpIVA)
    {
      $this->ImpIVA = $ImpIVA;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchServDesde()
    {
      return $this->FchServDesde;
    }

    /**
     * @param string $FchServDesde
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setFchServDesde($FchServDesde)
    {
      $this->FchServDesde = $FchServDesde;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchServHasta()
    {
      return $this->FchServHasta;
    }

    /**
     * @param string $FchServHasta
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setFchServHasta($FchServHasta)
    {
      $this->FchServHasta = $FchServHasta;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchVtoPago()
    {
      return $this->FchVtoPago;
    }

    /**
     * @param string $FchVtoPago
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setFchVtoPago($FchVtoPago)
    {
      $this->FchVtoPago = $FchVtoPago;
      return $this;
    }

    /**
     * @return string
     */
    public function getMonId()
    {
      return $this->MonId;
    }

    /**
     * @param string $MonId
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setMonId($MonId)
    {
      $this->MonId = $MonId;
      return $this;
    }

    /**
     * @return float
     */
    public function getMonCotiz()
    {
      return $this->MonCotiz;
    }

    /**
     * @param float $MonCotiz
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setMonCotiz($MonCotiz)
    {
      $this->MonCotiz = $MonCotiz;
      return $this;
    }

    /**
     * @return ArrayOfCbteAsoc
     */
    public function getCbtesAsoc()
    {
      return $this->CbtesAsoc;
    }

    /**
     * @param ArrayOfCbteAsoc $CbtesAsoc
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setCbtesAsoc($CbtesAsoc)
    {
      $this->CbtesAsoc = $CbtesAsoc;
      return $this;
    }

    /**
     * @return ArrayOfTributo
     */
    public function getTributos()
    {
      return $this->Tributos;
    }

    /**
     * @param ArrayOfTributo $Tributos
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setTributos($Tributos)
    {
      $this->Tributos = $Tributos;
      return $this;
    }

    /**
     * @return ArrayOfAlicIva
     */
    public function getIva()
    {
      return $this->Iva;
    }

    /**
     * @param ArrayOfAlicIva $Iva
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setIva($Iva)
    {
      $this->Iva = $Iva;
      return $this;
    }

    /**
     * @return ArrayOfOpcional
     */
    public function getOpcionales()
    {
      return $this->Opcionales;
    }

    /**
     * @param ArrayOfOpcional $Opcionales
     * @return \AppBundle\Service\WsAfip\FEDetRequest
     */
    public function setOpcionales($Opcionales)
    {
      $this->Opcionales = $Opcionales;
      return $this;
    }

}
