<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 16/11/15
 * Time: 16:31
 */

namespace AppBundle\Tests\Utility;

use AppBundle\Utility\ComprobanteNumeroProvider;

class ComprobanteNumeroProviderTest extends \PHPUnit_Framework_TestCase
{
    public $puntoVenta0;
    public $puntoVenta1;

    public $entityManager;

    public function setUp(){


        $entityList = array();


        $numeroComprobante = $this->getMockBuilder('AppBundle\Entity\NumeroComprobante')
            ->getMock();

        $entityList2 = array ( 0 => $numeroComprobante);


        $puntoVenta = $this->getMockBuilder('AppBundle\Entity\PuntoVenta')
            ->getMock();

        $puntoVenta->expects($this->once())
            ->method('getNumero')
            ->will($this->returnValue(1));

        $puntoVenta2 = $this->getMockBuilder('AppBundle\Entity\PuntoVenta')
            ->getMock();

        $puntoVenta2->expects($this->once())
            ->method('getNumero')
            ->will($this->returnValue(1));

        $numeroComprobante->expects($this->once())
            ->method('getNumero')
            ->will($this->returnValue(1));

        $numeroComprobanteRepository = $this
            ->getMockBuilder('\Doctrine\ORM\EntityRepository')
            ->disableOriginalConstructor()
            ->getMock();

        $numeroComprobanteRepository->expects($this->once())
            ->method('findLastNumeroComprobante')
            ->with($this->equalTo($puntoVenta))
            ->will($this->returnValue($entityList));

        $numeroComprobanteRepository->expects($this->once())
            ->method('findLastNumeroComprobante')
            ->with($this->equalTo($puntoVenta2))
            ->will($this->returnValue($entityList2));

        // Last, mock the EntityManager to return the mock of the repository
        $entityManager = $this
            ->getMockBuilder('\Doctrine\Common\Persistence\ObjectManager')
            ->disableOriginalConstructor()
            ->getMock();
        $entityManager->expects($this->once())
            ->method('getRepository')
            ->will($this->returnValue($numeroComprobanteRepository));

        $this->entityManager = $entityManager;
        $this->puntoVenta0 = $puntoVenta;
        $this->puntoVenta1 = $puntoVenta2;



    }

    public function testGetNewComprobanteNumeroVacio(){
        $cmp = new ComprobanteNumeroProvider($this->entityManager);
        $compNum = $cmp->getNewComprobanteNumero($this->puntoVenta0);
        $this->assertEquals( $compNum->getNumero() , 1, "No creo el numero");
    }
    public function testGetNewComprobanteNumeroNuevo(){
        $cmp = new ComprobanteNumeroProvider($this->entityManager);
        $compNum = $cmp->getNewComprobanteNumero($this->puntoVenta1);
        $this->assertEquals( $compNum->getNumero() , 1, "No creo el numero");
    }
}
