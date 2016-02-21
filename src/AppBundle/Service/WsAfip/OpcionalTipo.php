<?php

namespace AppBundle\Service\WsAfip;

class OpcionalTipo
{

    /**
     * @var string $Id
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

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getId()
    {
      return $this->Id;
    }

    /**
     * @param string $Id
     * @return \AppBundle\Service\WsAfip\OpcionalTipo
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
     * @return \AppBundle\Service\WsAfip\OpcionalTipo
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
     * @return \AppBundle\Service\WsAfip\OpcionalTipo
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
     * @return \AppBundle\Service\WsAfip\OpcionalTipo
     */
    public function setFchHasta($FchHasta)
    {
      $this->FchHasta = $FchHasta;
      return $this;
    }

}
