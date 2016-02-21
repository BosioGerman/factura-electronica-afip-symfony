<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfMoneda
{

    /**
     * @var Moneda[] $Moneda
     */
    protected $Moneda = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Moneda[]
     */
    public function getMoneda()
    {
      return $this->Moneda;
    }

    /**
     * @param Moneda[] $Moneda
     * @return \AppBundle\Service\WsAfip\ArrayOfMoneda
     */
    public function setMoneda(array $Moneda = null)
    {
      $this->Moneda = $Moneda;
      return $this;
    }

}
