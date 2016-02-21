<?php

namespace AppBundle\Service\WsAfip;

class FECAEASinMovResponse extends FECAEASinMov
{

    /**
     * @var string $Resultado
     */
    protected $Resultado = null;

    /**
     * @var ArrayOfErr $Errors
     */
    protected $Errors = null;

    /**
     * @var ArrayOfEvt $Events
     */
    protected $Events = null;

    /**
     * @param int $PtoVta
     */
    public function __construct($PtoVta)
    {
      parent::__construct($PtoVta);
    }

    /**
     * @return string
     */
    public function getResultado()
    {
      return $this->Resultado;
    }

    /**
     * @param string $Resultado
     * @return \AppBundle\Service\WsAfip\FECAEASinMovResponse
     */
    public function setResultado($Resultado)
    {
      $this->Resultado = $Resultado;
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
     * @return \AppBundle\Service\WsAfip\FECAEASinMovResponse
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
     * @return \AppBundle\Service\WsAfip\FECAEASinMovResponse
     */
    public function setEvents($Events)
    {
      $this->Events = $Events;
      return $this;
    }

}
