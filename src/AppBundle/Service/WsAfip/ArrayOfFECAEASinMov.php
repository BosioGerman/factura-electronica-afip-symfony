<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfFECAEASinMov
{

    /**
     * @var FECAEASinMov[] $FECAEASinMov
     */
    protected $FECAEASinMov = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FECAEASinMov[]
     */
    public function getFECAEASinMov()
    {
      return $this->FECAEASinMov;
    }

    /**
     * @param FECAEASinMov[] $FECAEASinMov
     * @return \AppBundle\Service\WsAfip\ArrayOfFECAEASinMov
     */
    public function setFECAEASinMov(array $FECAEASinMov = null)
    {
      $this->FECAEASinMov = $FECAEASinMov;
      return $this;
    }

}
