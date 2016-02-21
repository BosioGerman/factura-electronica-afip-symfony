<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfPtoVenta
{

    /**
     * @var PtoVenta[] $PtoVenta
     */
    protected $PtoVenta = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return PtoVenta[]
     */
    public function getPtoVenta()
    {
      return $this->PtoVenta;
    }

    /**
     * @param PtoVenta[] $PtoVenta
     * @return \AppBundle\Service\WsAfip\ArrayOfPtoVenta
     */
    public function setPtoVenta(array $PtoVenta = null)
    {
      $this->PtoVenta = $PtoVenta;
      return $this;
    }

}
