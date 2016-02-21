<?php

namespace AppBundle\Service\WsAfip;

class FEDummyResponse
{

    /**
     * @var DummyResponse $FEDummyResult
     */
    protected $FEDummyResult = null;

    /**
     * @param DummyResponse $FEDummyResult
     */
    public function __construct($FEDummyResult)
    {
      $this->FEDummyResult = $FEDummyResult;
    }

    /**
     * @return DummyResponse
     */
    public function getFEDummyResult()
    {
      return $this->FEDummyResult;
    }

    /**
     * @param DummyResponse $FEDummyResult
     * @return \AppBundle\Service\WsAfip\FEDummyResponse
     */
    public function setFEDummyResult($FEDummyResult)
    {
      $this->FEDummyResult = $FEDummyResult;
      return $this;
    }

}
