<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfFECAEDetRequest
{

    /**
     * @var FECAEDetRequest[] $FECAEDetRequest
     */
    protected $FECAEDetRequest = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FECAEDetRequest[]
     */
    public function getFECAEDetRequest()
    {
      return $this->FECAEDetRequest;
    }

    /**
     * @param FECAEDetRequest[] $FECAEDetRequest
     * @return \AppBundle\Service\WsAfip\ArrayOfFECAEDetRequest
     */
    public function setFECAEDetRequest(array $FECAEDetRequest = null)
    {
      $this->FECAEDetRequest = $FECAEDetRequest;
      return $this;
    }

}
