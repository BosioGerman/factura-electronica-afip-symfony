<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfAlicIva
{

    /**
     * @var AlicIva[] $AlicIva
     */
    protected $AlicIva = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return AlicIva[]
     */
    public function getAlicIva()
    {
      return $this->AlicIva;
    }

    /**
     * @param AlicIva[] $AlicIva
     * @return \AppBundle\Service\WsAfip\ArrayOfAlicIva
     */
    public function setAlicIva(array $AlicIva = null)
    {
      $this->AlicIva = $AlicIva;
      return $this;
    }

}
