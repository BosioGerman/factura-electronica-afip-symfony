<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfErr
{

    /**
     * @var Err[] $Err
     */
    protected $Err = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Err[]
     */
    public function getErr()
    {
      return $this->Err;
    }

    /**
     * @param Err[] $Err
     * @return \AppBundle\Service\WsAfip\ArrayOfErr
     */
    public function setErr(array $Err = null)
    {
      $this->Err = $Err;
      return $this;
    }

}
