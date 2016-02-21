<?php

namespace AppBundle\Service\WsAfip;

class FECompConsultar
{

    /**
     * @var FEAuthRequest $Auth
     */
    protected $Auth = null;

    /**
     * @var FECompConsultaReq $FeCompConsReq
     */
    protected $FeCompConsReq = null;

    /**
     * @param FEAuthRequest $Auth
     * @param FECompConsultaReq $FeCompConsReq
     */
    public function __construct($Auth, $FeCompConsReq)
    {
      $this->Auth = $Auth;
      $this->FeCompConsReq = $FeCompConsReq;
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
     * @return \AppBundle\Service\WsAfip\FECompConsultar
     */
    public function setAuth($Auth)
    {
      $this->Auth = $Auth;
      return $this;
    }

    /**
     * @return FECompConsultaReq
     */
    public function getFeCompConsReq()
    {
      return $this->FeCompConsReq;
    }

    /**
     * @param FECompConsultaReq $FeCompConsReq
     * @return \AppBundle\Service\WsAfip\FECompConsultar
     */
    public function setFeCompConsReq($FeCompConsReq)
    {
      $this->FeCompConsReq = $FeCompConsReq;
      return $this;
    }

}
