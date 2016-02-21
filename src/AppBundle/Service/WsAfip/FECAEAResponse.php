<?php

namespace AppBundle\Service\WsAfip;

class FECAEAResponse
{

    /**
     * @var FECAEACabResponse $FeCabResp
     */
    protected $FeCabResp = null;

    /**
     * @var ArrayOfFECAEADetResponse $FeDetResp
     */
    protected $FeDetResp = null;

    /**
     * @var ArrayOfEvt $Events
     */
    protected $Events = null;

    /**
     * @var ArrayOfErr $Errors
     */
    protected $Errors = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return FECAEACabResponse
     */
    public function getFeCabResp()
    {
      return $this->FeCabResp;
    }

    /**
     * @param FECAEACabResponse $FeCabResp
     * @return \AppBundle\Service\WsAfip\FECAEAResponse
     */
    public function setFeCabResp($FeCabResp)
    {
      $this->FeCabResp = $FeCabResp;
      return $this;
    }

    /**
     * @return ArrayOfFECAEADetResponse
     */
    public function getFeDetResp()
    {
      return $this->FeDetResp;
    }

    /**
     * @param ArrayOfFECAEADetResponse $FeDetResp
     * @return \AppBundle\Service\WsAfip\FECAEAResponse
     */
    public function setFeDetResp($FeDetResp)
    {
      $this->FeDetResp = $FeDetResp;
      return $this;
    }

    /**
     * @return ArrayOfEvt
     */
    public function getEvents()
    {
      return $this->Events;
    }

    /**
     * @param ArrayOfEvt $Events
     * @return \AppBundle\Service\WsAfip\FECAEAResponse
     */
    public function setEvents($Events)
    {
      $this->Events = $Events;
      return $this;
    }

    /**
     * @return ArrayOfErr
     */
    public function getErrors()
    {
      return $this->Errors;
    }

    /**
     * @param ArrayOfErr $Errors
     * @return \AppBundle\Service\WsAfip\FECAEAResponse
     */
    public function setErrors($Errors)
    {
      $this->Errors = $Errors;
      return $this;
    }

}
