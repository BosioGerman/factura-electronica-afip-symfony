<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetTiposCbte
{

    /**
     * @var FEAuthRequest $Auth
     */
    protected $Auth = null;

    /**
     * @param FEAuthRequest $Auth
     */
    public function __construct($Auth)
    {
      $this->Auth = $Auth;
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
     * @return \AppBundle\Service\WsAfip\FEParamGetTiposCbte
     */
    public function setAuth($Auth)
    {
      $this->Auth = $Auth;
      return $this;
    }

}
