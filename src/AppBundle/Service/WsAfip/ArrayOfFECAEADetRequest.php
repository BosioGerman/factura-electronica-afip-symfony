<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfFECAEADetRequest
{

    /**
     * @var FECAEADetRequest[] $FECAEADetRequest
     */
    protected $FECAEADetRequest = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FECAEADetRequest[]
     */
    public function getFECAEADetRequest()
    {
      return $this->FECAEADetRequest;
    }

    /**
     * @param FECAEADetRequest[] $FECAEADetRequest
     * @return \AppBundle\Service\WsAfip\ArrayOfFECAEADetRequest
     */
    public function setFECAEADetRequest(array $FECAEADetRequest = null)
    {
      $this->FECAEADetRequest = $FECAEADetRequest;
      return $this;
    }

}
