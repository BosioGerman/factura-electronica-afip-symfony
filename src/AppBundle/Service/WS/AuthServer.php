<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 17/10/15
 * Time: 18:57
 */

namespace AppBundle\Service\WS;

use AppBundle\Service\Token\TokenProvider;

class AuthServer
{

    protected $tokenProvider;

    public function __construct(TokenProvider $tokenProvider)
    {
        $this->tokenProvider = $tokenProvider;
    }

    public function getAuthElement(){
        return [  "Token" => $token->getValue(),
                   "Sign" => $token->getSign(),
                   "Cuit" => $cuit
               ];
    }

}