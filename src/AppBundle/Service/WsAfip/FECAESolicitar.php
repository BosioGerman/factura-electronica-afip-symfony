<?php

namespace AppBundle\Service\WsAfip;

class FECAESolicitar
{

    /**
     * @var FEAuthRequest $Auth
     */
    protected $Auth = null;

    /**
     * @var FECAERequest $FeCAEReq
     */
    protected $FeCAEReq = null;

    /**
     * @param FEAuthRequest $Auth
     * @param FECAERequest $FeCAEReq
     */
    public function __construct($Auth, $FeCAEReq)
    {
      $this->Auth = $Auth;
      $this->FeCAEReq = $FeCAEReq;
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
     * @return \AppBundle\Service\WsAfip\FECAESolicitar
     */
    public function setAuth($Auth)
    {
      $this->Auth = $Auth;
      return $this;
    }

    /**
     * @return FECAERequest
     */
    public function getFeCAEReq()
    {
      return $this->FeCAEReq;
    }

    /**
     * @param FECAERequest $FeCAEReq
     * @return \AppBundle\Service\WsAfip\FECAESolicitar
     */
    public function setFeCAEReq($FeCAEReq)
    {
      $this->FeCAEReq = $FeCAEReq;
      return $this;
    }

}
