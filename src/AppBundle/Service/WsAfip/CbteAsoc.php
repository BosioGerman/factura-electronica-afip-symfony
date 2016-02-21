<?php

namespace AppBundle\Service\WsAfip;

class CbteAsoc
{

    /**
     * @var int $Tipo
     */
    protected $Tipo = null;

    /**
     * @var int $PtoVta
     */
    protected $PtoVta = null;

    /**
     * @var int $Nro
     */
    protected $Nro = null;

    /**
     * @param int $Tipo
     * @param int $PtoVta
     * @param int $Nro
     */
    public function __construct($Tipo, $PtoVta, $Nro)
    {
      $this->Tipo = $Tipo;
      $this->PtoVta = $PtoVta;
      $this->Nro = $Nro;
    }

    /**
     * @return int
     */
    public function getTipo()
    {
      return $this->Tipo;
    }

    /**
     * @param int $Tipo
     * @return \AppBundle\Service\WsAfip\CbteAsoc
     */
    public function setTipo($Tipo)
    {
      $this->Tipo = $Tipo;
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
     * @return \AppBundle\Service\WsAfip\CbteAsoc
     */
    public function setPtoVta($PtoVta)
    {
      $this->PtoVta = $PtoVta;
      return $this;
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
     * @return \AppBundle\Service\WsAfip\CbteAsoc
     */
    public function setNro($Nro)
    {
      $this->Nro = $Nro;
      return $this;
    }

}
