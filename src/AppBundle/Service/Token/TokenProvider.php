<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 12/10/15
 * Time: 22:21
 */

namespace AppBundle\Service\Token;


class TokenProvider
{
    protected $tokenStorage;
    protected $tokenValidator;
    protected $tokenUpdater;

    public function __construct(TokenStorage $tokenStorage, TokenValidator $tokenValidator, TokenUpdater $tokenUpdater)
    {
        $this->tokenStorage = $tokenStorage;
        $this->tokenValidator = $tokenValidator;
        $this->tokenUpdater = $tokenUpdater;
    }
    public function getToken(){
        /*
         * get token from tokenstorage
         * validate token using token validator
         * if not valid get a new token using token updater
         * if there are no token for some reasons then trhow
         */
        $token = $this->tokenStorage->getLastToken();
        $bool = $this->tokenValidator->validate($token);
        if(!$bool){
            $token = $this->tokenUpdater->getNewToken();
        }
        if(!$token) {
            throw new \Exception("No HAY TOKEN");
        }
        return $token;
    }
}