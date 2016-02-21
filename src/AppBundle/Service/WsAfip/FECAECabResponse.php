<?php

namespace AppBundle\Service\WsAfip;

class FECAECabResponse extends FECabResponse
{

    /**
     * @param int $Cuit
     * @param int $PtoVta
     * @param int $CbteTipo
     * @param int $CantReg
     */
    public function __construct($Cuit, $PtoVta, $CbteTipo, $CantReg)
    {
      parent::__construct($Cuit, $PtoVta, $CbteTipo, $CantReg);
    }

}
