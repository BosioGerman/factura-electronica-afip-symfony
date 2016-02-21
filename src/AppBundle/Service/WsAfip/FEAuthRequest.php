<?php

namespace AppBundle\Service\WsAfip;

class FEAuthRequest
{

    /**
     * @var string $Token
     */
    protected $Token = null;

    /**
     * @var string $Sign
     */
    protected $Sign = null;

    /**
     * @var int $Cuit
     */
    protected $Cuit = null;

    /**
     * @param int $Cuit
     */
    public function __construct($Cuit)
    {
      $this->Cuit = $Cuit;
    }

    /**
     * @return string
     */
    public function getToken()
    {
      return $this->Token;
    }

    /**
     * @param string $Token
     * @return \AppBundle\Service\WsAfip\FEAuthRequest
     */
    public function setToken($Token)
    {
      $this->Token = $Token;
      return $this;
    }

    /**
     * @return string
     */
    public function getSign()
    {
      return $this->Sign;
    }

    /**
     * @param string $Sign
     * @return \AppBundle\Service\WsAfip\FEAuthRequest
     */
    public function setSign($Sign)
    {
      $this->Sign = $Sign;
      return $this;
    }

    /**
     * @return int
     */
    public function getCuit()
    {
      return $this->Cuit;
    }

    /**
     * @param int $Cuit
     * @return \AppBundle\Service\WsAfip\FEAuthRequest
     */
    public function setCuit($Cuit)
    {
      $this->Cuit = $Cuit;
      return $this;
    }

}
