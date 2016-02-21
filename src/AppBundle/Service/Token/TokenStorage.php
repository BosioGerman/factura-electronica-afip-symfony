<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 12/10/15
 * Time: 20:42
 */

namespace AppBundle\Service\Token;

use Doctrine\ORM\EntityManager;
use AppBundle\Entity\Token;

class TokenStorage
{
    protected $em;

    public function __construct(EntityManager $em){
        $this->em = $em;
    }
    public function getLastToken(){
        $q = $this->em->createQuery();
        $q->setDQL("SELECT t from AppBundle:Token t ORDER BY t.id DESC");
        $q->setMaxResults(1);
        return $q->getOneOrNullResult();
    }
    public function ga(Token $token){
        $this->em->persist($token);
        $this->em->flush();
    }
}