<?php

namespace AppBundle\Service\WsAfip;

class FECAEASinMov
{

    /**
     * @var string $CAEA
     */
    protected $CAEA = null;

    /**
     * @var string $FchProceso
     */
    protected $FchProceso = null;

    /**
     * @var int $PtoVta
     */
    protected $PtoVta = null;

    /**
     * @param int $PtoVta
     */
    public function __construct($PtoVta)
    {
      $this->PtoVta = $PtoVta;
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
     * @return \AppBundle\Service\WsAfip\FECAEASinMov
     */
    public function setCAEA($CAEA)
    {
      $this->CAEA = $CAEA;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchProceso()
    {
      return $this->FchProceso;
    }

    /**
     * @param string $FchProceso
     * @return \AppBundle\Service\WsAfip\FECAEASinMov
     */
    public function setFchProceso($FchProceso)
    {
      $this->FchProceso = $FchProceso;
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
     * @return \AppBundle\Service\WsAfip\FECAEASinMov
     */
    public function setPtoVta($PtoVta)
    {
      $this->PtoVta = $PtoVta;
      return $this;
    }

}
