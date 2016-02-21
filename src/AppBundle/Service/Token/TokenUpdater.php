<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 12/10/15
 * Time: 21:12
 */

namespace AppBundle\Service\Token;

use AppBundle\Service\Auth\Generator;
use AppBundle\Service\Auth\WSAACaller;
use AppBundle\Service\Auth\XMLSigner;
use AppBundle\Service\Token\TokenStorage;
use AppBundle\Entity\Token;

class TokenUpdater
{
    protected $generator;
    protected $WSAACaller;
    protected $XMLSigner;
    protected $tokenStorage;

    public function __construct(Generator $generator , WSAACaller $WSAACaller, XMLSigner $XMLSigner, TokenStorage $tokenStorage)
    {
        $this->generator = $generator;
        $this->WSAACaller = $WSAACaller;
        $this->XMLSigner = $XMLSigner;
        $this->tokenStorage = $tokenStorage;
    }

    public function getNewToken(){

        $this->generator->generate("wsfe");
        $signed = $this->XMLSigner->sign();

        $data = $this->WSAACaller->call($signed);
        $tokenData = new \SimpleXMLElement($data);

        $token = new Token();
        $token->setExpiration(new \DateTime($tokenData->header->expirationTime));
        $token->setCreated(new \DateTime($tokenData->header->generationTime));
        $token->setValue( $tokenData->credentials->token);
        $token->setSign($tokenData->credentials->sign);

        $this->tokenStorage->saveToken($token);
        return $token;

    }

}