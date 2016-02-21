<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 12/10/15
 * Time: 21:25
 */

namespace AppBundle\Service\Auth;


use Symfony\Component\Security\Acl\Exception\Exception;

class XMLSigner
{
    protected $kernel;

    public function __construct($kernel){
        $this->kernel = $kernel;
    }
    public function sign(){
        $path = $this->kernel->getRootDir();

        $xmlLocation = $path ."/cache/dev/TRA.xml";
        $tmpLocation = $path ."/cache/dev/TRA.tmp";

        $cert = $this->kernel->locateResource("@AppBundle/Certs/AFIP.crt");
        $privateKey = $this->kernel->locateResource("@AppBundle/Certs/MiClavePrivada");
        $pass = file_get_contents($this->kernel->locateResource("@AppBundle/Certs/pass.txt"));


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
}