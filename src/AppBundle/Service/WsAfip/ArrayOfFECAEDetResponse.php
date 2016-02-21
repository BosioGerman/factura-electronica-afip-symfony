<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfFECAEDetResponse
{

    /**
     * @var FECAEDetResponse[] $FECAEDetResponse
     */
    protected $FECAEDetResponse = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FECAEDetResponse[]
     */
    public function getFECAEDetResponse()
    {
      return $this->FECAEDetResponse;
    }

    /**
     * @param FECAEDetResponse[] $FECAEDetResponse
     * @return \AppBundle\Service\WsAfip\ArrayOfFECAEDetResponse
     */
    public function setFECAEDetResponse(array $FECAEDetResponse = null)
    {
      $this->FECAEDetResponse = $FECAEDetResponse;
      return $this;
    }

}
