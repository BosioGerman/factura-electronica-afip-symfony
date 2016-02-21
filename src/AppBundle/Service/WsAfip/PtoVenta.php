<?php

namespace AppBundle\Service\WsAfip;

class PtoVenta
{

    /**
     * @var int $Nro
     */
    protected $Nro = null;

    /**
     * @var string $EmisionTipo
     */
    protected $EmisionTipo = null;

    /**
     * @var string $Bloqueado
     */
    protected $Bloqueado = null;

    /**
     * @var string $FchBaja
     */
    protected $FchBaja = null;

    /**
     * @param int $Nro
     */
    public function __construct($Nro)
    {
      $this->Nro = $Nro;
    }

    /**
     * @return int
     */
    public function getNro()
    {
      return $this->Nro;
    }

    /**
     * @param int $Nro
     * @return \AppBundle\Service\WsAfip\PtoVenta
     */
    public function setNro($Nro)
    {
      $this->Nro = $Nro;
      return $this;
    }

    /**
     * @return string
     */
    public function getEmisionTipo()
    {
      return $this->EmisionTipo;
    }

    /**
     * @param string $EmisionTipo
     * @return \AppBundle\Service\WsAfip\PtoVenta
     */
    public function setEmisionTipo($EmisionTipo)
    {
      $this->EmisionTipo = $EmisionTipo;
      return $this;
    }

    /**
     * @return string
     */
    public function getBloqueado()
    {
      return $this->Bloqueado;
    }

    /**
     * @param string $Bloqueado
     * @return \AppBundle\Service\WsAfip\PtoVenta
     */
    public function setBloqueado($Bloqueado)
    {
      $this->Bloqueado = $Bloqueado;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchBaja()
    {
      return $this->FchBaja;
    }

    /**
     * @param string $FchBaja
     * @return \AppBundle\Service\WsAfip\PtoVenta
     */
    public function setFchBaja($FchBaja)
    {
      $this->FchBaja = $FchBaja;
      return $this;
    }

}
