<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 12/10/15
 * Time: 20:56
 */

namespace AppBundle\Service\Token;

use AppBundle\Entity\Token;

class TokenValidator
{
    public function validate($token)
    {
        if($token === NULL){
            return false;
        }

        $dateNow = new \DateTime("now");
        $tokenExpiration = $token->getExpiration();
        return $dateNow < $tokenExpiration;
    }
}