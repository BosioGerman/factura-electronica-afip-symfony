<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 14/10/15
 * Time: 16:18
 */

namespace AppBundle\Service\WS;

use AppBundle\Service\Token\TokenProvider;

class WebServiceAFIPClient
{
    protected $tokenProvider;
    protected $kernel;
    protected $token;
    protected $auth;

    public function __construct(TokenProvider $tokenProvider, $kernel)
    {
        $this->tokenProvider = $tokenProvider;
        $this->kernel = $kernel;
    }

    public function getClient(){

        try {
            $this->token = $this->tokenProvider->getToken();
        }catch (Exception $e){
            var_dump($e);
        }
        $client = new \SoapClient("https://wswhomo.afip.gov.ar/wsfev1/service.asmx?WSDL");

        $cuit_file = $this->kernel->locateResource("@AppBundle/Certs/cuit.txt");
        $cuit = file_get_contents($cuit_file);
        if(!$cuit){
            throw new Exception("Escriba su cuit en AppBundle/Certs/cuit.txt");
        }
        $obj = new \stdClass();
        $obj->Token = $this->token->getValue();
        $obj->Sign = $this->token->getSign();
        $obj->Cuit = $cuit;

        $auth = new \stdClass();
        $auth->Auth = $obj;
        $this->auth = $auth;
        return $client;
    }

    public function getAuth(){
        return $this->auth;
    }

}