<?php

namespace AppBundle\Service\WsAfip;

class AlicIva
{

    /**
     * @var int $Id
     */
    protected $Id = null;

    /**
     * @var float $BaseImp
     */
    protected $BaseImp = null;

    /**
     * @var float $Importe
     */
    protected $Importe = null;

    /**
     * @param int $Id
     * @param float $BaseImp
     * @param float $Importe
     */
    public function __construct($Id, $BaseImp, $Importe)
    {
      $this->Id = $Id;
      $this->BaseImp = $BaseImp;
      $this->Importe = $Importe;
    }

    /**
     * @return int
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param int $Id
     * @return \AppBundle\Service\WsAfip\AlicIva
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return float
     */
    public function getBaseImp()
    {
      return $this->BaseImp;
    }

    /**
     * @param float $BaseImp
     * @return \AppBundle\Service\WsAfip\AlicIva
     */
    public function setBaseImp($BaseImp)
    {
      $this->BaseImp = $BaseImp;
      return $this;
    }

    /**
     * @return float
     */
    public function getImporte()
    {
      return $this->Importe;
    }

    /**
     * @param float $Importe
     * @return \AppBundle\Service\WsAfip\AlicIva
     */
    public function setImporte($Importe)
    {
      $this->Importe = $Importe;
      return $this;
    }

}
