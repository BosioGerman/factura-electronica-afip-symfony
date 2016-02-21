<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 12/10/15
 * Time: 21:25
 */

namespace AppBundle\Service\Auth;


class WSAACaller
{
    const URL_WSS = "https://wsaahomo.afip.gov.ar/ws/services/LoginCms";
    protected $kernel;

    public function __construct($kernel){
        $this->kernel = $kernel;
    }
    public function call($CMS)
    {
        $path = $this->kernel->getRootDir();

        $wsdl = $this->kernel->locateResource("@AppBundle/Certs/wsaa.wsdl");
        $reqXML = $path ."/cache/dev/request-loginCms.xml";
        $resXML = $path ."/cache/dev/response-loginCms.xml";

        $client = new \SoapClient($wsdl, array(
            'soap_version' => SOAP_1_2,
            'location' => self::URL_WSS,
            'trace' => 1,
            'exceptions' => 0
        ));
        $results = $client->loginCms(array('in0' => $CMS));
        file_put_contents($reqXML, $client->__getLastRequest());
        file_put_contents($resXML, $client->__getLastResponse());
        if (is_soap_fault($results)) {
            exit("SOAP Fault: " . $results->faultcode . "\n" . $results->faultstring . "\n");
        }
        return $results->loginCmsReturn;
    }
}