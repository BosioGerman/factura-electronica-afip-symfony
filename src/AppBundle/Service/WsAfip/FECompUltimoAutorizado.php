<?php

namespace AppBundle\Service\WsAfip;

class FECompUltimoAutorizado
{

    /**
     * @var FEAuthRequest $Auth
     */
    protected $Auth = null;

    /**
     * @var int $PtoVta
     */
    protected $PtoVta = null;

    /**
     * @var int $CbteTipo
     */
    protected $CbteTipo = null;

    /**
     * @param FEAuthRequest $Auth
     * @param int $PtoVta
     * @param int $CbteTipo
     */
    public function __construct($Auth, $PtoVta, $CbteTipo)
    {
      $this->Auth = $Auth;
      $this->PtoVta = $PtoVta;
      $this->CbteTipo = $CbteTipo;
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
     * @return \AppBundle\Service\WsAfip\FECompUltimoAutorizado
     */
    public function setAuth($Auth)
    {
      $this->Auth = $Auth;
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
     * @return \AppBundle\Service\WsAfip\FECompUltimoAutorizado
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
     * @return \AppBundle\Service\WsAfip\FECompUltimoAutorizado
     */
    public function setCbteTipo($CbteTipo)
    {
      $this->CbteTipo = $CbteTipo;
      return $this;
    }

}
