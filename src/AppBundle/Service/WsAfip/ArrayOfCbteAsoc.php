<?php

namespace AppBundle\Service\WsAfip;

class ArrayOfCbteAsoc
{

    /**
     * @var CbteAsoc[] $CbteAsoc
     */
    protected $CbteAsoc = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return CbteAsoc[]
     */
    public function getCbteAsoc()
    {
      return $this->CbteAsoc;
    }

    /**
     * @param CbteAsoc[] $CbteAsoc
     * @return \AppBundle\Service\WsAfip\ArrayOfCbteAsoc
     */
    public function setCbteAsoc(array $CbteAsoc = null)
    {
      $this->CbteAsoc = $CbteAsoc;
      return $this;
    }

}
