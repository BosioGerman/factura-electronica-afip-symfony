<?php

namespace AppBundle\Service\WsAfip;

class FECAEASinMovimientoConsultar
{

    /**
     * @var FEAuthRequest $Auth
     */
    protected $Auth = null;

    /**
     * @var string $CAEA
     */
    protected $CAEA = null;

    /**
     * @var int $PtoVta
     */
    protected $PtoVta = null;

    /**
     * @param FEAuthRequest $Auth
     * @param string $CAEA
     * @param int $PtoVta
     */
    public function __construct($Auth, $CAEA, $PtoVta)
    {
      $this->Auth = $Auth;
      $this->CAEA = $CAEA;
      $this->PtoVta = $PtoVta;
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
     * @return \AppBundle\Service\WsAfip\FECAEASinMovimientoConsultar
     */
    public function setAuth($Auth)
    {
      $this->Auth = $Auth;
      return $this;
    }

    /**
     * @return string
     */
    public function getCAEA()
    {
      return $this->CAEA;
    }

    /**
     * @param string $CAEA
     * @return \AppBundle\Service\WsAfip\FECAEASinMovimientoConsultar
     */
    public function setCAEA($CAEA)
    {
      $this->CAEA = $CAEA;
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
     * @return \AppBundle\Service\WsAfip\FECAEASinMovimientoConsultar
     */
    public function setPtoVta($PtoVta)
    {
      $this->PtoVta = $PtoVta;
      return $this;
    }

}
