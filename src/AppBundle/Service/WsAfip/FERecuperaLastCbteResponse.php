<?php

namespace AppBundle\Service\WsAfip;

class FERecuperaLastCbteResponse
{

    /**
     * @var ArrayOfErr $Errors
     */
    protected $Errors = null;

    /**
     * @var int $PtoVta
     */
    protected $PtoVta = null;

    /**
     * @var int $CbteTipo
     */
    protected $CbteTipo = null;

    /**
     * @var int $CbteNro
     */
    protected $CbteNro = null;

    /**
     * @var ArrayOfEvt $Events
     */
    protected $Events = null;

    /**
     * @param int $PtoVta
     * @param int $CbteTipo
     * @param int $CbteNro
     */
    public function __construct($PtoVta, $CbteTipo, $CbteNro)
    {
      $this->PtoVta = $PtoVta;
      $this->CbteTipo = $CbteTipo;
      $this->CbteNro = $CbteNro;
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
     * @return \AppBundle\Service\WsAfip\FERecuperaLastCbteResponse
     */
    public function setErrors($Errors)
    {
      $this->Errors = $Errors;
      return $this;
    }

    /**
     * @return int
     */
    public function getPtoVta()
    {
      return $this->PtoVta;
    }

    /**
     * @param int $PtoVta
     * @return \AppBundle\Service\WsAfip\FERecuperaLastCbteResponse
     */
    public function setPtoVta($PtoVta)
    {
      $this->PtoVta = $PtoVta;
      return $this;
    }

    /**
     * @return int
     */
    public function getCbteTipo()
    {
      return $this->CbteTipo;
    }

    /**
     * @param int $CbteTipo
     * @return \AppBundle\Service\WsAfip\FERecuperaLastCbteResponse
     */
    public function setCbteTipo($CbteTipo)
    {
      $this->CbteTipo = $CbteTipo;
      return $this;
    }

    /**
     * @return int
     */
    public function getCbteNro()
    {
      return $this->CbteNro;
    }

    /**
     * @param int $CbteNro
     * @return \AppBundle\Service\WsAfip\FERecuperaLastCbteResponse
     */
    public function setCbteNro($CbteNro)
    {
      $this->CbteNro = $CbteNro;
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
     * @return \AppBundle\Service\WsAfip\FERecuperaLastCbteResponse
     */
    public function setEvents($Events)
    {
      $this->Events = $Events;
      return $this;
    }

}
