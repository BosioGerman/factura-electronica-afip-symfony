<?php

namespace AppBundle\Service\WsAfip;

class FECAEARequest
{

    /**
     * @var FECAEACabRequest $FeCabReq
     */
    protected $FeCabReq = null;

    /**
     * @var ArrayOfFECAEADetRequest $FeDetReq
     */
    protected $FeDetReq = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FECAEACabRequest
     */
    public function getFeCabReq()
    {
      return $this->FeCabReq;
    }

    /**
     * @param FECAEACabRequest $FeCabReq
     * @return \AppBundle\Service\WsAfip\FECAEARequest
     */
    public function setFeCabReq($FeCabReq)
    {
      $this->FeCabReq = $FeCabReq;
      return $this;
    }

    /**
     * @return ArrayOfFECAEADetRequest
     */
    public function getFeDetReq()
    {
      return $this->FeDetReq;
    }

    /**
     * @param ArrayOfFECAEADetRequest $FeDetReq
     * @return \AppBundle\Service\WsAfip\FECAEARequest
     */
    public function setFeDetReq($FeDetReq)
    {
      $this->FeDetReq = $FeDetReq;
      return $this;
    }

}
