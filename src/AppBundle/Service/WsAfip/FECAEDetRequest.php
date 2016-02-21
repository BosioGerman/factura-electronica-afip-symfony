<?php

namespace AppBundle\Service\WsAfip;

class FECAEDetRequest extends FEDetRequest
{

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

    public function __construct2(){

    }
}
