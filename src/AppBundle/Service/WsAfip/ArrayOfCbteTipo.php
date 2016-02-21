<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfCbteTipo
{

    /**
     * @var CbteTipo[] $CbteTipo
     */
    protected $CbteTipo = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return CbteTipo[]
     */
    public function getCbteTipo()
    {
      return $this->CbteTipo;
    }

    /**
     * @param CbteTipo[] $CbteTipo
     * @return \AppBundle\Service\WsAfip\ArrayOfCbteTipo
     */
    public function setCbteTipo(array $CbteTipo = null)
    {
      $this->CbteTipo = $CbteTipo;
      return $this;
    }

}
