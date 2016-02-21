<?php

namespace AppBundle\Service\WsAfip;

class FECAEARegInformativo
{

    /**
     * @var FEAuthRequest $Auth
     */
    protected $Auth = null;

    /**
     * @var FECAEARequest $FeCAEARegInfReq
     */
    protected $FeCAEARegInfReq = null;

    /**
     * @param FEAuthRequest $Auth
     * @param FECAEARequest $FeCAEARegInfReq
     */
    public function __construct($Auth, $FeCAEARegInfReq)
    {
      $this->Auth = $Auth;
      $this->FeCAEARegInfReq = $FeCAEARegInfReq;
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
     * @return \AppBundle\Service\WsAfip\FECAEARegInformativo
     */
    public function setAuth($Auth)
    {
      $this->Auth = $Auth;
      return $this;
    }

    /**
     * @return FECAEARequest
     */
    public function getFeCAEARegInfReq()
    {
      return $this->FeCAEARegInfReq;
    }

    /**
     * @param FECAEARequest $FeCAEARegInfReq
     * @return \AppBundle\Service\WsAfip\FECAEARegInformativo
     */
    public function setFeCAEARegInfReq($FeCAEARegInfReq)
    {
      $this->FeCAEARegInfReq = $FeCAEARegInfReq;
      return $this;
    }

}
