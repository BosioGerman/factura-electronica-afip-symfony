<?php

namespace AppBundle\Service\WsAfip;

class FECAERequest
{

    /**
     * @var FECAECabRequest $FeCabReq
     */
    protected $FeCabReq = null;

    /**
     * @var ArrayOfFECAEDetRequest $FeDetReq
     */
    protected $FeDetReq = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FECAECabRequest
     */
    public function getFeCabReq()
    {
      return $this->FeCabReq;
    }

    /**
     * @param FECAECabRequest $FeCabReq
     * @return \AppBundle\Service\WsAfip\FECAERequest
     */
    public function setFeCabReq($FeCabReq)
    {
      $this->FeCabReq = $FeCabReq;
      return $this;
    }

    /**
     * @return ArrayOfFECAEDetRequest
     */
    public function getFeDetReq()
    {
      return $this->FeDetReq;
    }

    /**
     * @param ArrayOfFECAEDetRequest $FeDetReq
     * @return \AppBundle\Service\WsAfip\FECAERequest
     */
    public function setFeDetReq($FeDetReq)
    {
      $this->FeDetReq = $FeDetReq;
      return $this;
    }

}
