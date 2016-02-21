<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 15/11/15
 * Time: 21:02
 */

namespace AppBundle\Tests\Utility;


use AppBundle\Utility\AuthProvider;

class AuthProviderTest extends \PHPUnit_Framework_TestCase
{
    public $tokenProvider;
    public $entityManager;

    public function setUp(){
        // Create a stub for the SomeClass class.

        $token = $this->getMockBuilder('AppBundle\Entity\Token')
            ->getMock();

        $token->method('getValue')
            ->willReturn("foo");
        $token->method('getSign')
            ->willReturn("bar");


        $tokenProvider = $this->getMockBuilder('AppBundle\Service\Token\TokenProvider')
            ->disableOriginalConstructor()
            ->getMock();


        // Configure the stub.
        $tokenProvider->method('getToken')
            ->willReturn($token);

        $this->tokenProvider = $tokenProvider;

        $emisor = $this->getMockBuilder('AppBundle\Entity\Emisor')
            ->getMock();

        $emisor->expects($this->once())
            ->method('getCuit')
            ->will($this->returnValue("foobar"));

        $emisorRepository = $this
            ->getMockBuilder('\Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $emisorRepository->expects($this->once())
            ->method('find')
            ->will($this->returnValue($emisor));

        // Last, mock the EntityManager to return the mock of the repository
        $entityManager = $this
            ->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($emisorRepository));

        $this->entityManager = $entityManager;

    }

    public function testGetAuth()
    {

        $authProvider = new AuthProvider($this->tokenProvider, $this->entityManager);
        $auth = $authProvider->getAuth();

        $this->assertEquals( $auth->Token , "foo", "token value");
        $this->assertEquals( $auth->Sign , "bar", "sign value");
        $this->assertEquals( $auth->Cuit , "foobar", "cuit value");
    }

}
