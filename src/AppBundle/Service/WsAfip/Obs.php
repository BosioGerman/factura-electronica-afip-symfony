<?php

namespace AppBundle\Service\WsAfip;

class Obs
{

    /**
     * @var int $Code
     */
    protected $Code = null;

    /**
     * @var string $Msg
     */
    protected $Msg = null;

    /**
     * @param int $Code
     */
    public function __construct($Code)
    {
      $this->Code = $Code;
    }

    /**
     * @return int
     */
    public function getCode()
    {
      return $this->Code;
    }

    /**
     * @param int $Code
     * @return \AppBundle\Service\WsAfip\Obs
     */
    public function setCode($Code)
    {
      $this->Code = $Code;
      return $this;
    }

    /**
     * @return string
     */
    public function getMsg()
    {
      return $this->Msg;
    }

    /**
     * @param string $Msg
     * @return \AppBundle\Service\WsAfip\Obs
     */
    public function setMsg($Msg)
    {
      $this->Msg = $Msg;
      return $this;
    }

}
