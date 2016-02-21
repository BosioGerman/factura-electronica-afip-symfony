<?php

namespace AppBundle\Service\WsAfip;

class PaisTipo
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
     * @return \AppBundle\Service\WsAfip\PaisTipo
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
     * @return \AppBundle\Service\WsAfip\PaisTipo
     */
    public function setDesc($Desc)
    {
      $this->Desc = $Desc;
      return $this;
    }

}
