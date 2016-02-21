<?php

namespace AppBundle\Service\WsAfip;

class FECabRequest
{

    /**
     * @var int $CantReg
     */
    protected $CantReg = null;

    /**
     * @var int $PtoVta
     */
    protected $PtoVta = null;

    /**
     * @var int $CbteTipo
     */
    protected $CbteTipo = null;

    /**
     * @param int $CantReg
     * @param int $PtoVta
     * @param int $CbteTipo
     */
    public function __construct($CantReg, $PtoVta, $CbteTipo)
    {
      $this->CantReg = $CantReg;
      $this->PtoVta = $PtoVta;
      $this->CbteTipo = $CbteTipo;
    }

    /**
     * @return int
     */
    public function getCantReg()
    {
      return $this->CantReg;
    }

    /**
     * @param int $CantReg
     * @return \AppBundle\Service\WsAfip\FECabRequest
     */
    public function setCantReg($CantReg)
    {
      $this->CantReg = $CantReg;
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
     * @return \AppBundle\Service\WsAfip\FECabRequest
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
     * @return \AppBundle\Service\WsAfip\FECabRequest
     */
    public function setCbteTipo($CbteTipo)
    {
      $this->CbteTipo = $CbteTipo;
      return $this;
    }

}
