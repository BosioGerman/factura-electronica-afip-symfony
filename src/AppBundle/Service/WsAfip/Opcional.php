<?php

namespace AppBundle\Service\WsAfip;

class Opcional
{

    /**
     * @var string $Id
     */
    protected $Id = null;

    /**
     * @var string $Valor
     */
    protected $Valor = null;

    
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
     * @return \AppBundle\Service\WsAfip\Opcional
     */
    public function setId($Id)
    {
      $this->Id = $Id;
      return $this;
    }

    /**
     * @return string
     */
    public function getValor()
    {
      return $this->Valor;
    }

    /**
     * @param string $Valor
     * @return \AppBundle\Service\WsAfip\Opcional
     */
    public function setValor($Valor)
    {
      $this->Valor = $Valor;
      return $this;
    }

}
