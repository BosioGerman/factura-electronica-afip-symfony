<?php

namespace AppBundle\Service\WsAfip;

class FECAEADetResponse extends FEDetResponse
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
     */
    public function __construct($Concepto, $DocTipo, $DocNro, $CbteDesde, $CbteHasta)
    {
      parent::__construct($Concepto, $DocTipo, $DocNro, $CbteDesde, $CbteHasta);
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
     * @return \AppBundle\Service\WsAfip\FECAEADetResponse
     */
    public function setCAEA($CAEA)
    {
      $this->CAEA = $CAEA;
      return $this;
    }

}
