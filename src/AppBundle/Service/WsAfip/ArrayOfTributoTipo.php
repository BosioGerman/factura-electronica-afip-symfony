<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfTributoTipo
{

    /**
     * @var TributoTipo[] $TributoTipo
     */
    protected $TributoTipo = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return TributoTipo[]
     */
    public function getTributoTipo()
    {
      return $this->TributoTipo;
    }

    /**
     * @param TributoTipo[] $TributoTipo
     * @return \AppBundle\Service\WsAfip\ArrayOfTributoTipo
     */
    public function setTributoTipo(array $TributoTipo = null)
    {
      $this->TributoTipo = $TributoTipo;
      return $this;
    }

}
