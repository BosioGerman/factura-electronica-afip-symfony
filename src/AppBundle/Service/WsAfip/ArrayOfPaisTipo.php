<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfPaisTipo
{

    /**
     * @var PaisTipo[] $PaisTipo
     */
    protected $PaisTipo = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return PaisTipo[]
     */
    public function getPaisTipo()
    {
      return $this->PaisTipo;
    }

    /**
     * @param PaisTipo[] $PaisTipo
     * @return \AppBundle\Service\WsAfip\ArrayOfPaisTipo
     */
    public function setPaisTipo(array $PaisTipo = null)
    {
      $this->PaisTipo = $PaisTipo;
      return $this;
    }

}
