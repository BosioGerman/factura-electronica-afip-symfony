<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 15/11/15
 * Time: 20:55
 */

namespace AppBundle\Utility;


use AppBundle\Service\Token\TokenProvider;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Config\Definition\Exception\Exception;

class AuthProvider
{
    protected  $tokenProvider;
    protected $em;

    public function __construct(TokenProvider $tokenProvider, ObjectManager $em){
        $this->tokenProvider = $tokenProvider;
        $this->em = $em;
    }
    public function getAuth(){
        try {
            $token = $this->tokenProvider->getToken();

            $emisor = $this->em->getRepository('AppBundle:Emisor')->find(1);

            $cuit = $emisor->getCuit();

            if (!$cuit) {
                throw new Exception("No hay cuit definido en la emisor o no hay emisor");
            }

            $obj = new \stdClass();
            $obj->Token = $token->getValue();
            $obj->Sign = $token->getSign();
            $obj->Cuit = $cuit;



            return $obj;

        }
        catch (Exception $e){
            die($e->getMessage());
        }
    }
}