<?php

namespace AppBundle\Service\WsAfip;

class OpcionalTipoResponse
{

    /**
     * @var ArrayOfOpcionalTipo $ResultGet
     */
    protected $ResultGet = null;

    /**
     * @var ArrayOfErr $Errors
     */
    protected $Errors = null;

    /**
     * @var ArrayOfEvt $Events
     */
    protected $Events = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return ArrayOfOpcionalTipo
     */
    public function getResultGet()
    {
      return $this->ResultGet;
    }

    /**
     * @param ArrayOfOpcionalTipo $ResultGet
     * @return \AppBundle\Service\WsAfip\OpcionalTipoResponse
     */
    public function setResultGet($ResultGet)
    {
      $this->ResultGet = $ResultGet;
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
     * @return \AppBundle\Service\WsAfip\OpcionalTipoResponse
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
     * @return \AppBundle\Service\WsAfip\OpcionalTipoResponse
     */
    public function setEvents($Events)
    {
      $this->Events = $Events;
      return $this;
    }

}
