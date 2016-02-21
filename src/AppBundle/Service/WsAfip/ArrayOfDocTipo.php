<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfDocTipo
{

    /**
     * @var DocTipo[] $DocTipo
     */
    protected $DocTipo = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return DocTipo[]
     */
    public function getDocTipo()
    {
      return $this->DocTipo;
    }

    /**
     * @param DocTipo[] $DocTipo
     * @return \AppBundle\Service\WsAfip\ArrayOfDocTipo
     */
    public function setDocTipo(array $DocTipo = null)
    {
      $this->DocTipo = $DocTipo;
      return $this;
    }

}
