<?php

namespace AppBundle\Service\WsAfip;

class Cotizacion
{

    /**
     * @var string $MonId
     */
    protected $MonId = null;

    /**
     * @var float $MonCotiz
     */
    protected $MonCotiz = null;

    /**
     * @var string $FchCotiz
     */
    protected $FchCotiz = null;

    /**
     * @param float $MonCotiz
     */
    public function __construct($MonCotiz)
    {
      $this->MonCotiz = $MonCotiz;
    }

    /**
     * @return string
     */
    public function getMonId()
    {
      return $this->MonId;
    }

    /**
     * @param string $MonId
     * @return \AppBundle\Service\WsAfip\Cotizacion
     */
    public function setMonId($MonId)
    {
      $this->MonId = $MonId;
      return $this;
    }

    /**
     * @return float
     */
    public function getMonCotiz()
    {
      return $this->MonCotiz;
    }

    /**
     * @param float $MonCotiz
     * @return \AppBundle\Service\WsAfip\Cotizacion
     */
    public function setMonCotiz($MonCotiz)
    {
      $this->MonCotiz = $MonCotiz;
      return $this;
    }

    /**
     * @return string
     */
    public function getFchCotiz()
    {
      return $this->FchCotiz;
    }

    /**
     * @param string $FchCotiz
     * @return \AppBundle\Service\WsAfip\Cotizacion
     */
    public function setFchCotiz($FchCotiz)
    {
      $this->FchCotiz = $FchCotiz;
      return $this;
    }

}
