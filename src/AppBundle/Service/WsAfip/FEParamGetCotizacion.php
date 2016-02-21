<?php

namespace AppBundle\Service\WsAfip;

class FEParamGetCotizacion
{

    /**
     * @var FEAuthRequest $Auth
     */
    protected $Auth = null;

    /**
     * @var string $MonId
     */
    protected $MonId = null;

    /**
     * @param FEAuthRequest $Auth
     * @param string $MonId
     */
    public function __construct($Auth, $MonId)
    {
      $this->Auth = $Auth;
      $this->MonId = $MonId;
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
     * @return \AppBundle\Service\WsAfip\FEParamGetCotizacion
     */
    public function setAuth($Auth)
    {
      $this->Auth = $Auth;
      return $this;
    }

    /**
     * @return string
     */
    public function getMonId()
    {
      return $this->MonId;
    }

    /**
     * @param string $MonId
     * @return \AppBundle\Service\WsAfip\FEParamGetCotizacion
     */
    public function setMonId($MonId)
    {
      $this->MonId = $MonId;
      return $this;
    }

}
