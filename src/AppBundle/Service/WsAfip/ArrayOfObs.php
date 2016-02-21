<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfObs
{

    /**
     * @var Obs[] $Obs
     */
    protected $Obs = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Obs[]
     */
    public function getObs()
    {
      return $this->Obs;
    }

    /**
     * @param Obs[] $Obs
     * @return \AppBundle\Service\WsAfip\ArrayOfObs
     */
    public function setObs(array $Obs = null)
    {
      $this->Obs = $Obs;
      return $this;
    }

}
