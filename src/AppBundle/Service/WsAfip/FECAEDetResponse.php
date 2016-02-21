<?php

namespace AppBundle\Service\WsAfip;

class FECAEDetResponse extends FEDetResponse
{

    /**
     * @var string $CAE
     */
    protected $CAE = null;

    /**
     * @var string $CAEFchVto
     */
    protected $CAEFchVto = null;

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
    public function getCAE()
    {
      return $this->CAE;
    }

    /**
     * @param string $CAE
     * @return \AppBundle\Service\WsAfip\FECAEDetResponse
     */
    public function setCAE($CAE)
    {
      $this->CAE = $CAE;
      return $this;
    }

    /**
     * @return string
     */
    public function getCAEFchVto()
    {
      return $this->CAEFchVto;
    }

    /**
     * @param string $CAEFchVto
     * @return \AppBundle\Service\WsAfip\FECAEDetResponse
     */
    public function setCAEFchVto($CAEFchVto)
    {
      $this->CAEFchVto = $CAEFchVto;
      return $this;
    }

}
