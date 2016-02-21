<?php

namespace AppBundle\Service\WsAfip;

class FECAEASolicitar
{

    /**
     * @var FEAuthRequest $Auth
     */
    protected $Auth = null;

    /**
     * @var int $Periodo
     */
    protected $Periodo = null;

    /**
     * @var int $Orden
     */
    protected $Orden = null;

    /**
     * @param FEAuthRequest $Auth
     * @param int $Periodo
     * @param int $Orden
     */
    public function __construct($Auth, $Periodo, $Orden)
    {
      $this->Auth = $Auth;
      $this->Periodo = $Periodo;
      $this->Orden = $Orden;
    }

    /**
     * @return FEAuthRequest
     */
    public function getAuth()
    {
      return $this->Auth;
    }

    /**
     * @param FEAuthRequest $Auth
     * @return \AppBundle\Service\WsAfip\FECAEASolicitar
     */
    public function setAuth($Auth)
    {
      $this->Auth = $Auth;
      return $this;
    }

    /**
     * @return int
     */
    public function getPeriodo()
    {
      return $this->Periodo;
    }

    /**
     * @param int $Periodo
     * @return \AppBundle\Service\WsAfip\FECAEASolicitar
     */
    public function setPeriodo($Periodo)
    {
      $this->Periodo = $Periodo;
      return $this;
    }

    /**
     * @return int
     */
    public function getOrden()
    {
      return $this->Orden;
    }

    /**
     * @param int $Orden
     * @return \AppBundle\Service\WsAfip\FECAEASolicitar
     */
    public function setOrden($Orden)
    {
      $this->Orden = $Orden;
      return $this;
    }

}
