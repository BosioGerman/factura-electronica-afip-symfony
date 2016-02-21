<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 12/10/15
 * Time: 15:30
 */

namespace AppBundle\Service;


class AuthService
{
    protected $container;

    public function __construct($container){
        $this->container = $container;
    }

    public function getAuth()
    {

    }

    function CreateTRA($SERVICE)
    {
        $TRA = new \SimpleXMLElement(
            '<?xml version="1.0" encoding="UTF-8"?>' .
            '<loginTicketRequest version="1.0">' .
            '</loginTicketRequest>');
        $TRA->addChild('header');
        $TRA->header->addChild('uniqueId', date('U'));
        $TRA->header->addChild('generationTime', date('c', date('U') - 60));
        $TRA->header->addChild('expirationTime', date('c', date('U') + 60));
        $TRA->addChild('service', $SERVICE);

        $kernel = $this->container->get('kernel');
        $path = $kernel->getRootDir();
        $TRA->asXML( $path ."/cache/dev/" . 'TRA.xml');
    }

    function SignTRA()
    {
        $kernel = $this->container->get("kernel");
        $path = $kernel->getRootDir();
        $xmlLocation = $path ."/cache/dev/TRA.xml";
        $tmpLocation = $path ."/cache/dev/TRA.tmp";
        $cert = $kernel->locateResource("@AppBundle/Certs/AFIP.crt");
        $privateKey = $kernel->locateResource("@AppBundle/Certs/MiClavePrivada");
        $pass = "e_N12_-A";

        $STATUS = openssl_pkcs7_sign(
            $xmlLocation,
            $tmpLocation,
            "file://" . $cert,
            array("file://" . $privateKey, $pass),
            array(),
            !PKCS7_DETACHED
        );
        if (!$STATUS) {
            exit("ERROR generating PKCS#7 signature\n");
        }
        $inf = fopen($tmpLocation, "r");
        $i = 0;
        $CMS = "";
        while (!feof($inf)) {
            $buffer = fgets($inf);
            if ($i++ >= 4) {
                $CMS .= $buffer;
            }
        }
        fclose($inf);
        #  unlink("TRA.xml");
        unlink($tmpLocation);
        return $CMS;
    }

    function CallWSAA($CMS)
    {

        $kernel = $this->container->get("kernel");
        $path = $kernel->getRootDir();
        $reqXML = $path ."/cache/dev/request-loginCms.xml";
        $resXML = $path ."/cache/dev/response-loginCms.xml";
        $wsdl = $kernel->locateResource("@AppBundle/Certs/wsaa.wsdl");
        $url = "https://wsaahomo.afip.gov.ar/ws/services/LoginCms";

        $client = new \SoapClient($wsdl, array(
            #'proxy_host'     => PROXY_HOST,
            #'proxy_port'     => PROXY_PORT,
            'soap_version' => SOAP_1_2,
            'location' => $url,
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

    function getData(){
        $xml = <<<XML
<?xml version="1.0" encoding="UTF-8" standalone="yes"?>
<loginTicketResponse version="1">
    <header>
        <source>CN=wsaahomo, O=AFIP, C=AR, SERIALNUMBER=CUIT 33693450239</source>
        <destination>C=ar, O=feldev, SERIALNUMBER=CUIT 23326819549, CN=uebpos_test</destination>
        <uniqueId>232062316</uniqueId>
        <generationTime>2015-10-12T17:54:59.698-03:00</generationTime>
        <expirationTime>2015-10-13T05:54:59.698-03:00</expirationTime>
    </header>
    <credentials>
        <token>PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/Pgo8c3NvIHZlcnNpb249IjIuMCI+CiAgICA8aWQgdW5pcXVlX2lkPSIzMzY3NzA0MzEwIiBzcmM9IkNOPXdzYWFob21vLCBPPUFGSVAsIEM9QVIsIFNFUklBTE5VTUJFUj1DVUlUIDMzNjkzNDUwMjM5IiBnZW5fdGltZT0iMTQ0NDY4MzIzOSIgZXhwX3RpbWU9IjE0NDQ3MjY0OTkiIGRzdD0iQ049d3NmZSwgTz1BRklQLCBDPUFSIi8+CiAgICA8b3BlcmF0aW9uIHZhbHVlPSJncmFudGVkIiB0eXBlPSJsb2dpbiI+CiAgICAgICAgPGxvZ2luIHVpZD0iQz1hciwgTz1mZWxkZXYsIFNFUklBTE5VTUJFUj1DVUlUIDIzMzI2ODE5NTQ5LCBDTj11ZWJwb3NfdGVzdCIgc2VydmljZT0id3NmZSIgcmVnbWV0aG9kPSIyMiIgZW50aXR5PSIzMzY5MzQ1MDIzOSIgYXV0aG1ldGhvZD0iY21zIj4KICAgICAgICAgICAgPHJlbGF0aW9ucz4KICAgICAgICAgICAgICAgIDxyZWxhdGlvbiByZWx0eXBlPSI0IiBrZXk9IjIzMzI2ODE5NTQ5Ii8+CiAgICAgICAgICAgIDwvcmVsYXRpb25zPgogICAgICAgIDwvbG9naW4+CiAgICA8L29wZXJhdGlvbj4KPC9zc28+Cgo=</token>
        <sign>Yl9X5EfusHfBgPxKYSJ14y7KbtwQhUJ/HZ1PzypAZKTfGPcDBHqcGnabe2yhKniXu3eUmYsvZQRcbmoZBHMjA1oh43ErDjQjj/kW0Hb/hNeni3rsf6MtvT0BQytZ9viAqilS4jlBvCV/xN2hzFrdqj3e8KGr2Odc5EGB7BiI6F4=</sign>
    </credentials>
</loginTicketResponse>
XML;
        $data = new \SimpleXMLElement($xml);

        return $data;


    }
}