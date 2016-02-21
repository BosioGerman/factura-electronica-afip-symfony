<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfOpcionalTipo
{

    /**
     * @var OpcionalTipo[] $OpcionalTipo
     */
    protected $OpcionalTipo = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return OpcionalTipo[]
     */
    public function getOpcionalTipo()
    {
      return $this->OpcionalTipo;
    }

    /**
     * @param OpcionalTipo[] $OpcionalTipo
     * @return \AppBundle\Service\WsAfip\ArrayOfOpcionalTipo
     */
    public function setOpcionalTipo(array $OpcionalTipo = null)
    {
      $this->OpcionalTipo = $OpcionalTipo;
      return $this;
    }

}
