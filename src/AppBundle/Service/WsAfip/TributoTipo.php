<?php

namespace AppBundle\Service\WsAfip;

class TributoTipo
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
     * @var string $FchDesde
     */
    protected $FchDesde = null;

    /**
     * @var string $FchHasta
     */
    protected $FchHasta = null;

    /**
     * @param int $Id
     */
    public function __construct($Id)
    {
      $this->Id = $Id;
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
     * @return \AppBundle\Service\WsAfip\TributoTipo
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
     * @return \AppBundle\Service\WsAfip\TributoTipo
     */
    public function setDesc($Desc)
    {
      $this->Desc = $Desc;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchDesde()
    {
      return $this->FchDesde;
    }

    /**
     * @param string $FchDesde
     * @return \AppBundle\Service\WsAfip\TributoTipo
     */
    public function setFchDesde($FchDesde)
    {
      $this->FchDesde = $FchDesde;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchHasta()
    {
      return $this->FchHasta;
    }

    /**
     * @param string $FchHasta
     * @return \AppBundle\Service\WsAfip\TributoTipo
     */
    public function setFchHasta($FchHasta)
    {
      $this->FchHasta = $FchHasta;
      return $this;
    }

}
