<?php

namespace AppBundle\Service\WsAfip;

class FECAEASinMovimientoInformar
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
     * @var string $CAEA
     */
    protected $CAEA = null;

    /**
     * @param FEAuthRequest $Auth
     * @param int $PtoVta
     * @param string $CAEA
     */
    public function __construct($Auth, $PtoVta, $CAEA)
    {
      $this->Auth = $Auth;
      $this->PtoVta = $PtoVta;
      $this->CAEA = $CAEA;
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
     * @return \AppBundle\Service\WsAfip\FECAEASinMovimientoInformar
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
     * @return \AppBundle\Service\WsAfip\FECAEASinMovimientoInformar
     */
    public function setPtoVta($PtoVta)
    {
      $this->PtoVta = $PtoVta;
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
     * @return \AppBundle\Service\WsAfip\FECAEASinMovimientoInformar
     */
    public function setCAEA($CAEA)
    {
      $this->CAEA = $CAEA;
      return $this;
    }

}
