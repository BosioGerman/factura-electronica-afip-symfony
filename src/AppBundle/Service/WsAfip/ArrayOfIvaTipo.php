<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfIvaTipo
{

    /**
     * @var IvaTipo[] $IvaTipo
     */
    protected $IvaTipo = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return IvaTipo[]
     */
    public function getIvaTipo()
    {
      return $this->IvaTipo;
    }

    /**
     * @param IvaTipo[] $IvaTipo
     * @return \AppBundle\Service\WsAfip\ArrayOfIvaTipo
     */
    public function setIvaTipo(array $IvaTipo = null)
    {
      $this->IvaTipo = $IvaTipo;
      return $this;
    }

}
