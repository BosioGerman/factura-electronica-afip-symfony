<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfEvt
{

    /**
     * @var Evt[] $Evt
     */
    protected $Evt = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return Evt[]
     */
    public function getEvt()
    {
      return $this->Evt;
    }

    /**
     * @param Evt[] $Evt
     * @return \AppBundle\Service\WsAfip\ArrayOfEvt
     */
    public function setEvt(array $Evt = null)
    {
      $this->Evt = $Evt;
      return $this;
    }

}
