<?php

namespace AppBundle\Service\WsAfip;

class FECAEADetRequest extends FEDetRequest
{

    /**
     * @var string $CAEA
     */
    protected $CAEA = null;

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
      parent::__construct($Concepto, $DocTipo, $DocNro, $CbteDesde, $CbteHasta, $ImpTotal, $ImpTotConc, $ImpNeto, $ImpOpEx, $ImpTrib, $ImpIVA, $MonCotiz);
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
     * @return \AppBundle\Service\WsAfip\FECAEADetRequest
     */
    public function setCAEA($CAEA)
    {
      $this->CAEA = $CAEA;
      return $this;
    }

}
