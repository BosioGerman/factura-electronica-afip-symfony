<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfOpcional
{

    /**
     * @var Opcional[] $Opcional
     */
    protected $Opcional = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Opcional[]
     */
    public function getOpcional()
    {
      return $this->Opcional;
    }

    /**
     * @param Opcional[] $Opcional
     * @return \AppBundle\Service\WsAfip\ArrayOfOpcional
     */
    public function setOpcional(array $Opcional = null)
    {
      $this->Opcional = $Opcional;
      return $this;
    }

}
