<?php

namespace AppBundle\Service\WsAfip;

class FERegXReqResponse
{

    /**
     * @var int $RegXReq
     */
    protected $RegXReq = null;

    /**
     * @var ArrayOfErr $Errors
     */
    protected $Errors = null;

    /**
     * @var ArrayOfEvt $Events
     */
    protected $Events = null;

    /**
     * @param int $RegXReq
     */
    public function __construct($RegXReq)
    {
      $this->RegXReq = $RegXReq;
    }

    /**
     * @return int
     */
    public function getRegXReq()
    {
      return $this->RegXReq;
    }

    /**
     * @param int $RegXReq
     * @return \AppBundle\Service\WsAfip\FERegXReqResponse
     */
    public function setRegXReq($RegXReq)
    {
      $this->RegXReq = $RegXReq;
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
     * @return \AppBundle\Service\WsAfip\FERegXReqResponse
     */
    public function setErrors($Errors)
    {
      $this->Errors = $Errors;
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
     * @return \AppBundle\Service\WsAfip\FERegXReqResponse
     */
    public function setEvents($Events)
    {
      $this->Events = $Events;
      return $this;
    }

}
