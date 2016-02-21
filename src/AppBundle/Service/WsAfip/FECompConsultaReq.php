<?php

namespace AppBundle\Service\WsAfip;

class FECompConsultaReq
{

    /**
     * @var int $CbteTipo
     */
    protected $CbteTipo = null;

    /**
     * @var int $CbteNro
     */
    protected $CbteNro = null;

    /**
     * @var int $PtoVta
     */
    protected $PtoVta = null;

    /**
     * @param int $CbteTipo
     * @param int $CbteNro
     * @param int $PtoVta
     */
    public function __construct($CbteTipo, $CbteNro, $PtoVta)
    {
      $this->CbteTipo = $CbteTipo;
      $this->CbteNro = $CbteNro;
      $this->PtoVta = $PtoVta;
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
     * @return \AppBundle\Service\WsAfip\FECompConsultaReq
     */
    public function setCbteTipo($CbteTipo)
    {
      $this->CbteTipo = $CbteTipo;
      return $this;
    }

    /**
     * @return int
     */
    public function getCbteNro()
    {
      return $this->CbteNro;
    }

    /**
     * @param int $CbteNro
     * @return \AppBundle\Service\WsAfip\FECompConsultaReq
     */
    public function setCbteNro($CbteNro)
    {
      $this->CbteNro = $CbteNro;
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
     * @return \AppBundle\Service\WsAfip\FECompConsultaReq
     */
    public function setPtoVta($PtoVta)
    {
      $this->PtoVta = $PtoVta;
      return $this;
    }

}
