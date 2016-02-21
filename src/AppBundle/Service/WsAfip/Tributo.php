<?php

namespace AppBundle\Service\WsAfip;

class Tributo
{

    /**
     * @var int $Id
     */
    protected $Id = null;

    /**
     * @var string $Desc
     */
    protected $Desc = null;

    /**
     * @var float $BaseImp
     */
    protected $BaseImp = null;

    /**
     * @var float $Alic
     */
    protected $Alic = null;

    /**
     * @var float $Importe
     */
    protected $Importe = null;

    /**
     * @param int $Id
     * @param float $BaseImp
     * @param float $Alic
     * @param float $Importe
     */
    public function __construct($Id, $BaseImp, $Alic, $Importe)
    {
      $this->Id = $Id;
      $this->BaseImp = $BaseImp;
      $this->Alic = $Alic;
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
     * @return \AppBundle\Service\WsAfip\Tributo
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return string
     */
    public function getDesc()
    {
      return $this->Desc;
    }

    /**
     * @param string $Desc
     * @return \AppBundle\Service\WsAfip\Tributo
     */
    public function setDesc($Desc)
    {
      $this->Desc = $Desc;
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
     * @return \AppBundle\Service\WsAfip\Tributo
     */
    public function setBaseImp($BaseImp)
    {
      $this->BaseImp = $BaseImp;
      return $this;
    }

    /**
     * @return float
     */
    public function getAlic()
    {
      return $this->Alic;
    }

    /**
     * @param float $Alic
     * @return \AppBundle\Service\WsAfip\Tributo
     */
    public function setAlic($Alic)
    {
      $this->Alic = $Alic;
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
     * @return \AppBundle\Service\WsAfip\Tributo
     */
    public function setImporte($Importe)
    {
      $this->Importe = $Importe;
      return $this;
    }

}
