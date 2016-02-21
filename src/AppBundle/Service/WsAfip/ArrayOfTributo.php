<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfTributo
{

    /**
     * @var Tributo[] $Tributo
     */
    protected $Tributo = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Tributo[]
     */
    public function getTributo()
    {
      return $this->Tributo;
    }

    /**
     * @param Tributo[] $Tributo
     * @return \AppBundle\Service\WsAfip\ArrayOfTributo
     */
    public function setTributo(array $Tributo = null)
    {
      $this->Tributo = $Tributo;
      return $this;
    }

}
