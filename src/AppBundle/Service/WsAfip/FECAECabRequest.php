<?php

namespace AppBundle\Service\WsAfip;

class FECAECabRequest extends FECabRequest
{

    /**
     * @param int $CantReg
     * @param int $PtoVta
     * @param int $CbteTipo
     */
    public function __construct($CantReg, $PtoVta, $CbteTipo)
    {
      parent::__construct($CantReg, $PtoVta, $CbteTipo);
    }

}
