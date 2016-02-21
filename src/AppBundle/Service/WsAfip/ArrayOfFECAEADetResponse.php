<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfFECAEADetResponse
{

    /**
     * @var FECAEADetResponse[] $FECAEADetResponse
     */
    protected $FECAEADetResponse = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FECAEADetResponse[]
     */
    public function getFECAEADetResponse()
    {
      return $this->FECAEADetResponse;
    }

    /**
     * @param FECAEADetResponse[] $FECAEADetResponse
     * @return \AppBundle\Service\WsAfip\ArrayOfFECAEADetResponse
     */
    public function setFECAEADetResponse(array $FECAEADetResponse = null)
    {
      $this->FECAEADetResponse = $FECAEADetResponse;
      return $this;
    }

}
