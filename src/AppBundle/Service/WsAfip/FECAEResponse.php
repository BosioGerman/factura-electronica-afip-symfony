<?php

namespace AppBundle\Service\WsAfip;

class FECAEResponse
{

    /**
     * @var FECAECabResponse $FeCabResp
     */
    protected $FeCabResp = null;

    /**
     * @var ArrayOfFECAEDetResponse $FeDetResp
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
     * @return FECAECabResponse
     */
    public function getFeCabResp()
    {
      return $this->FeCabResp;
    }

    /**
     * @param FECAECabResponse $FeCabResp
     * @return \AppBundle\Service\WsAfip\FECAEResponse
     */
    public function setFeCabResp($FeCabResp)
    {
      $this->FeCabResp = $FeCabResp;
      return $this;
    }

    /**
     * @return ArrayOfFECAEDetResponse
     */
    public function getFeDetResp()
    {
      return $this->FeDetResp;
    }

    /**
     * @param ArrayOfFECAEDetResponse $FeDetResp
     * @return \AppBundle\Service\WsAfip\FECAEResponse
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
     * @return \AppBundle\Service\WsAfip\FECAEResponse
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
     * @return \AppBundle\Service\WsAfip\FECAEResponse
     */
    public function setErrors($Errors)
    {
      $this->Errors = $Errors;
      return $this;
    }

}
