<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 12/10/15
 * Time: 21:24
 */

namespace AppBundle\Service\Auth;


use Symfony\Component\Security\Acl\Exception\Exception;

class Generator
{
    protected $kernel;

    public function __construct($kernel){
        $this->kernel = $kernel;
    }

    public function generate($SERVICE){
        $path = $this->kernel->getRootDir();

        $TRA = new \SimpleXMLElement(
            '<?xml version="1.0" encoding="UTF-8"?>' .
            '<loginTicketRequest version="1.0">' .
            '</loginTicketRequest>');
        $TRA->addChild('header');
        $TRA->header->addChild('uniqueId', date('U'));
        $TRA->header->addChild('generationTime', date('c', date('U') - 60));
        $TRA->header->addChild('expirationTime', date('c', date('U') + 60));
        $TRA->addChild('service', $SERVICE);


        $success = $TRA->asXML( $path ."/cache/dev/" . 'TRA.xml');
        if(!$success){
            throw new \Exception("Error al escribir el archivo XML en en app/cache/dev compruebe permisos");
        }
    }
}
