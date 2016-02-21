<?php

namespace AppBundle\Service\WsAfip;

class DummyResponse
{

    /**
     * @var string $AppServer
     */
    protected $AppServer = null;

    /**
     * @var string $DbServer
     */
    protected $DbServer = null;

    /**
     * @var string $AuthServer
     */
    protected $AuthServer = null;

    
    public function __construct()
    {
    
    }

    /**
     * @return string
     */
    public function getAppServer()
    {
      return $this->AppServer;
    }

    /**
     * @param string $AppServer
     * @return \AppBundle\Service\WsAfip\DummyResponse
     */
    public function setAppServer($AppServer)
    {
      $this->AppServer = $AppServer;
      return $this;
    }

    /**
     * @return string
     */
    public function getDbServer()
    {
      return $this->DbServer;
    }

    /**
     * @param string $DbServer
     * @return \AppBundle\Service\WsAfip\DummyResponse
     */
    public function setDbServer($DbServer)
    {
      $this->DbServer = $DbServer;
      return $this;
    }

    /**
     * @return string
     */
    public function getAuthServer()
    {
      return $this->AuthServer;
    }

    /**
     * @param string $AuthServer
     * @return \AppBundle\Service\WsAfip\DummyResponse
     */
    public function setAuthServer($AuthServer)
    {
      $this->AuthServer = $AuthServer;
      return $this;
    }

}
